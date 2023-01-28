<div class="ml-2">
    <x-jet-dropdown>
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer mt-2 mr-2">
                <i class="fas fa-bell text-gray-500 text-3xl"></i>

                @if ($orders->count())
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ $ordenes_pendientes }}</span>
                @else
                    <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span></span>
                @endif

            </span>
        </x-slot>

        <x-slot name="content">

            <ul>
                @forelse ($orders as $order)
                    <li class="flex p-2 border-b border-gray-200">
                        <h1 class="font-bold ">{{$order->user->name}}</h1>

                            <div class="flex">
                                <p class="text-gray-700 ml-2 mt-0">S/ {{$order->total}}</p>
                            </div>

                  
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            No tiene ninguna orden pendiente
                        </p>
                    </li>
                @endforelse
            </ul>

            @if ($orders->count())
                <div class="py-2 px-3">
                    <p class="text-lg text-gray-700 mt-2 mb-3"><span class="font-bold">Total:</span> S/ {{ $order_total }}</p>

                     <x-button-enlace href="{{ route('admin.orders.index') }}" class="w-full bg-lime-700 hover:bg-lime-800">
                    Ir a ordenes pendientes
                    </x-button-enlace> 
            

                </div>
            @endif

           


        </x-slot>
    </x-jet-dropdown>
</div>