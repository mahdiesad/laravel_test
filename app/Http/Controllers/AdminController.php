<?php

namespace App\Http\Controllers;
use App\Roles;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function viewUser()
    {
       $userId=Auth::user()->id;
        $users = array();
        $count = 0;
        /* $person = User::where('id','!=',$userId)->get();*/
        $person=User::leftJoin('images', 'person.id', '=', 'images.userId')
            ->where('person.id','!=',$userId)
            ->select('person.id' , 'person.UserName', 'person.LastName', 'person.FirstName','person.Age', 'images.img_name')
            ->get();
//        var_dump('<pre>',$person);die;


        foreach ($person as $user) {

               $users[$count]['img_name']=$user->img_name;
               $users[$count]['id']=$user->id;
               $users[$count]['username'] = $user->UserName;
               $users[$count]['lastname'] = $user->LastName;
               $users[$count]['firstname'] = $user->FirstName;
               $users[$count]['age'] = $user->Age;
               $count++;


        }
        //var_dump($users);

        return view('users')->with('users', $users);

//        else{
//           return redirect()->to('/login');
//        }
        // return view('loginForm');
    }


    public function delete_user($name)
    {
       // $result = User::where('UserName', $name)->get();
        User::where('UserName', $name)->delete();
        return $this->viewUser();
    }

    public function edit_profile($name, Request $request)
    {

        $result = User::where('UserName', $name)->get();

        $users = array();
        foreach ($result as $user) {

            $users['lastname'] = $user->LastName;
            $users['firstname'] = $user->FirstName;
            $users['age'] = $user->Age;
        }

        $array = array();
        $array[] = $request->input('lastname');
        $array[] = $request->input('firstname');
        $array[] = $request->input('age');

        if ($request->isMethod('post')) {
            User::where('UserName', $name)->update(['LastName' => $array[0], 'FirstName' => $array[1], 'Age' => $array[2]]);
            return $this->viewUser();

        } else {
            return view('editProfile')->with('user', $users);
        }


    }

    public function profile($name)
    {
//        $users = User::where('id', '!=', Auth::id())->get();

        $result = User::where('UserName', $name)->get();

        $users = array();
        foreach ($result as $user) {

            $users['lastname'] = $user->LastName;
            $users['firstname'] = $user->FirstName;
            $users['age'] = $user->Age;
        }
        return view('profile')->with('user',$users);
    }
}