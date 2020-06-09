@extends('layouts.auth')

@section('content')

<div class="row justify-content-center">
  
  <div class="col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Admin Panel</h1>
              </div>
              <form class="user" action="{{ route('login.auth') }}" method="POST">
                @csrf

                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                  @error('email') <small class="text-danger">{{ $errors->first('email') }}</small> @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                  @error('password') <small class="text-danger">{{ $errors->first('password') }}</small> @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="register.html">Create an Account!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

@endsection