<div>
    <button type="submit" class="float-right text-lg font-semibold text-lime-700" wire:click="open">
        DIRECCIÓN DE DOMICILIO
    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
          >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="py-0 text-lg text-gray-800"> DATOS DE DIRECCIÓN DE DOMICILIO</h5>
                    </div>
                    <div class="modal-body">
                        <div class="flex justify-start">
                        <p class="text-sm m-0 p-0 text-gray-500 font-semibold"><i class="fas fa-info-circle"></i> Complete todos los campos y presiona Guardar</p> 

                        </div>
                        
                        <hr class="mt-2 mb-2">

                            <div class="form-group w-full mr-2 mt-2">
                                    <label class="w-full text-justify text-gray-600 text-md">Dirección</label>
                                    <input type="text" wire:model="direction" class="form-control rounded" id="formGroupExampleInput">
                                    <x-jet-input-error for="direction" />
                            </div>

                            <div class="form-group w-full mr-2 mt-2">
                                    <label class="w-full text-justify text-gray-600 text-md">Referencia</label>
                                    <input type="text" wire:model="referencia" class="form-control rounded" id="formGroupExampleInput">
                                    <x-jet-input-error for="referencia" />
                            </div>

                            <div class="form-group w-full mr-2 mt-2">
                                        <label class="w-full text-justify text-gray-600 text-md">Teléfono</label>
                                        <input type="number" wire:model="phone" class="form-control rounded" id="formGroupExampleInput">
                                        <x-jet-input-error for="phone" />
                             </div>

                             <div class="form-group w-full mr-2 mt-2">
                                    <label class="w-full text-justify text-gray-600 text-md">Departamento</label>
                                    <input type="text" wire:model="departamento" class="form-control rounded" id="formGroupExampleInput">
                                    <x-jet-input-error for="departamento" />
                            </div>

                            <div class="form-group w-full mr-2 mt-2">
                                    <label class="w-full text-justify text-gray-600 text-md">Provincia</label>
                                    <input type="text" wire:model="provincia" class="form-control rounded" id="formGroupExampleInput">
                                    <x-jet-input-error for="provincia" />
                            </div>

                            <div class="form-group w-full mr-2 mt-2">
                                    <label class="w-full text-justify text-gray-600 text-md">Distrito</label>
                                    <input type="text" wire:model="distrito" class="form-control rounded" id="formGroupExampleInput">
                                    <x-jet-input-error for="distrito" />
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