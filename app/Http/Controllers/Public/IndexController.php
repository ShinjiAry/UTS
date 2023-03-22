<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class IndexController extends Controller
{
    //
    public function index (){
        $data=[
            'products'=> Menu::get(),
        ];
        // dd($Menu);
        return view("public.index", $data);
        
    }
    
}
