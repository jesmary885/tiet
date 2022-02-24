<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Operacion;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteUsuarios extends Component
{

    public $usuario;
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

  
    public function render()
    {
        
        $ordenes= Operacion::where('fase1',$this->usuario)
                            ->orwhere('fase2',$this->usuario)
                            ->orwhere('fase3',$this->usuario)
                            ->orwhere('fase4',$this->usuario)
                            ->orwhere('fase5',$this->usuario)
                            ->paginate(5);

        return view('livewire.reportes.reporte-usuarios',compact('ordenes'));
    }



}
