@extends('admin.template')

@section('isi_konten')
<form action="{{route('admin.product.update.save')}}" method="post" enctype='multipart/form-data'>
  @csrf
  <input type="hidden" value="<?= $item->id ?>" name="id">
  @include('components.input.input', [
    'name' => 'nama',
    'title' => 'Nama Produk', 
    'type' => 'text',
    'error_name' => 'nama',
    'another_old_input' => $item->nama
  ])
  @include('components.input.input', [
    'name' => 'harga',
    'title' => 'Harga Produk', 
    'type' => 'number',
    'error_name' => 'harga',
    'another_old_input' => $item->harga
  ])
  @include('components.input.input', [
    'name' => 'telp',
    'title' => 'Nomor Telepon (Whatsapp)', 
    'type' => 'text',
    'error_name' => 'telp',
    'another_old_input' => $item->telp
  ])
  <div class="mb-3 d-flex flex-column">
    <label for="input-file">Upload</label>
    <img src="{{url('storage/product/' . $item->foto)}}" alt="" class="img-input-file w-full my-2" style="max-width:300px">
    <input type="file" name='foto' class="form-control" id="input-file" onchange="previewImg(`{{'#input-file'}}`,`{{'.img-input-file'}}`);">
  </div>
  <!-- description -->
  @include('components.input.textarea', [
    'name' => 'deskripsi',
    'title' => 'Deskripsi  Produk', 
    'error_name' => 'deskripsi',
    'another_old_input' => $item->deskripsi
  ])
  <button type="submit" class="btn btn-primary">Submit</button>
  <form>

@endsection

@section('js')
  <script src="{{url('/srcpublic/js/preview-img-input-form.js')}}"></script>
  <!-- ck editor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
  <script>
  ClassicEditor
      .create( document.querySelector( '#editorCkeditor' ) )
      .catch( error => {
          console.error( error );
      } );
  </script>
@endsection