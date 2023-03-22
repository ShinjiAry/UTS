<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{

    public function __construct()
    {
        $this->storage = '/public/product/';
    }

    function rename($request, $requestTitle) {
        return time() . '.' . $request->$requestTitle->getClientOriginalExtension();;
    }

    // untuk menghapus data berdasarkan var id
    public function delete(request $request )
    {
        Storage::delete($this->storage . Menu::where('id',$request->id)->first()->foto);

        Menu::where('id', $request->id)->delete();
        
        Alert::info('Dihapus', 'produk berhasil di hapus');
        return redirect()->back();
    }
}
