@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserTerritory</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserTerritory Edit</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">UserTerritory</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('user_territory.update',$user_territory->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                             
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('territory_id') ? 'has-error' : '' }}">
                        <label for="territory_id">Territory </label>
                        <select name="territory_id" id="territory_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select Territory</option>
                            @foreach($territories as $territory)
                             <option value="{{$territory->id}}"  @if($territory->id == $user_territory->territory_id){{"selected"}} @endif >{{$territory->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('territory_id'))
                            <span class="help-block"><strong>{{ $errors->first('territory_id') }}</strong></span>
                        @endif  
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('user_id') ? 'has-error' : '' }}">
                                    <label for="supervisor_id">Supervisor(TSO)</label>
                                    <select name="supervisor_id" id="supervisor_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"     >
                                        <option value="">Select supervisor</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" @if($user->id == (int)$user_territory->supervisor_id)) {{"selected"}} @endif">{{$user->username}} -{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('supervisor_id'))
                                        <span class="help-block"><strong>{{ $errors->first('supervisor_id') }}</strong></span>
                                    @endif  
                                </div>
                            </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('user_id') ? 'has-error' : '' }}">
                        <label for="user_id">Technician</label>
                        <select name="user_id" id="user_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select User</option>
                            @foreach($users as $user)
                             <option value="{{$user->id}}"  @if($user->id == $user_territory->user_id){{"selected"}} @endif >{{$user->username}} - {{$user->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('user_id'))
                            <span class="help-block"><strong>{{ $errors->first('user_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                            </div>

                     <div class="card-footer">
                       <button type="submit" class="btn btn-info float-right btn-flat">Edit</button>
                     </div>
                   </form>
                  </div>
                 <!-- /.card-body -->
                 </div>
                 <!-- /.card -->

            </div> <!-- /.col-12 -->
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'UserTerritory | Edit';</script>
@endsection
