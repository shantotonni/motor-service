@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Topic</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Topic Create</li>
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
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Topic</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('topics.store') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" class="form-control" value="{{ old('name') }}" required autofocus placeholder="Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                        <label for="code">Code</label>
                                        <input name="code" type="text" id="code" class="form-control" value="{{ old('code') }}" required autofocus placeholder="Code">
                                        @if ($errors->has('code'))
                                            <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('section_id') ? 'has-error' : '' }}">
                                        <label for="section_id">Section </label>
                                        <select name="section_id" id="section_id" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select">
                                            <option value="">Select Section</option>
                                            @foreach($sections as $section)
                                             <option value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('section_id'))
                                            <span class="help-block"><strong>{{ $errors->first('section_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                         <div class="card-footer">
                           <button type="submit" class="btn btn-info float-right btn-flat">Create</button>
                         </div>
                       </form>
                    </div>
                </div>
            </div>
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<style>
    .help-block{
        color: red;
    }
</style>

<script>document.title = 'Topic | Create';</script>
@endsection
