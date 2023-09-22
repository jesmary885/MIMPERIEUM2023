<div>

    <button title="Ver detalle" type="submit" class="btn text-white bg-green-600 btn-lg " wire:click="open">
        Ver datos
    </button> 
        

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title py-0 text-lg text-gray-800 font-bold"> Datos bancarios</h5>
                    </div>
                    <div class="modal-body">

                        <div>

                            <h2 class="text-gray-700 font-bold text-md mb-3 text-justify">
                                Nombre : {{$cuenta->name}}
                            </h2>


                            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1 mb-2">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Tipo</span>
                                                <span class="info-box-number text-center text-muted mb-0">{{$cuenta->type}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Número</span>
                                                <span class="info-box-number text-center text-muted mb-0">{{$cuenta->number}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Iban</span>
                                                <span class="info-box-number text-center text-muted mb-0">{{$cuenta->iban}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                      

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gray-500 text-white" data-dismiss="modal" wire:click="close">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
   
</div>
