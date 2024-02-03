<div>

    <div>
        
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Texto Principal</label>
        <textarea  wire:model="texto1" id="texto1" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

    </div>

    <div class="mt-2">
        
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Texto secundario</label>
        <textarea  wire:model="texto2" id="texto2" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

    </div>

    <div class="mt-2">
        
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Información de RUC</label>
        <textarea  wire:model="texto3" id="texto3" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

    </div>

    <div class="flex items-center justify-between py-2 border-t dark:border-gray-600">
        <button wire:click="update" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
            EDITAR
        </button>

    </div>


    <hr class="mt-4 font-bold">

    <h2 class="font-bold text-gray-600 mt-4 text-lg">Imágen principal</h2>



    <div class=" mt-2">

        @if($cont_img == 'si')

        <div>
            <img class="img-rounded m-0" width="90" height="90"  src="{{Storage::url($texto->url)}}" alt="">
        </div>

        <div class="flex justify-start mt-2 ">
            @livewire('admin.contenidoweb.corporativo-edit', ['imagen' => $imagen,'accion' => 'edit'],key($texto->id))
        </div>

        @else

        <div>
            @livewire('admin.contenidoweb.corporativo-edit', ['accion' => 'create'])
        </div>

        @endif




    </div>
</div>
