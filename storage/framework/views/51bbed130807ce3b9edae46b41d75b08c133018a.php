

<?php $__env->startSection('resortList'); ?>
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <?php if(session()->has('status')): ?>
                <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky" role="alert">
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
                                <div class="col-12">
                                    <div class="main justify-align-center">
                                        <h4 style="text-align: center; color:black">Resort List</h4>
                                        <div class="card-body">
                                            <?php if(isset($resort_lists)): ?>
                                                <div class="container">
                                                    <div class="main w-100 mb-1 justify-align-center">
                                                        <div class="input-group">
                                                            <input type="search" id="myInput"
                                                                class="border border-success form-control w-75"
                                                                name='search' placeholder="Search">
                                                            <div class="input-group-append">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center cont">
                                                    <table class="table">
                                                        <thead class="table"
                                                            style="background-color: #21791A; text-align:center">
                                                            <tr>
                                                                <th scope="col" style="border-top-left-radius:10px 10px;" class="text-white">
                                                                    Resort Name</th>
                                                                <th scope="col" class="text-white">
                                                                    Assigned Staff</th>
                                                                <th scope="col" class="text-white">
                                                                    Status</th>
                                                                <th scope="col" style="border-top-right-radius:10px 10px;" class="text-white">
                                                                    Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                            <?php if(isset($resort_lists)): ?>
                                                                <?php $__currentLoopData = $resort_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr class="tr">
                                                                        <td><?php echo e($resort->resort_name); ?></td>
                                                                        <td><?php echo e($resort->assigned_staff); ?></td>
                                                                        <td>
                                                                            <?php if($resort->status == 'open'): ?>
                                                                                <a href="<?php echo e(url('resorts_status_update', $resort->id)); ?>"
                                                                                    class="btn btn-success btn-sm text-white">Open</a>
                                                                            <?php else: ?>
                                                                                <a href="<?php echo e(url('resorts_status_update', $resort->id)); ?>"
                                                                                    class="btn btn-danger btn-sm text-white">Closed</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a
                                                                                href="<?php echo e(route('resorts.resort_guest', $resort->resort_id)); ?>"><i
                                                                                    data-feather="eye"></i> </a> 
                                                                            ◉
                                                                             <a
                                                                                href="<?php echo e(route('admin.resort_list_edit', $resort->resort_id)); ?>"><i
                                                                                    data-feather="edit"></i> </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                    <?php if($resort_lists->count() == 0): ?>
                                                        <div class="text-center" id="no_data">
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
                                                    <span class="float-right"> <?php echo $resort_lists->links(); ?></span>
                                                </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/admin/resort_list.blade.php ENDPATH**/ ?>