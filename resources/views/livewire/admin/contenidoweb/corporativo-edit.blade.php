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
                        <h5 class="py-0 text-lg text-gray-800"> Información de área "Corporativo"</h5>
                    </div>
                    <div class="modal-body">
                
                        
                        <hr class="mt-2 mb-2">

               

                            <div class="row ml-3 mr-3">
                                <div class="col">
                                    <div class="w-50 h-50">
                                           
                                        @if ($file)
                                        <p class="text-sm inline underline decoration-gray-400 mt-2"> Nueva imagen</p>
                                        <img src="{{ $file->temporaryUrl() }}" width="75%" height="75%">
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="file" value="file" wire:model="file" id="file" class="block w-full py-1.5 text-sm font-normal text-gray-400 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" accept="image/*">
                                        @error('file')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                        
                                    </div>
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

