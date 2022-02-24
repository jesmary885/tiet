<?php

namespace App\Http\Livewire\Reportes;

use Carbon\Carbon;
use Livewire\Component;

class ReporteIndex extends Component
{
    public $vista, $fecha_inicio, $fecha_fin;

    public function render()
    {
        return view('livewire.reportes.reporte-index');
    }

    public function buscar(){
        
      
        $fecha_inicio = Carbon::parse($this->fecha_inicio);
        $fecha_fin = Carbon::parse($this->fecha_fin);

        return redirect()->route('reporte.ordenes.generar',compact('fecha_inicio','fecha_fin'));
    }
}
