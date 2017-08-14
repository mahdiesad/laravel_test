<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
class MLoginController extends Controller
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

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
//    private $loginProxy;
//    public function __construct(LoginProxy $loginProxy)
//    {
//        $this->loginProxy = $loginProxy;
//    }

    public function login(Request $request, JWTAuth $JWTAuth)
    {
        if(isset($request['username'],$request['password'])){
        $username = $request['username'];
        $password = bcrypt($request['password']);

            $credentials =array(
                'UserName'=>$username,
                'password'=>$password
            );
        try {
            $token = $JWTAuth->attempt($credentials);
            if(!$token) {
                throw new AccessDeniedHttpException();
            }
        } catch (JWTException $e) {
            throw new HttpException(500);
        }
        $user = User::where(['UserName', $username], ['password', $password]);
        var_dump($user);die;

        if ($user) {

            $data = array(
                'username' => $user['UserName'],
                'FirstName' => $user['FirstName'],
                'LastName' => $user['LastName'],
                'Age' => $user['Age'],
            );
            $response = array(
                'status' => 1,
                'message' => 'successfully logged in.',
                'message_fa' => 'شما با موفقیت وارد شدید',
                'info' => $data
            );

        } else {
            $response['status'] = 0;
            $response['message'] = 'invalid parameters passed';
//            $response = array(
//                'status' => 2,
//                'message' => 'login failed, relogin please',
//                'message_fa' => 'لطفا دوباره امتحان نمایید',
//            );
        }

    }
///

    ///if for is set close

//        return json_encode($response);
    }

//    public function login(LoginRequest $request, JWTAuth $JWTAuth)
//    {
//        $credentials = $request->only(['email', 'password']);
//        try {
//            $token = $JWTAuth->attempt($credentials);
//            if(!$token) {
//                throw new AccessDeniedHttpException();
//            }
//        } catch (JWTException $e) {
//            throw new HttpException(500);
//        }
    public function logout()
    {
        $this->loginProxy->logout();

        return $this->response(null, 204);
    }


}

