

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, <?php echo e(auth()->user()->name); ?></h1>
    </div>

    <a href="/" class="text-decoration-none">
        <h4>Back to home</h4>
    </a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fikro\Documents\Project\Laravel\fblog\resources\views/dashboard/index.blade.php ENDPATH**/ ?>