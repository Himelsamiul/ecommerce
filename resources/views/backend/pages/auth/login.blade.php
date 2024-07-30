@extends('frontend.master')

  @section('content')

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="{{ route('home') }}">
            <img src="frontend/images/logo.png" alt="">
          </a>
          <h2 class="text-center">Welcome Back</h2>
          <form action="{{route('login.submit')}}" method="post">
            @csrf
            <div class="form-group">
              <input type="email" name="email" class="form-control"  placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center" >Login</button>
            </div>
          </form>
          <p class="mt-20">New in this site ?<a href="{{ route('registration') }}"> Create New Account</a></p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection