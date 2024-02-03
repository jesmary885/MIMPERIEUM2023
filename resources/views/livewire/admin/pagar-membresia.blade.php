<div>

    <x-jet-button  wire:click="open">
        PAGAR MEMBRESÍA
    </x-jet-button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title py-0 text-lg text-gray-300">Registro de pago de membresia</h5>
                    </div>
                    <div class="modal-body">

                        
                        <div class="w-full">
                            <div class="flex">
                                <i class="	fas fa-file-image mr-2 "></i>
                                <label for="formGroupExampleInput2">Adjunte la constancia de pago</label>
                            </div> 

                            <input class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" wire:model="file" id="file" type="file">

                        </div>


                 

                            <div class="form-group mt-4">
                                <label for="formGroupExampleInput2">Comentarios</label>
                                <textarea wire:model="comentario" id="formGroupExampleInput" class="form-control resize-none rounded" cols="80" rows="5"> </textarea>
                             
                                <x-jet-input-error for="comentario" />
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


  
</div>
