@extends('layouts.app')
@section('content')
<style>
.button {
  background: #5FD080;
  border-radius: 100px;
  padding: 10px 50px;
  color: #fff;
  text-decoration: none;
  font-size: 1.45em;
  margin: 0 15px;
}


</style>
<div class="row-fluid">
    <div class="col-md-6" style="text-align: center; padding-top:75px;">
       <h3><strong style="color: white;">MOTOR SERVICE</strong></h3>
       <p style="color: white;">Provide Sufficient Supply</p>
       <p style="color: white;">And Support to the customer </p>
       <a href="{{ route('login') }}"><button class="button">Login</button></a>
    </div>
    <div class="col-md-6"></div>
</div>

<script>
// A $( document ).ready() block.
$( document ).ready(function() {
   // document.getElementsByTagName('body').height  = window.innerHeight +"px";
});
</script>
@endsection

