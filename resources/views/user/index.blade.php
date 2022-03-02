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
<a href="{{route('user.register')}}">
    <button type="button" class="btn btn-primary mb-2">
        Add New User <i class="fa fa-plus"></i>
    </button>
</a>
<table id="userListTableID" class="table table-bordered table-striped table-hover">
    <thead class="bg-info">
        <tr>
            <th>#sl</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    @foreach ($users as $user)
    <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td class="text-center">
            @role('admin')
            <a href="{{route('user.accountStatus',$user->id)}}"
                class="{{ $user->account_status == 'active' ? 'badge badge-success' : 'badge badge-danger' }} btn">{{
                $user->account_status == 'active' ? 'Active' : 'Block' }}</a>
            @else
            <span class="{{ $user->account_status ? 'badge badge-success' : 'badge badge-danger' }}">{{
                $user->account_status ? 'Active' : 'Block' }}</span>
            @endrole
        </td>
        <td>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm" class="text-info">
                Edit <i class="fas fa-edit ml-1"></i>
            </a>
        </td>

        <td>
            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                    Delete <i class="fa fa-trash-alt ml-1"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>

</table>
@endsection


@push('js')
{{-- Start::For Jquery table --}}
<script>
    $(document).ready(function () {
    $("#userListTableID").DataTable();
    });
</script>
@endpush
