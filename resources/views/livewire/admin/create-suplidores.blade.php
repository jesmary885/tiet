<div>
    <button type="submit" class="btn btn-primary btn-sm float-right" wire:click="open">
        @if ($accion == 'create')
        Nuevo suplidor
        <i class="fas fa-user-plus"></i>
        @else
        <i class="fas fa-user-edit"></i>
        @endif
    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registro de Suplidores</h5>
                    </div>
                    <div class="modal-body">

                        <div class="flex mt-2 justify-between w-full">
                            
                            <div class="w-full mr-2">
                                <input wire:model.defer="rif" type="text"
                                    class="px-2 appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Nro de rif">
                                <x-input-error for="rif" />
                            </div>
                            <div class="w-full mr-2">
                                <input wire:model="telefono" type="number"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Teléfono">
                                <x-input-error for="telefono" />
                            </div>
                        </div>

                        <div class="flex justify-between w-full mt-2 mr-2">
                            <div class="w-full mr-2">
                                <input wire:model="nombre" type="text"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Nombres">
                                <x-input-error for="nombre" />
                            </div>
                            <div class="w-full mr-2">
                                <input wire:model="direccion" type="text"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Dirección">
                                <x-input-error for="direccion" />
                            </div>
                        </div>

                        <div class="flex justify-between w-full mt-2 mr-2">

                            <div class="w-full mr-2">
                                <input wire:model="email" type="email"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="E-mail">
                                <x-input-error for="email" />
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



