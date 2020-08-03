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
        $posts = Post::paginate();
        return response()->json($posts, 200);
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


    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        return response()->json($post);
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }

}
