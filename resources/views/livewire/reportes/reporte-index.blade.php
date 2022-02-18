<div>
    <div class="card mt-2">
      
        <p class="text-gray-700 mt-4 ml-4 font-semibold">Periodo de fechas en que desee generar el reporte:</p>
        <div class="flex justify-items-stretch w-full mt-2 mb-2 ml-4">
            <div>
                <x-input.date wire:model.lazy="fecha_inicio" id="fecha_inicio" placeholder="Seleccione la fecha inicio" class="px-4 outline-none"/>
                <x-input-error for="fecha_inicio"/>     
            </div>
            <p class="ml-2 mr-2 text-gray-700 font-semibold">-</p>
            <div>
                <x-input.date wire:model.lazy="fecha_fin" id="fecha_fin" placeholder="Seleccione la fecha fin" class="px-4 outline-none"/>
                <x-input-error for="fecha_fin"/>
            </div>
        </div>

            <div>
                <button type="button" class="ml-4 mt-4 mb-2 btn btn-primary disabled:opacity-25" wire:loading.attr="disabled" wire:click="buscar">Generar reporte</button> 
            </div>

    </div>