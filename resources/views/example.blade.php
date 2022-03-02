@extends('layouts.theme')

@section('page_title')
User Dashboard
@endsection

@section('page_index')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
    </ol>
</nav>
@endsection


@section('main_content')
Hello
@endsection
