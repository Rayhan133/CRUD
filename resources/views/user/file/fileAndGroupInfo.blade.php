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
<table id="groupInfoTableID" class="table table-bordered table-striped table-hover">
    <thead class="bg-info">
        <tr>
            <th>#sl</th>
            <th>File Name</th>
            <th>Total Uploaded</th>
            <th>Total Process</th>
            <th>Group</th>
        </tr>
    </thead>
    @foreach ($fileInfos as $fileInfo)
    <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>{{ $fileInfo->file_name }}</td>
        <td>{{ $fileInfo->total_upload }}</td>
        <td>{{ $fileInfo->total_process }}</td>
        <td>
            <span class="btn btn-info btn-sm showModalBtn" id="{{$fileInfo->id}}" data-toggle="modal"
                data-target="#groupInfo">
                View
            </span>
        </td>
    </tr>
    @endforeach
    </tbody>

</table>
<div class="modal fade" id="groupInfo" tabindex="-1" role="dialog" aria-labelledby="groupInfoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="groupInfoLabel">Group Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <th>Group Name</th>
                        <th>Total</th>
                        <th>Show</th>
                    </thead>
                    <tbody id="groupInfoTbody">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
{{-- Start::For Jquery table --}}
<script>
    $(document).ready(function () {
        $("#groupInfoTableID").DataTable();
        groupInfoModal();
    });

    function groupInfoModal(){

        $('.showModalBtn').on('click', function() {
            var id = $(this).attr('id');
            axios.get(`/user/api/fileHasGroupInfo/${id}`).then(function(response){
                var data = response.data.data;
                var html = '';
                for(var i=0; i<data.length; i++){
                    html += '<tr>'+
                        '<td>'+data[i].group_name+'</td>'+
                        '<td>'+data[i].total+'</td>'+
                        '<td><a href="/user/fileGroupInfo/'+data[i].id+'">Show</a></td>'+
                        '</tr>';
                    }
                $('#groupInfoTbody').html(html);
            });
        })



    }

</script>
@endpush
