@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sales Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Sales Product Create</li>
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
                        <h3 class="card-title">Sales Product</h3>
                        <a href="{{route('sales-products.index')}}" class="btn btn-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="" role="form" method="POST" action="{{ route('sales-products.store') }}" enctype="multipart/form-data">
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
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('sales_product_category_id') ? 'has-error' : '' }}">
                                        <label for="sales_product_category_id">Category </label>
                                        <select name="sales_product_category_id" id="sales_product_category_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                            <option value="">Select Category</option>
                                            @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('sales_product_category_id'))
                                            <span class="help-block"><strong>{{ $errors->first('sales_product_category_id') }}</strong></span>
                                        @endif  
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="image">Image <span style="color: red;">*</span></label>
                                        <input type="file" class="form-control-file" id="image" name="image" value="{{old('image')}}">
                                        @if($errors->has('image'))
                                        <div class="error text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group {{ $errors->has('detail') ? 'has-error' : '' }}">
                                        <label for="detail">Detail</label>
                                        <textarea id="summernote" name="detail"></textarea>
                                        @if ($errors->has('detail'))
                                        <span class="help-block"><strong>{{ $errors->first('detail') }}</strong></span>
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
        </div>
        <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>
    document.title = 'Sales Product Category | Create';
</script>

@endsection

@section('script')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
     $(document).ready(function() {
      $('#summernote').summernote({
        placeholder: 'Enter Product Details',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['style', ['bold', 'italic', 'underline',]],
        //   ['font', ['strikethrough',]],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['undo', ['undo',]],
          ['redo', ['redo',]],
        ]
      });
    });

    
</script>
@endsection