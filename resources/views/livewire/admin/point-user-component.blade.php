<div>
<header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Puntos acumulados
                    
                </h1>
            </div>
        </div>

    </header>

    <div class="bg-gray-100 h-11 border-2 border-gray-700 container">
            <p class="font-bold bg-gray-100  text-gray-500 text-sm mb-4">{{$user->points}} Ptos acumulados - Ganancia: S/ {{$this->ganancia_puntos()}}</p>
    </div>
</div>

