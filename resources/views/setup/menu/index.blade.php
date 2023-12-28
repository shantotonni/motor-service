@extends('layouts.master')
@section('title','Menu List | Motors Service')
@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-1">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-10 col-12">
                                    <h3>Menus</h3>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <a href="{{ route('menus.create') }}" class="btn btn-dark float-right">Add Menu</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small" id="Menus">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

        $(document).ready(function (){

            let table = $('#Menus').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get.menus') }}",
                columns: [
                    { data: 'NavItem',  title: "Nav Item"},
                    { data: 'NavItemIcon',  title: "Nav Item Icon"},
                    { data: 'NavItemDetails',  title: "Nav Item Details"},
                    { data: 'NavItemDetailsIcon',  title: "Nav Item Details Icon"},
                    { data: 'Link',  title: "Link"},
                    { data: 'ReportOrder',  title: "Report Order"},
                    {data: 'status', title: "Status",searchable: false},
                    {data: 'action', title: "Action",searchable: false}
                ]
            })
        })

    </script>

@endsection

