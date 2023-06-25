@extends('adminlte::page')

@section('title', 'MIMPERIUM')

@section('content_header')
    <h1></h1>
@stop

@section('content')


@if($rol_user == 2)
    <div class="callout callout-info sm:w-full md:w-1/2">

        @if($user->status == "inactivo_para_comisionar")

        <div class="flex">
            <p class="font-bold sm:text-md md:text-lg text-gray-500">
                    ESTADO ACTUAL:
            </p>

            <p class="font-bold sm:text-md md:text-lg text-red-500 ml-2">
                    INACTIVO PARA COMISIONAR
            </p>
        </div>

        @else

        <div class="portada " id="portada">

        <div class="flex justify-center">

        <p class="font-bold sm:text-md md:text-lg text-cyan-200">
                ACTIVO PARA COMISIONAR
            </p>

        </div>

            

            <div>

                <div id="cuenta">


                </div>

                <div class="flex justify-center ">
                    <p class="font-bold text-sm text-cyan-200">
                        Tiempo restante
                    </p>

                </div>

            </div>
        </div>
        @endif


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
                    <p class="sm:text-xs md:text-md font-bold">BONO COMPRA</p>
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
                    <h3>S/0</h3>
                    <p class="sm:text-xs md:text-md font-bold">BONO LIDERAZGO</p>
                </div>
                <div class="icon">
                    <i class="fas fa-child"></i>
                    
                </div>
                    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
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

        
    </div>

    @if($rango_id == 1 || $rango_id == 2 || $rango_id == 3 || $rango_id == 4  )

        <h2 class="text-gray-600 font-bold p-2 text-lg">
            Rango y calificación:
        </h2>

        <div class="grid sm:grid-cols-1 md:grid-cols-3 gap-6">
        
            <div class="overflow-x-auto">
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

                <div>
                    <div class="card card-row card-default">
                        <div class="card-header bg-info">
                            <h3 class="card-title font-bold">
                            CALIFICADOS POR RANGO
                            </h3>
                        </div>
                        <div class="card-body">
                            <p class="font-bold text-gray-600">DIAMANTES: {{$users_diamantes}}</p>
                            <p class="font-bold text-gray-600">DIAMANTES CORONA: {{$users_corona}}</p>
                            <p class="font-bold text-gray-600">DIAMANTES EMBAJADOR: {{$users_embajador}}</p>
                            <p class="font-bold text-gray-600">DIAMANTES IMPERIAL: {{$users_imprerial}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-0 md:col-span-2 overflow-x-auto">
                <span class=" text-gray-600 ml-2 font-semibold">{{$porcentaje_total}}% </span>

                <div class="progress ml-2 mr-2 mt-0 mb-0">

                    
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style=<?php echo $width_barra; ?>;>
                    
                    </div>
                </div>

                <div class="row mt-0 ml-2 mr-2 ">
                    <div class="small-box col-12">
                        <div class="row">

                            

                            <div class="col mt-3">
                                <div class="description-block border-right">
                                    <h5 class="description-header font-normal">Puntos faltantes:</h5>
                                    <span class="description-text font-bold text-gray-500">{{$puntos_faltantes}} PV </span>
                                </div>
                            </div>

                            <div class="col mt-3">
                                <div class="description-block border-right">
                                
                                    <h5 class="description-header font-normal">Directos activos calificados :</h5>
                                    <span class="description-text font-bold text-gray-500">{{$refers_direct}} </span>
                                </div>
                            </div>

                            <div class="col mt-3">
                                <div class="description-block border-blue-600">
                                    <h5 class="description-header font-bold">Puntos total acumulados: </h5>
                                    <span class="description-text text-gray-500 font-bold">{{$ptos_residual_compra}} PV</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card card-info mx-2 overflow-x-auto">
                    <div class="card-header">
                        <h3 class="card-title font-bold">ENLACE DE REFERENCIA</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body overflow-x-auto" style="display: block;">
                        <div class="flex">
                            <p id="enlace_copy" class="text-lg text-gray-600 font-medium mt-2">http://mimperium.com/registro/{{$code_user}}</p>

                            <button class="ml-2 btn btn-sm mt-1 text-bold" title="Copiar" id="button_copy"><i class="fas fa-paste text-blue-500 text-lg"></i></button>
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
                    <h3>{{$c_pendientes_cobrar}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">PENDIENTES POR COBRAR</p>
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

    <h2 class="text-gray-600 font-bold p-2 text-lg">
        Calculo de puntos:
    </h2>

    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$ptos_diarios}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">DEL DÍA</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$ptos_trimestre}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">DEL TRIMESTRE</p>
                </div>
                <div class="icon">
                <i class="fas fa-calculator"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$ptos_anual}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">DEL AÑO</p>
                </div>
                <div class="icon">
                <i class="fas fa-calculator"></i>
                </div>
                <a href="# " class="small-box-footer">-</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$ptos_total}}</h3>
                    <p class="sm:text-xs md:text-md font-bold">TOTAL</p>
                </div>
                <div class="icon">
                <i class="fas fa-calculator"></i>
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


    <link rel="stylesheet" href="{{ asset('vendor/css_contador/estilos.css') }}">

 
@stop

@section('js')


<script src="{{ asset('vendor/dist/simplyCountdown.min.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Enlace copiado',
                    showConfirmButton: false,
                    timer: 1500
                    })
            }
    </script>

    <script>
        simplyCountdown('#cuenta', {
            year: <?php echo $ano_restantes?>, // required
            month: <?php echo $mes_restantes?>, // required
            day: <?php echo $dias_restantes?>, // required
            hours: <?php echo $horas_restantes?>, // Default is 0 [0-23] integer
            minutes: <?php echo $minutos_restantes?>, // Default is 0 [0-59] integer
            seconds: 0, // Default is 0 [0-59] integer
            words: { //words displayed into the countdown
                days: { singular: 'Día', plural: 'Dias' },
                hours: { singular: 'Hora', plural: 'Horas' },
                minutes: { singular: 'Minuto', plural: 'Minutos' },
                seconds: { singular: 'segundo', plural: 'segundos' }
            },
            plural: true, //use plurals
            inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
            inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
            // in case of inline set to false
            enableUtc: true, //Use UTC as default
            onEnd: function() {
                return; 
            }, //Callback on countdown end, put your own function here
            refresh: 1000, // default refresh every 1s
            sectionClass: 'simply-section', //section css class
            amountClass: 'simply-amount', // amount css class
            wordClass: 'simply-word', // word css class
            zeroPad: false,
            countUp: false
        });
    </script>


@stop