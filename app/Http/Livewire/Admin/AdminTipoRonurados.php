<?php

namespace App\Http\Livewire\Admin;

use App\Models\Orden_produccion;
use App\Models\Tipo_ranurado;
Use Livewire\WithPagination;

use Livewire\Component;

class AdminTipoRonurados extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render','confirmacion' => 'confirmacion'];

    public $search,$ranurado;

    public function updatingSearch(){
        $this->resetPage();
    }
   
    public function render()
    {
        $ranurados = Tipo_ranurado::where('nombre', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(5);

        return view('livewire.admin.admin-tipo-ronurados',compact('ranurados'));
    }

    public function delete($ranuradoId){
        $this->ranurado = $ranuradoId;
        $busqueda = Orden_produccion::where('tipo_ranurado_id',$ranuradoId)->first();

        if($busqueda) $this->emit('errorSize', 'Este ranurado esta asociado a una orden, no puede eliminarlo');
        else $this->emit('confirm', 'Esta seguro de eliminar este ranurado?','admin.admin-tipo-ronurados','confirmacion','El tipo de ranurado se ha eliminado.');
    }

    public function confirmacion(){
        $ranurado_destroy = Tipo_ranurado::where('id',$this->ranurado)->first();
        $ranurado_destroy->delete();
    }

}
