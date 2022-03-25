

<?php $__env->startSection('addResort'); ?>
    <?php if(auth()->guard()->check()): ?>
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                <?php if(session()->has('message_fail')): ?>
                    <div class="alert alert-danger alert-dismissible fade  show" role="alert">
                        <?php echo e(session()->get('message_fail')); ?> ❌
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <?php if(session('status')): ?>
                        <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky"
                            role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" id="add_resort"
                                    action="<?php echo e(url('add_resort')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row mt-2">
                                        <div class="col-5">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <div class="form-group">
                                                        <img id="preview-image-before-upload" src="/assets/img/no_image.png"
                                                            alt="preview image" style="height: 300px; width:400px;">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="file" name="image" placeholder="Choose image"
                                                                    id="image">
                                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="alert alert-danger mt-1 mb-1">
                                                                        <?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <h4 style="text-align: center; color:black">Add Resort</h4>
                                            <div class="card-body">
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <input type="text"
                                                            style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                            class="form-control ml-2 text-center" name="resort_name"
                                                            placeholder="Enter resort name" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-center mt-5">
                                                        <textarea name="resort_description"
                                                            style="background-color:white;border-left-color:green; border-bottom-color:green;border-right-color:green;border-top-color:green"
                                                            class="form-control ml-2"
                                                            placeholder="Enter resort description" required></textarea>
                                                    </div>
                                                    <div>
                                                        <div class="row mt-3">
                                                            <div class="col text-center">
                                                                <div class="form-group">
                                                                    <button class="btn w-50 text-white" id="btn_add" style="background-color:  #21791A">Add Resort</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/admin/add_resort.blade.php ENDPATH**/ ?>