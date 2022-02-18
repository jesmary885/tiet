<?php

namespace App\Http\Livewire\Reportes;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReporteTipoRonurado extends Component
{

    public $fecha_inicio, $fecha_fin, $sucursal_id;

    public function render()
    {
        
        $fecha_inicioo = date("Y-m-d",strtotime($this->fecha_inicio));
        $fecha_finn = date("Y-m-d",strtotime($this->fecha_fin));

        $ranurados = DB::select('SELECT t.nombre, t.id, sum(op.cantidad) as quantity from tipo_ranurados t
        inner join orden_produccions op on op.tipo_ranurado_id = t.id where op.fecha BETWEEN :fecha_inicioo AND :fecha_finn
        group by t.nombre, t.id order by sum(op.cantidad) desc limit 5',array('fecha_inicioo' => $fecha_inicioo,'fecha_finn' => $fecha_finn));

        $data=json_encode($ranurados);
        $array = json_decode($data, true);


        return view('livewire.reportes.reporte-tipo-ronurado',compact('array'));
    }
}
