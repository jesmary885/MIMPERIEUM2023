@extends('adminlte::page')

@section('content_header')

<div class="flex justify-between">
    
    <h1 class="text-lg ml-2"><i class="fas fa-cog"></i> Configuración de contenido en página web</h1>

</div>

@stop

@section('content')

<div class="col-md-12">
    <div class="card">



        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#quienes_somos" data-toggle="tab">QUIENES SOMOS</a></li>
                <li class="nav-item"><a class="nav-link" href="#corporativo" data-toggle="tab">CORPORATIVO</a></li>
                <li class="nav-item"><a class="nav-link" href="#productos" data-toggle="tab">PRODUCTOS</a></li>
                <li class="nav-item"><a class="nav-link" href="#ganar" data-toggle="tab">COMO GANAR DINERO</a></li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="quienes_somos">
                    <div class="container py-8">
                        @livewire('admin.contenidoweb.quienes-somos') 
                    </div>

                </div>

                <div class="tab-pane" id="corporativo">
                    <div class="container py-8">
                        @livewire('admin.contenidoweb.corporativo') 
                    </div>
                </div>

                <div class="tab-pane" id="productos">
                    <div class="container py-8">
                        @livewire('admin.contenidoweb.productos') 
                    </div>
                </div>

                <div class="tab-pane" id="ganar">
                    <div class="container py-8">
                    @livewire('admin.contenidoweb.ganar-dinero') 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
