@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Item</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Item Create</li>
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
                    <h3 class="card-title">Item</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('item.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                                    
        
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('ItemName') ? 'has-error' : '' }}">
                                    <label for="ItemName">ItemName</label>
                                    <input name="ItemName" type="text" id="ItemName" class="form-control"   value="{{ old('ItemName') }}"   required autofocus max="20"  placeholder="ItemName"     >
                                    @if ($errors->has('ItemName'))
                                        <span class="help-block"><strong>{{ $errors->first('ItemName') }}</strong></span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('ItemCode') ? 'has-error' : '' }}">
                                    <label for="ItemCode">ItemCode</label>
                                    <input name="ItemCode" type="text" id="ItemCode" class="form-control"   value="{{ old('ItemCode') }}"   required autofocus max="20"  placeholder="ItemCode"     >
                                    @if ($errors->has('ItemCode'))
                                        <span class="help-block"><strong>{{ $errors->first('ItemCode') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('Description') ? 'has-error' : '' }}">
                                    <label for="Description">Description</label>
                                    <input name="Description" type="text" id="Description" class="form-control"   value="{{ old('Description') }}"   required autofocus max="20"  placeholder="Code"     >
                                    @if ($errors->has('Description'))
                                        <span class="help-block"><strong>{{ $errors->first('Description') }}</strong></span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('UOM') ? 'has-error' : '' }}">
                                    <label for="UOM">UOM</label>
                                    <input name="UOM" type="text" id="UOM" class="form-control"   value="{{ old('UOM') }}"   required autofocus max="20"  placeholder="Code"     >
                                    @if ($errors->has('UOM'))
                                        <span class="help-block"><strong>{{ $errors->first('UOM') }}</strong></span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('Color') ? 'has-error' : '' }}">
                                    <label for="Color">Color</label>
                                    <input name="Color" type="text" id="Color" class="form-control"   value="{{ old('Color') }}"   required autofocus max="20"  placeholder="Code"     >
                                    @if ($errors->has('Color'))
                                        <span class="help-block"><strong>{{ $errors->first('Color') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('Origin') ? 'has-error' : '' }}">
                                    <label for="Origin">Origin</label>
                                    <input name="Origin" type="text" id="Origin" class="form-control"   value="{{ old('Origin') }}"   required autofocus max="20"  placeholder="Code"     >
                                    @if ($errors->has('Origin'))
                                        <span class="help-block"><strong>{{ $errors->first('Origin') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('Active') ? 'has-error' : '' }}">
                                    <label for="Active">Active</label>
                                    <input name="Active" type="text" id="Active" class="form-control"   value="{{ old('Active') }}"   required autofocus max="20"  placeholder="Code"     >
                                    @if ($errors->has('Active'))
                                        <span class="help-block"><strong>{{ $errors->first('Active') }}</strong></span>
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

<script>document.title = 'Item | Create';</script>
@endsection
