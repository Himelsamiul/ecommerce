
@extends('frontend.master')

  @section('content')
 
  <section class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <a class="logo" href="index.html">
              <img src="images/logo.png" alt="">
            </a>
            <h2 class="text-center">Create Your Account</h2>
            <form action="{{route('registration.submit')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="name"  placeholder="Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address"  placeholder="Address">
              </div>
              <div class="form-group">
                <input type="tell" class="form-control" name="phone"  placeholder="Phone Number">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email"  placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password"  placeholder="Password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-main text-center">Sign In</button>
              </div>
            </form>
            <p class="mt-20">Already hava an account ?<a href="{{ url('login-frontend') }}"> Login</a></p>
        
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection