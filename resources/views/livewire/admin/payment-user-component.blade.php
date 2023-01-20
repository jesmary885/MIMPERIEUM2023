<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Historial de pagos
        </h2>
    </x-slot>

    <div class="container py-12">
        <x-table-responsive>

            <div class="px-6 py-4">

                <x-jet-input wire:model="search" type="text" class="w-full" placeholder="Escriba algo para filtrar" />

            </div>

            @if (count($pagos))
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                fecha
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Monto
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Descripción
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($pagos as $pago)

                            <tr wire:key="{{$user->email}}">
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm text-gray-900">
                                        {{$pago->created_at}}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$pago->total}}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$pago->description}}
                                    </div>

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            @if ($pagos->hasPages())
                    
                <div class="px-6 py-4">
                    {{$pagos->links()}}
                </div>

            @endif
        </x-table-responsive>
    </div>
</div>
