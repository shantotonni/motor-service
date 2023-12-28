@extends('layouts.master')
@section('title','Menu Create | Motors Service')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 page_title">
                    <h4>Menus</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Menu</h3>
                        </div>
                        <div class="card-body p-3">
                            <form method="POST" action="{{ route('menus.store') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="exampleInputUserID">Nav Header</label>
                                            <input type="text" class="form-control" name="NavHeader" placeholder="NavHeader">
                                            @if ($errors->has('NavHeader'))
                                                <span class="help-block"><strong>{{ $errors->first('NavHeader') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="exampleInputUserID">Nav Item</label>
                                            <input type="text" class="form-control" name="NavItem" placeholder="NavItem">
                                            @if ($errors->has('NavItem'))
                                                <span class="help-block"><strong>{{ $errors->first('NavItem') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="NavItemIcon">Nav Item Icon</label>
                                            <input type="text" class="form-control" name="NavItemIcon" placeholder="NavItemIcon">
                                            @if ($errors->has('NavItemIcon'))
                                                <span class="help-block"><strong>{{ $errors->first('NavItemIcon') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="NavItemIcon">Nav Item Details</label>
                                            <input type="text" class="form-control" name="NavItemDetails" placeholder="NavItemDetails">
                                            @if ($errors->has('NavItemDetails'))
                                                <span class="help-block"><strong>{{ $errors->first('NavItemDetails') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="NavItemIcon">Nav Item Details Icon</label>
                                            <input type="text" class="form-control" name="NavItemDetailsIcon" placeholder="NavItemDetailsIcon">
                                            @if ($errors->has('NavItemDetailsIcon'))
                                                <span class="help-block"><strong>{{ $errors->first('NavItemDetailsIcon') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="NavItemIcon">Link</label>
                                            <input type="text" class="form-control" name="Link" placeholder="Link">
                                            @if ($errors->has('Link'))
                                                <span class="help-block"><strong>{{ $errors->first('Link') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="NavItemIcon">Report Order</label>
                                            <input type="text" class="form-control" name="ReportOrder" placeholder="ReportOrder">
                                            @if ($errors->has('ReportOrder'))
                                                <span class="help-block"><strong>{{ $errors->first('ReportOrder') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')

@endpush
