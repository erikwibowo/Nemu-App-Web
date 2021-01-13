<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use DataTables;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Comment::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group"><button type="button" data-id="' . $row->id . '" class="btn btn-primary btn-xs btn-edit"><i class="fa fa-eye"></i></button><button type="button" data-id="' . $row->id . '" data-name="' . $row->comment . '" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></button></div>';
                    return $btn;
                })
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->rawColumns(['action', 'user'])
                ->make(true);
        }
        $x['title'] = "Data Komentar | " . config('web-config.webname');
        return view('admin/comment', $x);
    }
}
