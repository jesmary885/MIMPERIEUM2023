<div>
    @if($this->no_rango == 1)
    <div class="card-header mb-10">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-600 leading-tight">
                Tus registro en bono global
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Acumulado trimestral</span>
        <span class="info-box-number">
        {{$points_total}}
        <small>puntos</small>
        </span>
        </div>

        </div>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-trophy"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Cantidad de {{$rango_name}}</span>
        <span class="info-box-number">{{$cant_rango}}</span>
        </div>

        </div>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-hand-holding-heart"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Cobrados</span>
        <span class="info-box-number">{{$cobrados}}</span>
        </div>

        </div>

        </div>


        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="	fas fa-money-bill-wave"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Por cobrar</span>
        <span class="info-box-number">{{$pendiente}}</span>
        </div>

        </div>

        </div>

        

    </div>

    <x-table-responsive>

        <div class="px-2 py-4">

        @if ($registros->count())
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                       
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descripción
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>
                      
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($registros as $registro)
                        <tr>
                        
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{\Carbon\Carbon::parse($registro->created_at)->format('d-m-Y')}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{$registro->total}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{$registro->description}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{$registro->status}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <div class="px-6 py-4">
                No hay ningún registro coincidente
            </div>
        @endif

        @if ($registros->hasPages())
            
            <div class="px-6 py-4">
                {{ $registros->links() }}
            </div>
            
        @endif

    </x-table-responsive>

    @else
    <div class="card-header mb-10">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-600 leading-tight">
                Aún no has calificado a rango Diamante
            </h2>
        </div>
    </div>
    @endif

    
</div>