<div>
    <div class="card-header mb-10">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-600 leading-tight">
                Tus registros en bono residual
            </h2>
        </div>
    </div>

    <div class="row">
        

        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-hand-holding-heart"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Cobrados</span>
        <span class="info-box-number">S/ {{$this->cobrados(Auth::user()->id)}}</span>
        </div>

        </div>

        </div>


        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="	fas fa-money-bill-wave"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Por cobrar</span>
        <span class="info-box-number">S/ {{$this->pendientes(Auth::user()->id)}}</span>
        </div>

        </div>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-boxes"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Registros</span>
        <span class="info-box-number">{{$registro_total_pagados}}</span>
        </div>

        </div>

        </div>

    </div>

    <section class="content">
    <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title text-gray-600 font-bold">Buscador por fecha</h3>
                </div> 
                <div class="card-body">
                    <div class="md:flex items-center justify-items-start">
                            <div class="mt-2">
                            <x-input.date wire:model="fecha_inicio" id="fecha_inicio" placeholder="Desde" class="px-4 outline-none"/>
                            </div>
                            <div class= "mt-2">
                            <x-input.date wire:model="fecha_fin" id="fecha_fin" placeholder="Hasta" class="px-4 outline-none"/>
                            </div>
                    </div>
                </div>
            </div>
    </section>
    <x-table-responsive>

        <div class="px-2 py-4">

        @if ($registros->count())
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                       
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descripción
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($registros as $registro)
                        <tr>
                          
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{\Carbon\Carbon::parse($registro->created_at)->format('d-m-Y')}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            S/ {{$registro->total}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{$registro->description}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <div class="px-6 py-4">
                No hay ningún registro coincidente
            </div>
        @endif

        @if ($registros->hasPages())
            
            <div class="px-6 py-4">
                {{ $registros->links() }}
            </div>
            
        @endif

    </x-table-responsive>

    
</div>
