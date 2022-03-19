

<?php $__env->startSection('adminDashboard'); ?>
    <html>

    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);
            google.charts.setOnLoadCallback(barChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Nationality', 'count'],
                    <?php
                    echo $chartData; ?>
                ]);

                var options = {
                    title: 'Nationality',
                    chartArea: {
                        left: "5%",
                        width: 400, 
                        height: 300,
                    },
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }

            function barChart() {
                var data = google.visualization.arrayToDataTable([
                    ['resort_id', 'guest'],
                    <?php
                    echo $barData; ?>
                ]);

                var options = {
                    title: 'Number of tourists in every resort',
                    bar: {
                        groupWidth: "95%"
                    },
                    legend: {
                        position: "none"
                    },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("barGraph"));
                chart.draw(data, options);
            }

        </script>
    </head>

    <body>
        <?php if(auth()->guard()->check()): ?>
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
                                    <h5 class="card-title">Number of Staffs</h5>
                                    <h3><?php echo e($numberOfUser - 1); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-success">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Number of Resorts </h5>
                                    <h3><?php echo e($numberOfResort); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card bg-warning">
                                <div class="card-body d-flex">
                                    <h6 class="w-50">Pending:</h6>
                                    <h4><?php echo e($pending); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-success">
                                <div class="card-body d-flex">
                                    <h6 class="w-50">accepted:</h6>
                                    <h4><?php echo e($accepted); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-danger">
                                <div class="card-body d-flex">
                                    <h6 class="w-50">Cancelled:</h6>
                                    <h4><?php echo e($cancelled); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-secondary">
                                <div class="card-body d-flex">
                                    <h6 class="w-50">Left:</h6>
                                    <h4><?php echo e($left); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div id="piechart" style="width: 500px; height: 400px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div id="barGraph" style="width: 500px; height: 400px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </body>

    </html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sideNav.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System1\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>