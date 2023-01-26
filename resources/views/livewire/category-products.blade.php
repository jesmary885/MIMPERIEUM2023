<div wire:init="loadPosts">
    @if (count($products))
    
        <div class="glider-contain">
            <ul class="glider-{{$category->id}}">
            
                @foreach ($products as $product)
                    
                    <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm:mr-4' }}">
                    <a href="{{ route('products.show', $product) }}">
                    <article>
                        @if ($product->images->count())
                            <figure>
                                <img class="h-52 w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            </figure>
                            @else
                            <figure>
                            <img class="h-52 w-full object-cover object-center"
                                src="https://cdn.pixabay.com/photo/2017/02/15/11/05/texture-2068283_960_720.jpg" alt="">
                                </figure>
                            @endif
                            

                        <div class="py-4 px-6">
                                <h1 class="text-md font-semibold">
                                    
                                        $product->name
                                    
                                </h1>

                                <p class="font-bold text-trueGray-700">S/ {{$product->price}}</p>
                                <p class="font-bold text-trueGray-700">{{$product->points}} Puntos</p>
                        </div>
                        </article>
                        </a>
                    </li>

                @endforeach
            
            </ul>
        
            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>

    @else

        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
        </div>
        
    @endif
</div>
