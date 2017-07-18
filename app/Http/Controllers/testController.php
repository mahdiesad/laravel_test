<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/16/2017
 * Time: 3:03 PM
 */

namespace App\Http\Controllers;


use App\Person;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;




class testController extends Controller
{
    public function test(){

        return view('mahdieh');

    }

    public function insert_page(Request $request)
    {
        $array = array();
        $array[]=$request->input('username');
        $array[]=$request->input('lastname');
        $array[]=$request->input('firstname');
        $array[]=$request->input('age');
//var_dump($array,count($array));
//        var_dump($array[0]!=null &&$array[1]!=null &&$array[2]!=null &&$array[3]!=null);
//// die;
        if ($array[0]!=null &&$array[1]!=null &&$array[2]!=null &&$array[3]!=null ){
            $this->insert($array);
        }
       return view('insert');
    }

    public function index()
    {
//        $users = DB::select('select * from users where active = ?', [1]);
//        var_dump($users);
//       // return view('user.index', ['users' => $users]);

        print_r(Person::all());die;
    }
    public function person_view(){
//        $person = DB::table('person')->get();
//        return View::make('person')->with('person', $person);
        $users = array();
        $count=0;
        $person=$this->person_view_tabale();
        foreach ($person as $user){
            $users[$count]['username']=$user->UserName;
            $users[$count]['lastname']=$user->LastName;
            $users[$count]['firstname']=$user->FirstName;
            $users[$count]['age']=$user->Age;
            $count++;

        }
        //var_dump($users);

        return view('users')->with('users',$users);


    }
    private function person_view_tabale(){

       return Person::all();
//        return view('users');
     //  var_dump($person);

    }
    public function insert($data)
    {
//        var_dump($data[4]);
//        die;

        Person::create(
            [
                'UserName' => $data[0],
                'LastName' => $data[1],
                'FirstName' => $data[2],
                'Age' => $data[3],
                'password' =>Hash::make($data[4])
            ]
        );


    }
    public function login_url($name){
//        $users = User::where('id', '!=', Auth::id())->get();

        $result=Person::where('UserName',$name)->get();

        $users = array();
        foreach ($result as $user) {

            $users['lastname'] = $user->LastName;
            $users['firstname'] = $user->FirstName;
            $users['age'] = $user->Age;
        }
      ///  var_dump($result);

//        $count=0;
//        $users = array();
//        foreach ($result as $user){
//            $users[$count]['username']=$user->UserName;
//            $users[$count]['lastname']=$user->LastName;
//            $users[$count]['firstname']=$user->FirstName;
//            $users[$count]['age']=$user->Age;
//            if($users[$count]['username']==$name) {
//               // return $name;
//                break;
//            }
//            $count++;
//        }
      //  var_dump($result);
       // die;
//        if($users['username']==$name){
//            return $name;
//        }
//        $a=$users[$count];
//        var_dump($a['username'], $count);
       return view('login_url')->with('user',$users);

    }


    public function edit_profile($name,Request $request){

        $result=Person::where('UserName',$name)->get();

        $users = array();
        foreach ($result as $user) {

            $users['lastname'] = $user->LastName;
            $users['firstname'] = $user->FirstName;
            $users['age'] = $user->Age;
        }

        $array = array();
        $array[]=$request->input('lastname');
        $array[]=$request->input('firstname');
        $array[]=$request->input('age');

        if($request->isMethod('post')){
            person::where('UserName',$name) -> update(['LastName'=>$array[0],'FirstName'=>$array[1],'Age'=>$array[2]]);
           return  $this->person_view();

        }
        else{
            return view('editProfile') -> with('user',$users);
        }


    }
    public function delete_user($name)
    {
        $result=Person::where('UserName',$name)->get();
        person::where('UserName',$name) -> delete();
        return  $this->person_view();
    }
    public function loginForm()
    {
        return view('loginForm');
    }
    public function signUpForm(Request $request)
    {

        $array = array();
        $array[]=$request->input('username');
        $array[]=$request->input('lastname');
        $array[]=$request->input('firstname');
        $array[]=$request->input('age');
        $array[]=$request->input('password');


        //        var_dump($array);
//        die;

        if($request->isMethod('post')){

            $this->insert($array);
//            var_dump("succed");
//            die;
            return $this ->loginForm();
        }
        else
            return view('signUpForm');
    }

}