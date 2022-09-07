<?php
/** @var array[] $data */
/** @var array[] $dataProductos */
$chart_data = $data['chart_data'];
$chart_dataProductos = $dataProductos['chart_data'];


?>
@extends('layouts.admin')
@section('title', 'Inicio')
@section('main')
    <section class="container admin">
        <h1>Dashboard</h1>
        <p>Bienvenido al inicio del panel de administración. Desde acá vas a poder editar los contenidos de la página
            y ver información de tu e-commerce.</p>


        <div class="row">
            <div class="chart-container col-md-6">
                <div class="pie-chart-container">
                    <canvas id="pie-chart"></canvas>
                </div>
            </div>

            <div class="chart-container col-md-6">
                <div class="pie-chart-container">
                    <canvas id="productos-chart"></canvas>
                </div>
            </div>
        </div>


        <!-- javascript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            $(function(){
                //get the pie chart canvas
                var cDataProducto = JSON.parse(`<?php echo $chart_dataProductos; ?>`);
                var ctxProducto = $("#productos-chart");

                //pie chart data
                var data = {
                    labels: cDataProducto.label,
                    datasets: [
                        {
                            label: "Productos",
                            data: cDataProducto.data,
                            backgroundColor: [
                                "#804000",
                                "#BF6000",
                                "#FF7F00",
                                "#FF9F40",
                                "#FFBF80",

                            ],
                            borderColor: [
                                "#804000",
                                "#BF6000",
                                "#FF7F00",
                                "#FF9F40",
                                "#FFBF80",
                            ],
                            borderWidth: [1, 1, 1, 1, 1,1,1]
                        }
                    ]
                };

                //options
                var options = {
                    responsive: true,
                    title: {
                        display: true,
                        position: "top",
                        text: "Productos comprados",
                        fontSize: 18,
                        fontColor: "#111"
                    },
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: "#333",
                            fontSize: 16
                        }
                    }
                };

                //create Pie Chart class object
                var chart2 = new Chart(ctxProducto, {
                    type: "pie",
                    data: data,
                    options: options
                });

            });
        </script>
        <script>
            $(function(){
                //get the pie chart canvas
                var cData = JSON.parse(`<?php echo $chart_data; ?>`);
                var ctx = $("#pie-chart");

                //pie chart data
                var data = {
                    labels: cData.label,
                    datasets: [
                        {
                            label: "Compras",
                            data: cData.data,
                            backgroundColor: [
                                "#804000",
                                "#BF6000",
                                "#FF7F00",
                                "#FF9F40",
                                "#FFBF80",
                            ],
                            borderColor: [
                                "#804000",
                                "#BF6000",
                                "#FF7F00",
                                "#FF9F40",
                                "#FFBF80",
                            ],
                            borderWidth: [1, 1, 1, 1, 1,1,1]
                        }
                    ]
                };

                //options
                var options = {
                    responsive: true,
                    title: {
                        display: true,
                        position: "top",
                        text: "Compras realizadas por día",
                        fontSize: 18,
                        fontColor: "#111"
                    },
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: "#333",
                            fontSize: 16
                        }
                    }
                };

                //create Pie Chart class object
                var chart1 = new Chart(ctx, {
                    type: "pie",
                    data: data,
                    options: options
                });

            });
        </script>

    </section>
@endsection

