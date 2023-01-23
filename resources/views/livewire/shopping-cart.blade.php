<div class="container">
    <x-table-responsive>
        <div class="px-6 py-4 bg-white flex justify-between">
           
            <h1 class="text-lg font-semibold text-gray-700">CARRO DE COMPRAS</h1>

            

            <button wire:click="volver">
                <i class="text-lime-700 hover:text-lime-800 fas fa-backspace">
                </i>
            </button>

        </div>

        @if (Cart::count())
        
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Precio
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cantidad
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach (Cart::content() as $item)
                        
                        {{-- <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                                    <div>
                                        <p class="font-bold">{{$item->name}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="text-center">
                                <span>S/ {{ $item->price }}</span>
                                <a class="ml-6 cursor-pointer hover:text-red-600"
                                    wire:click="delete('{{$item->rowId}}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>  
                                </a>
                            </td>

                            <td>
                                <div class="flex justify-center">
                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                </div>
                            </td>

                            <td class="text-center">
                                S/ {{$item->price * $item->qty}}
                            </td>
                        </tr> --}}

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover object-center"
                                            src="{{ $item->options->image }}"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$item->name}}
                                        </div>
                                      
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                         
                                <div class="text-sm text-gray-500">
                                    <span>USD {{ $item->price }}</span>
                                    <a class="ml-6 cursor-pointer hover:text-red-600"
                                        wire:click="delete('{{$item->rowId}}')"
                                        wire:loading.class="text-red-600 opacity-25"
                                        wire:target="delete('{{$item->rowId}}')">
                                        <i class="fas fa-trash"></i>  
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-sm text-gray-500">
                                    S/ {{$item->price * $item->qty}}
                                </div>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="px-6 py-4">
                <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" 
                    wire:click="destroy">
                    <i class="fas fa-trash"></i>
                    Borrar carrito de compras
                </a>
            </div>

        @else
            <div class="flex flex-col items-center">
                <x-cart />
                <p class="text-lg text-gray-700 mt-4">TU CARRO DE COMPRAS ESTÁ VACÍO</p>

                <x-button-enlace href="/tienda" class="mt-4 px-16 bg-lime-700 hover:bg-lime-800">
                    Ir al inicio
                </x-button-enlace>
            </div>
        @endif

    </x-table-responsive>

    <!-- This example requires Tailwind CSS v2.0+ -->



    @if (Cart::count())

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>
                        S/ {{ Cart::subTotal() }}
                    </p>
                </div>

                <div>
                    <x-button class="bg-lime-700 hover:bg-lime-800" wire:click="finish" wire:loading.attr="disabled">
                        Finalizar compra
                    </x-button>
                </div>
            </div>
        </div>

    @endif

    @push('js')

    <script>
        Livewire.on('volver', function(){
            window.history.back();      
        })
    </script>

    @endpush

</div>
