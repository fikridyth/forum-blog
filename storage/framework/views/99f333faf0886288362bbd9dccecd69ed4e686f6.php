

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">About Me</h1>
    </div>

    <h6>Name: <?php echo e(auth()->user()->name); ?></h6>
    <h6>ID: <?php echo e(auth()->user()->id); ?></h6>
    <h6>Username: <?php echo e(auth()->user()->username); ?></h6>
    <h6>Email: <?php echo e(auth()->user()->email); ?></h6>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fikro\Documents\Project\Laravel\fblog\resources\views/dashboard/about/index.blade.php ENDPATH**/ ?>