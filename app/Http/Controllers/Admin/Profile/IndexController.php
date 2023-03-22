<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\SuperAdmin\History\IndexController as HistoryIndexController;
use App\Http\Controllers\Controller;
use App\Models\CustomerModel;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page_nav = 'Profile';
    }

    /*
    |-----------------------------------------
    | index
    |-----------------------------------------
    | view super_admin.profile.index
    */ 
    public function index(Request $request)
    {
        $email = $request->cookie('login_token');

        $data = [
         'user' => Users::where('email', $email)->first(),
        ];
        return view('admin.profile.index', $data);
    } 

    /*
    |-----------------------------------------
    | save
    |-----------------------------------------
    | save profile $request to Users
    */ 
    public function save(Request $request)
    {
        /*
        |-----------------------------------------
        | validation
        |-----------------------------------------
        | validate $request
        */ 
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'password' => '',       
            ],
            // [
            //     'required' => 'harus disii',
            // ]
        );

        /*
        |-----------------------------------------
        | error validation
        |-----------------------------------------
        | return with input and error message
        */ 
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // id
        $id = $request->id;

        /*
        |-----------------------------------------
        | check password
        |-----------------------------------------
        | update new password
        */  
        if(!empty($request->password)) {
            // password sama dengan konfirmasi?
            if($request->password == $request->password_confirmation){
                $password = Hash::make($request->password);
            } else {
                Alert::info('Password', 'password tidak sama dengan konfirmasi!');
                return redirect()->back()->withInput();
            }
            
        } else {
            $password = Users::where('id', $id)->first()->password;
        }

        /*
        |-----------------------------------------
        | update
        |-----------------------------------------
        | update $request by $id 
        */ 
        Users::where('id',$id)->update([
            'name' => $request->name,
            'password' => $password,
        ]);

        /*
        |-----------------------------------------
        | return
        |-----------------------------------------
        | Alert
        */ 
        Alert::success('Diperbaharui!', 'Data berhasl di perbaharui');
        return redirect()->back();
    } 
}
