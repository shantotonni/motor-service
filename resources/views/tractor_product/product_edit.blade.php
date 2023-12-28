@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product Edit</li>
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
                            <h3 class="card-title">Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="" role="form" method="POST" action="{{ route('tractor-product.update',$product->id ) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label for="name">Name</label>
                                            <input name="name" type="text" id="name" class="form-control"
                                                   value="{{$product->name}}" autofocus max="191" required
                                                   placeholder="Name">
                                            @if ($errors->has('name'))
                                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('name_bn') ? 'has-error' : '' }}">
                                            <label for="name_bn">Name bn</label>
                                            <input name="name_bn" type="text" id="name_bn" class="form-control"
                                                   value="{{$product->name_bn}}" autofocus max="191" required
                                                   placeholder="Name bn">
                                            @if ($errors->has('name_bn'))
                                                <span class="help-block"><strong>{{ $errors->first('name_bn') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                            <label for="code">Code</label>
                                            <input name="code" type="text" id="code" class="form-control"
                                                   value="{{$product->code}}" autofocus max="191" required
                                                   placeholder="Code">
                                            @if ($errors->has('code'))
                                                <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('product_image') ? 'has-error' : '' }}">
                                            <label for="product_image">Product Image</label>
                                            <input name="product_image" type="file" id="product_image" class="form-control" value="{{ old('product_image') }}" placeholder="Product Image">
                                            @if ($errors->has('product_image'))
                                                <span class="help-block"><strong>{{ $errors->first('product_image') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group {{ $errors->has('details') ? 'has-error' : '' }}">
                                            <label for="product_image">Details(optional)</label>
                                            <textarea name="details" class="form-control" id="" cols="30" rows="10">{{ $product->details }}</textarea>
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

    <script>document.title = 'Product | Edit';</script>
@endsection
