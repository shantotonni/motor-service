@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Supplier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Supplier Create</li>
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
                    <h3 class="card-title">Supplier</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('supplier.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                                    
        
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('SupplierName') ? 'has-error' : '' }}">
                                    <label for="SupplierName">SupplierName</label>
                                    <input name="SupplierName" type="text" id="SupplierName" class="form-control"   value="{{ old('SupplierName') }}"   required autofocus max="20"  placeholder="SupplierName"     >
                                    @if ($errors->has('SupplierName'))
                                        <span class="help-block"><strong>{{ $errors->first('SupplierName') }}</strong></span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('SupplierAddress') ? 'has-error' : '' }}">
                                    <label for="SupplierAddress">SupplierAddress</label>
                                    <input name="SupplierAddress" type="text" id="SupplierAddress" class="form-control"   value="{{ old('SupplierAddress') }}"   required autofocus max="20"  placeholder="SupplierAddress"     >
                                    @if ($errors->has('SupplierAddress'))
                                        <span class="help-block"><strong>{{ $errors->first('SupplierAddress') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('MobileNo') ? 'has-error' : '' }}">
                                    <label for="MobileNo">MobileNo</label>
                                    <input name="MobileNo" type="text" id="MobileNo" class="form-control"   value="{{ old('MobileNo') }}"   required autofocus max="20"  placeholder="Mobile"     >
                                    @if ($errors->has('MobileNo'))
                                        <span class="help-block"><strong>{{ $errors->first('MobileNo') }}</strong></span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('Email') ? 'has-error' : '' }}">
                                    <label for="Email">Email</label>
                                    <input name="Email" type="email" id="Email" class="form-control"   value="{{ old('Email') }}"   required autofocus max="20"  placeholder="email"     >
                                    @if ($errors->has('Email'))
                                        <span class="help-block"><strong>{{ $errors->first('Email') }}</strong></span>
                                    @endif
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('user_id') ? 'has-error' : '' }}">
                                    <label for="user_id">User</label>
                                    <select name="user_id" id="user_id" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                        <option value="">Select User</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}} - {{$user->name}}</option>
                                    @endforeach
                                    </select>
                                    @if ($errors->has('user_id'))
                                        <span class="help-block"><strong>{{ $errors->first('user_id') }}</strong></span>
                                    @endif  
                                </div>
                            </div>

                          

                        </div>
                     <div class="card-footer">
                       <button type="submit" class="btn btn-info float-right btn-flat">Create</button>
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

<script>document.title = 'Supplier | Create';</script>
@endsection
