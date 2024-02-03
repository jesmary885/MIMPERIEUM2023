@extends('adminlte::page')

@section('content')
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)

                            @if ($product->images->count())
             
                            <li data-thumb=" {{ Storage::url($image->url) }}">
                                <img src=" {{ Storage::url($image->url) }}" />
                            </li>
                            
                            @else

                            <li data-thumb="https://cdn.pixabay.com/photo/2017/02/15/11/05/texture-2068283_960_720.jpg">
                                <img src="https://cdn.pixabay.com/photo/2017/02/15/11/05/texture-2068283_960_720.jpg" />
                            </li>
                          
                            @endif
                        
                

                        @endforeach
                        
                    </ul>
                </div>

                <div class="-mt-10 text-gray-700">
                    <h2 class="font-bold text-lg">Descripción</h2>
                    {!!$product->description!!}
                </div>
            </div>

            <div>
                <h1 class="text-xl font-bold text-trueGray-700">{{$product->name}}</h1>

                <div class="flex">
                    <p class="text-trueGray-700">Marca: <a class="underline capitalize hover:text-orange-500" href="">{{ $product->brand->name }}</a></p>
                   
                </div>

                <p class="text-2xl font-semibold text-trueGray-700 my-4">S/ {{ $product->price }}</p>
                <p class="text-2xl font-semibold text-trueGray-700 my-4">{{ $product->points }} puntos</p>

                {{--<div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-lime-700">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        
                         <div class="ml-4">
                            <p class="text-lg font-semibold text-lime-700">ENVIO CONTRA ENTREGA</p>
                        </div>
                    </div>
                </div>--}}

                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-lime-700">
                            <i class="fas fa-home text-sm text-white"></i>
                        </span>
                        
                        <div class="ml-4">

                            @livewire('products.change-direction')

                        </div>
                    </div>
                </div>

                @if($user_status == 'activo')

                @livewire('add-cart-item', ['product' => $product])

                @endif

            </div>
        </div>
        
    </div>
@stop

 
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@push('script')

        {{-- jquery --}}
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

        {{-- FlexSlider --}}
        <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });

        </script>
@endpush


