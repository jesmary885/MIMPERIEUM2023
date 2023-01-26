<div>
    <button type="submit" class="float-right" wire:click="open">
        <i class="fas fa-user-edit text-blue-600"></i>
    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
          >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="py-0 text-lg text-gray-800"> Editar usuario</h5>
                    </div>
                    <div class="modal-body">
                        <div class="flex justify-start">
                        <p class="text-sm m-0 p-0 text-gray-500 font-semibold"><i class="fas fa-info-circle"></i> Complete todos los campos y presiona Guardar</p> 

                        </div>
                        
                        <hr class="mt-2 mb-2">

                            <div class="flex justify-between">
                                <div class="form-group w-full mr-2 mt-2">
                                        <label class="w-full text-justify text-gray-600 text-md">Nombre</label>
                                        <input type="text" wire:model="name" class="form-control rounded" id="formGroupExampleInput">
                                        <x-jet-input-error for="name" />
                                </div>
                                <div class="form-group w-full mr-2 mt-2">
                                    <label class="w-full text-justify text-gray-600 text-md">Email</label>
                                    <input type="email" wire:model="email" class="form-control rounded" id="formGroupExampleInput">
                                    <x-jet-input-error for="email" />
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <div class="form-group w-full mr-2 mt-2">
                                        <label class="w-full text-justify text-gray-600 text-md">Teléfono</label>
                                        <input type="number" wire:model="phone" class="form-control rounded" id="formGroupExampleInput">
                                        <x-jet-input-error for="phone" />
                                </div>
                                <div class="form-group w-full mr-2 mt-2">
                                    <label class="w-full text-justify text-gray-600 text-md">Dirección</label>
                                    <input type="text" wire:model="direction" class="form-control rounded" id="formGroupExampleInput">
                                    <x-jet-input-error for="direction" />
                                </div>
                            </div>

                            
                            <div class="flex justify-between">
                                <div class="form-group w-full mr-2 mt-2">
                                        <label class="w-full text-justify text-gray-600 text-md">Dni</label>
                                        <input type="text" wire:model="dni" class="form-control rounded" id="formGroupExampleInput">
                                        <x-jet-input-error for="dni" />
                                </div>
                                <div class="form-group w-full mr-2 mt-2">
                                        <label class="w-full text-justify text-gray-600 text-md">Código de patrocinador</label>
                                        <input type="number" wire:model="codigo" class="form-control rounded" id="formGroupExampleInput">
                                        <x-jet-input-error for="codigo" />
                                </div>
                            </div>

                            <div class="flex justify-between mt-2">
                                <div class="form-group w-full mr-2">
                                    <label class="w-full text-justify text-gray-600 text-md">Rol </label>
                                    <select wire:model="roles_id" title="Rol de usuario" class="block w-full text-gray-400 py-2 px-2 pr-8 leading-tight rounded focus:outline-none focus:border-gray-500">
                                        <option value="" selected>Rol del usuario</option>
                                            @foreach ($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->name}}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="roles_id" />
                                </div>
                                <div class="form-group w-full">
                                    <label class="w-full text-justify text-gray-600 text-md">Estado</label>
                                    <select wire:model="status" title="Plan" id="esstatus" class="block w-full text-gray-400 py-2 px-2 pr-8 leading-tight rounded focus:outline-none focus:border-gray-500" name="estado">
                                        <option value="" selected>Estado</option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo_para_comisionar">Inactivo para comisionar</option>
                                        <option value="inactivo">Inactivo en todo el sistema</option>
                                    </select>
                                    <x-jet-input-error for="status" />
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