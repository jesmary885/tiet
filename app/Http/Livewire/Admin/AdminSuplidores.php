<?php

namespace App\Http\Livewire\Admin;

use App\Models\Orden_produccion;
use App\Models\Suplidor;
Use Livewire\WithPagination;

use Livewire\Component;

class AdminSuplidores extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render','confirmacion' => 'confirmacion'];

    public $search,$suplidor;

    public function updatingSearch(){
        $this->resetPage();
    }
   
    public function render()
    {
        $suplidors = Suplidor::where('nombre', 'LIKE', '%' . $this->search . '%')
        ->orwhere('rif', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(5);

        return view('livewire.admin.admin-suplidores',compact('suplidors'));
    }

    public function delete($suplidorId){
        $this->suplidor = $suplidorId;
        $busqueda = Orden_produccion::where('suplidor_id',$suplidorId)->first();

        if($busqueda) $this->emit('errorSize', 'Este suplidor esta asociado a una orden, no puede eliminarlo');
        else $this->emit('confirm', 'Esta seguro de eliminar este suplidor?','admin.admin-suplidores','confirmacion','El suplidor se ha eliminado.');
    }

    public function confirmacion(){
        $suplidor_destroy = Suplidor::where('id',$this->suplidor)->first();
        $suplidor_destroy->delete();
    }

}
