<div>
    <div class="card-header mb-10">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-600 leading-tight flex-1">
                Retiros
            </h2>

        </div>
    </div>

  
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill-wave"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text font-bold text-xs md:text-md"">SALDO DISPONIBLE</span>
                    <span class="info-box-text text-xs md:text-md"">Ganancia: S/ {{$disponible}}</span>
                   
                </div>

            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hand-holding-heart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text font-bold text-xs md:text-md">SALDO PAGADO</span>
                    <span class="info-box-number text-xs md:text-md"">Ganancia: S/ {{$pagado}}</span>
                </div>

            </div>

        </div>

        @if($activar == 1)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill-wave"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text font-bold"></span>
                        <span class="info-box-text"></span>
                            @livewire('financiero.retiro-create')
                    </div>
                </div>
            </div>
        @endif
    </div>





<section class="content">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Buscador</h3>
                </div> 
                <div class="card-body">
                    <div class="md:flex items-center justify-between">
                        <div class="w-full mb-2 md:mb-0 md:w-1/5">
                            <label class="text-gray-600 text-md">Vista de registro</label>
                            <select wire:model="vista_registros" id="vista_registros" class="form-control w-full" name="vista_registros">
                                <option value="0">Pagados</option>
                                <option value="1">Pendientes</option>
                            </select>
                        </div>

                        <div class="md:flex-1 md:ml-4">
                            <label class="text-gray-600 text-md">Buscador por fecha</label>
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
                </div>
            </div>
    </section>

    <div class=" mt-8 mb-2">
        <h3 class="my-2 mx-4 text-gray-600 font-bold text-lg">Registro de pagos</h3>
    </div>


    <x-table-responsive>

        <div class="px-2 ">

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
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{$registro->status}}
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
