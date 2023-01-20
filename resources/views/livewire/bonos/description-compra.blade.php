<div>
    <button type="submit" wire:click="open">
    <i class="	fas fa-eye text-blue-600 text-lg"></i>
    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title py-0 text-lg text-gray-800">Detalle del registro de pago</h5>
                    </div>
                    <div class="modal-body">

                        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">

                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Cant</th>
                                        <th class="text-center">Ptos otorgados</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($items as $item)
                                        <tr>
                                            
                                            <td>
                                                <div class="flex">
                                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                                        alt="">
                                                    <article>
                                                        <h1 class="font-bold">{{ $item->name }}</h1>
                                                
                                                    </article>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                {{ $item->qty }}
                                            </td>

                                            <td class="text-center">
                                             {{ $item->options->points }} ptos
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                       
                      

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>