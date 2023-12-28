@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sales Product Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Sales Product Category Create</li>
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
                        <h3 class="card-title">Sales Product Category</h3>
                        <a href="{{route('sales-product-category.index')}}" class="btn btn-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="" role="form" method="POST" action="{{ route('sales-product-category.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" class="form-control" value="{{ old('name') }}" autofocus max="191" required placeholder="Name">
                                        @if ($errors->has('name'))
                                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control-file" id="image" name="image" value="{{old('image')}}">
                                    @if($errors->has('image'))
                                    <div class="error text-danger">{{ $errors->first('image') }}</div>
                                    @endif
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
        </div>
        <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>
    document.title = 'Sales Product Category | Create';
</script>
@endsection
