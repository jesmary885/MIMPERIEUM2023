<div>

    <div class="card-header">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-600 leading-tight flex-1">
                Tu cuenta de retiro
            </h2>

            <div class="float-rigth">
            @if(!$cuenta)
                @livewire('financiero.account-create', ['action'=>'crear'])
            @endif

            </div>

           
        </div>
        </div>



    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container pt-6 pb-12">

        <x-table-responsive>

            @if ($cuenta)
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                          
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipo
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nro
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Iban
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Bic/Swift
                            </th>
                            
                            <th colspan="1"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">



                            <tr>
                            
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                   {{$cuenta->name}}
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{$cuenta->type}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{$cuenta->number}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{$cuenta->iban}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{$cuenta->bic}}
                                </td>
                                
    
                                <td class="px-3 py-4 whitespace-nowrap text-center">
                                    @livewire('financiero.account-create', ['cuenta' => $cuenta,'action'=>'editar'],key(01.,'$account->id'))
                                </td>

                            </tr>

               
                        <!-- More people... -->
                    </tbody>
                </table>

            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

        </x-table-responsive>
    </div>


</div>
