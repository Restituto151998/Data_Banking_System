

<?php $__env->startSection('editUser'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->guard()->check()): ?>
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="<?php echo e(route('admin.add_user')); ?>">
                                    <i data-feather="arrow-left"></i>
                                </a>
                                <h4 style="text-align: center; color:black">Edit User</h4>
                                <div class="row mt-4">
                                    <div class="col-12 mb-3">
                                        <form method="post" action="<?php echo e(route('admin.add_user')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="id" class="form-control" name="id" value="<?php echo e($user->id); ?>" hidden>
                                            <div class="row mb-3">
                                                <div class="col text-center">
                                                    <input type="name" id="name"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="name" value="<?php echo e($user->name); ?>"
                                                        required>
                                                    <strong><label for="name"
                                                            class="col-form-label mb-1 text-black">Name</label></strong>
                                                </div>
                                                <div class="col text-center">

                                                    <input type="text" id="username"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="username"
                                                        value="<?php echo e($user->username); ?>" required>
                                                    <strong><label for="username" class="col-form-label mb-1 text-black">
                                                            Username</label></strong>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col text-center">
                                                    <input type="number" id="phone_number"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="phone_number"
                                                        value="<?php echo e($user->phone_number); ?>" required>
                                                    <strong><label for="phone" class="col-form-label mb-1 text-black">Phone
                                                            Number</label></strong>
                                                    <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                                        <span class="text-danger ml-3">
                                                            <strong>Invalid phone number!</strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col text-center">
                                                    <select class="custom-select text-center" id="gender" name="gender"
                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                        <option selected><?php echo e($user->gender); ?></option>
                                                        <?php if($user->gender == 'Male'): ?>
                                                            <option value="Female">
                                                                Female
                                                            </option>
                                                        <?php else: ?>
                                                            <option value="Male">
                                                                Male
                                                            </option>
                                                        <?php endif; ?>
                                                    </select>
                                                    <strong><label for="gender" class="col-form-label mb-1 text-black">Gender
                                                        </label></strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center ">
                                                    <input type="address" id="address"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center " name="address"
                                                        value="<?php echo e($user->address); ?>" required>
                                                    <strong><label for="address"
                                                            class="col-form-label mb-1 text-black">Address</label></strong>
                                                </div>
                                            </div>
                                            <div class="col text-center mt-3">
                                                <button type="submit" class="btn w-50 text-white" id="edit"
                                                    style="background-color: #21791A;" disabled>Save
                                                    changes</button>
                                            </div>
                                            <div class="text-center mt-2"> <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal-newpass">Change
                                                    password?</a></div>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="modal fade" id="exampleModal-newpass" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Changing password of <?php echo e($user->name); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <center>
                            <form method="POST" action="<?php echo e(route('admin.add_user.change',$user->id )); ?>">
                                <?php echo csrf_field(); ?>
                                 <?php echo method_field('PUT'); ?>
                                <div class="modal-body w-50">
                                 <input type="id" class="form-control" name="id_pass" value="<?php echo e($user->id); ?>" hidden>
                                    <div class="input-group mb-3" style="position: relative;">
                                        <span class="input-group-text"><i class="fa fa-key" style="font-size:24px"></i></span>
                                        <input type="password" id="new" class="form-control" placeholder="New Password"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                            name="new_password" required>
                                        <i class="fa fa-eye-slash mt-1" id="newpass" onclick="newpass()"
                                            style="font-size:24px; z-index:5; margin-left:90%;  position:absolute;"></i>
                                    </div>
                                    <div class="input-group mb-3" style="position: relative;">
                                        <span class="input-group-text"><i class="fa fa-key" style="font-size:24px"></i></span>
                                        <input type="password" id="confirm" class="form-control" placeholder="Confirm Password"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                            name="confirm_password" required>
                                        <i class="fa fa-eye-slash mt-1" id="conf" onclick="confirm()"
                                            style="font-size:24px; z-index:5; margin-left:90%;  position:absolute;"></i>
                                    </div>
                                    <div>
                                        <button id="change_button" type="submit" class="btn w-50 text-white"
                                            style="background:#21791A;">Update Password</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </center>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.resort_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/admin/add_user_edit.blade.php ENDPATH**/ ?>