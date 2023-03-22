<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller
{

    public function __construct()
    {
        $this->storage = '/public/product/';
    }

    function rename($request, $requestTitle) {
        return time() . '.' . $request->$requestTitle->getClientOriginalExtension();;
    }

    // formulir tambah data
    public function index (){
        $Menu=Menu::get();
        $data=[
            'Menu'=>$Menu,
        ];
        // dd($Menu);
        return view("admin.product.create", $data);
    }

    // untuk menyimpan data
    public function save (Request $request){

        $validator = Validator::make(
            // input
            $request->all(), 
            // rules
            [
                'nama'=> 'required',
                'harga'=> 'required',
                'telp'=> 'required',
                'foto'=> 'required',
                'deskripsi' => 'required',
            ],
            // message
            [
                'nama.required' => 'judul produk wajib diisi',
                'harga.required' => 'harga produk wajib diisi',
                'title.required' => 'title produk wajib diisi',
                'foto.required' => 'gambar wajib diisi',
                'desckripsi.required' => 'deskripsi harus diisi',
            ]
        );

        // with errors
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

        // image new name
        $new_name = $this->rename($request, 'foto');

        Storage::putFileAs(
            // lokasi storage
            $this->storage,
            // file
            $request->file('foto'),
            // name
            $new_name,
        );

        Menu::create([
            'nama'=> $request->nama,
            'harga'=> $request->harga,
            'telp'=> $request->telp,
            'foto'=> $new_name,
            'deskripsi' => $request->deskripsi,
        ])->save();
        Alert::success('Berhasil','produk berhasil di buat');
        return redirect()->back();
    }

}
