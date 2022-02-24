<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" placeholder="Ingrese el nombre del almacen a buscar" class="form-control">
        </div>
        @if ($almacenes->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Email</th>
                            <th colspan="2"></th>     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($almacenes as $almacen)
                            <tr>
                                <td>{{$almacen->nombre}}</td>
                                <td>{{$almacen->direccion}}</td>
      
                                <td width="10px">
                                    @livewire('admin.create-almacenes',['accion' => 'edit', 'suplidor' => $almacen->id],key($almacen->id))
                                </td>
                                <td width="10px">
                                    <button
                                        class="btn btn-danger btn-sm" 
                                        wire:click="delete('{{$almacen->id}}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$almacenes->links()}}
            </div>
        @else
             <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
            
    </div>
</div>