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
      <div class="row">
         <div class="col-12">
            <!-- /.card -->
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Target Show</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Id</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->id}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Date</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->date}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Area</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->area->name}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Territory</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->territory->name}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Technitian</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->technitian->name}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Engineer</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->engineer->name}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Tractor Warranty</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->tractor_warranty}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Tractor Post warranty</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->tractor_post_warranty}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>NM/PTDE Warranty</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->nm_warranty}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>NM/PTDE Post Warranty</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->nm_post_warranty}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Total</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->total}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Service Income</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->service_income}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Note</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->note}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Creator</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->creator->name}}</p>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="col-md-4"><strong>Updater</strong></div>
                        <div class="col-md-8">
                           <p>{{$target->updater->name}}</p>
                        </div>
                     </div>
                  </div>

               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->

      </div>
      <!--row end -->
   </div><!-- /.container-fluid -->
</section><!-- /.content -->
<script>
   document.title = 'Target | Show';
</script>
@endsection