<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Operacion;
use App\Models\Orden_produccion;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReporteOrdenes extends Component
{
    public $isopen = false;
    public $orden, $fecha_fase1,$fecha_fase2,$fecha_fase3,$fecha_fase4,$fecha_fase5,$fase1=0,$fase2=0,$fase3=0,$fase4=0,$fase5=0, $fase6=0;

   public $u_fase1, $u_fase2, $u_fase3, $u_fase4, $u_fase5, $almacen;

    public function mount(){

    $orden_select = Operacion::where('orden_produccion_id',$this->orden->id)->first();

    if($orden_select->fase1 != 'no'){
        $this->fase1 = 1;
        $us_fase1=User::where('id',$orden_select->fase1)->first();
        $this->u_fase1 = $us_fase1->name.' '.$us_fase1->apellido;
        $this->fecha_fase1 = $orden_select->fecha_i_fase1;
    }else{
        $this->fase6 = 1;
    }

    if($orden_select->fase2 != 'no'){
        $this->fase2 = 1;
        $us_fase2=User::where('id',$orden_select->fase2)->first();
        $this->u_fase2 = $us_fase2->name.' '.$us_fase2->apellido;
        $this->fecha_fase2 = $orden_select->fecha_i_fase2;
    }

    if($orden_select->fase3 != 'no'){
        $this->fase3 = 1;
        $us_fase3=User::where('id',$orden_select->fase3)->first();
        $this->u_fase3 = $us_fase3->name.' '.$us_fase3->apellido;
        $this->fecha_fase3 = $orden_select->fecha_i_fase3;
    }
    if($orden_select->fase4 != 'no'){
        $this->fase4 = 1;
        $us_fase4=User::where('id',$orden_select->fase4)->first();
        $this->u_fase4 = $us_fase4->name.' '.$us_fase4->apellido;
        $this->fecha_fase4 = $orden_select->fecha_i_fase4;
    }
    if($orden_select->fase5 != 'no'){
        $this->fase5 = 1;
        $us_fase5=User::where('id',$orden_select->fase5)->first();
        $this->u_fase5 = $us_fase5->name.' '.$us_fase5->apellido;
        $this->fecha_fase5 = $orden_select->fecha_i_fase5;
        $this->almacen = $orden_select->almacen->nombre;
    }

        
    }

    public function render()
    {
        return view('livewire.reportes.reporte-ordenes');
    }

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

}
