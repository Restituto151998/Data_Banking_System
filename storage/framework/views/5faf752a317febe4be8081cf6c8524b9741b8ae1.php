

<?php $__env->startSection('register'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <?php if(Auth::user()->resortList->status == 'closed'): ?>
                <span>This tab is restricted to use. to use it. you may request the admin to open this resort.</span>
            <?php else: ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12-md-8">
                            <div class="card">
                                <div class="card-header"><?php echo e(__('Register')); ?></div>
                                <form method="post" enctype="multipart/form-data" id="add_guest"
                                    action="<?php echo e(url('/register')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-body text-center ml-5 mr-5">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" value="<?php echo e(old('full_name')); ?>"
                                                    placeholder="Full Name" name="full_name" required>
                                            </div>
                                            <div class="col">
                                                <select class="custom-select text-center" id="inputGroupSelect01"
                                                    style="background-color:#FFFFFF;border-left-color:#FFFFFF; border-bottom-color:green;border-right-color:#FFFFFF;border-top-color:#FFFFFF"
                                                    name="gender">
                                                    <option value="<?php echo e(old('gender')); ?>" selected>
                                                        <?php if(empty(old('gender'))): ?>
                                                            Select gender
                                                        <?php else: ?>
                                                            <?php echo e(old('gender')); ?>

                                                        <?php endif; ?>
                                                    </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
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
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" value="<?php echo e(old('address')); ?>"
                                                    placeholder="Address" name="address" required>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col">
                                                <input type="number"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" placeholder="Phone Number"
                                                    value="<?php echo e(old('phone_number')); ?>" name="phone_number" required>
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
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" placeholder="Nationality"
                                                    value="<?php echo e(old('nationality')); ?>" name="nationality" required>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" placeholder="Temperature"
                                                    value="<?php echo e(old('temperature')); ?>" name="temperature" required>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col">
                                                <select class="custom-select mt-2 text-center" id="inputGroupSelect01"
                                                    style="background-color:#FFFFFF;border-left-color:#FFFFFF; border-bottom-color:green;border-right-color:#FFFFFF;border-top-color:#FFFFFF"
                                                    name="time_use">
                                                      <option value="<?php echo e(old('time_use')); ?>" selected>
                                                        <?php if(empty(old('time_use'))): ?>
                                                            Select time
                                                        <?php else: ?>
                                                            <?php echo e(old('time_use')); ?>

                                                        <?php endif; ?>
                                                    </option>
                                                    <option value="Daytime use">Daytime use</option>
                                                    <option value="Nighttime use">Nighttime use</option>
                                                </select>
                                                <?php $__errorArgs = ['time_use'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger">
                                                        <strong>Please select time!</strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center mt-2" placeholder="Purpose"
                                                    value="<?php echo e(old('purpose')); ?>" name="purpose" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn text-white w-50 mt-5"
                                                style="background-color:  #21791A">Register</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/staff/register.blade.php ENDPATH**/ ?>