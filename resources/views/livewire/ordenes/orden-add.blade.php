<div  x-data="{fase1: @entangle('fase1'),fase2: @entangle('fase2'),fase3: @entangle('fase3'),fase4: @entangle('fase4'),fase5: @entangle('fase5'),fase6: @entangle('fase6')}">
    <button type="submit" class="btn btn-secondary btn-sm" title="Activar fase operacional" wire:click="open">
        <i class="far fa-calendar-check"></i>
    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar datos operacionales</h5>
                    </div>
                    <div class="modal-body">
                     
            
            <div class="w-full" :class="{'hidden': fase1 == 0}">
                <div>
                    <p class="text-gray-700 mt-4 font-semibold"> FASE 1 - TROQUELAR E IDENTIFICACIÓN DEL TUBO</p>
                </div>
                <div class=" w-full">
                    <x-button
                    class="btn btn-success mt-2" 
                    wire:click="fase1">
                    REGISTRAR FASE 1
                </x-button>
                </div>
            </div>

            <div class="w-full" :class="{'hidden': fase2 == 0}">
                <div>
                    <p class="text-gray-700 mt-4 font-semibold"> FASE 2 - RANURA SEGÚN ORDEN</p>
                </div>
                <div class=" w-full">
                    <x-button
                    class="btn btn-success mt-2" 
                    wire:click="fase2">
                    REGISTRAR FASE 2
                </x-button>
                </div>
            </div>

            <div class="w-full" :class="{'hidden': fase3 == 0}">
                <div>
                    <p class="text-gray-700 mt-4 font-semibold"> FASE 3 - LIMPIAR Y ELIMINAR REBARBAS</p>
                </div>
                <div class=" w-full">
                    <x-button
                    class="btn btn-success mt-2" 
                    wire:click="fase3">
                    REGISTRAR FASE 3
                </x-button>
                </div>
            </div>

            <div class="w-full" :class="{'hidden': fase4 == 0}">
                <div>
                    <p class="text-gray-700 mt-4 font-semibold"> FASE 4 - PROTEGER TUBERIA EN ZONA RANURADA</p>
                </div>
                <div class=" w-full">
                    <x-button
                    class="btn btn-success mt-2" 
                    wire:click="fase4">
                    REGISTRAR FASE 4
                </x-button>
                </div>
            </div>

            <div class="w-full" :class="{'hidden': fase5 == 0}">
                <div>
                    <p class="text-gray-700 mt-4 font-semibold"> FASE 5 - ALMACENADO EN RACK</p>
                </div>

                <div class="w-full mr-2">
                    <select wire:model="almacen_id"
                        class="block w-full bg-gray-100 border border-gray-200 text-gray-400 py-1 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="" selected>Seleccione el almacen</option>
                        @foreach ($almacenes as $almacen)
                            <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="almacen_id" />
                </div>
                <div class=" w-full">
                    <x-button
                    class="btn btn-success mt-2" 
                    wire:click="fase5">
                    REGISTRAR FASE 5
                </x-button>
                </div>
            </div>

            <div class="w-full" :class="{'hidden': fase6 == 0}">
                <div>
                    <p class="text-green-700 mt-4 font-semibold"> TODAS LAS FASES HAN SIDO REGISTRADAS</p>
                </div>
             
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
