@extends('backend.pages.auth.loginForm')
@section('loginbackend')

<form action="{{route('login.submit')}}" method="post" enctype="multipart/form-data">

    @csrf

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
   @endif
  <div class="input-group input-group-outline my-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="input-group input-group-outline mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control">
  </div>
  <div class="form-check form-switch d-flex align-items-center mb-3">
    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
  </div>
  <div class="text-center">
    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" style="color: black">Sign in</button>
  </div>
  
</form>

@endsection

