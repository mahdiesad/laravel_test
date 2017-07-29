<?php

namespace App\Http\Controllers;

use App\Friends;
use App\Friends_req;
use App\Posts;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use AuthorizesRequests,  ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homePage(){
        $current=Auth::user()->id;
        $user=User::leftJoin('images', 'person.id', '=', 'images.userId')
//            ->leftJoin('posts', 'person.id','=','posts.userId')
            ->select('person.id' , 'person.UserName','person.LastName','person.FirstName','images.img_name','person.Age')
            ->where('person.id',$current)
            ->get();
        $friend_post=Friends::leftJoin('person', 'person.id', '=', 'friends.friendId')
            ->leftJoin('images','friends.friendId','=','images.userId')
            ->leftJoin('posts', 'friends.friendId','=','posts.userId')
            ->select('person.id' , 'person.UserName','person.LastName','person.FirstName','images.img_name','posts.posts')
            ->where('friends.userId',$current)
            ->get();
//        var_dump('<pre>',$friend_post);die;
//        $person=array();
//        $person['current_id']=$user->id;
//        $person[]
        $data = ['user' => $user,'friend_post' => $friend_post];


       return view("home")->with('user',$data);
    }
    public function friendPage(){
//        select friends from db
        $user=Auth::user();
        $friends_req=Friends_req::leftJoin('person', 'person.id', '=', 'friends_req.userId_1')
                       ->leftJoin('images','friends_req.userId_1','=','images.userId')
                       ->select('person.id' , 'person.UserName','person.LastName','person.FirstName','images.img_name')
                       ->where('friends_req.userId_2',$user->id)
                       ->get();
//        select friends_req from db
        $friends=Friends::leftJoin('person', 'person.id', '=', 'friends.friendId')
            ->leftJoin('images','friends.friendId','=','images.userId')
            ->select('person.id' , 'person.UserName','person.LastName','person.FirstName','images.img_name')
            ->where('friends.userId',$user->id)
            ->get();
//var_dump('<pre>',$friends);die;
        return view('friends')->with('friends',$friends )->with('friends_req',$friends_req);
    }
    public function friends_req(Request $req){
        $current=Auth::user();
        var_dump('<pre>',$req);die;
        if($req['botton_id'] != 'decline'){
            Friends_req::where('userId_2', $current->id)
                       ->where('userId_1',$req['user_id'])
                       ->delete();
            Friends::create(
                [
                    'userId' => $current->id,
                    'friendId' => $req['user_id'],

                ]
            );
        }else{
            Friends_req::where('userId_2', $current->id)
                ->where('userId_1',$req['user_id'])
                ->delete();
        }
        return redirect()->to('/friends');
    }
    public function friends_remove(Request $req){

            Friends::where('friendId',$req['user_id'])
                ->where('userId',Auth::user()->id)
                ->delete();

        return redirect()->to('/friends');
    }
    public function send_post(Request $req){

        Posts::create(
          [
              'userId'=>Auth::user()->id,
              'posts'=>$req['posts']
          ]
        );
        return redirect()->to('/home');

    }
    public function sendReq(Request $req){
//        var_dump("Im here!!!");die;
        if(User::where('UserName',$req['user'])){
            $friendId=User::where('UserName',$req['user'])
                          ->get();

//var_dump('<pre>',$friendId['id']);die;
            $id = null;
foreach ($friendId as $item){
    $id = $item->id;
}
//                var_dump('<pre>',$id);die;

            Friends_req::create(
                  [
                      'userId_1'=>Auth::user()->id,
                      'userId_2'=> $id
                  ]
                );
//            var_dump("Im here!?!!");die;

            $massage='success';
        }
        return redirect()->to('/home');
    }

}
