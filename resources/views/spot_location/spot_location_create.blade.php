@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">SpotLocation</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">SpotLocation Create</li>
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
                    <h3 class="card-title">SpotLocation</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('spot-location.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                                    
        
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('SpotLocationName') ? 'has-error' : '' }}">
                                    <label for="SpotLocationName">SpotLocationName</label>
                                    <input name="SpotLocationName" type="text" id="SpotLocationName" class="form-control"   value="{{ old('SpotLocationName') }}"   required autofocus max="20"  placeholder="SpotLocationName"     >
                                    @if ($errors->has('SpotLocationName'))
                                        <span class="help-block"><strong>{{ $errors->first('SpotLocationName') }}</strong></span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('SpotLocationCode') ? 'has-error' : '' }}">
                                    <label for="SpotLocationCode">SpotLocationCode</label>
                                    <input name="SpotLocationCode" type="text" id="SpotLocationCode" class="form-control"   value="{{ old('SpotLocationCode') }}"   required autofocus max="20"  placeholder="SpotLocationCode"     >
                                    @if ($errors->has('SpotLocationCode'))
                                        <span class="help-block"><strong>{{ $errors->first('SpotLocationCode') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('DistrictCode') ? 'has-error' : '' }}">
                                    <label for="DistrictCode"> DistrictCode</label>
                                    <select name="DistrictCode" id="DistrictCode" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                        <option value="">Select DistrictCode</option>
                                        @foreach($districts as $district)
                                        <option value="{{$district->DistrictCode}}">{{$district->DistrictName}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('DistrictCode'))
                                        <span class="help-block"><strong>{{ $errors->first('DistrictCode') }}</strong></span>
                                    @endif  
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('UpazillaCode') ? 'has-error' : '' }}">
                                    <label for="UpazillaCode">UpazillaCode </label>
                                    <select name="UpazillaCode" id="UpazillaCode" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                        <option value="">Select UpazillaCode</option>
                                   
                                    </select>
                                    @if ($errors->has('UpazillaCode'))
                                        <span class="help-block"><strong>{{ $errors->first('UpazillaCode') }}</strong></span>
                                    @endif  
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('UnionCode') ? 'has-error' : '' }}">
                                    <label for="UnionCode">UnionCode </label>
                                    <select name="UnionCode" id="UnionCode" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                        <option value="">Select UnionCode</option>
                                        
                                    </select>
                                    @if ($errors->has('UnionCode'))
                                        <span class="help-block"><strong>{{ $errors->first('UnionCode') }}</strong></span>
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

<script>document.title = 'SpotLocation | Create';

$('#DistrictCode').change(function(){
        var url = "{{url('/json/get-upazilla-of-district')}}?DistrictCode="+$(this).val();
        chainSelect(url,'UpazillaCode','UpazillaCode',['UpazillaCode','UpazillaName'],first_option_txt='Select UpazillaCode',first_option_value="",spacer = " - ")
})

$('#UpazillaCode').change(function(){
        var url = "{{url('/json/get-union-of-upazilla')}}?UpazillaCode="+$(this).val();
        chainSelect(url,'UnionCode','UnionCode',['UnionCode','UnionName'],first_option_txt='Select UnionCode',first_option_value="",spacer = " - ")
})
</script>
@endsection
