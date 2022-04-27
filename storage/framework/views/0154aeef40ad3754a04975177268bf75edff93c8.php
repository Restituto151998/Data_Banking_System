

<?php $__env->startSection('addResort'); ?>
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
                                <h4 style="text-align: center; color:black">Add New User</h4>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card-body text-center">
                                            <form action="<?php echo e(route('admin.add_user')); ?>" method="post" id="form_add_user">
                                                <?php echo csrf_field(); ?>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="name"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Full Name"
                                                                value="<?php echo e(old('name')); ?>" name="name" required>
                                                        </div>
                                                        <div class="col">
                                                            <input type="username"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Username"
                                                                name="username" value="<?php echo e(old('username')); ?>"
                                                                autocomplete="username" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <input type="number"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Phone Number"
                                                                name="phone_number" value="<?php echo e(old('phone_number')); ?>"
                                                                required>
                                                            <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="text-danger">
                                                                    <strong>Invalid phone number!</strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="col">
                                                            <select class="custom-select text-center" id="inputGroupSelect01"
                                                                name="gender"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                <option value="<?php echo e(old('gender')); ?>" selected>
                                                                    <?php if(empty(old('gender'))): ?>
                                                                       Select gender...
                                                                    <?php else: ?>
                                                                        <?php echo e(old('gender')); ?>

                                                                    <?php endif; ?>
                                                                </option>
                                                                <option value="Male">
                                                                    Male
                                                                </option>
                                                                <option value="Female">
                                                                    Female
                                                                </option>
                                                            </select>
                                                            <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="text-danger">
                                                                    <strong>Please select gender!</strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <input type="password"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Password"
                                                                name="password" value="<?php echo e(old('password')); ?>"
                                                                autocomplete="password" required>
                                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="text-danger">
                                                                    <strong>Password minimum 8 characters!</strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>

                                                        <div class="col">
                                                            <select class="custom-select text-center" id="inputGroupSelect01"
                                                                name="assigned_staff"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                     <option  name="id" value="<?php echo e(old('assigned_staff')); ?>" selected>
                                                                    <?php if(empty(old('assigned_staff'))): ?>
                                                                       Assign to...
                                                                    <?php else: ?>
                                                                        <?php echo e(old('assigned_staff')); ?>

                                                                    <?php endif; ?>
                                                                </option>
                                                                <?php $__currentLoopData = $resorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e(json_encode($resort)); ?>">
                                                                        <?php echo e($resort->resort_name); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="Not applicable to assign">
                                                                    Not applicable to assign
                                                                </option>
                                                            </select>
                                                            <?php $__errorArgs = ['assigned_staff'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="text-danger">
                                                                    <strong>Please select a resort!</strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <input type="text"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Address"
                                                                name="address" value="<?php echo e(old('address')); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <button type="submit" class="btn text-white w-50"
                                                        style="background-color:  #21791A">Add User</button>
                                                </div>
                                            </form>
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

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/admin/add_users.blade.php ENDPATH**/ ?>