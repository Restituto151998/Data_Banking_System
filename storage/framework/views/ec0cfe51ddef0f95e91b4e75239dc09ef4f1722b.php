
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/register.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/data.css')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('/assets/img/logo.png')); ?>" />
</head>
<style>
 @media  screen and (min-width: 414px) {
        #flip {
            max-width: 400px;
            max-height: 400px;
            /* New width for default modal */
        }
    }

</style>
<body>
    <div class="container mt-5">
        <div id="app"></div>
        <?php if(session()->has('status')): ?>
            <div id="overview" class="alert alert-success alert-dismissible fade  show" role="alert">
                <?php echo e(session()->get('status')); ?> ✔️
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="card text-center">
                <div class="card-title text-center">
                    <h1 class="mt-3">Alcoy Resorts Overview</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $resorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $resort_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($image->id == $res->resort_id && $res->status == 'open'): ?>
                        <div class="col-sm-4 mt-4">
                            <div class="card card-flip" id="flip"
                                style="width:100%; height: 100%;">
                                <div class="card-front text-white bg-primary">
                                    <div class="card-body">
                                        <i class="fa fa-arrow-circle-right fa-2x float-right"></i>
                                        <h5 class="card-title"><?php echo e($image->resort_name); ?></h5>
                                        <img src="<?php echo e($image->imagePath); ?>" class="rounded" alt="images"
                                            style="width:100%; height: 100%;">
                                    </div>
                                </div>
                                <div class="card-back bg-white">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title"><?php echo e($image->resort_name); ?></h5>
                                        <a href="<?php echo e(route('online_registration.more_info', $image->id)); ?>"
                                            class="btn w-100 text-white" style="background-color:  #21791A; ">More
                                            Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</body>
<script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#overview").remove();
        }, 3000);
    });
</script>

</html>
<?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/online_registration/resorts_overview.blade.php ENDPATH**/ ?>