@extends('layouts.app')
@section('links')
    <link rel="stylesheet" href="css/login.css">
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form method="POST" action="{{ route('login') }}">
                            {{csrf_field()}}
                            <div class="form-label-group">
                                <input id="inputEmail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input id="inputPassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                            @if (Route::has('password.request'))
                                <p class="text-center">
                                <a class="btn btn-link"  href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                </p>
                            @endif
                            <hr class="my-4">

                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="button"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="button"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
