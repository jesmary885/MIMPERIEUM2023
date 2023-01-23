<div>
    <button type="submit" class="uppercase text-xs md:text-md font-bold hover:text-blue-200" wire:click="open">
    Solicitar retiro
    </button>
    @if($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title py-0 text-lg mb-2 text-gray-800">  Registro de solicitud</h5>
                    </div>
                    <div class="modal-body">
                        <h2 class="text-sm ml-2 m-0 p-0 text-gray-500 font-semibold"><i class="fas fa-info-circle"></i> Complete todos los campos y presiona "Procesar socilitud"</h2> 
                        <hr class="m-2 p-2">

                        <div class="w-full">
                    
         
                                <div class="flex">
                                    <i class="fas fa-file-pdf mt-2 mr-2 text-gray-600"></i>
                                    <h2 class="text-md inline mt-2 text-gray-500 mb-2">Seleccione la factura del mes</h2>
                                </div> 
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="file" wire:model="pdf" id="pdf" class="block w-full py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                        
                                            <p class="text-gray-400 mt-2">Tipos de archivos permitidos: PDF.</p>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">Cerrar</button>
                      
                        <button type="button" class="btn btn-primary" wire:click="save"  wire:loading.attr="disabled">Procesar socilitud</button>
                      
                    </div>
                </div>
            </div>
        </div>
    @endif
    @push('js')

<script>
    Livewire.on('volver', function(){
        window.history.back();      
    })
</script>

@endpush
</div>
