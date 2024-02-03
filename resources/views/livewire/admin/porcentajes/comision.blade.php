<div>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            Editar el monto de membresía
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Costo de membresía
                </x-jet-label>

                <div class="flex">
                <x-jet-input wire:model="monto" type="text" class="w-1/3" /> <p class="mt-2 font-bold ml-2">Soles</p>

                </div>

                

                <x-jet-input-error for="monto" />
            </div>

        </x-slot>


        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Guardado
            </x-jet-action-message>

            <x-jet-button>
                Modificar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
