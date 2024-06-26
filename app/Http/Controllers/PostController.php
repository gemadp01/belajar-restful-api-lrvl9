<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth:api');
    // }

    public function index() {
        $data = Post::all();

        return response()->json($data, 200);
    }

    public function show($id) {
        $data = Post::find($id);

        if(is_null($data)) {
            return response()->json(
                [
                    'message' => 'Resource not found!'
                ],
                404);
        }

        return response()->json($data,200);
    }

    public function store(Request $request) {
        $data = $request->all();
        $response = Post::create($data);
        return response()->json($response,201);
    }

    public function update(Request $request, Post $post) {
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy(Post $post) {
        $post->delete();
        return response()->json(null, 200);
    }
}
