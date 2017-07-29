<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;
use Closure;

class AdminMiddleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next)
    {

        if (  Auth::user()->role_id==1 )
        {
            return $next($request);
        }

        return redirect('/logout');

    }

}
