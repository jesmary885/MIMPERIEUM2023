<div>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            Editar el porcentaje de los diferentes niveles del bono residual
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nivel 1
                </x-jet-label>

                <div class="flex">

                <x-jet-input wire:model="bono_residual_n1" type="text" class="w-1/3" /> <p class="mt-2 font-bold ml-2">%</p>

                </div>
                <x-jet-input-error for="bono_residual_n1" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nivel 2
                </x-jet-label>

                <div class="flex">

                <x-jet-input wire:model="bono_residual_n2" type="text" class="w-1/3" /> <p class="mt-2 font-bold ml-2">%</p>

                </div>
                <x-jet-input-error for="bono_residual_n2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nivel 3
                </x-jet-label>

                <div class="flex">

                <x-jet-input wire:model="bono_residual_n3" type="text" class="w-1/3" /> <p class="mt-2 font-bold ml-2">%</p>

                </div>
                <x-jet-input-error for="bono_residual_n3" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nivel 4
                </x-jet-label>

                <div class="flex">

                <x-jet-input wire:model="bono_residual_n4" type="text" class="w-1/3" /> <p class="mt-2 font-bold ml-2">%</p>

                </div>
                <x-jet-input-error for="bono_residual_n4" />
            </div>

           

        </x-slot>


        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Categoría subcategoría
            </x-jet-action-message>

            <x-jet-button>
                Modificar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
