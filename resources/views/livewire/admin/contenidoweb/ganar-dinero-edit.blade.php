<div>
    <button type="submit" class="float-right inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800" wire:click="open">
    
        @if ($accion == 'create')
            <i class="	fas fa-plus font-medium">AGREGAR</i>
        @else
            <i class="fas fa-edit"></i>
        @endif
    </button>


    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="py-0 text-lg text-gray-800"> Información de área "Ganar Dinero"</h5>
                    </div>
                    <div class="modal-body">
                
                        
                        <hr class="mt-2 mb-2">

                        <div class="flex justify-between">
                            <div class="form-group w-full mr-2 mt-2">
                                    <label class="w-full text-justify text-gray-600 text-md">Titulo</label>
                                    <input type="text" wire:model="titulo" class="form-control rounded" id="formGroupExampleInput">
                                    <x-jet-input-error for="titulo" />
                            </div>
                      
                        </div>

                        <div class="flex justify-between">
                            <div class="form-group w-full mr-2 mt-2">
                                    <label class="w-full text-justify text-gray-600 text-md">URL</label>
                                    <input type="text" wire:model="url" class="form-control rounded" id="formGroupExampleInput">
                                    <x-jet-input-error for="url" />
                            </div>
                      
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">Cerrar</button>
                        <button type="button" class="btn btn-primary" wire:click="save">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        Livewire.on('errorSize', mensaje => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: mensaje,
            }) /*  */
        });
    </script>

<script>
        livewire.on('alert', function(ms){
        Swal.fire(
            ms,
            '',
            'success')
        })
    </script>
</div>
