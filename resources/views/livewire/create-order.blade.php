<div class="container py-8 grid lg:grid-cols-2 xl:grid-cols-5 gap-6">

    <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">

        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-jet-label value="Nombre de contácto" />
                <x-jet-input type="text"
                            wire:model.defer="contact"
                            placeholder="Ingrese el nombre de la persona que recibirá el producto"
                            class="w-full"/>
                <x-jet-input-error for="contact" />
            </div>

            <div>
                <x-jet-label value="Teléfono de contacto" />
                <x-jet-input type="text"
                            wire:model.defer="phone"
                            placeholder="Ingrese un número de telefono de contácto"
                            class="w-full"/>

                <x-jet-input-error for="phone" />
            </div>
        </div>


        <div>
            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="create_order"
                class="mt-6 mb-4" 
                wire:click="create_order">
                Continuar con la compra
            </x-jet-button>

            <hr>

            <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam atque quo, labore facere placeat illo consequatur hic ut sapiente exercitationem, architecto iure, consequuntur impedit ex iusto ipsa voluptas laudantium iste <a href="" class="font-semibold text-orange-500">Políticas y privacidad</a></p>
        </div>

    </div>

    <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                        <article class="flex-1">
                            <h1 class="font-bold">{{$item->name}}</h1>

                            <div class="flex">
                                <p>Cant: {{$item->qty}}</p>

                            </div>

                            <p>S/ {{$item->price}}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            <hr class="mt-4 mb-3">

            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">S/ {{Cart::subtotal()}}</span>
                </p>
   
                <hr class="mt-4 mb-3">

                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                        S/ {{Cart::subtotal()}} 
                </p>
            </div>
        </div>
    </div>
</div>
