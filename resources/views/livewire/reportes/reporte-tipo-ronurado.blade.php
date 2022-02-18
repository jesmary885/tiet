<div>
    <div class="card">
        @if ($array)
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Tipo de ranurado</th>
                            <th class="text-center">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($array as $value)
                        <tr>
                            <td class="text-center">{{$value['nombre']}}</td>
                            <td class="text-center">{{$value['quantity']}}</td>
                        </tr>
                    @endforeach    
                    </tbody>
                </table>
            </div>
        @else
             <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
        <div class="mt-2 ml-4 mb-2">
            <a href="{{route('reporte.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Regresar</a>
        </div>
    </div>
</div>
