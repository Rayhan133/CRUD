@extends('layouts.theme')

@section('page_title')
Users List
@endsection

@section('page_index')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user.listView') }}">User List</a></li>
        <li class="breadcrumb-item"><span>{{$user->name}}</span></li>
    </ol>
</nav>
@endsection


@section('main_content')
{{-- edit user form --}}
<div class="card">
    {{-- <form method="put" action="{{ route('user.update')}}">

    </form> --}}
    <div class="w-100 mx-auto">
        <div class="card card-primary">
            <!-- form start -->
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name')
                                                                is-invalid
                        @enderror" name="name" id="name" placeholder="Name" required value="{{ $user->name }}">
                            @error('name')
                            <div class="text-danger font-italic">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email')
                                                                is-invalid
                        @enderror" name="email" id="email" placeholder="Enter email" required
                                value="{{ $user->email }}">
                            @error('email')
                            <div class="text-danger font-italic">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password">New Password <small>(Optional)</small></label>
                            <input type="text" class="form-control @error('password') is-invalid
                        @enderror" name="password" id="password" placeholder="New Password">
                            @error('password')
                            <div class="text-danger font-italic">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="password_confirmation">Confirm Password <small>(Optional)</small></label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid
                        @enderror" name="password_confirmation" id="password_confirmation"
                                placeholder="Confirm New Password">
                            @error('password_confirmation')
                            <div class="text-danger font-italic">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer d-flex row">
                        <div class="d-flex justify-content-start col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <div class="d-flex justify-content-end col-md-6">
                            <a href="{{ route('admin.user.listView') }}">
                                <button type="button" class="btn btn-primary">Cancel</button>
                            </a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection
