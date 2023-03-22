<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index (){
        $Menu=Menu::get();
        $data=[
            'Menu'=>$Menu,
        ];
        // dd($Menu);
        return view("admin.dashboard.index", $data);
        
    }
    
}
