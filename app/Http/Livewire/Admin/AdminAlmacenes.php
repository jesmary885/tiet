<?php

namespace App\Http\Livewire\Admin;

use App\Models\Almacen;
use App\Models\Operacion;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAlmacenes extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render','confirmacion' => 'confirmacion'];

    public $search,$almacen;

    public function updatingSearch(){
        $this->resetPage();
    }
   

    public function render()
    {
        $almacenes = Almacen::where('nombre', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(5);

        return view('livewire.admin.admin-almacenes', compact('almacenes'));
    }
    public function delete($almacenId){
        $this->almacen = $almacenId;
        $busqueda = Operacion::where('almacen_id',$almacenId)->first();

        if($busqueda) $this->emit('errorSize', 'Este almacen esta asociado a una orden, no puede eliminarlo');
        else $this->emit('confirm', 'Esta seguro de eliminar este almacen?','admin.admin-almacenes','confirmacion','El almacen se ha eliminado.');
    }

    public function confirmacion(){
        $almacen_destroy = Almacen::where('id',$this->almacen)->first();
        $almacen_destroy->delete();
    }

}
