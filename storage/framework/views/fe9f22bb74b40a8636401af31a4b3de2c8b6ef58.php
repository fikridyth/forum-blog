<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/posts*') ? 'active' : ''); ?>" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/about*') ? 'active' : ''); ?>" href="/dashboard/about">
                    <span data-feather="user"></span>
                    About Me
                </a>
            </li>
        </ul>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('dashboard/categories*') ? 'active' : ''); ?>"
                        href="/dashboard/categories">
                        <span data-feather="grid"></span>
                        Post Categories
                    </a>
                </li>
            </ul>
        <?php endif; ?>

    </div>
</nav>
<?php /**PATH C:\Users\fikro\Documents\#Laravel & htdocs\fblog\resources\views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>