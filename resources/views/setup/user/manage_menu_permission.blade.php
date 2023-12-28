@extends('layouts.master')
@section('title','User Menu Permission | Motors Service')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Manage Menu Permission</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h4 class="card-title">Menu Permission</h4>
                </div>
                <?php
              //  dd($all_menu);
                ?>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal form-validation" method="post" action="{{ route('user.permission.store') }}">
                    @csrf
                    <div class="card card-success">
                        <div class="card-body">
                            <!-- Minimal style -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="select2-purple">
                                                <select id="MenuID" name="MenuID[]" class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                    @foreach($all_menu as $key => $menu)
                                                        <?php
                                                        //dd($menu);
                                                        ?>
                                                        @if(in_array($menu->MenuID,$user_menu))
                                                            <option value="{{ $menu->MenuID }}" selected>{{ $menu->NavItemDetails }}</option>
                                                        @else
                                                            <option value="{{ $menu->MenuID }}">{{ $menu->NavItemDetails }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="UserId" value="{{ $id }}">
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('script')

@endpush
