<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group"><button type="button" data-id="' . $row->id . '" class="btn btn-primary btn-xs btn-edit"><i class="fa fa-eye"></i></button><button type="button" data-id="' . $row->id . '" data-name="' . $row->name . '" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></button></div>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        $status = '<span class="badge badge-danger">Nonaktif</span>';
                    } else {
                        $status = '<span class="badge badge-success">Aktif</span>';
                    }
                    return $status;
                })
                ->addColumn('verified', function ($row) {
                    if ($row->verified == 0) {
                        $verified = '<i class="fas fa-times"></i>';
                    } else {
                        $verified = '<i class="fas fa-check-circle"></i>';
                    }
                    return $verified;
                })
                ->rawColumns(['action', 'status', 'verified'])
                ->make(true);
        }
        $x['title'] = "Data User | " . config('web-config.webname');
        return view('admin/user', $x);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:admins',
            'nik' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/user')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'nik' => $request->input('nik'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
            'created_at' => now()
        ];
        User::insert($data);
        session()->flash('notif', 'Data berhasil ditambah');
        session()->flash('type', 'success');
        return redirect('admin/user');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:admins',
            'nik' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/user')
                ->withErrors($validator)
                ->withInput();
        }

        if (empty($request->input('password'))) {
            $data = [
                'nik' => $request->input('nik'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'status' => $request->input('status'),
                'verified' => $request->input('verified')
            ];
        } else {
            $data = [
                'nik' => $request->input('nik'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'password' => Hash::make($request->input('password')),
                'status' => $request->input('status'),
                'verified' => $request->input('verified')
            ];
        }
        User::where('id', $request->input('id'))->update($data);
        session()->flash('notif', 'Data berhasil disimpan');
        session()->flash('type', 'success');
        return redirect('admin/user');
    }

    public function data(Request $request)
    {
        echo json_encode(User::where(['id' => $request->input('id')])->first());
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        User::where(['id' => $id])->delete();
        session()->flash('notif', 'Data berhasil dihapus');
        session()->flash('type', 'success');
        return redirect('admin/user');
    }
}
