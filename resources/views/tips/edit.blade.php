@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tips</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Tips Edit</li>
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
                    <h3 class="card-title">Tips</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('tips.update',$tip->id ) }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="title">Title</label>
                                    <input name="title" type="text" id="title" class="form-control" value="{{$tip->title}}" autofocus max="191" required placeholder="title">
                                    @if ($errors->has('title'))
                                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                                    <label for="type">Type </label>
                                    <select name="type" id="type" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                                        <option value="">Select type</option>
                                        <option value="image" @if($tip->type=='image'){{'selected'}} @endif>Image</option>
                                        <option value="video" @if($tip->type == 'video'){{'selected'}} @endif>Video</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block"><strong>{{ $errors->first('type') }}</strong></span>
                                    @endif  
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                                    <label for="description" class="col-sm-3 control-label">Description</label>
                                    <textarea name="description" id="description" type="text" class="form-control" autofocus value="1" max="200"  placeholder="Description">{{ $tip->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group {{$errors->has('image') ? 'has-error' : '' }}">
                                    <label for="image" class="col-sm-3 control-label">Image(950X390)</label>
                                    <input name="image" id="image" type="file" autofocus placeholder="Image"     >
                                    @if ($errors->has('image'))
                                        <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group {{$errors->has('video_link') ? 'has-error' : '' }}">
                                    <label for="video_link" class="col-sm-3 control-label">Video link</label>
                                    <textarea name="video_link" id="video_link" type="text" class="form-control" placeholder="Video link">{{ $tip->video_link}}</textarea>
                                    @if ($errors->has('video_link'))
                                        <span class="help-block"><strong>{{ $errors->first('video_link') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                                    <label for="is_active" >Is active</label><br>
                                    <label class="radio-inline radio_container">
                                        <input type="radio" name="is_active" value="1" @if($tip->is_active==1){{"checked"}}@endif>Yes
                                        <span class="checkmark_radio"></span>
                                    </label>
                                    <label class="radio-inline radio_container">
                                        <input type="radio" name="is_active" value="0" @if($tip->is_active==0){{"checked"}}@endif>No
                                        <span class="checkmark_radio"></span>
                                    </label>
                                    @if ($errors->has('is_active'))
                                        <span class="help-block"><strong>{{ $errors->first('is_active') }}</strong></span>
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
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'Tips | Edit';</script>
@endsection
