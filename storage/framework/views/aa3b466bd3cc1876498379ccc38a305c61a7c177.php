

<?php $__env->startSection('container'); ?>
    <?php if(auth()->guard()->check()): ?>
        <h1>Welcome back, <?php echo e(auth()->user()->name); ?></h1>
        <hr>
        <ul class="mt-5">
            <li>
                <h3><a href="/posts" class="text-decoration-none">See Posts</a></h3>
            </li>
            <li>
                <h3 class="mt-3"><a href="/dashboard/posts" class="text-decoration-none">Make A Post</a></h3>
            </li>
        </ul>
    <?php else: ?>
        <h1>Welcome, Stranger</h1>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fikro\Documents\Project\Laravel\fblog\resources\views/home.blade.php ENDPATH**/ ?>