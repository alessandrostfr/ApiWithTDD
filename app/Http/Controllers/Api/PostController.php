<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json($post, 201);
    }


    public function show(Post $post)
    {
        //
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
