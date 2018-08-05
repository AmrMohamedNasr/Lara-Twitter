<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	const SINGLE_FETCH_SIZE = 10;
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
    	$limit = $request->get('time_limit');
    	$temp_post = $post->whereIn('user_id', $request->user()->following()
	                        ->pluck('users.id')
	                        ->push($request->user()->id));
    	if ($limit != 0) {
	    	$temp_post = $temp_post->where('created_at', '<', $limit);
  		}
  		$posts = $temp_post->with('user')->orderBy('created_at', 'desc')
	    		->take($request->get('limit', self::SINGLE_FETCH_SIZE))
	    		->get();
        return response()->json($posts);
    }
}
