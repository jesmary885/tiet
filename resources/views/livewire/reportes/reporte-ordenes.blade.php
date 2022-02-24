<div x-data="{fase1: @entangle('fase1'),fase2: @entangle('fase2'),fase3: @entangle('fase3'),fase4: @entangle('fase4'),fase5: @entangle('fase5'),fase6: @entangle('fase6')}">
    <button type="submit" class="btn btn-primary btn-sm float-right" wire:click="open">
        <i class="fas fa-info-circle"></i>

    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalle de orden</h5>
                    </div>
                    <div class="modal-body">

                        <div class="w-full" :class="{'hidden': fase6 == 0}">
                            <div>
                                <p class="text-gray-700 font-semibold"> NO EXISTE NINGUNA FASE REGISTRADA</p>
                            </div>
                           
                        </div>

                        <div class="w-full" :class="{'hidden': fase1 == 0}">
                            <div>
                                <p class="text-gray-700 font-bold"> FASE 1 - TROQUELAR E IDENTIFICACIÓN DEL TUBO</p>
                            </div>

                            <div>
                                <p class="text-gray-700 font-semibold"> Fecha de registro : {{$fecha_fase1}}</p>
                                <p class="text-gray-700 font-semibold"> Usuario : {{$u_fase1}}</p>
                            </div>
                        </div>

                        
                        <div class="w-full" :class="{'hidden': fase2 == 0}">
                            <hr class="mt-4 mb-3">
                            <div>
                                <p class="text-grenn-700 font-bold"> FASE 2 - RANURA SEGÚN ORDEN</p>
                            </div>

                            <div>
                                <p class="text-gray-700 font-semibold"> Fecha de registro : {{$fecha_fase2}}</p>
                                <p class="text-gray-700 font-semibold"> Usuario : {{$u_fase2}}</p>
                            </div>
                        </div>

                        <div class="w-full" :class="{'hidden': fase3 == 0}">
                            <hr class="mt-4 mb-3">
                            <div>
                                <p class="text-gray-700 font-bold"> FASE 3 - LIMPIAR Y ELIMINAR REBARBAS</p>
                            </div>

                            <div>
                                <p class="text-gray-700 font-semibold"> Fecha de registro : {{$fecha_fase3}}</p>
                                <p class="text-gray-700 font-semibold"> Usuario : {{$u_fase3}}</p>
                            </div>
                        </div>

                        <div class="w-full" :class="{'hidden': fase4 == 0}">
                            <hr class="mt-4 mb-3">
                            <div>
                                <p class="text-gray-700 mt-4 font-bold"> FASE 4 - PROTEGER TUBERIA EN ZONA RANURADA</p>
                            </div>

                            <div>
                                <p class="text-gray-700 font-semibold"> Fecha de registro : {{$fecha_fase4}}</p>
                                <p class="text-gray-700 font-semibold"> Usuario : {{$u_fase4}}</p>
                            </div>
                        </div>

                        <div class="w-full" :class="{'hidden': fase5 == 0}">
                            <hr class="mt-4 mb-3">
                            <div>
                                <p class="text-gray-700 font-bold"> FASE 5 - ALMACENADO EN RACK</p></p>
                            </div>

                            <div>
                                <p class="text-gray-700 font-semibold"> Fecha de registro : {{$fecha_fase5}}</p>
                                <p class="text-gray-700 font-semibold"> Usuario : {{$u_fase5}}</p>
                                <p class="text-gray-700 font-semibold"> Almacen : {{$almacen}}</p>
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
</div>