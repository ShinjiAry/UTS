<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{

    public function __construct()
    {
        $this->storage = '/public/product/';
    }

    function rename($request, $requestTitle) {
        return time() . '.' . $request->$requestTitle->getClientOriginalExtension();;
    }

    // untuk memuncukkan page sebuah produk berdasarkan varibael id
    public function detail(Request $request, $id) {
        $data=[
            'item' => Menu::find($id),
        ];
        return view('admin.product.detail', $data);
    }
}
