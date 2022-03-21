

<?php $__env->startSection('profile'); ?>
    <?php if(auth()->guard()->check()): ?>
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                <?php if(session()->has('status')): ?>
                    <div id="alert_message" class="alert alert-success alert-dismissible fade w-25 show sticky" role="alert">
                        <?php echo e(session()->get('status')); ?> ✔️
                    </div>
                <?php endif; ?>
                <?php if(session()->has('message')): ?>
                    <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky" role="alert">
                        <?php echo e(session()->get('message')); ?> ✔️
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <div class="row">
                                            <div class="col text-center">
                                                <form action="<?php echo e(url('/profile')); ?>" method="POST"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group mt-4">
                                                        <?php if(Auth::user()->image): ?>
                                                            <img id="preview-profile-image"
                                                                src="<?php echo e(asset('storage/images/' . Auth::user()->image)); ?>"
                                                                alt="preview image" style="width:200px; height: 200px;"
                                                                class="rounded-circle">
                                                        <?php endif; ?>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="profile">
                                                                    <i data-feather="camera"
                                                                        style="position:unset; margin-right: -172px; margin-top: -30px;"></i>
                                                                </label>
                                                                <input type="file" name="image" placeholder="Choose image" id="profile"
                                                                    hidden>
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
                                                        <div class="form-group">
                                                            <button type="submit" class="btn  text-center text-white"
                                                                style="background-color:  #21791A; margin-top: -20px;" id="change_profile"
                                                                disabled>Change Profile</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <h4 style="text-align: center; color:black">Profile Information</h4>
                                        <div class="card-body">
                                            <div class="row mt-2 ">
                                                <div class="col text-center">
                                                    <input type="text" value="<?php echo e(Auth::user()->name); ?>"
                                                        style="font-size:20px; background-color:transparent;border-left-color:transparent; border-bottom-color:green;border-right-color:transparent;border-top-color:transparent"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Name</label>
                                                </div>
                                                <div class="col text-center">
                                                    <input type="text" value="<?php echo e(Auth::user()->email); ?> "
                                                    style="font-size:20px; background-color:transparent;border-left-color:transparent; border-bottom-color:green;border-right-color:transparent;border-top-color:transparent"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Email Address</label>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col text-center">
                                                    <input type="number" value="<?php echo e(Auth::user()->phone_number); ?>"
                                                    style="font-size:20px; background-color:transparent;border-left-color:transparent; border-bottom-color:green;border-right-color:transparent;border-top-color:transparent"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Phone Number</label>
                                                </div>
                                                <div class="col text-center">
                                                    <input type="text" value="<?php echo e(Auth::user()->gender); ?>"
                                                    style="font-size:20px; background-color:transparent;border-left-color:transparent; border-bottom-color:green;border-right-color:transparent;border-top-color:transparent"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Gender</label>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col text-center">
                                                    <input type="text" value="<?php echo e(Auth::user()->address); ?>"
                                                    style="font-size:20px; background-color:transparent;border-left-color:transparent; border-bottom-color:green;border-right-color:transparent;border-top-color:transparent"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2 ">
                                            <div class="col text-center mt-3">
                                                <a type="button"
                                                    href="<?php echo e(route('admin.profile.test', ['id' => Auth::user()->id])); ?>"
                                                    id="btn-edit"
                                                    class="btn w-50 text-white" style="background-color:  #21791A"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal<?php echo e(Auth::user()->id); ?>" >
                                                    Edit Information
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-center mt-2 mb-5">
                                                <a class="text" href="<?php echo e(route('auth.passwords.changePassword')); ?>">
                                                    Change password?
                                                </a>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal<?php echo e(Auth::user()->id); ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit
                                                            Information</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="post" action="<?php echo e(route('admin.profile')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <div class="modal-body">
                                                            <input type="text" value="<?php echo e(Auth::user()->id); ?>" hidden>
                                                            <div class="row mt-2">
                                                                <div class="col text-center">
                                                                    <input type="text" value="<?php echo e(Auth::user()->name); ?>"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                        class="form-control ml-2 text-center" name="name"
                                                                        placeholder="Profile name" required>
                                                                    <label
                                                                        class="col-form-label mb-1 text-black"><small>Name</small></label>
                                                                </div>
                                                                <div class="col text-center">
                                                                    <input type="value" value="<?php echo e(Auth::user()->email); ?>"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                        class="form-control ml-2 text-center" name="email"
                                                                        placeholder="Email address" required>
                                                                    <label class="col-form-label mb-1 text-black"><small>Email
                                                                            Adress</small></label>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col text-center">
                                                                    <input type="number"
                                                                        value="<?php echo e(Auth::user()->phone_number); ?>"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                        class="form-control ml-2 text-center"
                                                                        name="phone_number" placeholder="Phone number" required>
                                                                    <label class="col-form-label mb-1 text-black"><small>Phone
                                                                            Number</small> </label>
                                                                </div>
                                                                <div class="col text-center">
                                                                    <select class="custom-select text-center"
                                                                        id="inputGroupSelect01" name="gender"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                        <option selected><?php echo e(Auth::user()->gender); ?></option>
                                                                        <?php if(Auth::user()->gender == 'Male'): ?>
                                                                            <option value="Female">
                                                                                Female
                                                                            </option>
                                                                        <?php else: ?>
                                                                            <option value="Male">
                                                                                Male
                                                                            </option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                    <label
                                                                        class="col-form-label mb-1 text-black"><small>Gender</small>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col text-center">
                                                                    <input type="text" value="<?php echo e(Auth::user()->address); ?>"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                        class="form-control ml-2 text-center" name="address"
                                                                        placeholder="Address" required>
                                                                    <label
                                                                        class="col-form-label mb-1 text-black"><small>Address</small></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col text-center mb-5">
                                                                <button type="submit" class="btn text-white w-50"
                                                                    style="background-color:  #21791A">Save
                                                                    changes</button>
                                                            </div>
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
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/admin/profile.blade.php ENDPATH**/ ?>