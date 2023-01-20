<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
        <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
            Orden-{{ $order->id }}</p>

 
            <div class="flex space-x-3 mt-4">

                <x-jet-label>
                    <input wire:model="status" type="radio" name="status" value="2" class="mr-2">
                    ENTREGADO
                </x-jet-label>

                <x-jet-label>
                    <input wire:model="status" type="radio" name="status" value="3" class="mr-2">
                    ANULADO
                </x-jet-label>
            </div>

            <div class="flex mt-4">
                <x-jet-button class="ml-auto bg-lime-700 hover:bg-lime-800" wire:click="update">
                    Actualizar
                </x-jet-button>
            </div>
        
    </div>


    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
        <p class="text-xl font-semibold mb-4">Resumen</p>

        <div class="mt-2 flex">

                <p class="text-lime-800 text-lg font-bold">Usuario: {{$order->user->name}} </p>
                <p class="text-sm text-gray-500 ml-4 mt-2">Código: {{$order->user->code}} </p>
                <p class="text-sm text-gray-500 ml-4 mt-2">Fecha de compra: {{  \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }} </p>
        </div>
            <hr class="m-2">


        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Precio</th>
                    <th>Cant</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($items as $item)
                    <tr>
                        <td>
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                    alt="">
                                <article>
                                    <h1 class="font-bold">{{ $item->name }}</h1>
                                    
                                </article>
                            </div>
                        </td>

                        <td class="text-center">
                           S/ {{ $item->price }} 
                        </td>

                        <td class="text-center">
                            {{ $item->qty }}
                        </td>

                        <td class="text-center">
                            S/ {{ $item->price * $item->qty }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</div>