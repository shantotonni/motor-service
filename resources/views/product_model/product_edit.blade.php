@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product Model</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product Model Edit</li>
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
                            <h3 class="card-title">Product Model</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="" role="form" method="POST" action="{{ route('product_model.update',$product_model->id ) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('model_name') ? 'has-error' : '' }}">
                                            <label for="model_name">Model Name</label>
                                            <input name="model_name" type="text" id="model_name" class="form-control" value="{{ $product_model->model_name }}" autofocus max="191" required placeholder="model name">
                                            @if ($errors->has('model_name'))
                                                <span class="help-block"><strong>{{ $errors->first('model_name') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('model_name_bn') ? 'has-error' : '' }}">
                                            <label for="model_name_bn">Model Name bn</label>
                                            <input name="model_name_bn" type="text" id="model_name_bn" class="form-control" value="{{ $product_model->model_name_bn }}" autofocus max="191" required placeholder="Model Name bn">
                                            @if ($errors->has('model_name_bn'))
                                                <span class="help-block"><strong>{{ $errors->first('model_name_bn') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
                                            <label for="type">Product</label>
                                            <select name="product_id" id="product_id" class="form-control">
                                                <option value="">Select Product</option>
                                                @foreach($products as $product)
                                                    @if ($product->id == $product_model->product_id)
                                                        <option selected value="{{ $product->id }}">{{ $product->name }} - {{ $product->name_bn }}</option>
                                                    @else
                                                        <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->name_bn }}</option>
                                                    @endif

                                                @endforeach
                                            </select>
                                            @if ($errors->has('product_id'))
                                                <span class="help-block"><strong>{{ $errors->first('product_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('model_code') ? 'has-error' : '' }}">
                                            <label for="model_code">Model Code</label>
                                            <input name="model_code" type="text" id="model_code" class="form-control" value="{{ $product_model->model_code }}" placeholder="Model Code" >
                                            @if ($errors->has('model_code'))
                                                <span class="help-block"><strong>{{ $errors->first('model_code') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('model_image') ? 'has-error' : '' }}">
                                            <label for="model_image">Model Image</label>
                                            <input name="model_image" type="file" id="model_image" class="form-control" autofocus max="191" placeholder="Model Image">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group {{ $errors->has('details') ? 'has-error' : '' }}">
                                            <label for="details">Details(optional)</label>
                                            <textarea name="details" class="form-control" id="" cols="30" rows="10">{{ $product_model->details }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right btn-flat">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- /.col-12 -->
            </div> <!--row end -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->

    <script>document.title = 'Product Model | Edit';</script>
@endsection
