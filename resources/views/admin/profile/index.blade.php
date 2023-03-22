@extends('admin.template')

@section('isi_konten')
<form action="{{url('/admin/profile/save')}}" method="post" enctype='multipart/form-data'>
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @csrf
  <input type="hidden" name='id' value="{{$user->id}}">
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email (readonly)</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" readonly value="{{$user->email}}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">nama </label>
    <input type="text" id='name' name='name' class="form-control" id="exampleFormControlInput1" placeholder="nama produk" value="{{$user->name}}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Password</label>
    <input type="password" id='password' name='password' class="form-control" id="exampleFormControlInput1" placeholder="New Password">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Konfirmasi Password</label>
    <input type="password" id='password_confirmation' name='password_confirmation' class="form-control" id="exampleFormControlInput1" placeholder="Password Confirmation">
  </div>
  <button type="button.submit" class="btn btn-primary">Submit</button>
  <form>

@endsection