<?php

$drilldownStatus = config('LaravelLogger.enableDrillDown');
$prependUrl = '/activity/log/';

if (isset($hoverable) && $hoverable === true) {
    $hoverable = true;
} else {
    $hoverable = false;
}

if (Request::is('activity/cleared')) {
    $prependUrl = '/activity/cleared/log/';
}

?>

<div class="table-responsive activity-table">
    <table class="table table-striped table-condensed table-sm <?php if(config('LaravelLogger.enableDrillDown') && $hoverable): ?> table-hover <?php endif; ?> data-table">
        <thead>
            <tr>
                <th>
                    <i class="fa fa-database fa-fw" aria-hidden="true"></i>
                    <span class="hidden-sm hidden-xs">
                        <?php echo trans('LaravelLogger::laravel-logger.dashboard.labels.id'); ?>

                    </span>
                </th>
                <th>
                    <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>
                    <?php echo trans('LaravelLogger::laravel-logger.dashboard.labels.time'); ?>

                </th>
                <th>
                    <i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>
                    <?php echo trans('LaravelLogger::laravel-logger.dashboard.labels.description'); ?>

                </th>
                <th>
                    <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
                    <?php echo trans('LaravelLogger::laravel-logger.dashboard.labels.user'); ?>

                </th>
                <th>
                    <i class="fa fa-truck fa-fw" aria-hidden="true"></i>
                    <span class="hidden-sm hidden-xs">
                        <?php echo trans('LaravelLogger::laravel-logger.dashboard.labels.method'); ?>

                    </span>
                </th>
                <th>
                    <i class="fa fa-map-o fa-fw" aria-hidden="true"></i>
                    <?php echo trans('LaravelLogger::laravel-logger.dashboard.labels.route'); ?>

                </th>
                <th>
                    <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
                    <?php echo trans('LaravelLogger::laravel-logger.dashboard.labels.ipAddress'); ?>

                </th>
                <th>
                    <i class="fa fa-laptop fa-fw" aria-hidden="true"></i>
                    <?php echo trans('LaravelLogger::laravel-logger.dashboard.labels.agent'); ?>

                </th>
                <?php if(Request::is('activity/cleared')): ?>
                    <th>
                        <i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>
                        <?php echo trans('LaravelLogger::laravel-logger.dashboard.labels.deleteDate'); ?>

                    </th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr <?php if($drilldownStatus && $hoverable): ?> class="clickable-row" data-href="<?php echo e(url($prependUrl . $activity->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('LaravelLogger::laravel-logger.tooltips.viewRecord')); ?>" <?php endif; ?> >
                    <td>
                        <small>
                            <?php if($hoverable): ?>
                                <?php echo e($activity->id); ?>

                            <?php else: ?>
                                <a href="<?php echo e(url($prependUrl . $activity->id)); ?>">
                                    <?php echo e($activity->id); ?>

                                </a>
                            <?php endif; ?>
                        </small>
                    </td>
                    <td title="<?php echo e($activity->created_at); ?>">
                        <?php echo e($activity->timePassed); ?>

                    </td>
                    <td>
                        <?php echo e($activity->description); ?>

                    </td>
                    <td>
                        <?php
                            switch ($activity->userType) {
                                case trans('LaravelLogger::laravel-logger.userTypes.registered'):
                                    $userTypeClass = 'success';
                                    $userLabel = $activity->userDetails['name'];
                                    break;

                                case trans('LaravelLogger::laravel-logger.userTypes.crawler'):
                                    $userTypeClass = 'danger';
                                    $userLabel = $activity->userType;
                                    break;

                                case trans('LaravelLogger::laravel-logger.userTypes.guest'):
                                default:
                                    $userTypeClass = 'warning';
                                    $userLabel = $activity->userType;
                                    break;
                            }

                        ?>
                        <span class="badge badge-<?php echo e($userTypeClass); ?>">
                            <?php echo e($userLabel); ?>

                        </span>
                    </td>
                    <td>
                        <?php
                            switch (strtolower($activity->methodType)) {
                                case 'get':
                                    $methodClass = 'info';
                                    break;

                                case 'post':
                                    $methodClass = 'warning';
                                    break;

                                case 'put':
                                    $methodClass = 'warning';
                                    break;

                                case 'delete':
                                    $methodClass = 'danger';
                                    break;

                                default:
                                    $methodClass = 'info';
                                    break;
                            }
                        ?>
                        <span class="badge badge-<?php echo e($methodClass); ?>">
                            <?php echo e($activity->methodType); ?>

                        </span>
                    </td>
                    <td>
                        <?php if($hoverable): ?>
                            <?php echo e(showCleanRoutUrl($activity->route)); ?>

                        <?php else: ?>
                            <a href="<?php echo e($activity->route); ?>">
                                <?php echo e($activity->route); ?>

                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo e($activity->ipAddress); ?>

                    </td>
                    <td>
                        <?php
                            $platform       = $activity->userAgentDetails['platform'];
                            $browser        = $activity->userAgentDetails['browser'];
                            $browserVersion = $activity->userAgentDetails['version'];

                            switch ($platform) {

                                case 'Windows':
                                    $platformIcon = 'fa-windows';
                                    break;

                                case 'iPad':
                                    $platformIcon = 'fa-';
                                    break;

                                case 'iPhone':
                                    $platformIcon = 'fa-';
                                    break;

                                case 'Macintosh':
                                    $platformIcon = 'fa-apple';
                                    break;

                                case 'Android':
                                    $platformIcon = 'fa-android';
                                    break;

                                case 'BlackBerry':
                                    $platformIcon = 'fa-';
                                    break;

                                case 'Unix':
                                case 'Linux':
                                    $platformIcon = 'fa-linux';
                                    break;

                                case 'CrOS':
                                    $platformIcon = 'fa-chrome';
                                    break;

                                default:
                                    $platformIcon = 'fa-';
                                    break;
                            }

                            switch ($browser) {

                                case 'Chrome':
                                    $browserIcon  = 'fa-chrome';
                                    break;

                                case 'Firefox':
                                    $browserIcon  = 'fa-';
                                    break;

                                case 'Opera':
                                    $browserIcon  = 'fa-opera';
                                    break;

                                case 'Safari':
                                    $browserIcon  = 'fa-safari';
                                    break;

                                case 'Internet Explorer':
                                    $browserIcon  = 'fa-edge';
                                    break;

                                default:
                                    $browserIcon  = 'fa-';
                                    break;
                            }
                        ?>
                        <i class="fa <?php echo e($browserIcon); ?> fa-fw" aria-hidden="true">
                            <span class="sr-only">
                                <?php echo e($browser); ?>

                            </span>
                        </i>
                        <sup>
                            <small>
                                <?php echo e($browserVersion); ?>

                            </small>
                        </sup>
                        <i class="fa <?php echo e($platformIcon); ?> fa-fw" aria-hidden="true">
                            <span class="sr-only">
                                <?php echo e($platform); ?>

                            </span>
                        </i>
                        <sup>
                            <small>
                                <?php echo e($activity->langDetails); ?>

                            </small>
                        </sup>
                    </td>
                    <?php if(Request::is('activity/cleared')): ?>
                        <td>
                            <?php echo e($activity->deleted_at); ?>

                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php if(config('LaravelLogger.loggerPaginationEnabled')): ?>
    <div class="text-center">
        <div class="d-flex justify-content-center">
            <?php echo $activities->render(); ?>

        </div>
        <p>
            <?php echo trans('LaravelLogger::laravel-logger.pagination.countText', ['firstItem' => $activities->firstItem(), 'lastItem' => $activities->lastItem(), 'total' => $activities->total(), 'perPage' => $activities->perPage()]); ?>

        </p>
    </div>
<?php endif; ?>
<?php /**PATH D:\LSKIT\laravel-auth\vendor\jeremykenedy\laravel-logger\src/resources/views//logger/partials/activity-table.blade.php ENDPATH**/ ?>