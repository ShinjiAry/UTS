<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{

    public function __construct()
    {
        $this->storage = '/public/product/';
    }

    function rename($request, $requestTitle) {
        return time() . '.' . $request->$requestTitle->getClientOriginalExtension();;
    }

    public function index(Request $request,$id)
    {
        $data=[
            'item' => Menu::find($id),
        ];
        return view('admin.product.update', $data);
    }    

    public function save(Request $request)
    {

        $validator = Validator::make(
            // input
            $request->all(), 
            // rules
            [
                'nama'=> 'required',
                'harga'=> 'required',
                'telp'=> 'required',
                'foto'=> '',
                'deskripsi' => 'required',
            ],
            // message
            [
                'nama.required' => 'judul produk wajib diisi',
                'harga.required' => 'harga produk wajib diisi',
                'title.required' => 'title produk wajib diisi',
                'desckripsi.required' => 'deskripsi harus diisi',
            ]
        );

        // with errors
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }
        
        if($request->foto != null) {

            // image new name
            $new_name = $this->rename($request, 'foto');
            // 1. menghapus file yang lama

            Storage::delete($this->storage . Menu::where('id',$request->id)->first()->foto);
            
            $data_foto = $new_name;

            // 3. menambahkan file baru
            Storage::putFileAs(
                // lokasi storage
                $this->storage,
                // file
                $request->file('foto'),
                // name
                $new_name,
            );
            
        } else {
            $data_foto = Menu::where('id', $request->id)->first()->foto;
        }

        Menu::where('id',$request->id)->update([
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'telp'=>$request->telp,
            'foto' =>$data_foto,
            'deskripsi' => $request->deskripsi,
        ]);

        Alert::success('Diperbaharui', 'produk berhasil di perbaharui');
        return redirect()->back();
    }
}
