@extends('layouts.theme')

@section('page_title')
Users List
@endsection

@section('page_index')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><span>User List</span></li>
    </ol>
</nav>
@endsection


@section('main_content')
<table id="userHasGroupInfoID" class="table table-bordered table-striped table-hover">
    <thead class="bg-info">
        <tr>
            <th>#sl</th>
            <th>Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>State</th>
            <th>Zip</th>
        </tr>
    </thead>
    @foreach ($fileGroupInfos as $info)
    <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>{{ $info->number }}</td>
        <td>{{ $info->first_name }}</td>
        <td>{{ $info->last_name }}</td>
        <td>{{ $info->email }}</td>
        <td>{{ $info->state }}</td>
        <td>{{ $info->zip }}</td>
    </tr>
    @endforeach
    </tbody>

</table>
@endsection


@push('js')
{{-- Start::For Jquery table --}}
<script>
    $(document).ready(function () {
    $("#userHasGroupInfoID").DataTable();
    });
</script>
@endpush
