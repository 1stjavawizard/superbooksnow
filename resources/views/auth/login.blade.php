@extends('layouts.app')

@section('content')

 <video autoplay loop muted poster="" id="video-bg">

<source src="{{asset('/assets/bgvideo/segunvidbg.mp4')}}" type="video/webm">
<source src="{{asset('/assets/bgvideo/segunvidbg.mp4')}}" type="video/mp4">

</video>

    <div class="container mt-5 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3">{{ __('Login') }}</div>
             
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              @if($errors->any())
				
			<div class="alert alert-danger">
			   <ul class="list-group">
				@foreach($errors->all() as $error)
			      <li class="list-group-item text-danger"> {{$error}} </li>
			    @endforeach
				</ul>
			</div>
		    @endif
              <form role="form" method="POST" action="{{ route('login') }}">
			   @csrf
			  
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input  placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  </div>
				  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  </div>
				   @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">
				      {{ __('Login') }}

				  </button>
                </div>
              </form>
			   <div class="row mt-3">
            <div class="col-6">
              <a href="{{ route('register') }}"><small>Register</small></a>
            </div>
            <div class="col-6 text-right">
			   @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                       <small> {{ __('Forgot Your Password?') }} </small>
                                    </a>
                                @endif
             
            </div>
          </div>
            </div>
          </div>
		  
         
        </div>
      </div>
    </div>
	


@endsection


@section('scripts')
 
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
 @endsection
 
@section('css')
    
	<link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
  <style>
  	#video-bg {
position: fixed;
right: 0;
bottom: 0;
width: auto;
min-width: 100%;
height: auto;
min-height: 100%;
z-index: -100;
background: transparent url('') no-repeat;
background-size: cover;
}
	</style>
@endsection