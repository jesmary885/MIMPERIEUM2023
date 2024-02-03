@extends('adminlte::page')
@section('content_header')

<div class="flex justify-between">
    
    <h1 class="text-lg ml-2"><i class="fas fa-cog"></i> Configuración de porcentajes</h1>

</div>

@stop

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#compra" data-toggle="tab">Bono Compra</a></li>
                <li class="nav-item"><a class="nav-link" href="#residual" data-toggle="tab">Bono Residual</a></li>
                <li class="nav-item"><a class="nav-link" href="#global" data-toggle="tab">Bono Global</a></li>
                <li class="nav-item"><a class="nav-link" href="#comision" data-toggle="tab">Costo de membresía</a></li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="compra">
                    <div class="container py-8">
                        @livewire('admin.porcentajes.compra') 
                    </div>

                </div>

                <div class="tab-pane" id="residual">
                    <div class="container py-8">
                        @livewire('admin.porcentajes.residual') 
                    </div>
                </div>

                <div class="tab-pane" id="global">
                    <div class="container py-8">
                        @livewire('admin.porcentajes.b-global') 
                    </div>
                </div>

                <div class="tab-pane" id="comision">
                    <div class="container py-8">
                    @livewire('admin.porcentajes.comision') 
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
