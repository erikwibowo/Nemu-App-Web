<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        //get data from table posts
        $posts = Post::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $posts
        ], 200);
    }

    public function show($id)
    {
        //find post by ID
        $posts = Post::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'user_id'   => 'required',
            'post'      => 'required',
            'type'      => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $posts = Post::create($request->all());

        //success save to database
        if ($posts) {

            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $posts
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);
    }

    public function update(Request $request, Post $posts)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'user_id'   => 'required',
            'post'      => 'required',
            'type'      => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $posts = Post::findOrFail($posts->id);

        if ($posts) {

            //update post
            $posts->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Post Updated',
                'data'    => $posts
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
        ], 404);
    }

    public function destroy($id)
    {
        //find post by ID
        $posts = Post::findOrfail($id);

        if ($posts) {

            //delete post
            $posts->delete();

            return response()->json([
                'success' => true,
                'message' => 'Post Deleted',
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
        ], 404);
    }
}
