

<?php $__env->startSection('qr-code'); ?>
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <?php if(Auth::user()->type == 'STAFF'): ?>
                <?php if(Auth::user()->resortList->status == 'closed'): ?>
                    <span>This tab is restricted to use. to use it. you may request the admin to open this resort.</span>
                <?php else: ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card" style="width:500px;height:400px">
                                    <div class="card-body text-center mb-3">
                                        <img style="width: 50%" src="data:image/png;base64, <?php echo base64_encode(
    QrCode::format('png')->merge('assets/img/logo.png', 0.3, true)->size(200)->errorCorrection('H')->generate('alcoy-data-banking.herokuapp.com/resort-alcoy-registration'),
); ?> "
                                            id="qr" hidden>
                                        <p id="qr-text" hidden>Please scan the QR-Code to register.</p>
                                        <a href="data:image/png;base64, <?php echo base64_encode(
    QrCode::format('png')->merge('assets/img/logo.png', 0.3, true)->size(200)->errorCorrection('H')->generate('alcoy-data-banking.herokuapp.com/resort-alcoy-registration'),
); ?> " class="btn"
                                            id="qr-download" download hidden>
                                            <i class="fa fa-download" hidden></i> Download Qr-Code
                                        </a>
                                        <div id="arrow_down">
                                            <h3 class="mt-5">Click here to generate QR-code</h3>
                                            <img src="<?php echo e(asset('assets/img/arrow_down.png')); ?>" style="height: 250px;">
                                        </div>
                                        <div id="load" hidden>
                                            <ul id="loader">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <p>Generating a QrCode...</p>
                                        </div>
                                    </div>
                                    <button id="generate" class="btn btn-primary" style="margin-top: -70px;">Generate
                                        Qr-code</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card" style="width:500px;height:400px">
                                <div class="card-body text-center mb-3">
                                    <img style="width: 50%" src="data:image/png;base64, <?php echo base64_encode(
    QrCode::format('png')->merge('assets/img/logo.png', 0.3, true)->size(200)->errorCorrection('H')->generate('alcoy-data-banking.herokuapp.com/resort-alcoy-registration'),
); ?> " id="qr"
                                        hidden>
                                    <p id="qr-text" hidden>Please scan the QR-Code to register.</p>
                                    <a href="data:image/png;base64, <?php echo base64_encode(
    QrCode::format('png')->merge('assets/img/logo.png', 0.3, true)->size(200)->errorCorrection('H')->generate('alcoy-data-banking.herokuapp.com/resort-alcoy-registration'),
); ?> " class="btn" id="qr-download"
                                        download hidden>
                                        <i class="fa fa-download" hidden></i> Download Qr-Code
                                    </a>
                                    <div id="arrow_down">
                                        <h3 class="mt-5">Click here to generate QR-code</h3>
                                        <img src="<?php echo e(asset('assets/img/arrow_down.png')); ?>" style="height: 250px;">
                                    </div>
                                    <div id="load" hidden>
                                        <ul id="loader">
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                        <p>Generating a QrCode...</p>
                                    </div>
                                </div>
                                <button id="generate" class="btn btn-primary" style="margin-top: -70px;">Generate
                                    Qr-code</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/resorts/generate_qrcode.blade.php ENDPATH**/ ?>