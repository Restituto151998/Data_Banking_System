

<?php $__env->startSection('voda'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <div class="row">
                <div class="co-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <?php if(Auth::user()->type == 'ADMIN'): ?>
                                <a href="<?php echo e(route('admin.resort_list')); ?>" id="back">
                                    <i data-feather="arrow-left"></i>
                                </a>
                            <?php endif; ?>
                            <a href="#" onclick="print()" class="print float-right mb-4 ml-3">print<i
                                    data-feather="printer"></i></a>                    
                                <h4 class="mt-3 text-center"><?php echo e($resorts->resort_name); ?> </h4>
                                <form method="post" enctype="multipart/form-data" id="date" class="pull-right"
                                    action="<?php echo e(url('/resort_list/resort_guest', $resorts->id)); ?>">
                                    <?php echo csrf_field(); ?>

                                    <input name="id" value="<?php echo e($resorts->id); ?>" hidden>
                                    <?php $__empty_1 = true; $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <label>starting date:</label><input type="date" name="from" class="from ml-2 mr-3"
                                            value="<?php echo e($date->from); ?>">
                                        <label>date end: </label><input type="date" name="to" class="to ml-2"
                                            value="<?php echo e($date->to); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <label>starting date: </label><input type="date" name="from" class="from ml-2 mr-3">
                                        <label>date end: </label><input type="date" name="to" class="to ml-2">

                                    <?php endif; ?>
                                    <button type="submit" id="update-btn" class="btn btn-sm ml-3 text-light"
                                        style="background-color: #21791A;" disabled>
                                        update date
                                    </button>
                                </form>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="card-body cont" id="scroll">
                                    <table class="table" id="table">
                                        <thead class="table" style="background-color: #21791A;">
                                            <tr>
                                                <th scope="col" style="border-top-left-radius:10px 10px;"
                                                    class="text-white">Full Name</th>
                                                <th scope="col" class="text-white">Gender</th>
                                                <th scope="col" class="text-white">Address</th>
                                                <th scope="col" class="text-white">Phone Number</th>
                                                <th scope="col" class="text-white">Nationality</th>
                                                <th scope="col" class="text-white">Temparature</th>
                                                <th scope="col" class="text-white">Time Use</th>
                                                <th scope="col" class="text-white">Purpose</th>
                                                <th scope="col" class="text-white">Date Registered</th>
                                                <th scope="col" style="border-top-right-radius:10px 10px;"
                                                    class="sta text-white">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php $__currentLoopData = $guests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="tr">
                                                    <td><?php echo e($guest->full_name); ?></td>
                                                    <td><?php echo e($guest->gender); ?></td>
                                                    <td><?php echo e($guest->address); ?></td>
                                                    <td><?php echo e($guest->phone_number); ?></td>
                                                    <td><?php echo e($guest->nationality); ?></td>
                                                    <td><?php echo e($guest->temperature); ?></td>
                                                    <td><?php echo e($guest->time_use); ?></td>
                                                    <td><?php echo e($guest->purpose); ?></td>
                                                    <td><?php echo e(date('m-d-Y', strtotime($guest->created_at))); ?></td>
                                                    <td class="sta">
                                                        <?php if(Auth::user()->type == 'ADMIN'): ?>
                                                            <?php if($guest->status == 'pending'): ?>
                                                                <button class="btn btn-warning  text-white btn-sm"
                                                                    type="button">
                                                                    <?php echo e($guest->status); ?>

                                                                </button>
                                                            <?php endif; ?>
                                                            <?php if($guest->status == 'accepted'): ?>
                                                                <button class="btn btn-success text-white btn-sm"
                                                                    type="button">
                                                                    <?php echo e($guest->status); ?>

                                                                </button>
                                                            <?php endif; ?>
                                                            <?php if($guest->status == 'cancelled'): ?>
                                                                <button class="btn btn-danger text-white btn-sm"
                                                                    type="button">
                                                                    <?php echo e($guest->status); ?>

                                                                </button>
                                                            <?php endif; ?>
                                                            <?php if($guest->status == 'left'): ?>
                                                                <button class="btn btn-secondary text-white btn-sm"
                                                                    type="button">
                                                                    <?php echo e($guest->status); ?>

                                                                </button>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php if(Auth::user()->type == 'STAFF'): ?>
                                                            <?php if($guest->status == 'left'): ?>
                                                                <button class="btn btn-secondary btn-sm" type="button">
                                                                    <?php echo e($guest->status); ?>

                                                                </button>
                                                            <?php endif; ?>
                                                            <div class="btn-group">
                                                                <?php if($guest->status == 'pending'): ?>
                                                                    <button
                                                                        class="btn btn-warning btn-sm btn-lg dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <?php echo e($guest->status); ?>

                                                                    </button>
                                                                <?php endif; ?>
                                                                <?php if($guest->status == 'accepted'): ?>
                                                                    <button
                                                                        class="btn btn-success btn-sm btn-lg dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <?php echo e($guest->status); ?>

                                                                    </button>
                                                                <?php endif; ?>
                                                                <?php if($guest->status == 'cancelled'): ?>
                                                                    <button
                                                                        class="btn btn-danger btn-sm btn-lg dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <?php echo e($guest->status); ?>

                                                                    </button>
                                                                <?php endif; ?>
                                                                <div class="dropdown-menu text-center">
                                                                    <?php if($guest->status == 'pending'): ?>
                                                                        <a href="<?php echo e(url('status_accept', $guest->id)); ?>"
                                                                            class="btn btn-success btn-sm text-white">accept</a>
                                                                        <a href="<?php echo e(url('status_cancel', $guest->id)); ?>"
                                                                            class="btn btn-danger btn-sm text-white">cancel</a>
                                                                    <?php endif; ?>
                                                                    <?php if($guest->status == 'accepted'): ?>
                                                                        <a href="<?php echo e(url('status_leave_delete', $guest->id)); ?>"
                                                                            class="btn btn-secondary btn-sm text-white">leave</a>
                                                                    <?php endif; ?>
                                                                    <?php if($guest->status == 'cancelled'): ?>
                                                                        <a href="<?php echo e(url('status_leave_delete', $guest->id)); ?>"
                                                                            class="btn btn-danger btn-sm text-white">delete</a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="p text-center">
                                        <img src="<?php echo e(asset('assets/img/no_data.PNG')); ?>" alt="" srcset=""><br>
                                        <p>No results found.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.resort_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/resorts/resort_guest.blade.php ENDPATH**/ ?>