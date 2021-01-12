<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        //get data from table posts
        $users = User::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data User',
            'data'    => $users
        ], 200);
    }

    public function show($id)
    {
        //find post by ID
        $user = User::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data User',
            'data'    => $user
        ], 200);
    }

    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|unique:users|max:255',
            'password'  => 'required',
            'phone'     => 'required',
            'address'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'phone'     => $request->phone,
            'address'   => $request->address
        ]);

        //success save to database
        if ($user) {

            return response()->json([
                'success' => true,
                'message' => 'User Created',
                'data'    => $user
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'User Failed to Save',
        ], 409);
    }

    public function update(Request $request, User $user)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'phone'     => 'required',
            'address'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $user = User::findOrFail($user->id);

        if ($user) {

            //update post
            if (empty($request->password)) {
                $user->update([
                    'name'      => $request->name,
                    'phone'     => $request->phone,
                    'address'   => $request->address
                ]);
            } else {
                $user->update([
                    'name'      => $request->name,
                    'password'  => Hash::make($request->password),
                    'phone'     => $request->phone,
                    'address'   => $request->address
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'User Updated',
                'data'    => $user
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'User Not Found',
        ], 404);
    }

    public function destroy($id)
    {
        //find post by ID
        $user = User::findOrfail($id);

        if ($user) {

            //delete post
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User Deleted',
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
        ], 404);
    }
}
