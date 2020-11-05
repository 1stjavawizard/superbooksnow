@extends('layouts.app')

@section('content')


 <video autoplay loop muted poster="" id="video-bg">

<source src="{{asset('/assets/bgvideo/segunvidbg.mp4')}}" type="video/webm">
<source src="{{asset('/assets/bgvideo/segunvidbg.mp4')}}" type="video/mp4">

</video>
<div class="container mt-5 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-5 text-center">
              sign up
            </div>
            <div class="card-body px-lg-5 py-lg-5">
             
              <form role="form" method="POST" action="{{ route('register') }}">
			   @csrf
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input placeholder="Your Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                     <input placeholder="email@eample.com" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                     <input placeholder="Your Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>
				
				 <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                     <input placeholder="Repeat password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                  </div>
                </div>
				
                              
                <div class="row my-4">
                  
                </div>
                <div class=" form-group text-center">
				  <button type="submit" class="btn btn-primary">
                                   {{ __('Register') }}
                                </button>
					 <a  class="btn btn-info" href="{{url('/home')}}">
						   login
					</a>
                  
                </div>
              </form>
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