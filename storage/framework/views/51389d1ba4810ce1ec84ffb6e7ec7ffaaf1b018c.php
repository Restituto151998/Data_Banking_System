

<?php $__env->startSection('editResortlist'); ?>
    <?php if(auth()->guard()->check()): ?>
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                <?php if(session()->has('error')): ?>
                    <div id="alert_message" class="alert alert-danger alert-dismissible fade  w-25 show sticky" role="alert">
                        <?php echo e(session()->get('error')); ?> ❌
                    </div>
                <?php endif; ?>
                <?php if(session()->has('message')): ?>
                    <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky" role="alert">
                        <?php echo e(session()->get('message')); ?> ✔️
                    </div>
                <?php endif; ?>
                <?php if(session()->has('status')): ?>
                    <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky" role="alert">
                        <?php echo e(session()->get('status')); ?> ✔️
                    </div>
                <?php endif; ?>
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="<?php echo e(route('admin.resort_list')); ?>">
                                <i data-feather="arrow-left"></i>
                            </a>
                            <h4 style="text-align: center; color:black">Edit Resort</h4>
                            <form method="post" action="<?php echo e(route('admin.resort_list')); ?> " enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row mt-5">
                                    <input type="id" class="form-control" name="id" value="<?php echo e($resort->id); ?>" hidden>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <img id="preview-imageMain" class="rounded"
                                                        src="<?php echo e($resorts->imagePath ?? asset('/assets/img/no_image.png')); ?>"
                                                        alt="preview image" style="width:400px; height: 400px;">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <input type="file" name="imageMain" placeholder="Choose image"
                                                                id="imageMain">
                                                            <?php $__errorArgs = ['imageMain'];
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
                                    <div class="col">
                                        <div class="row mb-3">
                                            <div class="col text-center">
                                                <input type="name"
                                                    style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" name="resort_name"
                                                    value="<?php echo e($resort->resort_name); ?>">
                                                <strong><label for="name" class="col-form-label mb-1 text-black">Resort
                                                        Name</label></strong>
                                            </div>
                                            <div class="col text-center">
                                                <select class="custom-select text-center" id="inputGroupSelect01" name="user_id"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                    <option selected hidden><?php echo e($resort->assigned_staff); ?></option>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($user->type == 'STAFF'): ?>
                                                            <option value="<?php echo e($user->id); ?>">
                                                                <?php echo e($user->name); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="1">
                                                        Assign To Me
                                                    </option>

                                                </select>
                                                <strong><label for="name" class="col-form-label mb-1 text-black">Assigned
                                                        Staff</label></strong>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col">
                                                <textarea name="resort_description"
                                                    style="min-height:200px;background-color:white;border-left-color:green; border-bottom-color:green;border-right-color:green;border-top-color:green"
                                                    class="form-control ml-2" placeholder="Enter resort description"
                                                    required><?php echo e($resorts->resort_description); ?></textarea>
                                                <strong><label for="name" class="col-form-label mb-1 text-black">Resort
                                                        Description</label></strong>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col">
                                                <button type="submit" class="btn w-50 text-white " id="btn-edit"
                                                    style="background-color: #21791A;">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                        <div class="col d-flex mt-3">
                                            <a type="button"
                                                href="<?php echo e(route('admin.resort_list_edit.add', ['id' => $resort->id])); ?>"
                                                id="btn-edit" class="btn w-50 text-white" style="background-color:  #21791A"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($resort->id); ?>">
                                                Add Image
                                            </a>
                                            <a type="button" id="btn-edit" class="btn w-50 text-white ml-5 btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-delete<?php echo e($resort->id); ?>">
                                                Delete Images
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal fade" id="exampleModal<?php echo e($resort->id); ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="<?php echo e(route('admin.resort_list_edit.add', $resort->id)); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="modal-body">
                                                <input type="text" value="<?php echo e($resort->id); ?>" hidden>
                                                <div class="row text-center p-5">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <img id="preview-image"
                                                                src="<?php echo e(asset('/assets/img/no_image.png')); ?>"
                                                                alt="preview image" style="width:400px; height: 300px;">
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
                                                    <div class="col">
                                                        <textarea name="image_description"
                                                            style="min-height:300px;background-color:white;border-left-color:green; border-bottom-color:green;border-right-color:green;border-top-color:green"
                                                            class="form-control ml-2" placeholder="Enter resort description"
                                                            required></textarea>
                                                        <strong><label for="name" class="col-form-label mb-1 text-black">Image
                                                                Description</label></strong>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                <div class="col text-center mb-5">
                                                    <button type="submit" class="btn text-white w-50"
                                                        style="background-color:  #21791A">Add 
                                                        Image</button>
                                                </div>
                                            </div>
                                            </div>
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal-delete<?php echo e($resort->id); ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Images</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pl-5 pr-5">
                                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($image->resort_id == $resort->id): ?>
                                                    <div class="row mt-5 text-center">
                                                        <div class="col ">
                                                            <div class="form-group">
                                                                <img id="preview-image"
                                                                    src="<?php echo e($image->image ?? asset('/assets/img/no_image.png')); ?>"
                                                                    alt="preview image" style="width:90px; height: 60px;">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <textarea name="images_description"
                                                                style="max-width:100%;background-color:white;border-left-color:green; border-bottom-color:green;border-right-color:green;border-top-color:green"
                                                                class="form-control ml-2" placeholder="Enter resort description"
                                                                required><?php echo e($image->image_description); ?></textarea>
                                                            <strong><label for="name"
                                                                    class="col-form-label mb-1 text-black">Image
                                                                    Description</label></strong>
                                                        </div>
                                                        <div class="col">
                                                            <a
                                                                href="<?php echo e(url('resort_list/resort_list_edit/delete-image', $image->id)); ?>">
                                                                <i data-feather="trash" class="mt-4" style="color:red;"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.resort_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/admin/resort_list_edit.blade.php ENDPATH**/ ?>