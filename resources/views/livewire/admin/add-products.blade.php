<div>
    <button type="submit" class="btn btn-success btn-sm float-right" wire:click="open">
    <i class="fas fa-plus-circle"></i>
    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title py-0 text-lg text-gray-800"> Agregar unidades al producto</h5>
                    </div>
                    <div class="modal-body">

                        <div class="full">
                            <input wire:model="quantity" name="documento" type="number" min="0" class="px-4 appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Cantidad">
                            <x-jet-input-error for="quantity" />
                        </div>
                      

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">Cerrar</button>
                        <button type="button" class="btn btn-primary" wire:click="update">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>


