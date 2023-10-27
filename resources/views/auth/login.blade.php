@extends('layouts.Myapp')

@section('content')

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>   
    <form method="POST" action="{{ route('login') }}">
        @csrf
      <h3>Gestion de PFE</h3>

       <label for="email">{{ __('E-mail') }}</label>
       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

      <label for="password">{{ __('Password') }}</label> 
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror

     <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
      <div class="social">
        <div class="go"><i class="fab fa-google"></i> 
        <a href="{{ url('/redirect') }}"> Google</a>
        </div>
        
      </div>
  </form>

  @endsection