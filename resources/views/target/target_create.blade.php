@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Target</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Target Create</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form class="" role="form" method="POST" action="{{ route('target.store') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Target</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                        <label for="date">Date(First Day of Month)</label>
                                        <input name="date" type="text" id="date" class="form-control" value="{{ old('date') }}" autofocus required placeholder="YYYY-MM-DD" autocomplete="off">
                                        @if ($errors->has('date'))
                                        <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
                                        <label for="area_id">Area </label>
                                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                                            <option value="">Select Area</option>
                                            @foreach($areas as $area)
                                            <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('area_id'))
                                        <span class="help-block"><strong>{{ $errors->first('area_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group{{ $errors->has('engineer_id') ? 'has-error' : '' }}">
                                        <label for="engineer_id">Engineer </label>
                                        <select name="engineer_id" id="engineer_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                                            <option value="">Select Engineer</option>

                                        </select>
                                        @if ($errors->has('engineer_id'))
                                        <span class="help-block"><strong>{{ $errors->first('engineer_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <button type="button" id="sendParams" class="btn btn-warning" style="margin-top: 30px;">SEND</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped table-bordered table-sm text-nowrap">
                                        <thead class="bg-secondary">
                                            <th>Territory</th>
                                            <th>Technician</th>
                                            <th>Tractor Warranty</th>
                                            <th>Tractor Post Warranty</th>
                                            <th>NM/PTDE Warranty</th>
                                            <th>NM/PTDE Post Warranty</th>
                                            <th>Total Warranty</th>
                                            <th>Total Post Warranty</th>
                                            <th>Total Service Budget</th>
                                            <th>Service Income Budget</th>
                                        </thead>

                                        <tbody id="tab_body">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" text-center">
                <button id="submitBtn" class="btn btn-primary" style="display: none;" type="submit">Submit</button>
            </div>
        </form>
        {{-- <div class="row">
            <div class="col-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Target</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="" role="form" method="POST" action="{{ route('target.store') }}">
        {{ csrf_field() }}
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label for="date">Date(First Day of Month)</label>
                    <input name="date" type="text" id="date" class="form-control datepicker" value="{{ old('date') }}" autofocus required placeholder="Date" autocomplete="off">
                    @if ($errors->has('date'))
                    <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('territory_id') ? 'has-error' : '' }}">
                    <label for="territory_id">Territory </label>
                    <select name="territory_id" id="territory_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                        <option value="">Select Territory</option>
                        @foreach($territories as $territory)
                        <option value="{{$territory->id}}" @if($territory->id == old("territory_id")){{"selected"}} @endif">{{$territory->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('territory_id'))
                    <span class="help-block"><strong>{{ $errors->first('territory_id') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('technitian_id') ? 'has-error' : '' }}">
                    <label for="technitian_id">Technician </label>
                    <select name="technitian_id" id="technitian_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                        <option value="">Select Technician</option>
                    </select>
                    @if ($errors->has('technitian_id'))
                    <span class="help-block"><strong>{{ $errors->first('technitian_id') }}</strong></span>
                    @endif
                </div>
            </div>




            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('installation') ? 'has-error' : '' }}">
                    <label for="installation">Installation</label>
                    <input name="installation" type="number" id="installation" class="form-control" value="0" autofocus min="0" placeholder="Installation">
                    @if ($errors->has('installation'))
                    <span class="help-block"><strong>{{ $errors->first('installation') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('preodic_service') ? 'has-error' : '' }}">
                    <label for="preodic_service">Preodic service</label>
                    <input name="preodic_service" type="number" id="preodic_service" class="form-control" value="0" autofocus min="0" placeholder="Preodic service">
                    @if ($errors->has('preodic_service'))
                    <span class="help-block"><strong>{{ $errors->first('preodic_service') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('warranty_service') ? 'has-error' : '' }}">
                    <label for="warranty_service">Warranty service</label>
                    <input name="warranty_service" type="number" id="warranty_service" class="form-control" value="0" autofocus min="0" placeholder="Warranty service">
                    @if ($errors->has('warranty_service'))
                    <span class="help-block"><strong>{{ $errors->first('warranty_service') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('post_warranty_service') ? 'has-error' : '' }}">
                    <label for="post_warranty_service">Post warranty service</label>
                    <input name="post_warranty_service" type="number" id="post_warranty_service" class="form-control" value="0" autofocus min="0" placeholder="Post warranty service">
                    @if ($errors->has('post_warranty_service'))
                    <span class="help-block"><strong>{{ $errors->first('post_warranty_service') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('post_warranty_visit') ? 'has-error' : '' }}">
                    <label for="post_warranty_visit">Post warranty visit</label>
                    <input name="post_warranty_visit" type="number" id="post_warranty_visit" class="form-control" value="0" min="0" autofocus step="any" placeholder="Post warranty visit">
                    @if ($errors->has('post_warranty_visit'))
                    <span class="help-block"><strong>{{ $errors->first('post_warranty_visit') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
                    <label for="total">Total</label>
                    <input name="total" readonly type="number" id="total" class="form-control" value="{{ old('total') }}" min="1" autofocus step="any" placeholder="Total">
                    @if ($errors->has('total'))
                    <span class="help-block"><strong>{{ $errors->first('total') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('service_income') ? 'has-error' : '' }}">
                    <label for="service_income">Service Income</label>
                    <input name="service_income" type="number" id="service_income" class="form-control" value="{{ old('service_income') }}" min="0" autofocus step="any" placeholder="">
                    @if ($errors->has('service_income'))
                    <span class="help-block"><strong>{{ $errors->first('service_income') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('tractor_spare_parts_lubricants') ? 'has-error' : '' }}">
                    <label for="tractor_spare_parts_lubricants">Tractor Spare Parts and Lubricants</label>
                    <input name="tractor_spare_parts_lubricants" type="number" id="tractor_spare_parts_lubricants" class="form-control" value="{{ old('tractor_spare_parts_lubricants') }}" min="0" autofocus step="any" placeholder="">
                    @if ($errors->has('tractor_spare_parts_lubricants'))
                    <span class="help-block"><strong>{{ $errors->first('tractor_spare_parts_lubricants') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('nm_pt_spare_parts_lubricants') ? 'has-error' : '' }}">
                    <label for="nm_pt_spare_parts_lubricants">NM/PT Spare Parts and Lubricants</label>
                    <input name="nm_pt_spare_parts_lubricants" type="number" id="nm_pt_spare_parts_lubricants" class="form-control" value="{{ old('nm_pt_spare_parts_lubricants') }}" min="0" autofocus step="any" placeholder="">
                    @if ($errors->has('nm_pt_spare_parts_lubricants'))
                    <span class="help-block"><strong>{{ $errors->first('nm_pt_spare_parts_lubricants') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group {{$errors->has('note') ? 'has-error' : '' }}">
                    <label for="note" class="col-sm-3 control-label">Note</label>
                    <textarea name="note" id="note" type="text" class="form-control" autofocus value="1" max="200" placeholder="Note">{{ old('note') }}</textarea>
                    @if ($errors->has('note'))
                    <span class="help-block"><strong>{{ $errors->first('note') }}</strong></span>
                    @endif
                </div>
            </div>

            @if(Auth::user()->role_id == 1)
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('engineer_id') ? 'has-error' : '' }}">
                    <label for="engineer_id">Engineer </label>
                    <select name="engineer_id" id="engineer_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                        <option value="">Select Engineer</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}" @if($user->id == old("engineer_id")){{"selected"}} @endif">{{$user->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('engineer_id'))
                    <span class="help-block"><strong>{{ $errors->first('engineer_id') }}</strong></span>
                    @endif
                </div>
            </div>
            @endif

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
    </div> --}}
    <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->



<script>
    document.title = 'Target | Create';

    $('#area_id').change(function() {
        var url = '{{url("/json/user-of-area")}}/' + $(this).val();
        chainSelect(url, 'engineer_id', 'id', ['username', 'name'], first_option_txt = 'Select Engineer', first_option_value = "", spacer = " - ")
    });
    $(".select2").select2({
        containerCssClass: function(e) {
            return $(e).attr('required') ? 'required' : '';
        }
    });

    var d = new Date();
    var currMonth = d.getMonth();
    var currYear = d.getFullYear();
    var startDate = new Date(currYear, currMonth, 1);
    $("#date").datepicker({
        dateFormat: 'yy-mm-dd'
    }).datepicker("setDate", startDate);;

    $("#sendParams").click(function(e) {
        var date = $("#date").val()
        var area_id = $('#area_id :selected').val();
        var engineer_id = $('#engineer_id :selected').val();
        console.log(date + ",, " + area_id + ",, " + engineer_id);
        var url = "{{route('target.get.all.input.data')}}";
        var data = {
            "date": date,
            "area_id": area_id,
            "engineer_id": engineer_id,
            "_token": "{{ csrf_token() }}"
        };
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                // console.log(response);
                $("#tab_body").html(response);
                if (response.length > 0) {
                    $("#submitBtn").show();
                }
            }
        });
    });

    function totalWarranty(event, sl) {
        var tractor_warranty = parseInt($("#tractor_warranty" + sl).val());
        var nm_warranty = parseInt($("#nm_warranty" + sl).val());
        if (isNaN(nm_warranty)) {
            nm_warranty = 0;
        }
        if (isNaN(tractor_warranty)) {
            tractor_warranty = 0;
        }

        var total = tractor_warranty + nm_warranty;
        $("#total_warranty" + sl).val(total);

        var total_warranty = parseInt($("#total_warranty" + sl).val());
        var total_post_warranty = parseInt($("#total_post_warranty" + sl).val());
        if (isNaN(total_warranty)) {
            total_warranty = 0;
        }
        if (isNaN(total_post_warranty)) {
            total_post_warranty = 0;
        }
        var total_service_budget = total_warranty + total_post_warranty;
        $("#total_service_budget" + sl).val(total_service_budget);

        $("#sum_tractor_warranty").val(sumTotalTractorWarranty());
        $("#sum_total_warranty").val(sumTotalTotalTractorWarranty());

        $("#sum_nm_warranty").val(sumTotalNmWarranty());

        $("#sum_total_service_budget").val(sumTotalServiceBudget());
    }

    function sumTotalTractorWarranty(){
        var total = 0;
        $('.tractor_warranty').each(function (index, element) {
            if(isNaN(parseInt($(element).val()))){
                inputvalue = 0;
            }else{
                inputvalue = parseInt($(element).val());
            }
            total = total + inputvalue;
        });
        return total;
    }
    function sumTotalTotalTractorWarranty(){
        var total = 0;
        $('.total_warranty').each(function (index, element) {
            if(isNaN(parseInt($(element).val()))){
                inputvalue = 0;
            }else{
                inputvalue = parseInt($(element).val());
            }
            total = total + inputvalue;
        });
        return total;
    }
    function sumTotalNmWarranty(){
        var total = 0;
        $('.nm_warranty').each(function (index, element) {
            if(isNaN(parseInt($(element).val()))){
                inputvalue = 0;
            }else{
                inputvalue = parseInt($(element).val());
            }
            total = total + inputvalue;
        });
        return total;
    }


    function totalPostWarranty(event, sl) {
        var tractor_post_warranty = parseInt($("#tractor_post_warranty" + sl).val());
        var nm_post_warranty = parseInt($("#nm_post_warranty" + sl).val());
        if (isNaN(nm_post_warranty)) {
            nm_post_warranty = 0;
        }
        if (isNaN(tractor_post_warranty)) {
            tractor_post_warranty = 0;
        }

        var total = tractor_post_warranty + nm_post_warranty;
        $("#total_post_warranty" + sl).val(total);

        var total_warranty = parseInt($("#total_warranty" + sl).val());
        var total_post_warranty = parseInt($("#total_post_warranty" + sl).val());
        if (isNaN(total_warranty)) {
            total_warranty = 0;
        }
        if (isNaN(total_post_warranty)) {
            total_post_warranty = 0;
        }
        var total_service_budget = total_warranty + total_post_warranty;
        $("#total_service_budget" + sl).val(total_service_budget);

        //Column Sum total
        $("#sum_tractor_post_warranty").val(sumTotalPostWarranty());
        $("#sum_total_post_warranty").val(sumTotalTotalPostWarranty());

        $("#sum_nm_post_warranty").val(sumTotalNmPostWarranty());

        $("#sum_total_service_budget").val(sumTotalServiceBudget());
    }

    function sumTotalPostWarranty(){
        var total = 0;
        $('.tractor_post_warranty').each(function (index, element) {
            if(isNaN(parseInt($(element).val()))){
                inputvalue = 0;
            }else{
                inputvalue = parseInt($(element).val());
            }
            total = total + inputvalue;
        });
        return total;
    }
    function sumTotalTotalPostWarranty(){
        var total = 0;
        $('.total_post_warranty').each(function (index, element) {
            if(isNaN(parseInt($(element).val()))){
                inputvalue = 0;
            }else{
                inputvalue = parseInt($(element).val());
            }
            total = total + inputvalue;
        });
        return total;
    }
    function sumTotalNmPostWarranty(){
        var total = 0;
        $('.nm_post_warranty').each(function (index, element) {
            if(isNaN(parseInt($(element).val()))){
                inputvalue = 0;
            }else{
                inputvalue = parseInt($(element).val());
            }
            total = total + inputvalue;
        });
        return total;
    }

    function sumTotalServiceBudget(){
        var total = 0;
        $('.total_service_budget').each(function (index, element) {
            if(isNaN(parseInt($(element).val()))){
                inputvalue = 0;
            }else{
                inputvalue = parseInt($(element).val());
            }
            total = total + inputvalue;
        });
        return total;
    }

    function totalServiceIncomeBudget(event, sl){
        //Column Sum total
        $("#sum_service_income_budget").val(sumTotalServiceIncomeBudget());
    }
    function sumTotalServiceIncomeBudget(){
        var total = 0;
        $('.service_income_budget').each(function (index, element) {
            if(isNaN(parseInt($(element).val()))){
                inputvalue = 0;
            }else{
                inputvalue = parseInt($(element).val());
            }
            total = total + inputvalue;
        });
        return total;
    }






    // old code
    $('#territory_id').change(function() {
        var url = '{{url("/json/user-of-territory")}}/' + $(this).val();
        chainSelect(url, 'technitian_id', 'id', ['username', 'name'], first_option_txt = 'Select Technitian', first_option_value = "", spacer = " - ")
    });

    $('#installation, #warranty_service, #post_warranty_service,#preodic_service,#post_warranty_visit').change(function() {

        $('#total').val(
            parseInt($('#installation').val()) + parseInt($('#preodic_service').val()) + parseInt($('#warranty_service').val()) +
            parseInt($('#post_warranty_service').val()) + parseInt($('#post_warranty_visit').val())
        );
    });
</script>
@endsection