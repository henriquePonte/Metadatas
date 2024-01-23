
@extends('layouts.autenticado')

<style>


    .container {

        max-width: 1200px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .row {
        display: flex;
        justify-content: space-between;
    }

    .col-sm {
        flex: 1;
        padding: 20px;
        background-color: #f9f9f9;
        margin: 10px;
        border-radius: 8px;
    }

    h1 {
        color: #333;
    }


    strong {
        font-weight: bold;
        color: #333;
    }
    ul{
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

</style>
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Ultimos Documentos Modificados</h1>

                    @php
                        $documents = app(\App\Services\DashboardService::class)->getLastSevenDocuments();
                    @endphp

                @if ($documents->isEmpty())
                <p>No documents found in the last 3 days.</p>
                @else
                <ul>
                    @foreach ($documents as $document)
                        <li>
                            Document ID: {{ $document->id }}<br>
                            Criado em : {{ $document->created_at }}<br>
                        </li>
                    @endforeach
                </ul>

                @endif
            </div>
            <div class="col-sm">
                <h1>Memoria Utilizada</h1>
                <html>
                    <head>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        <script type="text/javascript">
                            google.charts.load("current", {packages:["corechart"]});
                            google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                                                    // Make an AJAX request to the Laravel route
                                                    $.ajax({
                                                        url: '/dashboard/get-file-sizes',
                                                        dataType: 'json',
                                                        success: function(data) {
                                                            var chartData = [['Memoria', 'Valor memoria']];
                                                            $.each(data, function(key, value) {
                                                                chartData.push([key, value]);
                                                            });

                                                            var chartDataArray = google.visualization.arrayToDataTable(chartData);

                                                            var options = {
                                                                is3D: true,
                                                            };

                                                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                                                            chart.draw(chartDataArray, options);
                                                        }
                                                    });
                                                }
                                            </script>
                                        </head>
                                        <body>
                                            <div id="piechart_3d" style="width: 400px; height: 600px;"></div>
                                        </body>
                                        </html>
                                    </div>
                                </div>
            </div>
        </div>
    </div>
@endsection
