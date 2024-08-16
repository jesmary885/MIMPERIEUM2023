<div>



    <div class=" mt-2">

        <div class="flex justify-between mt-2 mb-2">

            <h2 class="font-bold text-gray-600 text-lg">Videos con titulos</h2>
    
            @livewire('admin.contenidoweb.ganar-dinero-edit', ['accion' => 'create'])
    
        </div>

        @if (count($videos))


        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="table text-sm table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                <thead class="text-xs uppercase bg-gray-100 text-gray-400">
                    <tr>
                        <th class="text-center py-3"> URL</th>
                        <th class="text-center ">Titulo</th>
                
                        <th></th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr class="bg-gray-100 border-gray-700 hover:bg-gray-200">
           
                            <td class="text-center">{{$video->url}}</td>
                            <td class="text-center"> {{$video->texto1}}</td>
                         
                            <td class="text-center">
                                @livewire('admin.contenidoweb.ganar-dinero-edit', ['video' => $video,'accion' => 'edit'],key($video->id))
                            </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        @else
             <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif




    </div>
</div>
