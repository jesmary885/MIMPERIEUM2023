<div>
    <button type="submit" wire:click="open">
    <i class="	fas fa-eye text-blue-600"></i>
    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title py-0 text-lg text-gray-800">Detalle del registro de pago</h5>
                    </div>
                    <div class="modal-body">

                       
                      

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
