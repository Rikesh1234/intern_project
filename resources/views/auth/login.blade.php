@extends('layouts.app')

@section('content')

@if(session('error'))
    <div class="alert alert-danger" id="status-error">
        {{ session('error') }}
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('status-error').style.display = 'none';
        }, 5000);
    </script>
@endif

<div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="admin" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="POST">
            @csrf

          <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

        

        <div class="row">
          @if (Route::has('register'))
              <div class="col-12 mt-2">
                  <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
              </div>
          @endif
        </div>

      </div>
    </div>
  </div>

@endsection
