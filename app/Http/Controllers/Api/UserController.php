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
        $userss = User::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data User',
            'data'    => $userss
        ], 200);
    }

    public function show($id)
    {
        //find post by ID
        $users = User::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data User',
            'data'    => $users
        ], 200);
    }

    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|unique:userss|max:255',
            'password'  => 'required',
            'phone'     => 'required',
            'address'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $users = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'phone'     => $request->phone,
            'address'   => $request->address
        ]);

        //success save to database
        if ($users) {

            return response()->json([
                'success' => true,
                'message' => 'User Created',
                'data'    => $users
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'User Failed to Save',
        ], 409);
    }

    public function update(Request $request, User $users)
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
        $users = User::findOrFail($users->id);

        if ($users) {

            //update post
            if (empty($request->password)) {
                $users->update([
                    'name'      => $request->name,
                    'phone'     => $request->phone,
                    'address'   => $request->address
                ]);
            } else {
                $users->update([
                    'name'      => $request->name,
                    'password'  => Hash::make($request->password),
                    'phone'     => $request->phone,
                    'address'   => $request->address
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'User Updated',
                'data'    => $users
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
        $users = User::findOrfail($id);

        if ($users) {

            //delete post
            $users->delete();

            return response()->json([
                'success' => true,
                'message' => 'User Deleted',
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'User Not Found',
        ], 404);
    }

    public function auth(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email'      => 'required',
            'password'     => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $users = User::where(['email' => $request->email]);
        if ($users->count() == 0) {
            return response()->json([
                'success'   => true,
                'code'      => 0,
                'message'   => 'Email or password not match',
            ], 200);
        } else {
            $data = $users->first();
            if ($data->status == 0) {
                return response()->json([
                    'success'   => true,
                    'code'      => 2,
                    'message'   => 'Your account has been blocked'
                ], 200);
            } else {
                if (Hash::check($request->password, $data->password)) {
                    return response()->json([
                        'success'   => true,
                        'code'      => 1,
                        'message'   => 'Success',
                        'data'      => $data
                    ], 200);
                } else {
                    return response()->json([
                        'success'   => true,
                        'code'      => 0,
                        'message'   => 'Email or password not match',
                    ], 200);
                }
            }
        }
    }
}
