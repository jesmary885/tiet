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

    protected $listeners = ['render' => 'render','confirmacion' => 'confirmacion'];

    public $search,$cliente,$orden;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $ordenes = Orden_produccion::where('fecha', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(5);

        return view('livewire.orden-produccion',compact('ordenes'));
    }

    public function delete($ordenId){
        $this->orden = $ordenId;

        $this->emit('confirm', 'Esta seguro de eliminar esta orden?','orden-produccion','confirmacion','La orden se ha eliminado.');
    }

    public function confirmacion(){
        $orden_destroy = Orden_produccion::where('id',$this->orden)->first();
        $orden_destroy->delete();

    }

    public function view($ordenId){

        $this->orden = $ordenId;

        $orden_select = Orden_produccion::where('id',$this->orden)->first();
        $operacion = Operacion::where('orden_produccion_id',$this->orden)->first();

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
            'fecha1' => date("d-m-Y",strtotime($operacion->fecha_i_toquelar_ident)),
            'fecha2' =>  date("d-m-Y",strtotime($operacion->fecha_f_toquelar_ident)),
            'fecha3' =>  date("d-m-Y",strtotime($operacion->fecha_i_limpiar_reb)),
            'fecha4' =>  date("d-m-Y",strtotime($operacion->fecha_f_limpiar_reb)),
            'fecha5' =>  date("d-m-Y",strtotime($operacion->fecha_i_prot_tub)),
            'fecha6' =>  date("d-m-Y",strtotime($operacion->fecha_f_prot_tub)),
            'fecha7' =>  date("d-m-Y",strtotime($operacion->fecha_i_alm)),
            'fecha8' =>  date("d-m-Y",strtotime($operacion->fecha_f_alm)),
            'fecha9' =>  date("d-m-Y",strtotime($operacion->fecha_i_ranura)),
            'fecha10' =>  date("d-m-Y",strtotime($operacion->fecha_f_ranura)),
        ];

        $pdf = PDF::loadView('PlanillaOrdenProduccion',$data)->output();
        return response()->streamDownload(
            fn () => print($pdf),
           "OrdenProduccion.pdf"
            );


   
    }


}
