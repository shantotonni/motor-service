@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Create Push Notification') }}</div>
     
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
    
                    <form action="{{ route('send.notification') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                            @if($errors->has('title'))
                                <div class="error text-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Body <span style="color: red;">*</span></label>
                            <textarea class="form-control" name="message"> {{old('message')}}</textarea>
                            @if($errors->has('message'))
                                <div class="error text-danger">{{ $errors->first('message') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Image <span style="color: red;">*</span></label>
                            <input type="file" class="form-control-file" id="image" name="image" value="{{old('image')}}">
                            @if($errors->has('image'))
                                <div class="error text-danger">{{ $errors->first('image') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Send Notification</button>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection