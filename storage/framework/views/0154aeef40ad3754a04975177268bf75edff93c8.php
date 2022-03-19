

<?php $__env->startSection('addResort'); ?>
    <?php if(auth()->guard()->check()): ?>
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                <?php if(session()->has('message_fail')): ?>
                    <div id="alert_message" class="alert alert-danger alert-dismissible fade w-25 show sticky" role="alert">
                        <?php echo e(session()->get('message_fail')); ?>

                    </div>
                <?php endif; ?>
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
                                            <?php if(session('status')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo e(session('status')); ?>

                                                </div>
                                            <?php endif; ?>
                                            <div class="card-body">
                                                <form action="<?php echo e(route('admin.add_user')); ?>" method="post" id="form_add_user">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="name"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Full Name" name="name" required>
                                                            
                                                        </div>
                                                        <div class="col">
                                                            <input type="email"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Email Address" name="email" required>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <input type="number"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Phone Number" name="phone_number"
                                                                required>
                                                            
                                                        </div>
                                                        <div class="col">
                                                           <select class="custom-select text-center" id="inputGroupSelect01"
                                                                name="gender"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                <option selected>Select gender...</option>
                                                              
                                                                    <option value="Male">
                                                                        Male
                                                                    </option>
                                                                    <option value="Female">
                                                                        Female
                                                                    </option>
                                                                    
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <input type="password"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Password" name="password" required>
                                                            
                                                        </div>
                                                        <div class="col">
                                                            <select class="custom-select text-center" id="inputGroupSelect01"
                                                                name="assigned_staff"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                <option name="id" selected>Assign to...</option>
                                                                <?php $__currentLoopData = $resorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e(json_encode($resort)); ?>">
                                                                        <?php echo e($resort->resort_name); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <input type="text"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Address" name="address" required>
                                                            
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
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/admin/add_users.blade.php ENDPATH**/ ?>