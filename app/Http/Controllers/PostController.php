<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;

class PostController extends Controller
{
    public function penemuan(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::latest()->where(['type' => 'PENEMUAN', 'deleted' => 0]);
            return DataTables::of($data)
                ->addColumn('post_word', function ($row) {
                    return Str::words($row->post, 10, '...');
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group"><button type="button" data-id="' . $row->id . '" class="btn btn-primary btn-xs btn-edit"><i class="fa fa-eye"></i></button><button type="button" data-id="' . $row->id . '" data-name="' . $row->name . '" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></button></div>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        $status = '<span class="badge badge-danger">Unreviwewd</span>';
                    } else {
                        $status = '<span class="badge badge-success">Reviwed</span>';
                    }
                    return $status;
                })
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-y');
                })
                ->rawColumns(['post_word', 'action', 'status', 'user'])
                ->make(true);
        }
        $x['title'] = "Data Penemuan | " . config('web-config.webname');
        $x['subtitle'] = "Data Penemuan";
        $x['url']       = route('post.penemuan');
        return view('admin/post', $x);
    }

    public function kehilangan(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::latest()->where(['type' => 'KEHILANGAN', 'deleted' => 0]);
            return DataTables::of($data)
                ->addColumn('post_word', function ($row) {
                    return Str::words($row->post, 10, '...');
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group"><button type="button" data-id="' . $row->id . '" class="btn btn-primary btn-xs btn-edit"><i class="fa fa-eye"></i></button><button type="button" data-id="' . $row->id . '" data-name="' . $row->name . '" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></button></div>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        $status = '<span class="badge badge-danger">Unreviwewd</span>';
                    } else {
                        $status = '<span class="badge badge-success">Reviwed</span>';
                    }
                    return $status;
                })
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-y');
                })
                ->rawColumns(['post_word', 'action', 'status', 'user'])
                ->make(true);
        }
        $x['title'] = "Data Kehilangan | " . config('web-config.webname');
        $x['subtitle'] = "Data Kehilangan";
        $x['url']       = route('post.kehilangan');
        return view('admin/post', $x);
    }

    public function dihapus(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::latest()->where(['deleted' => 1]);
            return DataTables::of($data)
                ->addColumn('post_word', function ($row) {
                    return Str::words($row->post, 10, '...');
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group"><button type="button" data-id="' . $row->id . '" class="btn btn-primary btn-xs btn-edit"><i class="fa fa-eye"></i></button><button type="button" data-id="' . $row->id . '" data-name="' . $row->name . '" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></button></div>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        $status = '<span class="badge badge-danger">Unreviwewd</span>';
                    } else {
                        $status = '<span class="badge badge-success">Reviwed</span>';
                    }
                    return $status;
                })
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-y');
                })
                ->rawColumns(['post_word', 'action', 'status', 'user'])
                ->make(true);
        }
        $x['title'] = "Data Dihapus | " . config('web-config.webname');
        $x['subtitle'] = "Data Dihapus";
        $x['url']       = route('post.dihapus');
        return view('admin/post', $x);
    }
}
