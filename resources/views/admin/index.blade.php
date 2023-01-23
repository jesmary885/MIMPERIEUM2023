@extends('adminlte::page')

@section('title', 'MM Perium')

@section('content_header')
    <h1></h1>
@stop

@section('content')


@if($rol_user == 2)
    <div class="callout callout-info">
        <h5 class="text-lg font-bold">Enlace de referencia:</h5>
        <div class="md:flex">
        <div class="overflow-x-auto">
            <p id="enlace_copy" class="sm:text-xs md:text-lg text-gray-600 font-medium mt-2">http://mimperium.com/registro/{{$code_user}}</p>

            <button class="btn btn-sm mt-1 text-bold" title="Copiar" id="button_copy"><i class="fas fa-paste text-blue-500 text-lg"></i></button>

        </div>
        

        </div>
    </div>

    <h2 class="text-gray-600 font-bold p-2 text-lg">
        Comisiones y referidos:
    </h2>

    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>S/{{$saldo_disponible}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">SALDO DISPONIBLE</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                    <a href="{{ route('admin.retiro')}} " class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>S/{{$saldo_pagado}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">SALDO PAGADO</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                    <a href="{{ route('admin.retiro')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$directos}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">REF. DIRECTOS</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.genealogia_directo')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$indirectos}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">REF. INDIRECTOS</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.genealogia_residual')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <h2 class="text-gray-600 font-bold p-2 text-lg">
        Bonos y rango:
    </h2>

    <div class="row">

        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>S/{{$ganancia_compra}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">BONO RECOMPRA</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cart-arrow-down"></i>
                </div>
                    <a href="{{ route('admin.bono_compra')}} " class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>S/{{$ganancia_residual}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">BONO RESIDUAL</p>
                </div>
                <div class="icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                    <a href="{{ route('admin.bono_residual')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>S/{{$ganancia_global}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">BONO GLOBAL</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chess-queen"></i>
                    
                </div>
                    <a href="{{ route('admin.bono_global')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$rango_nombre}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">RANGO</p>
                </div>
                <div class="icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <a href="#" class="small-box-footer">  - </a>
            </div>
        </div>
    </div>

    @if($rango_id == 1 || $rango_id == 2 || $rango_id == 3 || $rango_id == 4  )

        <h2 class="text-gray-600 font-bold p-2 text-lg">
            Calificación de rango:
        </h2>

        <span class=" text-gray-600 ml-2 font-semibold">{{$porcentaje_total}}% </span>

        <div class="progress ml-2 mr-2 mt-0 mb-0">

            
            <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style=<?php echo $width_barra; ?>;>
            
            </div>
        </div>

        <div class="row mt-0 ml-2 mr-2">
            <div class="small-box col-12">
                <div class="row">

                    

                    <div class="col">
                        <div class="description-block border-right">
                            <h5 class="description-header font-normal">Puntos faltantes:</h5>
                            <span class="description-text font-bold text-gray-500">{{$puntos_faltantes}} PV </span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="description-block border-right">
                        
                            <h5 class="description-header font-normal">Directos activos calificados :</h5>
                            <span class="description-text font-bold text-gray-500">{{$refers_direct}} </span>
                        </div>
                    </div>

                    <div class="col ">
                        <div class="description-block border-blue-600">
                            <h5 class="description-header font-bold">Puntos total acumulados: </h5>
                            <span class="description-text text-gray-500 font-bold">{{$ptos_residual_compra}} PV</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
@else

    <h2 class="text-gray-600 font-bold p-2 text-lg">
        Facturación:
    </h2>
    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>S/{{$facturacion_dia}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">DEL DÍA</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                    <a href="#" class="small-box-footer text-green"> -  </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>S/{{$facturacion_mes}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">DEL MES</p>
                </div>
                <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
                </div>
                    <a href="#" class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>S/{{$facturacion_ano}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">DEL AÑO</p>
                </div>
                <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
                </div>
                <a href="#" class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>S/{{$facturacion_total}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">TOTAL</p>
                </div>
                <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
                </div>
                <a href="#" class="small-box-footer">-</a>
            </div>
        </div>
    </div>

    <h2 class="text-gray-600 font-bold p-2 text-lg">
        Comisión:
    </h2>

    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>S/{{$c_pagar_mes}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">POR PAGAR DEL MES</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                    <a href="# " class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>S/{{$c_pagadas_mes}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">PAGADAS DEL MES</p>
                </div>
                <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$c_pagadas_ano}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">PAGADAS DEL AÑO</p>
                </div>
                <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$c_pagadas_total}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">PAGADAS TOTALES</p>
                </div>
                <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>
    </div>

    <h2 class="text-gray-600 font-bold p-2 text-lg">
        Afiliados:
    </h2>

    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$af_mes}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">NUEVOS DEL MES</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$af_act_mes}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">ACTIVOS DEL MES</p>
                </div>
                <div class="icon">
                <i class="fas fa-users"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$af_total}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">TOTALES</p>
                </div>
                <div class="icon">
                <i class="fas fa-users"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$af_rango}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">CON RANGO</p>
                </div>
                <div class="icon">
                <i class="fas fa-users"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>
    </div>

    @if ($data2)

            <figure class="highcharts-figure">
                <div id="container"></div>
                
                <div class="flex justify-center">
                    <p class="text-gray-600 ">
                        Porcentajes calculados de acuerdo al total de ganancias obtenidas durante el año.
                    </p>
                </div>

            </figure>

   
            <style>
                .highcharts-figure,
                .highcharts-data-table table {
                    min-width: 310px;
                    max-width: 100%;
                    margin: 1em auto;
                }

                #container {
                    height: 400px;
                }

                .highcharts-data-table table {
                    font-family: Verdana, sans-serif;
                    border-collapse: collapse;
                    border: 1px solid #ebebeb;
                    margin: 10px auto;
                    text-align: center;
                    width: 100%;
                    max-width: 800px;
                }

                .highcharts-data-table caption {
                    padding: 1em 0;
                    font-size: 1.2em;
                    color: #555;
                }

                .highcharts-data-table th {
                    font-weight: 600;
                    padding: 0.5em;
                }

                .highcharts-data-table td,
                .highcharts-data-table th,
                .highcharts-data-table caption {
                    padding: 0.5em;
                }

                .highcharts-data-table thead tr,
                .highcharts-data-table tr:nth-child(even) {
                    background: #f8f8f8;
                }

                .highcharts-data-table tr:hover {
                    background: #f1f7ff;
                }

            </style>
     

            <script>
                // Create the chart
                Highcharts.chart('container', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'Total en ventas'
                },

                subtitle: {
                    text: ''
                },
                accessibility: {
                    announceNewData: {
                    enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                    text: 'Total en ventas'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },
                series: [
                {
                    name: "Mes",
                    colorByPoint: true,
                  
                    data: <?= $data2 ?>
                }
                ],
            });

    </script>
    @endif



@endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
            var boton = document.getElementById("button_copy");
            boton.addEventListener("click", copiarAlPortapapeles, false);
            function copiarAlPortapapeles() {
                var codigoACopiar = document.getElementById('enlace_copy');
                var seleccion = document.createRange();
                seleccion.selectNodeContents(codigoACopiar);
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(seleccion);
                var res = document.execCommand('copy');
                window.getSelection().removeRange(seleccion);
            }
    </script>
@stop