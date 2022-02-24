<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Orden_produccion;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteOrdenesIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];
    public $search;


    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $ordenes = Orden_produccion::where('fecha', 'LIKE', '%' . $this->search . '%')
        ->orwhere('id', 'LIKE', '%' . $this->search . '%')
        ->orwhere('estado', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(5);
        
        return view('livewire.reportes.reporte-ordenes-index',compact('ordenes'));
    }

    
}
