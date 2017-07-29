<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Roles;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

//    protected function guard()
//    {
//        return Auth::guard('guard-name');
//    }
//    public function username()
//    {
//        return 'username';
//    }

    public function login(Request $req)
    {
        $credentials = array('UserName' => $req['user'],
                            'password' => $req['password']);
//        var_dump($credentials);
//        die;

//            $credentials = array('UserName' => $req['user'],
//                'password' => $req['password']);
//            var_dump('true');
//                die;
            if (Auth::attempt($credentials, false)) {
//var_dump(Auth::user()->role_id);
//die;
                if(Auth::user()->role_id!=2){
                    return redirect()->to('/mahdieh/users');
                }else{
                    return redirect()->to('/home');
                }

//                var_dump('true');
//                die;
            } else {
                //return redirect('login');
                $message = 'username or password is incorrect';

            }

        return view('loginForm');



    }
    public function getLogout(){
        Auth::logout();
        return redirect()->to('/login');
    }
}
//    public function login_succ(){
//        if(check::auth){
//            return $this->person_view();
//        }
//        else
//            return view('home');
//    }
//    public function person_view(){
////        $person = DB::table('person')->get();
////        return View::make('person')->with('person', $person);
//        $users = array();
//        $count=0;
//        $person=$this->person_view_tabale();
//        foreach ($person as $user){
//            $users[$count]['username']=$user->UserName;
//            $users[$count]['lastname']=$user->LastName;
//            $users[$count]['firstname']=$user->FirstName;
//            $users[$count]['age']=$user->Age;
//            $count++;
//
//        }
//        //var_dump($users);
//
//        return view('users')->with('users',$users);
//
//
//    }
//    private function person_view_tabale(){
//
//        return User::all();
////        return view('users');
//        //  var_dump($person);
//
//    }
//}
