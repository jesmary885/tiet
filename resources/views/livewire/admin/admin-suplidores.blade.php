<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" placeholder="Ingrese el nombre o rif del suplidor a buscar" class="form-control">
        </div>
        @if ($suplidors->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Rif</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th colspan="2"></th>     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suplidors as $suplidor)
                            <tr>
                                <td>{{$suplidor->nombre}}</td>
                                <td>{{$suplidor->rif}}</td>
                                <td>{{$suplidor->email}}</td>
                                <td>{{$suplidor->telefono}}</td>
                                <td width="10px">
                                    @livewire('admin.create-suplidores',['accion' => 'edit', 'suplidor' => $suplidor->id],key($suplidor->id))
                                </td>
                                <td width="10px">
                                    <button
                                        class="btn btn-danger btn-sm" 
                                        wire:click="delete('{{$suplidor->id}}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$suplidors->links()}}
            </div>
        @else
             <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
            
    </div>
</div>
