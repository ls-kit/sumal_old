
<?php $__env->startSection('main_section'); ?>
    <div class="header">
        <header class="menu">
            <H1>Bundle-B</H1>
            <h2>Simple bundeling solution for busy lawyer's</h2>
            <h2>Create secure Court bundles quickly, easy and free</h2>
        </header>
        <button class="button2" style="vertical-align:center"><a href="<?php echo e(route('sorry')); ?>"><span>Start
                    bundeling</span></a></button>
    </div>
    <section class="col" style="vertical-align:center">
        <div class="row">
            <div class="column">

                <h2>Easy and quick</h2>
                <img class="img1" src="<?php echo e(asset('frontend/img/tick.png')); ?>" alt="tick">
                <p>User frendly inferface. <br>Just click and drop upload your documents. </p>
            </div>

            <div class="column">
                <h2>Flexible</h2>
                <img class="img1" src="<?php echo e(asset('frontend/img/tick.png')); ?>" alt="tick">
                <p>Delete, upload, rename, rearange.
                    Do wtahever you need. <br> It is flexible and functional. </p>
            </div>

            <div class="column">
                <h2>Secure & Compliant</h2>
                <img class="img1" src="<?php echo e(asset('frontend/img/tick.png')); ?>" alt="tick">
                <p>Data security and daily backups. <br>Bundeling tempales for for all levels of bundle production</p>
            </div>
        </div>
    </section>
    <div class="card">
        <h2><strong>Trusted by thousands happy clients</strong></h2>
        <img class="img2" src="<?php echo e(asset('frontend/img/satisfaction-badge.png')); ?>" alt="satisfaction">
        <ul>
            <li> Easy to use</li>
            <li>Transparent Pricing </li>
            <li> No hidden costs </li>
            <li> Long bundle retention</li>
            <li> Secure share </li>
            <li> Sustainable </li>
            <li> Customer Support Team</li>
            <li> Suitable for small and large firms</li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LSKIT\bundler\resources\views/frontend/homepage.blade.php ENDPATH**/ ?>