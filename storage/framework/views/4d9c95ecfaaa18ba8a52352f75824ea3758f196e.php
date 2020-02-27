<?php $__env->startSection('content'); ?>
<div class="container">
    <button class="btn btn-secondary mb-4" id="btn1">
        Process Task
    </button>
    <button class="btn btn-secondary mb-4" id="btn2">
        Custom Task
    </button>
    <section id="section1"class="mb-3">
        
    <div class="row">
        <?php $i = 1; ?>
    <?php $__currentLoopData = $custom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-3">
            <div class="card mb-3">

                <div class="card-header">
                <?php echo e($i++); ?>.&nbsp;<?php echo e($item->status); ?> 
                <a href="#"data-toggle="modal"data-target="#exampleModal<?php echo e($item->id); ?>"class="float-right text-dark"> New +</a><a href="home/delete/<?php echo e($item->id); ?>" class="float-right text-danger">Del&nbsp;&nbsp;</a>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $item->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($itemku->kegiatan); ?><br/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <a href="#modalNew"data-toggle="modal" data-target="#exampleModal"class="text-dark">New Card +  </a>
                    </div>
                </div>
         </div>
         <hr>
    </div>
    </section>
    <section id="section2">
        <div class="row">
            <div class="col-md-4">
                 <a href="#exampleModalNewTask" class="text-dark"data-toggle="modal"> Start Task +</a>
                <?php $__currentLoopData = $start; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mulai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card border-dark mb-2">
                    <div class="card-header">
                        <?php echo e($mulai->status); ?>

                    </div>
                    <div class="card-body">
                        <?php echo e($mulai->kegiatan); ?>

                        <br/><a href="/home/deleteTask/<?php echo e($mulai->id); ?>"class="btn btn-danger">Del</a>
                        <a href="/home/updateToProcess/<?php echo e($mulai->id); ?>"class="btn btn-secondary">Start</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-md-4">
                 <div class="text-primary"> Process Task</div>
                <?php $__currentLoopData = $process; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mulai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card border-primary  mb-2">
                    <div class="card-header">
                        <?php echo e($mulai->status); ?>

                    </div>
                    <div class="card-body">
                        <?php echo e($mulai->kegiatan); ?>

                        <br/><a href="/home/deleteTask/<?php echo e($mulai->id); ?>"class="btn btn-danger">Del</a>
                        <a href="/home/updateToFinish/<?php echo e($mulai->id); ?>"class="btn btn-secondary">Finish</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-md-4">
                 <div class="text-success"> Finish Task</div>
                <?php $__currentLoopData = $finish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mulai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card border-success  mb-2">
                    <div class="card-header">
                        <?php echo e($mulai->status); ?>

                    </div>
                    <div class="card-body">
                        <?php echo e($mulai->kegiatan); ?>

                        <br/><a href="/home/deleteTask/<?php echo e($mulai->id); ?>"class="btn btn-danger">Del</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/newCard"method="post"class="form-group">
        <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            Card Name : 
                <input type="text"required="required" name="cardName"class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- modal new Task -->
<?php $__currentLoopData = $custom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="exampleModal<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/newTask/<?php echo e($item->id); ?>"method="post"class="form-group">
        <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            Your Task : 
                <input type="text"required="required" name="taskName"class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="exampleModalNewTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/newTaskProcess"method="post"class="form-group"id="formTask">
        <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            Your Task : 
                <input type="text"required="required" name="taskName"class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"id="submit5">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"src="<?php echo e(asset('js/style.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<!-- Modal -->

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\OneToMany\resources\views/home.blade.php ENDPATH**/ ?>