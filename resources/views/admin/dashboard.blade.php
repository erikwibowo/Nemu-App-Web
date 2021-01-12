@extends('admin.layout.master')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="page-category">Inner page content goes here</div>
</div>
@endsection