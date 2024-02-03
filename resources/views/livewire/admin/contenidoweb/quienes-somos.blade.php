<div>




    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">

            <label for=""></label>
        
            <textarea wire:model="texto1" id="texto1" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" required></textarea>
        </div>
        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
            <button wire:click="update" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                EDITAR
            </button>

        </div>
    </div>


   

    <hr class="mt-4 font-bold">

    <div class=" flex justify-between mt-2 mb-2">

        <h2 class="font-bold text-gray-600 text-lg">Imágenes con titulos</h2>

         @livewire('admin.contenidoweb.quienes-somos-edit', ['accion' => 'create'])

    </div>

    


    

    @if (count($imagenes))

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="table text-sm table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
            <thead class="text-xs uppercase bg-gray-100 text-gray-400">
                <tr>
                    <th class="text-center py-3"> Imagen</th>
                    <th class="text-center ">Titulo</th>
             
            
                    <th></th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($imagenes as $imagen)
                    <tr class="bg-gray-100 border-gray-700 hover:bg-gray-200">
                        <td class="text-center">
                            <img class="img-rounded m-0" width="90" height="90"  src="{{Storage::url($imagen->url)}}" alt="">
                        </td>
                        <td class="text-center"> {{$imagen->texto1}}</td>
                     
                        <td class="text-center">
                            @livewire('admin.contenidoweb.quienes-somos-edit', ['imagen' => $imagen,'accion' => 'edit'],key($imagen->id))
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
