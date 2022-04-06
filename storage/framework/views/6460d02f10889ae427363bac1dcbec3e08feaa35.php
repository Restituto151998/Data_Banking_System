

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
                                                    <input type="name"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="name"
                                                        value="<?php echo e($user->name); ?>">
                                                    <strong><label for="name"
                                                            class="col-form-label mb-1 text-black">Name</label></strong>
                                                </div>
                                                <div class="col text-center">

                                                    <input type="address"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="email"
                                                        value="<?php echo e($user->email); ?>">
                                                    <strong><label for="email" class="col-form-label mb-1 text-black">
                                                            Email Address</label></strong>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col text-center">
                                                    <input type="phone_number"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="phone_number"
                                                        value="<?php echo e($user->phone_number); ?>">
                                                    <strong><label for="phone" class="col-form-label mb-1 text-black">Phone
                                                            Number</label></strong>
                                                </div>
                                                <div class="col text-center">
                                                    <select class="custom-select text-center" id="inputGroupSelect01"
                                                        name="gender"
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
                                                    <input type="phone_number"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center " name="address"
                                                        value="<?php echo e($user->address); ?>">
                                                    <strong><label for="address"
                                                            class="col-form-label mb-1 text-black">Address</label></strong>
                                                </div>
                                            </div>
                                            <div class="row mb-3" id="change-password" hidden="true">
                                                <div class="col text-center">
                                                    <input type="password"
                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="new_password">
                                                    <strong><label for="email" class="col-form-label mb-1 text-black">New
                                                            Password</label></strong>
                                                </div>
                                                <div class="col text-center">
                                                    <input type="password"
                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="confirm_password">
                                                    <strong><label for="password" class="col-form-label mb-1 text-black">Confirm
                                                            Password</label></strong>
                                                </div>
                                            </div>
                                            <div class="col text-center mt-3">
                                                <button type="submit" class="btn w-50 text-white" id="btn-edit" style="background-color: #21791A;">Save
                                                    changes</button>
                                            </div>
                                            <div class="text-center mt-2"> <a href="#" id="btn-password">Change
                                                    password?</a></div>
                                        </form>
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

<?php echo $__env->make('sideNav.resort_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/admin/add_user_edit.blade.php ENDPATH**/ ?>