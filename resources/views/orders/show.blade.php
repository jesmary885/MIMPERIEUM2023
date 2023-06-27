@extends('adminlte::page')

@section('content')

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center ">
            <div class="flex-1">
                <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Orden-{{ $order->id }}</p>

            </div>
            

            @if ($order->status == 1)

                <x-button-enlace class="ml-auto bg-red-700 hover:bg-red-800 text-white"  href="{{route('orders.cancel', $order)}}">
                    Anular pedido
                </x-button-enlace>


            @endif
        </div>

  

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">

            <p class="text-xl font-semibold mb-4">Resumen</p>


            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th >Precio</th>
                        <th >Cant</th>
                        <th >Total</th>
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

                            <td >
                               S/ {{ $item->price }}
                            </td>

                            <td >
                                {{ $item->qty }}
                            </td>

                            <td >
                              S/  {{ $item->price * $item->qty }} 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop