<div>

                            <div class="card">
                        
                                @if ($ordenes->count())
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Orden Nro</th>
                                                    <th class="text-center">Fase 1</th>
                                                    <th class="text-center">Fase 2</th>
                                                    <th class="text-center">Fase 3</th>
                                                    <th class="text-center">Fase 4</th>
                                                    <th class="text-center">Fase 5</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ordenes as $orden)
                                                    <tr>
                                                        <td class="font-bold text-center">{{$orden->orden_produccion_id}}</td>
                                                        <?php  
                                                        if ($orden->fase1 == $this->usuario){
                                                            $fase1 = 'REGISTRADA - Fecha'.' '.$orden->fecha_i_fase1;
                                                            $colorf1 = 'green'; 
                                                        }
                                                        else {
                                                            $fase1 = 'NO REGISTRADA POR ESTE USUARIO';
                                                            $colorf1 = 'gray'; 
                                                        }


                                                        if ($orden->fase2 == $this->usuario){
                                                            $fase2 = 'REGISTRADA - Fecha'.' '.$orden->fecha_i_fase2;
                                                            $colorf2 = 'green'; 
                                                        } 
                                                        else{
                                                            $fase2 = 'NO REGISTRADA POR ESTE USUARIO';
                                                            $colorf2 = 'gray'; 
                                                        } 
                                                        
                                                        if ($orden->fase3 == $this->usuario){
                                                            $fase3 = 'REGISTRADA - Fecha'.' '.$orden->fecha_i_fase3;
                                                            $colorf3 = 'green'; 
                                                        } 
                                                        else{
                                                            $fase3 = 'NO REGISTRADA POR ESTE USUARIO';
                                                            $colorf3 = 'gray'; 
                                                        } 
                                                        
                                                        if ($orden->fase4 == $this->usuario){
                                                            $fase4 = 'REGISTRADA - Fecha'.' '.$orden->fecha_i_fase4;
                                                            $colorf4 = 'green'; 
                                                        } 
                                                        else {
                                                            $fase4 = 'NO REGISTRADA POR ESTE USUARIO';
                                                            $colorf4 = 'gray'; 
                                                        } 
                                                        
                                                        if ($orden->fase5 == $this->usuario){
                                                            $fase5 = 'REGISTRADA - Fecha'.' '.$orden->fecha_i_fase5;
                                                            $colorf5 = 'green'; 
                                                        }  
                                                        else{
                                                            $fase5 = 'NO REGISTRADA POR ESTE USUARIO';
                                                            $colorf5 = 'gray'; 
                                                        } 
                                                        
                                                        ?>
                                                        <td class="font-bold text-center" style="color:{{$colorf1}}">{{$fase1}}</td>
                                                        <td class="font-bold text-center" style="color:{{$colorf2}}">{{$fase2}}</td>
                                                        <td class="font-bold text-center" style="color:{{$colorf3}}">{{$fase3}}</td>
                                                        <td class="font-bold text-center" style="color:{{$colorf4}}">{{$fase4}}</td>
                                                        <td class="font-bold text-center" style="color:{{$colorf5}}">{{$fase5}}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer flex">
                                        {{$ordenes->links()}}
                                        <div>
                                            <a href="{{route('reporte.usuarios.index')}}" class="btn btn-primary ml-4"><i class="fas fa-undo-alt"></i> Regresar</a>
                                           
                                        </div>
                                    </div>
                                @else
                                     <div class="card-body">
                                        <strong>No hay registros</strong>
                                    </div>
                                    <div>
                                        <a href="{{route('reporte.usuarios.index')}}" class="btn btn-primary ml-4"><i class="fas fa-undo-alt"></i> Regresar</a>
                                       
                                    </div>
                                @endif
                                    
                            </div>
                 
       
                    
           
</div>