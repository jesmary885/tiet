<div>
    <div class="card">
        <h1 class="py-0 text-lg text-gray-500 ml-4 mt-1"> <i class="fas fa-file-alt"></i> Registro de orden de producción</h1>
    </div>

    <div class="card w-full pt-0 m-0">
        <div class="card-body w-full pt-0 mt-0">
            <div class="flex justify-between w-full mt-3 mr-2">
                <div class="w-full mr-2">
                    <input wire:model="cantidad" type="number" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Cantidad">
                    <x-input-error for="cantidad" />
                </div>
                <div class="w-full mr-2">
                    <input wire:model="diametro" type="number" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Diámetro">
                    <x-input-error for="diametro" />
                </div>
                <div class="w-full">
                    <input wire:model="rosca" type="text" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Rosca">
                    <x-input-error for="rosca" />
                </div>
            </div>

            <div class="flex justify-between w-full mt-3 mr-2">
                <div class="w-full mr-2">
                    <input wire:model="lbs" type="text" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="LBS/FT">
                    <x-input-error for="lbs" />
                </div>
                <div class="w-full mr-2">
                    <input wire:model="grados" type="number" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Grados">
                    <x-input-error for="grados" />
                </div>
                <div class="w-full">
                    <input wire:model="ext_libre" type="text" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Ext./Libres">
                    <x-input-error for="ext_libre" />
                </div>
            </div>

            <div class="flex justify-between w-full mt-3 mr-2">
                <div class="w-full mr-2">
                    <input wire:model="maq" type="text" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="MAQ">
                    <x-input-error for="maq" />
                </div>
                <div class="w-full mr-2">
                    <input wire:model="ranura" type="text" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Ranura">
                    <x-input-error for="ranura" />
                </div>
                <div class="w-full">
                    <input wire:model="aa" type="text" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="%AA">
                    <x-input-error for="aa" />
                </div>
            </div>

            <div class="flex justify-between w-full mt-3 mr-2">
                <div class="w-full mr-2">
                    <input wire:model="densidad_rpp" type="text" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Densidad">
                    <x-input-error for="densidad_rpp" />
                </div>
                <div class="w-full mr-2">
                    <input wire:model="long" type="text" class="w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 rounded py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Long/Int">
                    <x-input-error for="long" />
                </div>
            </div>

            <div class="flex justify-between w-full mt-3">
                <div class="w-full mr-2">  
                    <select wire:model.lazy="cliente_id" class="block w-full bg-gray-100 border border-gray-200 text-gray-400 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="" selected>Seleccione el cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellido}} - Cedula: {{$cliente->cedula}}</option>
                        @endforeach
                    </select>
                    <x-input-error for="cliente_id" />
                </div>
                <div class="w-full mr-2">
                        <select wire:model.lazy="suplidor_id" class="block w-full bg-gray-100 border border-gray-200 text-gray-400 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" selected>Seleccione el suplidor</option>
                            @foreach ($suplidores as $suplidor)
                                <option value="{{$suplidor->id}}">{{$suplidor->nombre}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="suplidor_id" />
                </div>
                <div class="w-full">
                        <select wire:model.lazy="tipo_ranurado_id" class="block w-full bg-gray-100 border border-gray-200 text-gray-400 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" selected>Seleccione el tipo de ranurado</option>
                            @foreach ($ranurados as $ranurado)
                                <option value="{{$ranurado->id}}">{{$ranurado->nombre}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="tipo_ranurado_id" />
                </div>
            </div>
            {{-- <div class="flex mt-4">
                <i class="fas fa-history mt-3 mr-2"></i>
                <h2 class="text-lg inline mt-2 underline decoration-gray-400">Datos operacionales</h2>
            </div>

            <p class="text-gray-700 mt-4 ml-4 font-semibold"> FASE 1 - TROQUELAR E IDENTIFICACIÓN DEL TUBO</p>
            <div class="flex justify-items-stretch w-full mt-3 mb-2 ml-4">
                <div>
                    <x-input.date wire:model.lazy="fecha_i_toquelar_ident" id="fecha_i_toquelar_ident" placeholder="Fecha de inicio" class="px-4 outline-none"/>
                    <x-input-error for="fecha_i_toquelar_ident"/>     
                </div>
                <p class="ml-2 mr-2 text-gray-700 font-semibold">-</p>
                <div>
                    <x-input.date wire:model.lazy="fecha_f_toquelar_ident" id="fecha_f_toquelar_ident" placeholder="Fecha de culminación" class="px-4 outline-none"/>
                    <x-input-error for="fecha_f_toquelar_ident"/>
                </div>
            </div>
            <p class="text-gray-700 mt-4 ml-4 font-semibold"> FASE 2 - RANURA SEGÚN ORDEN</p>
            <div class="flex justify-items-stretch w-full mt-3 mb-2 ml-4">
                <div>
                    <x-input.date wire:model.lazy="fecha_i_ranura" id="fecha_i_ranura" placeholder="Fecha de inicio" class="px-4 outline-none"/>
                    <x-input-error for="fecha_i_ranura"/>     
                </div>
                <p class="ml-2 mr-2 text-gray-700 font-semibold">-</p>
                <div>
                    <x-input.date wire:model.lazy="fecha_f_ranura" id="fecha_f_ranura" placeholder="Fecha de culminación" class="px-4 outline-none"/>
                    <x-input-error for="fecha_f_ranura"/>
                </div>
            </div>

            <p class="text-gray-700 mt-4 ml-4 font-semibold"> FASE 3 - LIMPIAR Y ELIMINAR REBARBAS</p>
            <div class="flex justify-items-stretch w-full mt-3 mb-2 ml-4">
                <div>
                    <x-input.date wire:model.lazy="fecha_i_limpiar_reb" id="fecha_i_limpiar_reb" placeholder="Fecha de inicio" class="px-4 outline-none"/>
                    <x-input-error for="fecha_i_limpiar_reb"/>     
                </div>
                <p class="ml-2 mr-2 text-gray-700 font-semibold">-</p>
                <div>
                    <x-input.date wire:model.lazy="fecha_f_limpiar_reb" id="fecha_f_limpiar_reb" placeholder="Fecha de culminación" class="px-4 outline-none"/>
                    <x-input-error for="fecha_f_limpiar_reb"/>
                </div>
            </div>
            <p class="text-gray-700 mt-4 ml-4 font-semibold"> FASE 4 - PROTEGER TUBERIA EN ZONA RANURADA</p>
            <div class="flex justify-items-stretch w-full mt-3 mb-2 ml-4">
                <div>
                    <x-input.date wire:model.lazy="fecha_i_prot_tub" id="fecha_i_prot_tub" placeholder="Fecha de inicio" class="px-4 outline-none"/>
                    <x-input-error for="fecha_i_prot_tub"/>     
                </div>
                <p class="ml-2 mr-2 text-gray-700 font-semibold">-</p>
                <div>
                    <x-input.date wire:model.lazy="fecha_f_prot_tub" id="fecha_f_prot_tub" placeholder="Fecha de culminación" class="px-4 outline-none"/>
                    <x-input-error for="fecha_f_prot_tub"/>
                </div>
            </div>

            <p class="text-gray-700 mt-4 ml-4 font-semibold"> FASE 5 - ALMACENADO EN RACK</p>
            <div class="flex justify-items-stretch w-full mt-3 mb-2 ml-4">
                <div>
                    <x-input.date wire:model.lazy="fecha_i_alm" id="fecha_i_alm" placeholder="Fecha de inicio" class="px-4 outline-none"/>
                    <x-input-error for="fecha_i_alm"/>     
                </div>
                <p class="ml-2 mr-2 text-gray-700 font-semibold">-</p>
                <div>
                    <x-input.date wire:model.lazy="fecha_f_alm" id="fecha_f_alm" placeholder="Fecha de culminación" class="px-4 outline-none"/>
                    <x-input-error for="fecha_f_alm"/>
                </div>
            </div> --}}

            <div>
                <textarea wire:model="observaciones" class="mt-2 resize-none rounded-md outline-none w-full px-2 appearance-none block bg-gray-100 text-gray-700 border border-gray-200 py-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="observaciones" cols="80" rows="2" required placeholder="Observaciones"></textarea>
                <x-input-error for="observaciones" />
            </div>
            
            <div class="py-12 mt-2">
                <button type="submit" class="btn btn-primary" wire:click="save">
                    <i class="fas fa-file-download"></i> Guardar
                </button>
                <a href="{{route('orden_produccion.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Regresar</a>
            </div>
        </div>
    </div>
</div>



        






