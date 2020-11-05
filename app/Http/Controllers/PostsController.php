<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;

use App\Category;

use App\Post;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function __construct(){
		$this->middleware('verifycategoriescount')->only(['create','store']);
	}
    public function index()
    {
		return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        //
		$image = $request->image->store('posts');
		Post::create([
		    'title'=>$request->title,
			'description'=>$request->description,
			'content'=>$request->content,
			'image'=>$image,
			'published_at'=>$request->published_at,
			'category_id'=>$request->category
		]);
		session()->flash('success','A book is created successfully');
		return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 function show($id){
		$single = Post::find($id);
		return view('posts.single')->with('postone',$single);
	}
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, Post $post)
    {
		$data = $request->only(['title','description','content','published_at']);
		if($request->hasFile('image')){
			$image = $request->image->store('posts');
			//Storage::delete($post->image);
			$post->deleteImage();
			$data['image'] = $image;
		}
      $post->update($data);
		session()->flash('success','A book is updated successfully');
		return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
       $trashed = Post::onlyTrashed()->get();
	   return view('posts.index')->withPosts($trashed);
	   // same as return view('posts.index')->with('posts',$trashed);
	  
    }
	
	
	public function restore($id)
    {
		 $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
      
	    session()->flash('success','A book is restored successfully');
	   return redirect(route('posts.index'));
    }
	
	
	public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
      if($post->trashed()){
		      //Storage::delete($post->image);
			  $post->deleteImage();
			 $post->forceDelete();
		}
		else{
			 $post->delete();
		}
      
	    session()->flash('success','A book is trashed successfully');
	   return redirect()->back();
    }
	
	 function profile(User $user){
		$profiled = Todo::find($user);
		return view('posts.profile')->with('profile',$profiled);
	}
	
	
   
}
