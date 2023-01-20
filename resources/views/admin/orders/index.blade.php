@extends('adminlte::page')

@section('content')

    <div class=" py-2">

        <section class="grid grid-cols-3 gap-6 text-white">
           
            <a href="{{ route('admin.orders.index') . "?status=1" }}" class="bg-gray-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4 hover:text-gray-200">
                <p class="text-center text-2xl">
                    {{$pendiente}}
                </p>
                <p class="uppercase text-center">Pendiente</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-credit-card"></i>
                </p>
            </a>

            <a href="{{ route('admin.orders.index') . "?status=2" }}" class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4 hover:text-gray-200">
                <p class="text-center text-2xl">
                    {{$entregado}}
                </p>
                <p class="uppercase text-center">Entregado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-truck"></i>
                </p>
            </a>

            <a href="{{ route('admin.orders.index') . "?status=3" }}" class="bg-pink-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4 hover:text-gray-200">
                <p class="text-center text-2xl">
                    {{$anulado}}
                </p>
                <p class="uppercase text-center">Anulado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-check-circle"></i>
                </p>
            </a>

        
        </section>

        <form action="orders" method="get" onsubmit="return showLoad()">
            <div class="flex mt-4 ">
                <x-jet-input type="text" 
                    name="q" 
                    id="q"
                    class="w-full"
                    placeholder="Ingrese el numero de orden a buscar" />

                <div class="panel-footer">
                    <button type="submit" class="text-white btn btn-lg btn-info"> <i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        @if ($orders->count())
        
            <section class="bg-white shadow-lg rounded-lg px-12 py-2 mt-2 text-gray-700">
                <h1 class="text-2xl mb-4 text-gray-700 font-bold">Pedidos recientes</h1>

                <ul>
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{route('admin.orders.show', $order)}}" class="flex items-center py-2 px-4 hover:bg-gray-100">
                                <span class="w-12 text-center">
                                    @switch($order->status)
                                        @case(1)
                                            <i class="fas fa-business-time text-red-500 opacity-50"></i>
                                            @break
                                        @case(2)
                                            <i class="fas fa-credit-card text-gray-500 opacity-50"></i>
                                            @break
                                        @case(3)
                                            <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                                            @break
                                        @default
                                            
                                    @endswitch
                                </span>

                                <span>
                                    Orden: {{$order->id}}
                                    <br>
                                    {{$order->created_at->format('d/m/Y')}}
                                </span>


                                <div class="ml-auto">
                                    <span class="font-bold">
                                        @switch($order->status)
                                            @case(1)
                                                
                                                Pendiente

                                                @break
                                            @case(2)
                                                
                                               Entregado

                                                @break
                                            @case(3)
                                                
                                                $anulado

                                                @break
                                            
                                            @default
                                                
                                        @endswitch
                                    </span>

                                    <br>

                                    <span class="text-sm">
                                       S/ {{$order->total}}
                                    </span>
                                </div>

                                <span>
                                    <i class="fas fa-angle-right ml-6"></i>
                                </span>

                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>

            <div class="mt-4">
            {{$orders->links()}}
        </div>

        @else
            <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-2 text-gray-700">
                <span class="font-bold text-lg">
                    No existe registros de ordenes
                </span>
            </div>
        @endif

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<!-- <script>
    window.addEventListener('load',function(){
        document.getElementById("q").addEventListener("keyup", () => {
            
            if((document.getElementById("q").value.length) >= 1){
                console.log(document.getElementById("q").value);
         
                fetch('orders/?q=${document.getElementById("q").value}',{ method:'get'})
                .then(response => response.text())

            }
                

        })
    });
</script> -->

@stop