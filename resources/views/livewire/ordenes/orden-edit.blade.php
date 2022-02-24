<div>
    <button type="submit" class="btn btn-success btn-sm" title="Editar orden" wire:click="open">
        <i class="far fa-edit"></i>
    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar orden</h5>
                    </div>
                    <div class="modal-body">
                        <div class="flex justify-between w-full mt-2 mr-2">
                            <div class="w-full mr-2">
                                <input wire:model="cantidad" type="text" title="Cantidad"
                                    class="w-1/2 px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Cantidad">
                                <x-input-error for="cantidad" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">Cerrar</button>
                        <button type="button" class="btn btn-primary" wire:click="update">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

