@extends('layouts.app')

@section('content')
   
			
			
                  	<div class="card card-default">
			   <div class="card-header">
			  <h1 class="text-center"> Create categories</h1>
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
			  <form action="{{route('categories.update',$category->id)}}" method="POST">
				  @csrf
				  <div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" value="{{$category->name}}" name="name">
					</div>
				  <div class="form-group">
					<button type="submit" class="btn btn-success">Update</button>
				   </div>
				  
 
				</form>
					
				
			</div>
			</div>
          
          
	    
@endsection
