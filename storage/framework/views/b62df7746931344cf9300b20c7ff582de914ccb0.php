
<?php $__env->startSection('content'); ?>

    <body style="background-color: #21791A">
        <div class="container ">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4"
                        id="login">
                        
                        <div class="inline-block">
                            <!-- <div class="card-header justify-content-center pt-4"> -->
                            <div>
                                <img alt="image" src="assets/img/logo.png" class="login-logo rounded-circle" />
                                <h2 class="text-login">Login</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <div class="input-group-append">
                                        <strong><label><i data-feather="mail" class="mt-3"></i> </label></strong>
                                        </button>
                                        <input id="email" type="email"
                                            style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                            class="form-control" name="email"
                                            tabindex="1" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email Address"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-append">
                                        <strong><label><i data-feather="key" class="mt-3"></i> </label></strong>
                                        <input id="password"
                                            style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                            type="password" class="form-control"
                                            name="password" tabindex="2" required autocomplete="Password" placeholder="Password">
                                            <i class="fa fa-eye-slash mt-3"  id="pas" style="font-size:18px;"></i>
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                        <span class="text-danger">
                                            <strong>email and password doesn't match!</strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" tabindex="4" class="w-50 login-btn">
                                        <?php echo e(__('Login')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/auth/login.blade.php ENDPATH**/ ?>