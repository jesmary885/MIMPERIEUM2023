<div>
    <div class="card-header mb-10">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-600 leading-tight">
                Tus registros en pagos a afiliados
            </h2>
        </div>
    </div>

    <div class="row">
        

        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-hand-holding-heart"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Pagados</span>
        <span class="info-box-number">{{$pagados}} - S/ {{$pagados_soles}}</span>
        </div>

        </div>

        </div>


        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="	fas fa-money-bill-wave"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Por pagar</span>
        <span class="info-box-number">{{$pendientes}} - S/ {{$pendientes_soles}}</span>
        </div>

        </div>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-boxes"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Registros</span>
        <span class="info-box-number">{{$total_registros}}</span>
        </div>

        </div>

        </div>

        

    </div>

    <section class="content">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Buscador</h3>
                </div> 
                <div class="card-body">
                    <div class="md:flex items-center justify-between">
                        <div class="w-full md:w-1/5">
                            <label class="text-gray-600 text-sm md:text-md">Vista de registro</label>
                            <select wire:model="vista_registros" id="vista_registros" class="form-control w-full" name="vista_registros">
                                <option value="0">Pendientes</option>
                                <option value="1">Pagados</option>
                            </select>
                        </div>

                        <div class="w-full md:w-1/5 ml-0 md:ml-4">

                            <label class="text-gray-600 text-sm md:text-md">Filtro del buscador</label>

                            <select wire:model="buscador" id="buscador" class="form-control" name="buscador">
                                <option value="0">Por socio</option>
                                <option value="1">fecha</option>
                            </select>

                        </div>

                        <div class="md:flex-1 ml-0 md:ml-4">
                            <label class="text-gray-600 text-md">Buscador</label>
                            @if($buscador == 0)
                            <input wire:model="search" placeholder="Ingrese el nombre o código del socio a buscar" class="form-control">
                            @else
                            <div class="md:flex items-center justify-items-start">
                                <div class="mt-2">
                                    <x-input.date wire:model="fecha_inicio" id="fecha_inicio" placeholder="Desde" class="px-4 outline-none"/>
                                </div>
                                <div class= "mt-2">
                                    <x-input.date wire:model="fecha_fin" id="fecha_fin" placeholder="Hasta" class="px-4 outline-none"/>
                                </div>
                            </div>
                           
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
    </section>

    

    <x-table-responsive>

    

        <div>
            @if($vista_registros == 0)

            @if($this->createForm['registros_pendientes'] != [])
            
            <div class="flex justify-end m-2">
                <x-button
                    class="bg-lime-700 hover:bg-lime-800"
                    wire:click="save"
                    wire:loading.attr="disabled">
                    Reportar pagos
                </x-button>
            </div>
            @endif
            @if($registros_pendientes->count())
                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            @if($select == 1)
                            <button class="text-blue-600 text-lg hover:text-blue-900"
                            wire:click="select_select()">
                                <i class="	fas fa-th-list"></i>
                            </button>
                        @else
                            <button class="text-red-600 text-lg hover:text-red-900"
                            wire:click="no_select_select()">
                                <i class="	fas fa-th-list"></i>
                            </button>
                        @endif
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nro
                        </th>
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
                            Solicitante
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Datos bancarios
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Doc
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                   
                        @foreach ($registros_pendientes as $registros_pendiente)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <input name="registros_pendientes[]" wire:model="createForm.registros_pendientes" type="checkbox" id="customCheckbox{{$registros_pendiente->id}}" value="{{$registros_pendiente->id}}">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$registros_pendiente->id}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{\Carbon\Carbon::parse($registros_pendiente->created_at)->format('d-m-Y')}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    S/ {{$registros_pendiente->total}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$registros_pendiente->description}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$registros_pendiente->user->name}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @livewire('admin.datos-pago', ['usuario' => $registros_pendiente->user],key($registros_pendiente->id))
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-green-600 text-lg hover:text-green-900"
                                    
                                    wire:click="download('{{$registros_pendiente->pdf}}')">
                                    <i class="fas fa-download"></i>
                                </button>
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

                    @if ($registros_pendientes->hasPages())
            
                        <div class="px-6 py-4">
                            {{ $registros_pendientes->links() }}
                        </div>
                        
                    @endif

            @else

            @if ($registros->count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                      
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nro
                        </th>
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
                            Solicitante
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Datos bancarios
                        </th>
                   
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($registros as $registro)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$registro->id}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{\Carbon\Carbon::parse($registro->created_at)->format('d-m-Y')}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$registro->total}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$registro->description}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$registro->user->name}}
                                    </td>

                                    <td class="text-center">
                                        @livewire('admin.datos-pago', ['usuario' => $registro->user],key($registro->id))
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
    @endif

    </div>

    </x-table-responsive>

</div>
