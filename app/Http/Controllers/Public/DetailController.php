<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class DetailController extends Controller
{
    //
    public function detail ($id){
        $data=[
            'product'=>Menu::where('id', $id)->first(),
            'products'=> Menu::get(),
        ];
        // dd($Menu);
        return view("public.detail", $data);
        
    }
}
