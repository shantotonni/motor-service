@extends('layouts.master')
@section('title','User List | ACI Motors')
@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.create')}}"><button class="btn btn-sm btn-success pull-right">Create User</button></a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table  table-hover text-nowrap table-bordered table-sm small" id="userList">

                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<script type="text/javascript">
    $(document).ready(function (){
        $('#userList').DataTable({
            processing: true,
            serverSide: true,
            "pageLength": 10,
            ajax: '{!! route('get.all.user') !!}',
            columns: [
                { data: 'name',    title: "Name",},
                { data: 'username',    title: "Username"},
                { data: 'email',    title: "Email"},
                { data: 'mobile',    title: "Mobile"},
                { data: 'designation',    title: "Designation"},
                { data: 'role',    title: "Role"},
                { data: 'action',   title:"Action", searchable: false},
            ]
        });
    })

    function destroy(Id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Cart Item will be trashed",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, trash it!'
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    url: "{{ route('admin.destroy', '__id__') }}".replace('__id__', Id),
                    method: 'GET'
                }).done(function(data) {
                    console.log(data);
                    toastr.success(data.success);
                    Swal.fire({
                        title: 'Success',
                        text: "Cart Item trashed",
                        type: 'success',
                    }).then(function(res){
                        window.location = '{{ route('admin.index') }}';
                    });
                });
            }
        })
    }
  </script>
@endsection
