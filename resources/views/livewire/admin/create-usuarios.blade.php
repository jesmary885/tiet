<div>
    <button type="submit" class="btn btn-primary btn-sm float-right" wire:click="open">
        @if ($accion == 'create')
        Nuevo usuario
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
                        <h5 class="modal-title">Registro de usuarios</h5>
                    </div>
                    <div class="modal-body">

                        <div class="flex mt-2 justify-between w-full">
                            
                            <div class="w-full mr-2">
                                <input wire:model.defer="cedula" type="number"
                                    class="px-2 appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Nro de cedula">
                                <x-input-error for="cedula" />
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
                                <input wire:model="name" type="text"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Nombres">
                                <x-input-error for="name" />
                            </div>
                            <div class="w-full mr-2">
                                <input wire:model="apellido" type="text"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Apellidos">
                                <x-input-error for="apellido" />
                            </div>
                        </div>

                        <div class="flex justify-between w-full mt-2 mr-2">

                            <div class="w-full mr-2">
                                <input wire:model="email" type="email"
                                    class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="E-mail">
                                <x-input-error for="email" />
                            </div>
                            <div class="w-full">
                                <select wire:model="roles_id" class="block w-full bg-gray-100 border border-gray-200 text-gray-400 py-1 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="" selected>Rol del usuario</option>
                                        @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="roles_id" />
                            </div>

                        </div>

                        <div class="flex justify-between w-full mt-2">
                            <div class="w-full mr-2">
                                <select wire:model="estado_id"
                                    class="block w-full bg-gray-100 border border-gray-200 text-gray-400 py-1 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="" selected>Estado/provincia/region</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="estado_id" />
                            </div>
                            
                            <div class="w-full mr-2">
                                <select wire:model="ciudad_id"
                                    class="block w-full bg-gray-100 border border-gray-200 text-gray-400 py-1 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="" selected>Seleccione la ciudad</option>
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="ciudad_id" />
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


