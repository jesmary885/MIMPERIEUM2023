@props(['product'])

<li class="bg-white rounded-lg shadow mb-4">
    <article class="md:flex">
    @if ($product->images->count())
                                <figure>
                                <img class="h-48 w-full md:w-56 object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </figure>
                                @else
                                <figure>
                                <img class="h-48 w-full md:w-56 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/02/15/11/05/texture-2068283_960_720.jpg" alt="">
                                    </figure>
                                @endif
    

        <div class="flex-1 py-4 px-6 flex flex-col">
            <div class="lg:flex justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-gray-700">{{ $product->name }}</h1>
                    <p class="font-bold text-gray-700">S/ {{ $product->price }}</p>
                </div>

              
            </div>

            <div class="mt-4 md:mt-auto mb-4">
                <x-danger-enlace   class="ml-auto bg-lime-700 hover:bg-lime-800" href="{{ route('products.show', $product) }}">
                    Más información
                </x-danger-enlace>
            </div>
        </div>
    </article>
</li>