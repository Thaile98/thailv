<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function getList()
    {
        return response()->json(Post::all());
    }

    public function findOne($id)
    {
        return response()->json(Post::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::create($request->all());

        return response()->json($post, 201);
    }

    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return response()->json($post, 200);
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
