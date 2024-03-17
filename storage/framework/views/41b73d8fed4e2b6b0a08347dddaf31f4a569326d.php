<?php $__env->startSection('container'); ?>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3"><?php echo e($post->title); ?></h1>

                <p>By. <a href="/posts?author=<?php echo e($post->author->username); ?>"
                        class="text-decoration-none"><?php echo e($post->author->name); ?></a> in
                    <a href="/posts?category=<?php echo e($post->category->slug); ?>"
                        class="text-decoration-none"><?php echo e($post->category->name); ?></a>
                </p>

                <?php if($post->image): ?>
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->category->name); ?>"
                            class="img-fluid">
                    </div>
                <?php else: ?>
                    <img src="https://source.unsplash.com/1200x400?<?php echo e($post->category->name); ?>"
                        alt="<?php echo e($post->category->name); ?>" class="img-fluid">
                <?php endif; ?>

                <article class="my-3 fs-6">
                    <?php echo $post->body; ?>

                </article>

                

                
                <div class="btn-group">
                    <button class="btn btn-light"><span class="lnr lnr-thumbs-up"></span> Like</button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-light" id="btn-main-comment"><span class="lnr lnr-bubble"></span>
                        Comment</button>
                </div>

                <form method="POST" action="" style="margin-top:10px; display:none;" id="main-comment">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                    <input type="hidden" name="parent_id" value="0">
                    <textarea name="content" class="form-control" id="comment-main" rows="4"></textarea>
                    <input type="submit" style="margin-top:5px;" class="btn btn-success form-control" value="Kirim">
                </form>

                <hr>

                <h3 style="margin-top:10px;">Comments</h3>
                <ul class="list-unstyled activity-list">
                    <?php $__currentLoopData = $post->comment()->where('parent_id', 0)->orderBy('created_at', 'desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <p style="padding-left: 0.2em;">
                                <a href="#" class="text-decoration-none"><?php echo e($comment->user->name); ?></a> <small
                                    class="text-muted"><?php echo e($comment->created_at->diffForHumans()); ?></small><br>
                                <?php echo e($comment->content); ?>

                            </p>

                            <div class="btn-group" style="margin-bottom:10px; margin-top:-10px;">
                                <button class="btn btn-white"><span class="lnr lnr-thumbs-up"></span></button>
                                <button class="btn btn-white" id="btn-sub-comment"><span
                                        class="lnr lnr-bubble"></span></button>
                            </div>


                            <form action="" method="POST" style="margin-bottom:-10px;" id="sub-comment">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                                <input type="hidden" name="parent_id" value="<?php echo e($comment->id); ?>">
                                <input type="text" style="margin-top:-6px;" name="content" class="form-control">
                                <input type="submit" style="margin-top:3px;" class="btn btn-success" value="Send Reply">
                            </form>
                            <div style="margin-top: 20px;" />

                            <?php $showReply = false ?>
                            <?php $__currentLoopData = $comment->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div style="padding-left: 1.8em; margin-bottom: 10px;">
                                    <?php if(!$showReply): ?>
                                        <h5 style="padding-left: 1em;">Reply</h5>
                                        <?php $showReply = true ?>
                                    <?php endif; ?>
                                    <a href="#" class="text-decoration-none"><?php echo e($child->user->name); ?></a>
                                    <small class="text-muted"><?php echo e($child->created_at->diffForHumans()); ?></small> <br>
                                    <?php echo e($child->content); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <hr style="margin-top: 5px;">
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        $(document).ready(function() {
            $('#btn-main-comment').click(function() {
                $('#main-comment').toggle('slide');
            });
        });

        // $(document).ready(function() {
        //     $('#btn-sub-comment').click(function() {
        //         $('#sub-comment').toggle('slide');
        //     });
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fikro\Documents\Project\Laravel\fblog\resources\views/post.blade.php ENDPATH**/ ?>