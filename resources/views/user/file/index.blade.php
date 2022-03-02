@extends('layouts.theme')

@section('page_title')
User File Upload
@endsection

@section('page_index')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><span>User File Upload</span></li>
    </ol>
</nav>
@endsection


@section('main_content')
<div class="container">
    <div class="card w-50 m-auto">
        <div class="card-header">
            <h3 class="card-title">User File Upload</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('user.file.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Enter a name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="file">Select a File</label>
                    <input type="file" class="form-control" id="user_file" name="user_file">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
