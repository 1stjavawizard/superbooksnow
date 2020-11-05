@extends('layouts.app')

@section('content')
    <div class="card card-default">
	                   <div class="card-header">
					      Book Details
					   </div>
					  <div class="card card-body">
					      
					  <table class="table">
			      <thead>
				     <tr>
					  <th></th>
					 </tr>
				  </thead>
				  
				  <tbody>
				   <tr>
					  <td>
					  <div class="card card-default">
	                   <div class="card-header  text-info bg-gray">
					      Title
					   </div>
					    <div class="card card-body">
						   {{$postone->title}}
						</div>
					   </div>
					   
					   
					    <div class="card card-default">
	                   <div class="card-header text-info  bg-gray">
					       Author
					   </div>
					   <div class="card card-body">
					      {{$postone->description}}
						</div>
					   </div>
					   
					   
					   <div class="card card-default">
	                   <div class="card-header text-info bg-gray">
					       Brief Decription
					   </div>
					   <div class="card card-body">
					      {{$postone->content}}
						</div>
					   </div>
					   
					   <div class="card card-default">
	                   <div class="card-header text-info bg-gray">
					       Date Published
					   </div>
					   <div class="card card-body">
					      {{$postone->published_at}}
						</div>
					   </div>
					     
					  </td>
					 </tr>
				       
				  </tbody>
				  
				  </table>
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					      
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
@endsection

