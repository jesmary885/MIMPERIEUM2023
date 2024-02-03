<div>
    <div class="card-header mb-10">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-600 leading-tight">
                Tus registros en pagos de membresía
            </h2>
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
                                <option value="1">Procesados</option>
                            </select>
                        </div>


                        
                    </div>
                </div>
            </div>
    </section>

    

    <x-table-responsive>

    

        <div>


            @if ($registros->count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                      
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nro
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Usuario
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Comentario
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Constancia
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      
                        </th>
                   
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($registros as $registro)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    {{$registro->id}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    {{\Carbon\Carbon::parse($registro->created_at)->format('d-m-Y')}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    {{$registro->user->name}}
                                    </td>
                                    @if ($registro->comentario != '')
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                            <button class="text-blue-600 text-lg hover:text-green-900"
                                                wire:click="comment('{{$registro->comentario}}')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                        N/A
                                        </td>
                                    @endif
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                    {{$registro->status}}
                                    </td>

                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-green-600 text-lg hover:text-green-900"
                                    
                                        wire:click="download('{{$registro->constancia}}')">
                                        <i class="fas fa-download"></i>
                                        </button>
                                    </td>


                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                        @if($registro->status == 'pendiente')
                                        <button
                                            class="btn btn-success btn-sm" 
                                            wire:click="confirmar('{{$registro->id}}')"
                                            title="Confirmación de recibo de dinero">
                                            <i class="	fas fa-check-double"></i>
                                        </button>
                                        @endif
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
    

    </div>

    </x-table-responsive>

</div>

