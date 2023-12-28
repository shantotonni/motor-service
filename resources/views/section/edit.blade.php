@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Section</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Section Edit</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Section</h3>
                    </div>
                    <div class="card-body">
                        <form class="" role="form" method="POST" action="{{ route('sections.update',$section->id) }}">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" class="form-control" value="{{ $section->name }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                        <label for="code">Code</label>
                                        <input name="code" type="text" id="code" class="form-control" value="{{ $section->code }}" required autofocus>
                                        @if ($errors->has('code'))
                                            <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
                                        <label for="product_id">Product</label>
                                        <select name="product_id" id="product_id" class="form-control">
                                            <option value="">Select Product</option>
                                            @foreach($products as $product)
                                                @if ($section->product_id == $product->id)
                                                    <option value="{{ $product->id }}" selected>{{ $product->name }} - {{ $product->name_bn }}</option>
                                                @else
                                                    <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->name_bn }}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right btn-flat">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'Section | Edit';</script>
@endsection
