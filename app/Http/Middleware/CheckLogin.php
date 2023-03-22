<?php

namespace App\Http\Middleware;

use App\Models\UserModel;
use App\Models\Users;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $email = $request->cookie('login_token');
        // $password = $request->cookie('MhkBS');

        // cek email & password
        if(Users::where('email', $email)->first() != null) {
                return $next($request);
        }
        // jika error
        return redirect('/auth/login');
    }
}
