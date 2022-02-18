<div>

    <div class="card">
        <div class="card-header">
            <input wire:model="search" placeholder="Ingrese la fecha de la orden a buscar" class="form-control">
        </div>
        @if ($ordenes->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Diametro</th>
                            <th>Rosca</th>
                            <th>Tipo de ronurado</th>
                            <th>Suplidor</th>
                            <th colspan="2"></th> 
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenes as $orden)
                            <tr>
                                <td>{{$orden->fecha}}</td>
                                <td>{{$orden->cantidad}}</td>
                                <td>{{$orden->diametro}}</td>
                                <td>{{$orden->rosca}}</td>
                                <td>{{$orden->tipo_ranurado->nombre}}</td>
                                <td>{{$orden->suplidor->nombre}}</td>
                                <td width="10px">
                                    <button
                                        class="btn btn-success btn-sm" 
                                        wire:click="view('{{$orden->id}}')"
                                        title="Ver orden">
                                        <i class="far fa-file-pdf"></i>
                                    </button>
                                </td>
                                <td width="10px">
                                    <button
                                        class="btn btn-danger btn-sm" 
                                        wire:click="delete('{{$orden->id}}')"
                                        title="Eliminar producto">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$ordenes->links()}}
            </div>
        @else
             <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
            
    </div>
</div>
