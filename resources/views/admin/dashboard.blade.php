@extends('sideNav.side_navbar')

@section('dashboard')
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
                    title: 'Nationality'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);


            }

            function barChart() {
                var data = google.visualization.arrayToDataTable([
                    ['resort_id', 'guest'],

                    <?php echo $barData; ?>
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

        <div class="main-wrapper main-wrapper-1">


            <!-- Main Content -->
            <div class="main-content">


                <div class="row">
                    <div class="col-sm-4">
                        <div class="card bg-warning">
                            <div class="card-body text-center">
                                <h5 class="card-title">Numbers of tourist in all resorts a day</h5>
                                <h3>43</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-info">
                            <div class="card-body text-center">
                                <h5 class="card-title">Numbers of tourist in all resorts a month</h5>
                                <h3>960</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-success">
                            <div class="card-body text-center">
                                <h5 class="card-title">Numbers of tourist in all resorts a year</h5>
                                <h3>11,520</h3>

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
    </body>


@endsection
