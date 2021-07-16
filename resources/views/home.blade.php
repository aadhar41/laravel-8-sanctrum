@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <?php

                    // echo "<pre>";
                    // print_r($cities);
                    // echo "<br>";
                    // print_r($autowns);
                    // echo "<br>";
                    // print_r($postcodes);
                    // echo "<br>";
                    // print_r($states);
                    // echo "<br>";
                    // die;
                    ?>

                    <div id="chart_div"></div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
        'packages': ['corechart']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            ['Cities', <?php echo $cities; ?>],
            ['Au Towns', <?php echo $autowns; ?>],
            ['Suburbs', <?php echo $postcodes; ?>],
            ['States', <?php echo $states; ?>],
        ]);

        // Set chart options
        var options = {
            'title': 'Total Cities and Au Towns',
            'width': 400,
            'height': 300
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
@endsection