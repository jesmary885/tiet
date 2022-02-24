<?php

namespace App\Http\Livewire;

use App\Models\Operacion;
use App\Models\Orden_produccion;
use Livewire\Component;
Use Livewire\WithPagination;
use PDF;

class OrdenProduccion extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render','confirmacion' => 'confirmacion','updatingSearch' => 'updatingSearch'];

    public $search,$cliente,$orden;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $ordenes = Orden_produccion::where('fecha', 'LIKE', '%' . $this->search . '%')
        ->where('estado', 'activa')
        ->latest('id')
        ->paginate(5);

        return view('livewire.orden-produccion',compact('ordenes'));
    }

    public function delete($ordenId){
        $this->orden = $ordenId;

        $this->emit('confirm', 'Esta seguro de anular esta orden?','orden-produccion','confirmacion','La orden se ha anulado.');
    }

    public function confirmacion(){
        $orden_destroy = Orden_produccion::where('id',$this->orden)->first();
        $orden_destroy->update([
            'estado' => 'anulada',
        ]);

    }

    public function view($ordenId){

        $this->orden = $ordenId;

        $orden_select = Orden_produccion::where('id',$this->orden)->first();
        $operacion = Operacion::where('orden_produccion_id',$this->orden)->first();
        if($operacion->fase1 != 'no') $fe1 = $operacion->fecha_i_fase1;
        else $fe1 =' ';
        if($operacion->fase2 != 'no') $fe2 = $operacion->fecha_i_fase2;
        else $fe2 =' ';
        if($operacion->fase3 != 'no') $fe3 = $operacion->fecha_i_fase3;
        else $fe3 =' ';
        if($operacion->fase4 != 'no') $fe4 = $operacion->fecha_i_fase4;
        else $fe4 =' ';
        if($operacion->fase5 != 'no') $fe5 = $operacion->fecha_i_fase5;
        else $fe5 =' ';

        $data = [
            'fecha' => $orden_select->fecha,
            'id' => $this->orden,
            'cantidad' =>$orden_select->cantidad,
            'tipo_ranurado' => $orden_select->tipo_ranurado->nombre,
            'diametro'=> $orden_select->diametro,
            'rosca'=> $orden_select->rosca,
            'lbs' => $orden_select->lbs,
            'grado' => $orden_select->grado,
            'maq' => $orden_select->maq,
            'ext' => $orden_select->ext_libres,
            'ranura' => $orden_select->ranura,
            'aa' => $orden_select->AA,
            'densidad' => $orden_select->densidad_rpp,
            'long' => $orden_select->long,
            'observaciones' => $orden_select->observaciones,
            'suplidor' => $orden_select->suplidor->nombre,
            'cliente'=> $orden_select->cliente->nombre.' '.$orden_select->cliente->apellido,
            'usuario' => $orden_select->user->name.' '.$orden_select->user->apellido,
            'fecha1' => $fe1,
             'fecha2' => $fe2,
             'fecha3' => $fe3,
             'fecha4' => $fe4,
             'fecha5' => $fe5,
    
        ];

        $pdf = PDF::loadView('PlanillaOrdenProduccion',$data)->output();
        return response()->streamDownload(
            fn () => print($pdf),
           "OrdenProduccion.pdf"
            );


   
    }


}
