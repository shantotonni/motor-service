@extends('layouts.master')
@section('content')
<style>
     .background {
        background-image: url("{{asset('/img/background.png')}}"); 
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Team</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Home</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="row">
          
    <div class="col-sm-6">
        <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
            <label for="area_id">&nbsp;&nbsp;Area </label>
            <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                <option value="">Select Area</option>
                @foreach($areas as $area)
                <option value="{{$area->id}}" @if($area->id == request()->get("area_id")){{"selected"}} @endif">{{$area->name}}</option>
            @endforeach
            </select>
            @if ($errors->has('area_id'))
                <span class="help-block"><strong>{{ $errors->first('area_id') }}</strong></span>
            @endif  
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
        <label for="area_id">Engineer </label><br>
        @if($engineer)Engineer: {{$engineer->username}} - {{$engineer->name}} @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
         <table class="table bordered">
         <thead>
             <th>Territory Name</th>
         </thead>
         <tbody>
             @foreach($territories as $territory)
             <tr>
             <td>{{$territory->name}}</td>
             </tr>
             @endforeach
         </tbody>

         </table>
    </div>
    <div class="col-sm-8">
         <table class="table bordered table-condensed">
         <thead>
             <th>Territory</th>
             <th>Staff Id</th>
             <th>Supervisor</th>
         </thead>
         
         <tbody>
             @foreach($technicians as $technician)
             <tr>
             <td>{{$technician->territory_name}}</td>
             <td>{{$technician->username}} - {{$technician->name}}</td>
             <td>{{$technician->supervisor_staffid}} - {{$technician->supervisor_name}}</td>
             
             </tr>
             @endforeach
         </tbody>
         
         </table>
    </div>
</div>


<script>
$('#area_id').change(function(){
  window.location.href = "{{url('/engineer_team')}}?area_id="+$(this).val();
});

</script>

@endsection




