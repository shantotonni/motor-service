@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">SSR Expense</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">SSR Expense Edit</li>
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
                        <h3 class="card-title">SSR Expense</h3>
                        <a href="{{route('ssr.expense')}}" class="btn btn-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="" role="form" method="POST" action="{{ route('update.ssr.expense') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <input type="hidden" name="id" value="{{$expense->id}}">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('user_id') ? 'has-error' : '' }}">
                                        <label for="user_id">SSR Name </label>
                                        <select name="user_id" id="user_id" data-live-search="true" class="form-control select2 ssrName" autofocus type="select" required>
                                            <option value="">Select SSR Name</option>
                                            @foreach($ssrNames as $ssr)
                                            <option value="{{$ssr->id}}" @if($expense->user_id==$ssr->id) selected @endif >{{$ssr->name}} ( {{$ssr->username}} )</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('user_id'))
                                        <span class="help-block"><strong>{{ $errors->first('user_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('opening_km') ? 'has-error' : '' }}">
                                        <label for="opening_km">Opening KM</label>
                                        <input name="opening_km" type="number" id="opening_km" class="form-control" value="{{ $expense->opening_km }}" autofocus  required placeholder="Opening km">
                                        @if ($errors->has('opening_km'))
                                        <span class="help-block"><strong>{{ $errors->first('opening_km') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('closing_km') ? 'has-error' : '' }}">
                                        <label for="closing_km">Closing KM</label>
                                        <input name="closing_km" type="number" id="closing_km" class="form-control" value="{{ $expense->closing_km }}" autofocus  placeholder="Closing km">
                                        @if ($errors->has('closing_km'))
                                        <span class="help-block"><strong>{{ $errors->first('closing_km') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('bike_no') ? 'has-error' : '' }}">
                                        <label for="bike_no">Bike no</label>
                                        <input name="bike_no" type="text" id="bike_no" class="form-control" value="{{ $expense->bike_no }}" autofocus  required placeholder="Bike No">
                                        @if ($errors->has('bike_no'))
                                        <span class="help-block"><strong>{{ $errors->first('bike_no') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('period') ? 'has-error' : '' }}">
                                        <label for="period">Period</label>
                                        <input name="period" type="text" id="period" class="form-control" value="{{ $expense->period }}" autofocus autocomplete="off"  required placeholder="Period">
                                        @if ($errors->has('period'))
                                        <span class="help-block"><strong>{{ $errors->first('period') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('opening_image') ? 'has-error' : '' }}">
                                        <label for="opening_image">Image</label>
                                        <input name="opening_image" type="file" id="opening_image" class="form-control-file" value="{{ $expense->opening_image }}" autofocus>
                                        @if ($errors->has('opening_image'))
                                        <span class="help-block"><strong>{{ $errors->first('opening_image') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right btn-flat">Update</button>
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
    document.title = 'SSR Expense | Edit';
</script>

@endsection

@section('script')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
   $( "#period" ).datepicker({
       dateFormat : "yymm"
   });

</script>
<script>
    $(document).ready(function() {
        $('.ssrName').select2();
    });
</script>
@endsection