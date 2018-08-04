<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
	* Handler of post requests for sharing posts.
    **/
    public function store(Request $request, Post $post)
    {

        $newPost = $request->user()->posts()->create([
            'body' => $request->get('body')
        ]);
   
        return response()->json($post->with('user')->find($newPost->id));
    }
    /**
    * Handler of get requests to see posts by friends.
    **/
    public function fetch(Request $request, Post $post) {
    	$posts = $post->with('user')->orderBy('created_at', 'desc')->take($request->get('limit', 10))->get();
  
        return response()->json($posts);
    }
}
