<?php
 
namespace App\Http\Controllers\Admin\Auth;
 
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    /*
    |-----------------------------------------
    | login page
    |-----------------------------------------
    | view auth.login
    */ 
    public function login(Request $request)
    {
        /*
        |-----------------------------------------
        | check has login
        |-----------------------------------------
        | check by cookie
        */ 
        $email = $request->cookie('login_token');
        // $password = $request->cookie('MhkBS');

        /*
        |-----------------------------------------
        | validation
        |-----------------------------------------
        | save $request to CustomerModel
        */ 
        if(Users::where('email', $email)->first() != null) {
            return redirect('/admin/dashboard');
            // }
        }

        $data = [
            'title' => 'Login Page',
        ];
        // success
        return view('admin.auth.login', $data);
    }

    /*
    |-----------------------------------------
    | login verify
    |-----------------------------------------
    | auth verify login
    */ 
    public function save(Request $request) 
    {
        /*
        |-----------------------------------------
        | validation
        |-----------------------------------------
        | validation password and 
        */ 
        if(Users::where('email', $request->email)->first() != null) {
            // cek password
            if(Hash::check($request->password, Users::where('email', $request->email)->first()->password)) {
                // cookie
                Cookie::queue('login_token', $request->email, 100 * 60 * 60 * 24 * 7);
                Alert::success('Success!', 'Selamat datang!' . $request->email);
                return redirect()->route('admin.dashboard');
            }
        }

        /*
        |-----------------------------------------
        | error validation
        |-----------------------------------------
        | return back, with error message
        */ 
        // failed
        Alert::error('Maaf!', 'password atau username salah!');
        return redirect()->back();
    }

}