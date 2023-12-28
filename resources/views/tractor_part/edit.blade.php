@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tractor Part</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Tractor Part Edit</li>
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
                    <h3 class="card-title">Tractor Part</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('tractor_part.update',$tractor_part->id ) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                             
                        <div class="col-sm-6">
                             <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                <label for="code">Code</label>
                                <select name="code" id="code" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                    <option value="">Select Parts</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->ProductCode}}" @if($product->ProductCode == $tractor_part->code){{"selected"}} @endif">{{$product->ProductCode}} - {{$product->ProductName}} = {{$product->UnitPrice}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('custom_name') ? 'has-error' : '' }}">
                                <label for="custom_name">Custom Name</label>
                                <input name="custom_name" type="text" id="custom_name" class="form-control"   value="{{ $tractor_part->custom_name }}" autofocus max="191" required placeholder="Custom Name">
                                @if ($errors->has('custom_name'))
                                    <span class="help-block"><strong>{{ $errors->first('custom_name') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('section_id') ? 'has-error' : '' }}">
                                <label for="section_id">Section </label>
                                <select name="section_id" id="section_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select">
                                    <option value="">Select Section</option>
                                    @foreach($sections as $section)
                                    <option value="{{$section->id}}" @if($section->id == $tractor_part->section_id){{"selected"}} @endif >{{$section->name}}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('section_id'))
                                    <span class="help-block"><strong>{{ $errors->first('section_id') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('product_model_id') ? 'has-error' : '' }}">
                                <label for="product_model_id">Product Model </label>
                                <select name="product_model_id" id="product_model_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                                    <option value="">Select Product Model</option>
                                    @foreach($productModels as $model)
                                    <option value="{{$model->id}}" @if($model->id == $tractor_part->product_model_id){{"selected"}} @endif >{{$model->model_name_bn}}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('product_model_id'))
                                    <span class="help-block"><strong>{{ $errors->first('product_model_id') }}</strong></span>
                                @endif
                            </div>
                        </div>

{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">--}}
{{--                                <label for="price">Price</label>--}}
{{--                                <input name="price" type="text" id="price" class="form-control" value="{{ $tractor_part->price }}" autofocus placeholder="Price">--}}
{{--                                @if ($errors->has('price'))--}}
{{--                                    <span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label for="image">Image</label>
                                <input name="image" type="file" id="image" class="form-control" value="{{$tractor_part->image }}" autofocus placeholder="Custom Name">
                                @if ($errors->has('image'))
                                    <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
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

<script>document.title = 'Tractor Part | Edit';</script>
@endsection
