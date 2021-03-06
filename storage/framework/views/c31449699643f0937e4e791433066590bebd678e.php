

<?php $__env->startSection('staffDashboard'); ?>
    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Nationality', 'count'],
                    <?php
                    echo $chartData; ?>
                ]);

                var options = {
                    title: 'Nationality'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }

        </script>
    </head>

    <body>
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card bg-warning">
                            <div class="card-body text-center">
                                <h5 class="card-title">Number of Guests</h5>
                                <h3><?php echo e($numberOfGuest); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-info">
                            <div class="card-body text-center">
                                <h5 class="card-title">Number of Filipinos</h5>
                                <h3><?php echo e($filipino); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-success">
                            <div class="card-body text-center">
                                <h5 class="card-title">Number of Foreigners</h5>
                                <h3><?php echo e($foreigner); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row mt-4 text-center">
                                    <div id="piechart" style="width: 500px; height: 400px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row mt-4 ">
                                    <div class="col">
                                        <div class="row-sm-4">
                                            <div class="card bg-warning">
                                                <div class="card-body d-flex">
                                                    <h5 class="w-50">Pending:</h5>
                                                    <h2><?php echo e($pending); ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-sm-4">
                                            <div class="card bg-success">
                                                <div class="card-body d-flex">
                                                    <h5 class="w-50">Accepted:</h5>
                                                    <h2><?php echo e($accepted); ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-sm-4">
                                            <div class="card bg-danger">
                                                <div class="card-body d-flex">
                                                    <h5 class="w-50">Cancelled:</h5>
                                                    <h2><?php echo e($cancelled); ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-sm-4">
                                            <div class="card bg-secondary ">
                                                <div class="card-body d-flex">
                                                    <h5 class="w-50">Left:</h5>
                                                    <h2><?php echo e($left); ?></h2>
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
    </body>

    </html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/staff/dashboard.blade.php ENDPATH**/ ?>