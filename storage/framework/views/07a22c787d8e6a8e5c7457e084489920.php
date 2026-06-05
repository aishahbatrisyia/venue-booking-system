

<?php $__env->startSection('body'); ?>
<?php
    $userName = auth()->user()?->name ?? 'Student User';
    $userRole = auth()->user()?->role ?? 'Undergraduate';

    $navItems = [
        ['label' => 'Dashboard', 'route' => 'user.dashboard', 'icon' => 'bi-grid-1x2-fill'],
        ['label' => 'Browse Venues', 'route' => 'venues.index', 'icon' => 'bi-buildings-fill'],
        ['label' => 'My Booking History', 'route' => 'bookings.history', 'icon' => 'bi-clock-history'],
        ['label' => 'Notifications', 'route' => 'notifications.index', 'icon' => 'bi-bell-fill'],
    ];
?>

<div class="app-shell">
    <aside class="sidebar">
        <a href="<?php echo e(route('user.dashboard')); ?>" class="brand-link">
            <span class="brand-icon"><i class="bi bi-bank2"></i></span>
            <span>
                <span class="d-block small text-white-50 fw-semibold">IIUM</span>
                <span class="d-block">Venue Booking</span>
            </span>
        </a>

        <div class="sidebar-user">
            <span class="sidebar-avatar"><i class="bi bi-person-fill"></i></span>
            <div>
                <div class="fw-bold"><?php echo e($userName); ?></div>
                <div class="small text-white-50 text-capitalize"><?php echo e(str_replace('_', ' ', $userRole)); ?></div>
            </div>
        </div>

        <nav class="nav-list">
            <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a
                    href="<?php echo e(route($item['route'])); ?>"
                    class="nav-link-custom <?php echo e(request()->routeIs($item['route']) ? 'active' : ''); ?>"
                >
                    <i class="bi <?php echo e($item['icon']); ?>"></i>
                    <span><?php echo e($item['label']); ?></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>

        <div class="sidebar-footer">
            <a href="<?php echo e(route('bookings.create', ['venue' => 1])); ?>" class="primary-pill-btn">
                <i class="bi bi-plus-circle-fill"></i>
                <span>New Booking Request</span>
            </a>
        </div>
    </aside>

    <main class="content-shell">
        <div class="page-header-card">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
                <div>
                    <h1 class="h3 fw-bold mb-2"><?php echo $__env->yieldContent('page_heading', 'User Dashboard'); ?></h1>
                    <p class="page-subtitle">
                        <?php echo $__env->yieldContent('page_description', 'Your personal venue booking overview.'); ?>
                    </p>
                </div>
                <div>
                    <?php echo $__env->yieldContent('page_actions'); ?>
                </div>
            </div>
        </div>

        <?php if(session('status')): ?>
            <div class="alert alert-success rounded-4 border-0 shadow-sm mb-4">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\venue-booking-system\resources\views/layouts/user.blade.php ENDPATH**/ ?>