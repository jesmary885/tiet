<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" placeholder="Ingrese el nombre del tipo de ranurado a buscar" class="form-control">
        </div>
        @if ($ranurados->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th colspan="2"></th>     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ranurados as $ranurado)
                            <tr>
                                <td>{{$ranurado->id}}</td>
                                <td>{{$ranurado->nombre}}</td>
                               
                                <td width="10px">
                                    @livewire('admin.create-tipo-ronurados',['accion' => 'edit', 'ranurado' => $ranurado->id],key($ranurado->id))
                                </td>
                                <td width="10px">
                                    <button
                                        class="btn btn-danger btn-sm" 
                                        wire:click="delete('{{$ranurado->id}}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$ranurados->links()}}
            </div>
        @else
             <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
            
    </div>
</div>
