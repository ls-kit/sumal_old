
<?php if(config('LaravelLogger.enablejQueryCDN')): ?>
    <script type="text/javascript" src="<?php echo e(config('LaravelLogger.JQueryCDN')); ?>"></script>
<?php endif; ?>

<?php if(config('LaravelLogger.enableBootstrapJsCDN')): ?>
    <script type="text/javascript" src="<?php echo e(config('LaravelLogger.bootstrapJsCDN')); ?>"></script>
<?php endif; ?>

<?php if(config('LaravelLogger.enablePopperJsCDN')): ?>
    <script type="text/javascript" src="<?php echo e(config('LaravelLogger.popperJsCDN')); ?>"></script>
<?php endif; ?>

<?php if(config('LaravelLogger.loggerDatatables')): ?>
    <?php if(count($activities) > 10): ?>
        <?php echo $__env->make('LaravelLogger::scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endif; ?>

<?php echo $__env->make('LaravelLogger::scripts.add-title-attribute', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LSKIT\laravel-auth\vendor\jeremykenedy\laravel-logger\src/resources/views//partials/scripts.blade.php ENDPATH**/ ?>