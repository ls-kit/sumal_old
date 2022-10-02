<?php
    $userIdField = config('LaravelLogger.defaultUserIDField')
?>

<form action="<?php echo e(route('activity')); ?>" method="get">
    <div class="row mb-3">
        <?php if(in_array('description',explode(',', config('LaravelLogger.searchFields')))): ?>
            <div class="col-12 col-sm-4 col-lg-2 mb-2">
                <input type="text" name="description" value="<?php echo e(request()->get('description') ? request()->get('description'):null); ?>" class="form-control" placeholder="Description">
            </div>
        <?php endif; ?>
        <?php if(in_array('user',explode(',', config('LaravelLogger.searchFields')))): ?>
            <div class="col-12 col-sm-4 col-lg-2 mb-2">
                <select class="form-control" name="user">
                    <option value=""><?php echo e(trans('LaravelLogger::laravel-logger.dashboard.search.all')); ?></option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->$userIdField); ?>"<?php echo e(request()->get('user') && request()->get('user') == $user->$userIdField ? ' selected':''); ?>><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        <?php endif; ?>
        <?php if(in_array('method',explode(',', config('LaravelLogger.searchFields')))): ?>
            <div class="col-12 col-sm-4 col-lg-2 mb-2">
                <select class="form-control" name="method">
                    <option value=""><?php echo e(trans('LaravelLogger::laravel-logger.dashboard.search.all')); ?></option>
                    <?php $__currentLoopData = explode(' ','CONNECT DELETE GET OPTIONS PATCH POST PUT TRACE'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($val); ?>"<?php echo e(request()->get('method') && request()->get('method') == $val ? ' selected':''); ?>><?php echo e($val); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        <?php endif; ?>
        <?php if(in_array('route',explode(',', config('LaravelLogger.searchFields')))): ?>
            <div class="col-12 col-sm-4 col-lg-2 mb-2">
                <input type="text" name="route" class="form-control" value="<?php echo e(request()->get('route') ? request()->get('route'):null); ?>" placeholder="Route">
            </div>
        <?php endif; ?>
        <?php if(in_array('ip',explode(',', config('LaravelLogger.searchFields')))): ?>
            <div class="col-12 col-sm-4 col-lg-2 mb-2">
                <input type="text" name="ip_address" class="form-control" value="<?php echo e(request()->get('ip_address') ? request()->get('ip_address'):null); ?>" placeholder="Ip Address">
            </div>
        <?php endif; ?>
        <?php if(in_array('description',explode(',', config('LaravelLogger.searchFields')))||in_array('user',explode(',', config('LaravelLogger.searchFields'))) ||in_array('method',explode(',', config('LaravelLogger.searchFields'))) || in_array('route',explode(',', config('LaravelLogger.searchFields'))) || in_array('ip',explode(',', config('LaravelLogger.searchFields')))): ?>
            <div class="col-12 col-sm-4 col-lg-2 mb-2">
                <input type="submit" class="btn btn-primary btn-block" value="<?php echo e(trans('LaravelLogger::laravel-logger.dashboard.search.search')); ?>">
            </div>
        <?php endif; ?>
    </div>
</form>
<?php /**PATH D:\LSKIT\laravel-auth\vendor\jeremykenedy\laravel-logger\src/resources/views//partials/form-search.blade.php ENDPATH**/ ?>