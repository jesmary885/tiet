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
                          
                            <th colspan="1"></th>     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->name}} {{$usuario->apellido}}</td>
                                <td>{{$usuario->cedula}}</td>
                        
                                 <td width="10px">
                                    <button type="button" class="ml-4 btn btn-sm btn-primary "
                                     wire:loading.attr="disabled" wire:click="buscar('{{$usuario->id}}')">
                                     <i class="fas fa-info-circle"></i></button>

                                    {{-- <a href="{{route('reporte.usuarios.generar',$usuario)}}" class="btn btn-primary ml-4"><i class="fas fa-info-circle"></i></a> --}}
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