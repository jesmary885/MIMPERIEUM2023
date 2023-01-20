<div>
    <button type="submit" class="btn btn-primary btn-sm float-right" wire:click="open">
        @if($action == 'crear')
            <i class="fas fa-plus-square"></i> Crear cuenta
        @else
            <i class="fas fa-edit"></i>
        @endif
    </button>

    @if($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title py-0 text-lg mb-2 text-gray-800">  Registro de cuentas</h5>
                    </div>
                    <div class="modal-body">
                        <h2 class="text-sm ml-2 m-0 p-0 text-gray-500 font-semibold"><i class="fas fa-info-circle"></i> Complete todos los campos y presiona Guardar</h2> 
                        <hr class="m-2 p-2">
                        <div class="flex justify-between w-full mt-2 mr-2">
                            <div class="w-full mr-2">
                                <input wire:model="name" type="text"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Nombre" title="Nombre">
                                <x-jet-input-error for="name" />
                            </div>
                           
                        </div>

                        <div class="flex mt-2 justify-between w-full">
                            <div class="w-full mr-2">
                                <select wire:model="type" id="tipo_documento"
                                    class="block w-full bg-gray-100 border border-gray-200 text-gray-400 py-1 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    name="type" title="Tipo de documento">
                                    <option value="" selected>Tipo</option>
                                    <option value="ahorro">Cuenta de Ahorro</option>
                                    <option value="corriente">Cuenta Corriente</option>
                                    <option value="caja_ahorro">Caja de ahorro</option>
                                    <option value="otro">Otro</option>
                                </select>
                                <x-jet-input-error for="type" />
                            </div>
                            <div class="w-full mr-2">
                                <input wire:model.defer="number" name="documento" type="text"
                                    class="px-2 appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Nro de cuenta" title="Nro de cuenta">
                                <x-jet-input-error for="number" />
                            </div>
                        </div>

                        <div class="flex justify-between w-full mt-2 mr-2">
                            <div class="w-full mr-2">
                                <input wire:model="iban" type="text"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Iban" title="Nombre">
                                <x-jet-input-error for="iban" />
                            </div>
                            <div class="w-full mr-2">
                                <input wire:model="bic" type="text"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Bic/Swift" title="Apellido">
                                <x-jet-input-error for="bic" />
                            </div>
                        </div>

                        <div>
                            <textarea wire:model="comments" class="mt-2 mr-2 resize-none rounded-md outline-none w-full px-2 appearance-none block bg-gray-50 text-gray-700 border border-gray-200 py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="comments" cols="80" rows="2" required placeholder="Observaciones"></textarea>
                            <x-jet-input-error for="comments" />
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