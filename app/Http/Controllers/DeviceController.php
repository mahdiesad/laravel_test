<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Zend\Diactoros\Request;

class DeviceController extends Controller
{
    use HasApiTokens, Notifiable;
 public function login(Request $req){
     $data = array('UserName' => $req['username'],
                   'password' => $req['password']);
     if(isset( $data['UserName']) && isset( $data['password'])){
       if(User::where('UserName',$data['UserName'])->where('pass')){

       }
     }
 }



}
