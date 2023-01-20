<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Genealogía residual de {{$user->name}}
                    <p class="font-bold text-gray-500 text-sm mb-4">{{$user->points}} Ptos acumulados - S/ {{$this->ganancia_puntos()}}</p>
                </h1>

                <x-button class="bg-lime-700 hover:bg-lime-800" wire:click="pago" >
                    Reportar pago Bono residual
                </x-button>
            </div>
        </div>
    </header>

    <div class="py-12 text-gray-700 container">
     @if(count($referidos))
        <div class=" text-center flex">
        <div>
            <div class="bg-gray-100 h-11 border-2 border-gray-700">
                <p class="font-bold bg-gray-100  text-gray-800 text-md mb-4">Nivel</p>
            </div>
            <div class="bg-gray-300 h-10 border-2 border-gray-700">
                <p class="text-gray-700 font-semibold">1 (5%)</p>
            </div>
            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                <p class=" text-lime-900 font-semibold">2 (6%)</p>
            </div>
            <div class="bg-gray-300 h-10 border-2 border-gray-700">
                <p class="text-gray-700 font-semibold">3 (7%)</p>
            </div>
            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                <p class="text-lime-900 font-semibold">4 (8%)</p>
            </div>
            <div class="bg-gray-300 h-10 border-2 border-gray-700">
                <p class="text-gray-700 font-semibold">5 (9%)</p>
            </div>
            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                <p class="text-lime-900 font-semibold">6 (10%)</p>
            </div>

        </div>
        <div class="flex-1">
            <div class="bg-gray-100 h-11 border-2 border-gray-700">
                <p class="font-bold bg-gray-100  text-gray-800 text-lg mb-4">({{$user->name}})</p>
            </div>
        
            <div class="grid grid-cols-{{$this->count($user->id)}}">
                <!-- 1er nivel -->
                @foreach($referidos as $ref1)
                    <div class="col-span-1 w-full text-center ">
                        <div class="bg-gray-300 h-10 border-2 border-gray-700">
                            <p class=" text-gray-700 font-semibold text-sm"> {{$ref1->refer->name}} - {{$ref1->refer->points}}</p>
                        </div>
                        <div class="grid grid-cols-{{$this->count($ref1->refer->id)}}">
                            <!-- 2do nivel -->
                            {{$this->ganancia($ref1->refer->id,2)}}
                            @if($this->refers($ref1->user_id) != 'vacia')
                            @foreach($this->refers($ref1->user_id) as $ref2) 
                                
                                <div class="col-span-1 w-full text-center">
                                    <div class="bg-gray-100  h-10 border-2 border-gray-700">
                                        <p class=" text-lime-900 font-semibold text-sm"> {{$ref2->refer->name}} - {{$ref2->refer->points}}</p>
                                    </div>
                                    <div class="grid grid-cols-{{$this->count($ref2->refer->id)}}">
                                        <!-- 3er nivel -->
                                        {{$this->ganancia($ref2->refer->id,3)}}
                                        @if($this->refers($ref2->user_id) != 'vacia')
                                        @foreach($this->refers($ref2->user_id) as $ref3)
                                            
                                            <div class="col-span-1 w-full text-center">
                                                <div class="bg-gray-300 h-10 border-2 border-gray-700">
                                                    <p class="text-gray-700 font-semibold text-sm"> {{$ref3->refer->name}} - {{$ref3->refer->points}}</p>
                                                </div>
                                                <div class="grid grid-cols-{{$this->count($ref3->refer->id)}}">
                                                    <!-- 4to nivel    -->
                                                    {{$this->ganancia($ref3->refer->id,4)}}
                                                    @if($this->refers($ref3->user_id) != 'vacia')
                                                    @foreach($this->refers($ref3->user_id) as $ref4)
                                                        
                                                        <div class="bg-gray-100  h-10 border-2 border-gray-700">
                                                            <p class=" text-lime-900 font-semibold text-sm"> {{$ref4->refer->name}} - {{$ref4->refer->points}}</p>
                                                        </div>
                                                        <div class="grid grid-cols-{{$this->count($ref4->refer->id)}}">
                                                            <!-- 5to nivel -->
                                                            {{$this->ganancia($ref4->refer->id,5)}}
                                                            @if($this->refers($ref4->user_id) != 'vacia')
                                                            @foreach($this->refers($ref4->user_id) as $ref5)
                                                                
                                                                <div class="bg-gray-300 h-10 border-2 border-gray-700">
                                                                    <p class=" text-gray-700 font-semibold text-sm"> {{$ref5->refer->name}} - {{$ref5->refer->points}}</p>
                                                                </div>
                                                                <div class="grid grid-cols-{{$this->count($ref5->refer->id)}}">
                                                                    <!-- 6to nivel -->
                                                                    {{$this->ganancia($ref5->refer->id,6)}}
                                                                    @if($this->refers($ref5->user_id) != 'vacia')
                                                                    @foreach($this->refers($ref5->user_id) as $ref6)
                                                                        
                                                                        <div class="bg-gray-100  h-10 border-2 border-gray-700">
                                                                            <p class="text-lime-900 font-semibold text-sm"> {{$ref6->refer->name}} - {{$ref6->refer->points}}</p>
                                                                        </div>
                                                                    @endforeach
                                                                    @else
                                                                        <div class="bg-gray-100  h-10 border-2 border-gray-700">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                            @else
                                                            <div class="bg-gray-300 h-10 border-2 border-gray-700">
                                                            </div>
                                                            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                                                            </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    @else
                                                    <div class="bg-gray-100  h-10 border-2 border-gray-700">
                                                    </div>
                                                    <div class="bg-gray-300 h-10 border-2 border-gray-700">
                                                    </div>
                                                    <div class="bg-gray-100  h-10 border-2 border-gray-700">
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        @else
                                    
                                        <div class="bg-gray-300  h-10 border-2 border-gray-700">
                                        </div>
                                        <div class="bg-gray-100 h-10 border-2 border-gray-700">
                                        </div>
                                        <div class="bg-gray-300  h-10 border-2 border-gray-700">
                                        </div>
                                        <div class="bg-gray-100 h-10 border-2 border-gray-700">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                            </div>
                            <div class="bg-gray-300 h-10 border-2 border-gray-700">
                            </div>
                            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                            </div>
                            <div class="bg-gray-300 h-10 border-2 border-gray-700">
                            </div>
                            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                            </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div >
            <div class="bg-gray-100 h-11 border-2 border-gray-700">
                <p class="font-bold bg-gray-100  text-gray-800 text-md mb-4">Ganancia</p>
            </div>
            <div class="bg-gray-300 h-10 border-2 border-gray-700">
                <p class="text-gray-700 font-semibold">S/ {{$this->gl1}}</p>
            </div>
            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                <p class=" text-lime-900 font-semibold">S/ {{$this->gl2}}</p>
            </div>
            <div class="bg-gray-300 h-10 border-2 border-gray-700">
                <p class="text-gray-700 font-semibold">S/ {{$this->gl3}}</p>
            </div>
            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                <p class="text-lime-900 font-semibold">S/ {{$this->gl4}}</p>
            </div>
            <div class="bg-gray-300 h-10 border-2 border-gray-700">
                <p class="text-gray-700 font-semibold">S/ {{$this->gl5}}</p>
            </div>
            <div class="bg-gray-100  h-10 border-2 border-gray-700">
                <p class="text-lime-900 font-semibold">S/ {{$this->gl6}}</p>
            </div>

            <div class="bg-gray-300 h-10 border-r-2 border-b-2 border-l-2 border-gray-700">
                <p class="text-lime-900 font-extrabold text-md">S/ {{$this->gl1 + $this->gl2 + $this->gl3 + $this->gl4 + $this->gl5 + $this->gl6}}</p>
            </div>

        </div>
    
        </div>
    @else
        
        <div class="px-6 ">
           Usuario sin referidos
        </div>
    @endif
       
    </div>

</div>
