@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2"> 
       <a href="{{route('posts.create')}}" class="btn btn-primary"> Add Books</a>
     </div>     
			
			
                  	<div class="card card-default">
			   <div class="card-header">
			  <h1 class="text-center"> Books</h1>
			</div>
			
			<div id="app" class="card-body">
			 @if($posts->count() > 0)
			
			    <table class="table mytable">
			      <thead>
				     <tr>
					  <th></th>
					 </tr>
				  </thead>
				  
				  <tbody>
				   @foreach($posts as $post)
				      <tr>
					  <td> 
					  <div class="card card-default">
					  <div class="card card-body">
					      <div class="container row">
					       <div class="col-md-6">
						      <div class="meta-image">			
						<a href="{{route('single-post',$post->id)}}" title=" {{$post->title}}" data-category="post_list" data-action="image">
							
					
						<img src="{{asset('/storage/'.$post->image)}}" alt="image not found" width="100%" height="200"/>
						
												</a>
					</div>
						   </div>
						   &nbsp;&nbsp;
						   <div class="col-md-6">
						    <header class="entry-header">
							<h2 class="entry-title"><a href="{{route('myfile', Auth::user()->id)}}" title="For the Slow Work of Critique in Critical Times" data-category="post_list" data-action="title"> {{$post->title}}</a></h2>
					
									<div class="meta-author-wrapped">By <span class="vcard author"><span class="fn"><a href="{{route('myfile', Auth::user()->email)}}" itemprop="name" data-category="author-name" data-action="click">{{$post->description}}</a></span></span>
									</div>
									</header>
									{{$post->content}}
						   </div>
						    <p>
					  <span> Category: <a href="{{route('categories.edit',$post->category->id)}}">{{$post->category->name}}</a></span> 
					  
					    @if($post->trashed())
				         <form method="post" action="{{route('restore-posts',$post->id)}}">
						  @csrf
						  @method('PUT')
					      <button type="submit" class="btn btn-info btn-sm">  Restore</button>
						  </form>
					 
					   
					  @else

					      <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit  </a>
						  
					  
					  @endif
					  &nbsp;
					  
					  
						<form method="post" action="{{route('posts.destroy',$post->id)}}">
								@csrf
								@method('DELETE')
						   <button type="submit" class="btn btn-danger btn-sm"> {{$post->trashed()? 'Delete':'Trashed'}}</button>
						   </form>
					  
					  </p>
						   </div>
						   </div>
					  </div>
					    	
					  </td>
					  
					  
					 </tr>
					 @endforeach
					
				  </tbody>
				  
			   </table>
			</div>
			@else
			   <h3 class="text-center text-bold"> {{'No records found'}} </h3>
           @endif

<!-- Modal -->


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

