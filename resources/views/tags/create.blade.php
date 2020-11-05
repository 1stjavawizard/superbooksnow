@extends('layouts.app')

@section('content')
   
			
			
                  	<div class="card card-default">
			   <div class="card-header">
			  <h1 class="text-center"> {{(isset($category))? 'Edit category':'Create categories'}}</h1>
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
			  <form action="{{(isset($category))? route('categories.update',$category->id):route('categories.store')}}" method="POST">
				  @csrf
				  @if(isset($category))
					  @method('PUT')
				  @endif
				  <div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" value="{{(isset($category))? $category->name:''}}" placeholder="Name" name="name">
					</div>
				  <div class="form-group">
					<button type="submit" class="btn btn-success">{{(isset($category))? 'Edit':'Add category'}}</button>
				   </div>
				  
 
				</form>
					
				
			</div>
			</div>
          
          
	    
@endsection
