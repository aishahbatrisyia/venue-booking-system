<?php $__env->startSection('page_title', $title); ?>
<?php $__env->startSection('page_heading', $title); ?>
<?php $__env->startSection('page_description', $description); ?>

<?php $__env->startSection('content'); ?>
    <div class="row g-4">
        <?php if(!empty($stats)): ?>
            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-xl-3">
                    <div class="metric-card <?php echo e($stat['class']); ?>">
                        <div>
                            <div class="metric-label"><?php echo e($stat['label']); ?></div>
                            <div class="metric-value"><?php echo e($stat['value']); ?></div>
                        </div>
                        <i class="bi <?php echo e($stat['icon']); ?>"></i>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <div class="col-12">
            <div class="table-card card border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
                        <div>
                            <h5 class="fw-bold mb-2"><?php echo e($title); ?></h5>
                            <p class="text-muted mb-0"><?php echo e($description); ?></p>
                        </div>

                        <?php if($ctaLabel && $ctaUrl): ?>
                            <a href="<?php echo e($ctaUrl); ?>" class="btn btn-primary rounded-pill px-4">
                                <?php echo e($ctaLabel); ?>

                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="empty-state">
                        <i class="bi bi-tools"></i>
                        <h6 class="fw-bold mt-3">Route and layout are ready</h6>
                        <p class="text-muted mb-0">
                            This page is a placeholder so the assigned member can continue here
                            without changing the shared project foundation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\venue-booking-system\storage\framework\views/e4938e782d2900dbfb884ec8de33d20e.blade.php ENDPATH**/ ?>