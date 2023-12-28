@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Service Income Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Service Income Category Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Service Income Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('service-income-category.update',$category->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('model_name') ? 'has-error' : '' }}">
                                            <label for="name">Name</label>
                                            <input name="name" type="text" id="name" class="form-control" value="{{ $category->name }}" required placeholder="Enter name">
                                            @if ($errors->has('name'))
                                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('name_bn') ? 'has-error' : '' }}">
                                            <label for="name_bn">Name bn</label>
                                            <input name="name_bn" type="text" id="name_bn" class="form-control" value="{{ $category->name_bn }}" required placeholder="Enter Name bn">
                                            @if ($errors->has('name_bn'))
                                                <span class="help-block"><strong>{{ $errors->first('name_bn') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
                                            <label for="type">Product</label>
                                            <select name="product_id" id="product_id" class="form-control">
                                                <option value="">Select Product</option>
                                                @foreach($products as $product)
                                                    @if($category->product_id == $product->id)
                                                    <option value="{{ $product->id }}" selected>{{ $product->name }} - {{ $product->name_bn }}</option>
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
                                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                                            <label for="amount">Amount</label>
                                            <input name="amount" type="text" id="amount" class="form-control" value="{{ $category->amount }}" placeholder="Enter Amount">
                                            @if ($errors->has('amount'))
                                                <span class="help-block"><strong>{{ $errors->first('amount') }}</strong></span>
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

    <script>document.title = 'Service Income Category | Edit';</script>
@endsection
