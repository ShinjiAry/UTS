@extends('admin.template')

@section('isi_konten')
<form action="{{route('admin.product.create.save')}}" method="post" enctype='multipart/form-data'>
  @csrf
  @include('components.input.input', [
    'name' => 'nama',
    'title' => 'Nama Produk', 
    'type' => 'text',
    'error_name' => 'nama',
    'another_old_input' => ''
  ])
  @include('components.input.input', [
    'name' => 'harga',
    'title' => 'Harga Produk', 
    'type' => 'number',
    'error_name' => 'harga',
    'another_old_input' => ''
  ])
  @include('components.input.input', [
    'name' => 'telp',
    'title' => 'Nomor Telepon (Whatsapp)', 
    'type' => 'text',
    'error_name' => 'telp',
    'another_old_input' => '62'
  ])
  <div class="mb-3 d-flex flex-column">
    <label for="input-file">Upload</label>
    <img src="{{url('/srcpublic/img/default.jpg')}}" alt="" class="img-input-file w-full my-2" style="max-width:300px">
    <input type="file" name='foto' class="form-control" id="input-file" onchange="previewImg(`{{'#input-file'}}`,`{{'.img-input-file'}}`);">
    @if($errors->get('foto'))
      <ul id="outlined_error_help" class="text-danger">
          @foreach($errors->get('foto') as $item)
              <li>{{$item}}</li>
          @endforeach
      </ul>
    @endif
  </div>
  <!-- description -->
  @include('components.input.textarea', [
    'name' => 'deskripsi',
    'title' => 'Deskripsi  Produk', 
    'error_name' => 'deskripsi',
    'another_old_input' => ''
  ])
  <button type="button.submit" class="btn btn-primary">Submit</button>
  <form>

@endsection

@section('js')
  <script src="{{url('/srcpublic/js/preview-img-input-form.js')}}"></script>
@endsection