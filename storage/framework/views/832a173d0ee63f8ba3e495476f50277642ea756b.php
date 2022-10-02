
<?php $__env->startSection('main_section'); ?>
    <header>
        <h1> PRICE PLANS</h1>
    </header>
    <h2> In Bundle -B we belive that automation is the key of productivity. <br>
        We created an easy and affordable way for proffesionals to move forward. <br>
        And, we continue to work hard by upgrading our system and functionalily. </h2>

    <section class="col">
        <div class="row">

            <div class="price">

                <h2>FREE forever</h2>
                <img class="img1" src="<?php echo e(asset('frontend/img/tick.png')); ?>" alt="tick">
                <ul>
                    <li> User frendly interface.</li>
                    <li>Click and drop documents.</li>
                    <li>One bundle per User.</li>
                    <li>Unlimited ammendments</li>
                    <li>Bundle limit for 60 pages.</li>
                    <li>Bundle-B link at the botom.</li>
                    <li>Bundle retention 100 days. </li>
                    <li>Download and save</li>
                    <li>No Archive </li>
                </ul>
                <button class="button2" style="vertical-align:center"><a href="<?php echo e(route('sorry')); ?>"><span>Start
                            bundeling</span></a></button>

            </div>
            <div class="price">

                <h2>Pay As You Go</h2>
                <img class="img1" src="<?php echo e(asset('frontend/img/tick.png')); ?>" alt="tick">
                <ul>
                    <li> £5 per bundle </li>
                    <li> User frendly interface.</li>
                    <li>Click and drop documents.</li>
                    <li>5 bundles per User.</li>
                    <li>No pages limit.</li>
                    <li>Unlimited ammendments</li>
                    <li>Bundle retention 2 years. </li>
                    <li>Secure share via link</li>
                    <li>Download and save</li>
                    <li>No Archive</li>
                    <li>Upgrades available </li>
                </ul>
                <button class="button2" style="vertical-align:center"><a href="<?php echo e(route('sorry')); ?>"><span>Start
                            bundeling</span></a></button>
            </div>

            <div class="price">

                <h2>Unlimited</h2>
                <img class="img1" src="<?php echo e(asset('frontend/img/tick.png')); ?>" alt="tick">
                <ul>
                    <li>Fixed monthly prise per user</li>
                    <li> User frendly interface.</li>
                    <li>Click and drop documents.</li>
                    <li>Unlimited ammendments</li>
                    <li>Unlimited bundles per User.</li>
                    <li>No pages limit.</li>
                    <li>Bundle retention 2 years. </li>
                    <li>Secure share via link</li>
                    <li>Download and save</li>
                    <li>Archive</li>
                    <li>Dedicated Support Team</li>

                </ul>
                <button class="button2" style="vertical-align:center"><a href="<?php echo e(route('sorry')); ?>"><span>Contact
                            us</span></a></button>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\bundler\resources\views/frontend/prices.blade.php ENDPATH**/ ?>