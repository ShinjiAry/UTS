<?php
 
 namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Alert;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    /*
    |-----------------------------------------
    | register
    |-----------------------------------------
    | view auth.register.index
    */ 
    public function register()
    {
        $data = [
            'title' => 'Register Login'
        ];
        return view('admin.auth.register', $data);
    }

    /*
    |-----------------------------------------
    | register_create
    |-----------------------------------------
    | register_create new user by $request
    */ 
    public function save(Request $request)
    {
        // validate
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:App\Models\Users,email',
                'password' => 'required|confirmed'
            ],
            // [
            //     'required' => 'harus disii',
            //     'unique' => 'sudah terdaftar',
            //     'confirmed' => 'tidak sama'
            // ]
        );

        /*
        |-----------------------------------------
        | validate error
        |-----------------------------------------
        | return back with input and error message
        */ 
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        /*
        |-----------------------------------------
        | validate success
        |-----------------------------------------
        | save data to Users by $request
        */ 
        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        /*
        |-----------------------------------------
        | Return Back
        |-----------------------------------------
        | create cookie
        | Alert
        | return back
        */ 
        Cookie::queue('login_token', $request->email, 100 * 60 * 60 * 24 * 7);
        
        Alert::success('Success!', 'Selamat datang!' . $request->email);
        return redirect()->route('admin.dashboard');
    }

}