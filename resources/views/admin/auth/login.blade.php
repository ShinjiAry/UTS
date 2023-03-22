@extends('admin.auth.template')

@section('isi_konten')
<div class="row justify-content-center container">
  <div class="col-lg-8">
    <div class="card-group d-block d-md-flex row">
      <div class="card col-md-7 p-4 mb-md-0 mb-2">
        <form class="card-body" method="post" action="{{route('auth.login.save')}}">
          @csrf
          <h1>Login</h1>
          <p class="text-medium-emphasis">Sign In to your account</p>
          <div class="input-group mb-3"><span class="input-group-text">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
              </svg></span>
            <input class="form-control" type="email" placeholder="Email" name="email">
          </div>
          <div class="input-group mb-4"><span class="input-group-text">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
              </svg></span>
            <input class="form-control" type="password" placeholder="Password" name="password">
          </div>
          <div class="row">
            <div class="col-6">
              <button class="btn btn-primary px-4" type="submit">Login</button>
            </div>
          </div>
        </form>
      </div>
      <div class="card col-md-5 text-white bg-primary py-5 d-md-block d-none ">
        <div class="card-body text-center">
          <div>
            <h2>Our Website</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection