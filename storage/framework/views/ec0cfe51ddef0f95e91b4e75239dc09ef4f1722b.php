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
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bundles/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bundles/datatables/datatables.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')); ?>">

    <link rel="stylesheet" href="./assets/css/components.css">
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/data.css')); ?>">
     
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/alcoyLogo.png" />
</head>

<body class="overview">
    <div class="container mt-5">
        <?php if(session()->has('status')): ?>
            <div id="overview" class="alert alert-success alert-dismissible fade  show" role="alert">
                <?php echo e(session()->get('status')); ?> ✔️
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?> 

   <div class="row">
            <?php $__currentLoopData = $resorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $resort_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($image->id == $resort->resort_id && $resort->status == 'open'): ?>
                        <div class="col-sm-4 mt-4">
                            <div class="card card-flip">
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
                                        <p class="card-text"><?php echo e($image->resort_description); ?></p>
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
<script src="<?php echo e(asset('assets/bundles/summernote/summernote-bs4.js')); ?>"></script>
<script src="<?php echo e(asset('assets/bundles/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/bundles/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#overview").remove();
        }, 3000);

        $(".card-text").each(function(i) {
            var text = $(".card-text").text();
            console.log(text);
            if (text.length > 100) {
                $('.card-text').text(text.substring(0, 100) + '.....');
            }

        });
    });

</script>

</html>
<?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/online_registration/resorts_overview.blade.php ENDPATH**/ ?>