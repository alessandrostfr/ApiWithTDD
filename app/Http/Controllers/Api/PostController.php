<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\Post as PostRequest;

class PostController extends Controller
{

    // protected $post;

    // public function construct__(Post $post)
    // {
    //     $this->post = $post;
    // }

    public function index()
    {
        //
    }


    public function store(PostRequest $request)
    {
        $post =  Post::create($request->all());

        return response()->json($post, 201);
    }


    public function show(Post $post)
    {
        return response()->json($post);
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }

}
