<div  x-data="{fase1: @entangle('fase1'),fase2: @entangle('fase2'),fase3: @entangle('fase3'),fase4: @entangle('fase4'),fase5: @entangle('fase5')}">
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
            
            <div class="flex justify-items-stretch w-full  ml-4" :class="{'hidden': fase2 == 0}">
                <p class="text-gray-700 mt-4 ml-4 font-semibold"> FASE 2 - RANURA SEGÚN ORDEN</p>
                
            </div>

            <div class="flex justify-items-stretch w-full ml-4" :class="{'hidden': fase3 == 0}">
                <p class="text-gray-700 mt-4 ml-4 font-semibold"> FASE 3 - LIMPIAR Y ELIMINAR REBARBAS</p>
               
            </div>
           
            <div class="flex justify-items-stretch w-full ml-4" :class="{'hidden': fase4 == 0}">
                <p class="text-gray-700 mt-4 ml-4 font-semibold"> FASE 4 - PROTEGER TUBERIA EN ZONA RANURADA</p>
               
            </div>

            
            <div class="flex justify-items-stretch w-full ml-4" :class="{'hidden': fase5 == 0}">
                <p class="text-gray-700 mt-4 ml-4 font-semibold"> FASE 5 - ALMACENADO EN RACK</p>
            
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
