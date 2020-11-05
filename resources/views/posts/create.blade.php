@extends('layouts.app')

@section('content')
   
			
			
                  	<div class="card card-default">
			   <div class="card-header">
			  <h1 class="text-center"> {{(isset($post))? 'Edit post':'Create posts'}}</h1>
			</div>
			
			<div class="card-body">
			@if($errors->any())
				
			<div class="alert alert-danger">
			   <ul class="list-group">
				@foreach($errors->all() as $error)
			      <li class="list-group-item"> {{$error}} </li>
			    @endforeach
				</ul>
			</div>
		    @endif
			  <form action="{{(isset($post))? route('posts.update',$post->id):route('posts.store')}}" method="POST" enctype="multipart/form-data">
				  @csrf
				  @if(isset($post))
					  @method('PUT')
				  @endif
				  <div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" value="{{isset($post)? $post->title:''}}" placeholder="Title" name="title">
					</div>
					
					
					
					 <div class="form-group">
					<label for="description">Author Name</label>
					<textarea cols="3" rows="3" class="form-control" id="description" value="{{(isset($post))? $post->description:''}}" placeholder="Author Name" name="description">{{(isset($post))? $post->description:''}}</textarea>
					</div>
					
					
					<div class="form-group">
					<label for="content">Brief Details</label>
					<textarea cols="5" rows="5" class="form-control" id="content" value="{{(isset($post))? $post->content:''}}" placeholder="Book Brief Details" name="description">{{(isset($post))? $post->content:''}}</textarea>
					</div>
					
					 <div class="form-group">
					<label for="published_at">Published At</label>
					<input type="{{(isset($post))? 'text':'date'}}" class="form-control" id="published_at" value="{{(isset($post))? $post->published_at:''}}" placeholder="Date" name="published_at">
					</div>
					
					@if(isset($post))
					 <div class="form-group">
					
					<img src="{{asset('/storage/'.$post->image)}}" alt="image not found" width="100%"/>
					</div>
					@endif
					 <div class="form-group">
					<label for="image">Book Cover</label>
					<input type="file" class="form-control" id="image" value="{{(isset($post))? $post->name:''}}" placeholder="Posts Image" name="image">
					</div>
					
					<div class="form-group">
					<label for="category">Category</label>
					<select class="form-control" id="category" name="category">
					  @foreach($categories as $category)
					  <option value="{{$category->id}}" 
					  @if(isset($post))
					  @if($category->id === $post->category_id) selected
  
					  @endif @endif>{{$category->name}}</option>
					  
					  @endforeach
					</select>
					</div>
					
				  <div class="form-group">
					<button type="submit" class="btn btn-success">{{(isset($post))? 'Edit':'Add post'}}</button>
				   </div>
				  
 
				</form>
					
				
			</div>
			</div>
          
          
	    
@endsection








@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
flatpickr('#published_at',{
	enableTime:true
});
</script>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection