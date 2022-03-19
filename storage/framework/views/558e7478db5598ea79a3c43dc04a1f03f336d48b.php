
<?php $__env->startSection('search'); ?>
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <?php if(session()->has('status')): ?>
                <div class="alert alert-success alert-dismissible fade  show" role="alert">
                    <?php echo e(session()->get('status')); ?>


                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(session()->has('message_success')): ?>
                <div class="alert alert-success alert-dismissible fade  show" role="alert">
                    <?php echo e(session()->get('message_success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="<?php echo e(route('admin.add_user')); ?>">
                                <i data-feather="arrow-left"></i>
                            </a>
                            <div class="row mt-2">
                                
                                <div class="container">
                                    <div class="main justify-align-center">
                                        
                                        <form class="form-inline" action="/add_user" method="POST" role="search">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="input-group w-100 ml-4 mt-3">
                                                <input type="search" class="form-control border border-success"
                                                    name='search' placeholder="Search" aria-label="Search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success mr-5" type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                                <div class="row mr-3">
                                                    <div class="col">
                                                        
                                                        <a class="btn p-2" style="background-color:#21791A; color:white"
                                                            href="<?php echo e(route('admin.add_users')); ?>">+ Add User</a>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>

                                            
                                        </form>

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            
                                            <div class="card-header">
                                            </div>
                                            <div class="card-body">
                                                <table class="table ">

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
                                                    <tbody class="text-center">
                                                        <?php if(isset($users)): ?>
                                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(Auth::user()->type != $user->type): ?>
                                                                    <tr>
                                                                        <td><?php echo e($user->name); ?></td>
                                                                        <td><?php echo e($user->email); ?></td>
                                                                        <td><?php echo e($user->phone_number); ?></td>
                                                                        <td><?php echo e($user->gender); ?></td>
                                                                        <td><?php echo e($user->address); ?></td>
                                                                        <td><?php echo e($user->type); ?></td>
                                                                        <td>
                                                                            <?php if($user->status == 'enable'): ?>
                                                                                <a href="<?php echo e(url('status_update', $user->id)); ?>"
                                                                                    class="btn btn-success btn-sm text-white">enable</a>
                                                                            <?php else: ?>
                                                                                <a href="<?php echo e(url('status_update', $user->id)); ?>"
                                                                                    class="btn btn-danger btn-sm text-white">disable</a>
                                                                            <?php endif; ?>
                                                                        <td>
                                                                            <a
                                                                                href="<?php echo e(route('admin.add_user_edit', $user->id)); ?>"><i
                                                                                    data-feather="edit"></i> </a>
                                                                        </td>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                                <?php if(empty($user)): ?>
                                                    <div class="text-center"><img src="../../assets/img/no_data.PNG" alt=""
                                                            srcset=""><br>
                                                        <p>No results found.</p>
                                                    </div>
                                                <?php endif; ?>
                                                <span class="float-right"> <?php echo $users->links(); ?></span>
                                                <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.resort_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/resorts/search.blade.php ENDPATH**/ ?>