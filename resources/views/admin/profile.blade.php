@extends('layouts.master')

@section('content')
<div class="container">

            @if(Session::has('success'))
                  <div class="alert alert-success">
                      <strong>Success! </strong> {{ Session::get('success') }}
                   </div> 
              @endif
              @if(Session::has('danger'))
                  <div class="alert alert-danger">
                      <strong>Success! </strong> {{ Session::get('danger') }}
                   </div> 
              @endif
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Profile:</div>

           
                    <table class="table table-bordered table-responsive table-condenced ">
                   
                    <tbody>
                            <tr>
                                <td>NAME:</td>
                                <td>{{$user->name}} </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{$user->email}}</td>
                            </tr> 
                            <tr>
                                <td>Mac:</td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td>Passowrd:</td>
                                <td>*****</td>
                            </tr> 
                            <tr>
                                <td><button class="btn btn-xs btn-info">Edit</button></td>
                                <td>
                                    <!-- <a href="{{url('/profile/reset_profile_password')}}"><button class="btn btn-xs btn-primary">Reset password</button> -->
                                </td>

                            </tr> 
                     </tbody>

                    </table>
    
           
            </div>
        </div>

</div>
@endsection
