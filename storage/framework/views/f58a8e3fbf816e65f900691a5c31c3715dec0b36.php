

<?php $__env->startSection('container'); ?>
    <h1>Contact Me If You Have Question</h1>
    <hr>
    <h3 class="mt-5"><?php echo e($name); ?></h3>
    <p class="mt-3">Email: <?php echo e($email); ?></p>
    <p>No: <?php echo e($no); ?></p>
    <img src="img/<?php echo e($image); ?>" alt="<?php echo e($name); ?>" width="200" class="img-thumbnail rounded-circle">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fikro\Documents\Project\Laravel\fblog\resources\views/contact.blade.php ENDPATH**/ ?>