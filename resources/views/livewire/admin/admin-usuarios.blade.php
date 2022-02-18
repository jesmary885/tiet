<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" placeholder="Ingrese el nombre o nro de cedula del usuario" class="form-control">
        </div>
        @if ($usuarios->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Telefono</th>
                            <th>Rol</th>
                            <th colspan="2"></th>     

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->name}} {{$usuario->apellido}}</td>
                                <td>{{$usuario->cedula}}</td>
                                <td>{{$usuario->telefono}}</td>
                                <td>{{$usuario->roles->first()->name}}</td>
                                <td width="10px">
                                    @livewire('admin.create-usuarios',['accion' => 'edit', 'usuario' => $usuario->id],key($usuario->id))
                                </td>
                                <td width="10px">
                                    <button
                                        class="btn btn-danger btn-sm" 
                                        wire:click="delete('{{$usuario->id}}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$usuarios->links()}}
            </div>
        @else
             <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
            
    </div>
</div>