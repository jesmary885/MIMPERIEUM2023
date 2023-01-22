@extends('adminlte::page')

@section('title', 'MM Perium')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="callout callout-info">
    <h5 class="text-lg font-bold">Enlace de referencia:</h5>
    <p class="sm:text-xs md:text-lg text-gray-600 font-medium mt-2 ml-2 ">http://mimperium.com/registro/{{$code_user}}</p>
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
                <p class="sm:text-xs md:text-md font-bold">REFERIDOS DIRECTOS</p>
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
                <p class="sm:text-xs md:text-md font-bold">REFERIDOS INDIRECTOS</p>
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

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop