<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" placeholder="Ingrese fecha, nro o estado de la orden a buscar" class="form-control">
        </div>
        @if ($ordenes->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Nro.</th>
                            <th class="text-center">Fase 1</th>   
                            <th class="text-center">Fase 2</th>
                            <th class="text-center">Fase 3</th>
                            <th class="text-center">Fase 4</th>
                            <th class="text-center">Fase 5</th>
                            <th class="text-center">Estado</th>
                            <th colspan="1"></th>     
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenes as $orden)
                            <tr>
                                <td class="text-center">{{$orden->fecha}}</td>
                                <td class="text-center">{{$orden->id}}</td>
                                 <?php  
                                if ($orden->operacions->find($orden->id)->fase1 != 'no') {
                                    $colorf1 = 'green'; 
                                    $fase1 = 'COMPLETADA';
                                }else{
                                    $colorf1 = 'red'; 
                                    $fase1 = 'POR COMPLETAR';
                                } 

                                if ($orden->operacions->find($orden->id)->fase2 != 'no') {
                                    $colorf2 = 'green'; 
                                    $fase2 = 'COMPLETADA';
                                }else{
                                    $colorf2 = 'red'; 
                                    $fase2 = 'POR COMPLETAR';
                                } 

                                if ($orden->operacions->find($orden->id)->fase3 != 'no') {
                                    $colorf3 = 'green'; 
                                    $fase3 = 'COMPLETADA';
                                }else{
                                    $colorf3 = 'red'; 
                                    $fase3 = 'POR COMPLETAR';
                                } 

                                if ($orden->operacions->find($orden->id)->fase4 != 'no') {
                                    $colorf4 = 'green'; 
                                    $fase4 = 'COMPLETADA';
                                }else{
                                    $colorf4 = 'red'; 
                                    $fase4 = 'POR COMPLETAR';
                                } 

                                if ($orden->operacions->find($orden->id)->fase5 != 'no') {
                                    $colorf5 = 'green'; 
                                    $fase5 = 'COMPLETADA';
                                }else{
                                    $colorf5 = 'red'; 
                                    $fase5 = 'POR COMPLETAR';
                                } 

                                if ($orden->estado== 'activa') $colore = 'green'; 
                                else $colore = 'red'; 
                                ?>
                                 <td class="font-bold text-center" style="color:{{$colorf1}}">{{$fase1}}</td>
                                 <td class="font-bold text-center" style="color:{{$colorf2}}">{{$fase2}}</td>  
                                 <td class="font-bold text-center" style="color:{{$colorf3}}">{{$fase3}}</td>  
                                 <td class="font-bold text-center" style="color:{{$colorf4}}">{{$fase4}}</td>  
                                 <td class="font-bold text-center" style="color:{{$colorf5}}">{{$fase5}}</td>    
                                 <td class="font-bold text-center" style="color:{{$colore}}">{{$orden->estado}}</td>
                              
                      
                                 <td width="10px">
                                    @livewire('reportes.reporte-ordenes', ['orden' => $orden])
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

