<?php $__env->startSection('title','Pending Job Card List | Motors Service'); ?>
<style>
    label {
        font-size: 11px;
    }
    .form-control {
        height: 30px!important;
        font-size: 12px!important;
    }
</style>
<?php $__env->startSection('content'); ?>
    <br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?php if(request()->get('from_date') && request()->get('to_date')): ?>
                        <form action="<?php echo e(route('job.card.export')); ?>" class="float-right" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="f_date" value="<?php echo e(request()->get('from_date')); ?>">
                            <input type="hidden" name="t_date" value="<?php echo e(request()->get('to_date')); ?>">
                            <input type="hidden" name="approve_status" value="0">
                            <input type="hidden" name="chassis_number" value="<?php echo e(request()->get('chassis_number')); ?>">
                            <input type="hidden" name="product_id" value="<?php echo e(request()->get('product_id')); ?>">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-info btn-sm">Export</button>
                            </div>
                        </form>
                    <?php endif; ?>
                    <form role="form" action="<?php echo e(url('/pending_job_card')); ?>" method="get">
                        <div class="row">
                            <div class="col-md-2">
                                <label>From Date</label>
                                <input name="from_date" type="text" class="form-control datepicker" value="<?php if(request()->get('from_date')): ?><?php echo e(request()->get('from_date')); ?><?php else: ?><?php echo e(date('01-m-Y', strtotime(date('d-m-Y').' -1 month'))); ?><?php endif; ?>">
                            </div>
                            <div class="col-md-2">
                                <label>To Date</label>
                                <input name="to_date" type="text" class="form-control datepicker" value="<?php if(request()->get('to_date')): ?><?php echo e(request()->get('to_date')); ?><?php else: ?><?php echo e(date('d-m-Y')); ?><?php endif; ?>">
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group <?php echo e($errors->has('search') ? 'has-error' : ''); ?>">
                                    <label for="search">Search ID</label>
                                    <input name="search" type="text" id="search" class="form-control"   value="<?php if(request()->get('search')): ?><?php echo e(request()->get('search')); ?><?php endif; ?>"    autofocus max="11"  placeholder="Search by ID"     >
                                    <?php if($errors->has('search')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('search')); ?></strong></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="chassis_number">Chassis number</label>
                                    <input name="chassis_number" type="text" id="chassis_number" class="form-control" value="<?php if(request()->get('chassis_number')): ?><?php echo e(request()->get('chassis_number')); ?><?php endif; ?>" autofocus max="11"  placeholder="Search chassis number"     >
                                    <?php if($errors->has('chassis_number')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('chassis_number')); ?></strong></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="product_id">Product</label>
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option value="">Select Product</option>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('product_id')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('product_id')); ?></strong></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-1" style="padding-top: 25px">
                                <button  type="submit" class="btn btn-success btn-sm">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_export_" class="table table-bordered table-striped table-sm table-condensed small">
                        <thead>
                          <tr>
                              <th>Id</th>
                              <th width="7%">Action</th>
                              <th>Approve</th>
                              <th>ServiceDate - CreatedAt</th>
                              <th>Area</th>
                              <th>Territory</th>
                              <th>Engineer</th>
                              <th>Technician</th>
                              <th>Product</th>
                              <th>Product Model</th>
                              <th>Call type</th>
                              <th>Service type</th>
                              <th>Six Hours</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $job_cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $date = date('Y-m-d',strtotime($job_card->created_at));
                                   // dd($job_card);
                                ?>
                             <tr style="background: <?php echo e($job_card->color); ?>">
                              <td><?php echo e($job_card->id); ?></td>
                              <td class="text-center">
                                  <?php if($job_card->flag != 'hide'): ?>
                                  <button type="button" data-id="<?php echo e($job_card->id); ?>" class="btn openShowModal btn-xs btn-primary btn-flat"><i class="fas fa-eye"></i></button>
                                  <?php endif; ?>
                                  <?php if($job_card->is_approved == 0): ?>
                                      <a href="<?php echo e(url('/job_card/'.$job_card->id.'/edit')); ?>" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat"><i class="fas fa-edit"></i></button></a>
                                  <?php endif; ?>
                                  <?php if(Auth::user()->role_id == 1): ?>
                                  <a id="openDeleteModal" data-toggle="modal" data-id="<?php echo e($job_card->id); ?>" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash"></i></button></a>
                                  <?php endif; ?>
                              </td>
                              <td><?php if($job_card->is_approved): ?><?php echo e("Approved"); ?>

                                  <br><?php echo e($job_card->approver->name); ?>

                                  <?php else: ?>
                                  No (Click show button to approve)
                                  <!-- <a href="<?php echo e(url('/job_card/'.$job_card->id)); ?>/approve"><button type="button" class="btn btn-success btn-xs">Approve</button> -->
                                  <?php endif; ?>
                              </td>
                              <td>
                                ServiceDate: <?php echo e(date("d-m-Y",strtotime( $job_card->service_date))); ?>

                                CreatedAt: <?php echo e(date("d-m-Y H:i:s",strtotime( $job_card->created_at))); ?>

                              </td>
                              <td><?php echo e(isset($job_card->area->name) ? $job_card->area->name : ''); ?></td>
                              <td><?php echo e(isset($job_card->territory->name) ? $job_card->territory->name: ''); ?></td>
                              <td><?php echo e(isset($job_card->engineer->name) ? $job_card->engineer->name : ''); ?></td>
                              <td><?php echo e(isset($job_card->technitian->username) ? $job_card->technitian->username : ''); ?>-<?php echo e(isset($job_card->technitian->name) ? $job_card->technitian->name : ''); ?></td>

                              <td><?php echo e(isset($job_card->product->name) ? $job_card->product->name : ''); ?></td>
                              <td><?php echo e(isset($job_card->model) ? $job_card->model->model_name : ''); ?></td>
                              <td><?php echo e(isset($job_card->call_type->name) ? $job_card->call_type->name : ''); ?></td>
                              <td><?php echo e(isset($job_card->service_type->name) ? $job_card->service_type->name : ''); ?></td>
                              <td>
                                  <?php
                                      if($job_card->service_wanted_at && $job_card->service_start_at){
                                          $datetime1 = new DateTime($job_card->service_wanted_at);
                                          $datetime2 = new DateTime($job_card->service_start_at);
                                          $interval_date = $datetime1->diff($datetime2);
                                          $interval = $interval_date->format('%h')." Hours ".$interval_date->format('%i')." Minutes";
                                      }else {
                                          $interval = 0;
                                      }
                                  ?>
                                  <?php echo e($interval); ?>

                              </td>
                             </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                    </table>
                    <?php echo e($job_cards->appends(request()->query())->links()); ?>

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Delete Item !!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="delete_modal_form" role="form" method="POST" action="">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field("DELETE")); ?>

      <div class="modal-body">
          <p class="text-center danger">Are Your Sure ? </p>
          <input id="delete_id" type="hidden" name="id">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary float-left">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="shoModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Job Card !!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="show_body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "<?php echo e(url('/job_card')); ?>/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});

$(document).on("click", ".openShowModal", function () {
  var id = $(this).data("id");
    $('#show_body').empty();
    $('#show_body').append("Loading....");
    $.get( "<?php echo e(url('/')); ?>/job_card/"+id)
        .done(function( data ) {
            $('#show_body').empty();
            $('#show_body').append(data);
        }).fail(function() {
          $('#show_body').empty();
          $('#show_body').append("Failed to load.. network or authentication error");
      });
     $("#shoModal").modal("show");
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\motor-service\resources\views/job_card/pending_job_card_list.blade.php ENDPATH**/ ?>