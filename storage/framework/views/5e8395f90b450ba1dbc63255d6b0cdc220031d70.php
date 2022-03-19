

<?php $__env->startSection('resort_search'); ?>
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
                            <a href="<?php echo e(route('admin.resort_list')); ?>"> 
                                <i data-feather="arrow-left"></i>
                            </a>
                            <div class="row mt-2">
                                <div class="container">
                                    <div class="main justify-align-center">
                                                            
                                            
                                        <form class="form-inline" action="/resort_list/search" method="POST" role="search">
                                            <?php echo e(csrf_field()); ?>


                                            <div class="input-group w-100 ml-4 mt-3">
                                                <input type="search"
                                                    class="form-control border border-success"
                                                    name='search' placeholder="Search" aria-label="Search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success mr-4" type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            

                                        </form>
                                            
                                            
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            
                                                <div class="card-header">
                                                </div>
                                                <div class="card-body">
                                                    <table class="table">
                                                        <thead class="table" style="background-color: #21791A; text-align:center">
                                                            <tr>
                                                                <th scope="col" class="text-white">
                                                                    Resort Name</th>
                                                                <th scope="col" class="text-white">
                                                                    Assigned Staff</th>
                                                                <th scope="col" class="text-white">
                                                                    Status</th>
                                                                <th scope="col" class="text-white">
                                                                    Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            <?php if(isset($resort_lists)): ?>
                                                            <?php echo e($resort_lists); ?>

                                                            <?php $__currentLoopData = $resort_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($r->resort_name); ?></td>
                                                                    <td><?php echo e($r->assigned_staff); ?></td>
                                                                    
                                                                    <td>
                                                                        <?php if($r->status == 'open'): ?>
                                                                            <a href="<?php echo e(url('resorts_status_update', $r->id)); ?>"
                                                                                class="btn btn-success btn-sm text-white">Open</a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e(url('resorts_status_update', $r->id)); ?>"
                                                                                class="btn btn-danger btn-sm text-white">Closed</a>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="<?php echo e(route('admin.resort_list', $r->id)); ?>"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModalCenter<?php echo e($r->id); ?>"><i
                                                                                data-feather="edit"></i> </a> | <a
                                                                            href="<?php echo e(route('resorts.resort_guest', $r->resort_id)); ?>"><i
                                                                                data-feather="eye"></i> </a>
                                                                    </td>
                                                                </tr>
                                                                
                                                                <div class="modal fade" id="exampleModalCenter<?php echo e($r->id); ?>"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <form method="post"
                                                                        action="<?php echo e(route('admin.resort_list')); ?>">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('PUT'); ?>
                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalCenterTitle">
                                                                                        Modal title</h5>
                                                                                    <a type="button" href="/resort_list"
                                                                                        aria-label="Close"><span class="w-25"
                                                                                            aria-hidden="true">&times;</span></a>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <input type="text" class="form-control"
                                                                                        id="formGroupExampleInput" name="resort_id"
                                                                                        value="<?php echo e($r->id); ?>" hidden>
                                                                                    <div class="row mt-5">
                                                                                        <div class="col-md-12">
                                                                                            <input type="text" class="form-control"
                                                                                                id="formGroupExampleInput"
                                                                                                name="resort_name"
                                                                                                value="<?php echo e($r->resort_name); ?>">
                                                                                            <label
                                                                                                for="formGroupExampleInput">Resort
                                                                                                Name</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row mt-5">
                                                                                        <div class="col-md-12">
                                                                                            <input type="name" class="form-control"
                                                                                                id="formGroupExampleInput"
                                                                                                name="assigned_staff"
                                                                                                value="<?php echo e($r->assigned_staff); ?>"
                                                                                                >
                                                                                            <label
                                                                                                for="formGroupExampleInput">Assigned
                                                                                                Staff</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row mt-5">
                                                                                        <div class="col-md-12">
                                                                                            <input type="text" class="form-control"
                                                                                                id="formGroupExampleInput"
                                                                                                name="status"
                                                                                                value="<?php echo e($r->status); ?>">
                                                                                            <label
                                                                                                for="formGroupExampleInput">Status
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">

                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Save
                                                                                        changes</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                    <span class="float-right"> <?php echo $resort_lists->links(); ?></span>
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

<?php echo $__env->make('sideNav.resort_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/resorts/resort_search.blade.php ENDPATH**/ ?>