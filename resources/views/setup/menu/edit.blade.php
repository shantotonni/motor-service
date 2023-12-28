@extends('layouts.master')
@section('title','Menu Edit | Motors Service')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 page_title">
                    <h4>Menus</h4>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Menu</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-3">
                                <form method="POST" action="{{ route('menus.update',$menu->MenuID) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="exampleInputUserID">Nav Header</label>
                                                <input type="text" class="form-control" name="NavHeader" value="{{ $menu->NavHeader }}" placeholder="NavHeader">
                                                @if ($errors->has('NavHeader'))
                                                    <span class="help-block"><strong>{{ $errors->first('NavHeader') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="exampleInputUserID">Nav Item</label>
                                                <input type="text" class="form-control" name="NavItem" value="{{ $menu->NavItem }}" placeholder="NavItem">
                                                @if ($errors->has('NavItem'))
                                                    <span class="help-block"><strong>{{ $errors->first('NavItem') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="NavItemIcon">Nav Item Icon</label>
                                                <input type="text" class="form-control" name="NavItemIcon" value="{{ $menu->NavItemIcon }}" placeholder="NavItemIcon">
                                                @if ($errors->has('NavItemIcon'))
                                                    <span class="help-block"><strong>{{ $errors->first('NavItemIcon') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="NavItemIcon">Nav Item Details</label>
                                                <input type="text" class="form-control" name="NavItemDetails" value="{{ $menu->NavItemDetails }}" placeholder="NavItemDetails">
                                                @if ($errors->has('NavItemDetails'))
                                                    <span class="help-block"><strong>{{ $errors->first('NavItemDetails') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="NavItemIcon">Nav Item Details Icon</label>
                                                <input type="text" class="form-control" name="NavItemDetailsIcon" value="{{ $menu->NavItemDetailsIcon }}" placeholder="NavItemDetailsIcon">
                                                @if ($errors->has('NavItemDetailsIcon'))
                                                    <span class="help-block"><strong>{{ $errors->first('NavItemDetailsIcon') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="NavItemIcon">Link</label>
                                                <input type="text" class="form-control" value="{{ $menu->Link }}" name="Link" placeholder="Link">
                                                @if ($errors->has('Link'))
                                                    <span class="help-block"><strong>{{ $errors->first('Link') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="NavItemIcon">Report Order</label>
                                                <input type="text" class="form-control" value="{{ $menu->ReportOrder }}" name="ReportOrder" placeholder="ReportOrder">
                                                @if ($errors->has('ReportOrder'))
                                                    <span class="help-block"><strong>{{ $errors->first('ReportOrder') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" name="submit" id="submit" value="Update" class="btn btn-info">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>

@endsection

@push('js')

@endpush
