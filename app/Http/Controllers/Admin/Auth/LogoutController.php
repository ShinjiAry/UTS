<?php
 
namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Alert;
use Illuminate\Support\Facades\Validator;

class LogoutController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    /*
    |-----------------------------------------
    | logout
    |-----------------------------------------
    | remove cookie
    */ 
    public function logout()
    {
        //hapus cookie
        Cookie::queue(Cookie::forget('login_token'));

        Alert::success('Success!', 'Berhasil Logout!');
        return redirect()->back();
    }
}