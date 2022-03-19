

<?php $__env->startSection('addUser'); ?>
    <?php if(auth()->guard()->check()): ?>
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                <?php if(session()->has('status')): ?>
                    <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky" role="alert">
                        <?php echo e(session()->get('status')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->has('message_success')): ?>
                    <div id="alert_message" class="alert alert-success  alert-dismissible fade w-25 show sticky" role="alert">
                        <?php echo e(session()->get('message_success')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->has('message')): ?>
                    <div id="alert_message" class="alert alert-success  alert-dismissible fade w-25 show sticky" role="alert">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="container">
                                        <div class="main justify-align-center">
                                            <h4 style="text-align: center; color:black">Users List</h4>
                                            <br>
                                            <div class="input-group mt-2 w-100 ml-4">
                                                <input type="search" id="myInput" class="form-control border border-success"
                                                    placeholder="Search" aria-label="Search">
                                                <div class="input-group-append">
                                                </div>
                                                <div class="row mr-3">
                                                    <div class="col">
                                                        <span class="float-right"> <?php echo $users->links(); ?></span>
                                                        <a class="btn p-2 text-white" id="btn_add"
                                                            style="background-color:  #21791A"
                                                            href="<?php echo e(route('admin.add_users')); ?>">+ Add New User</a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-header">
                                                </div>
                                                <div class="card-body text-center cont">
                                                    <table class="table">
                                                        <thead class="table"
                                                            style="background-color: #21791A; text-align:center">
                                                            <tr>
                                                                <th scope="col" class="text-white">Name</th>
                                                                <th scope="col" class="text-white">Email Address</th>
                                                                <th scope="col" class="text-white">Phone Number</th>
                                                                <th scope="col" class="text-white">Gender</th>
                                                                <th scope="col" class="text-white">Address</th>
                                                                <th scope="col" class="text-white">Role</th>
                                                                <th scope="col" class="text-white">Status</th>
                                                                <th scope="col" class="text-white">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                            <?php if(isset($users)): ?>
                                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(Auth::user()->type != $user->type): ?>
                                                                        <tr class="tr">
                                                                            <td><?php echo e($user->name); ?></td>
                                                                            <td><?php echo e($user->email); ?></td>
                                                                            <td><?php echo e($user->phone_number); ?></td>
                                                                            <td><?php echo e($user->gender); ?></td>
                                                                            <td><?php echo e($user->address); ?></td>
                                                                            <td><?php echo e($user->type); ?></td>
                                                                            <td>
                                                                                <?php if($user->status == 'enable'): ?>
                                                                                    <a href="<?php echo e(url('status_update', $user->id)); ?>"
                                                                                        class="btn btn-success btn-sm text-white"><?php echo e($user->status); ?></a>
                                                                                <?php else: ?>
                                                                                    <a href="<?php echo e(url('status_update', $user->id)); ?>"
                                                                                        class="btn btn-danger btn-sm text-white"><?php echo e($user->status); ?></a>
                                                                                <?php endif; ?>
                                                                            <td>
                                                                                <a
                                                                                    href="<?php echo e(route('admin.add_user_edit', $user->id)); ?>"><i
                                                                                        data-feather="edit"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                    <?php if($user->count() == 1): ?>
                                                        <div class="text-center">
                                                            <img src="<?php echo e(asset('assets/img/no_datas.PNG')); ?>" alt=""
                                                                srcset=""><br>
                                                            <p>No data.</p>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="p text-center">
                                                        <img src="<?php echo e(asset('assets/img/no_data.PNG')); ?>" alt=""
                                                            srcset=""><br>
                                                        <p>No results found.</p>
                                                    </div>
                                                    <span class="float-right"> <?php echo $users->links(); ?></span>
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

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/admin/add_user.blade.php ENDPATH**/ ?>