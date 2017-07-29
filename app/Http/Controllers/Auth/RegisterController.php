<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Images;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

//use SebastianBergmann\CodeCoverage\Report\Xml\File;

//use phpDocumentor\Reflection\File;
//use Symfony\Component\HttpFoundation\File\File;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        var_dump($this->checkUsername());die;
        return Validator::make($data, [
            /////'password' => bcrypt($data['password']),
            ///  //'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|min:6|max:255',
            'password' => 'required|string|min:6',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:100',
            //  'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //  var_dump($data);die;
        return User::create([
            ////   'email' => $data['email'],
            'UserName' => $data['username'],
            'password' => bcrypt($data['password']),
            'LastName' => $data['lastname'],
            'FirstName' => $data['firstname'],
            'Age' => $data['age'],
        ]);
    }

    public function upload($userId)
    {
//var_dump($file);die;
        $newName = str_random(10);

        $public_path = public_path('/images/users/' . $userId);
        File::makeDirectory($public_path);
        $file = Input::file('photo');
        $file->move($public_path, $newName . '.jpg');
        File::makeDirectory($public_path . '/30x30');
        File::makeDirectory($public_path . '/200x200');


        $img = Image::make(file_get_contents($public_path . '/' . $newName . '.jpg'));
        $img = $img->fit(30, 30);
        $img->save($public_path . '/30x30/' . $newName . '.jpg');

        $img = Image::make(file_get_contents($public_path . '/' . $newName . '.jpg'));
        $img = $img->fit(200, 200);
        $img->save($public_path . '/200x200/' . $newName . '.jpg');

//        ////  insert in db
        Images::create(
            [
                'userId' => $userId,
                'img_name' => $newName.'.jpg',
            ]);


    }

    public function default_img($userId){


        $public_path = public_path('/images/users/' . $userId);
        File::makeDirectory($public_path);
        File::makeDirectory($public_path.'/30x30');
        File::makeDirectory($public_path.'/200x200');
        $file = Image::make(file_get_contents('C:\xampp\htdocs\laravel_test\public\images\users\default.jpg'))->save($public_path.'/30x30/default.jpg');
        $file = Image::make(file_get_contents('C:\xampp\htdocs\laravel_test\public\images\users\default.jpg'))->resize(200,200)->save($public_path.'/200x200/default.jpg');






//        ////  insert in db
        Images::create(
            [
                'userId' => $userId,
                'img_name' => 'default.jpg',
            ]);
    }

    public function registerReal(Request $req)
    {
//var_dump('<pre>',get_class_methods($req));die;
//if($req->isJson())
//var_dump('<pre>',$req['files']);die;
        $credentials = array(
            'username' => $req['username'],
            'password' => $req['password'],
            'lastname' => $req['lastname'],
            'firstname' => $req['firstname'],
            'age' => $req['age'],
            //    'photo'=>$req->hasFile('photo')
        );

        if ($req->isMethod('post')) {

            if ($this->validator($credentials)->fails()) {
                var_dump($this->validator($credentials)->messages());
                die;
            } else {
                $this->create($credentials);

                if (Auth::attempt($credentials, false)) {

//                    var_dump($req->hasFile('photo'));die;
                    $userId = Auth::user()->id;
                    if ($req->hasFile('photo')) {
                        $this->upload($userId);
                    }else{
                        $this->default_img($userId);
                    }
                    if (Auth::user()->role_id != 2) {
                        return redirect()->to('/mahdieh/users');
                    } else {
                        return redirect()->to('/home');
                    }

                }
            }
        }
//        var_dump('here!!!!');die;
        return view('signupForm');


    }
    //    register Legal Customer

    //    check username exist or not
    public function checkUsername(Request $r)
    {
        $count = User::where('UserName', $r['username'])->count();
        return json_encode(['status' => ($count == 0) ? true : false]);
    }
}