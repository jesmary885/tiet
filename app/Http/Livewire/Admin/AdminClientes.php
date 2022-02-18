<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\OrdenProduccion;
use App\Models\Cliente;
use App\Models\Orden_produccion;
Use Livewire\WithPagination;

use Livewire\Component;

class AdminClientes extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render','confirmacion' => 'confirmacion'];

    public $search,$cliente;

    public function updatingSearch(){
        $this->resetPage();
    }
   
    public function render()
    {

        $clientes = Cliente::where('nombre', 'LIKE', '%' . $this->search . '%')
        ->orwhere('cedula', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(5);
        return view('livewire.admin.admin-clientes',compact('clientes'));
    }

    public function delete($clienteId){
        $this->cliente = $clienteId;
        $busqueda = Orden_produccion::where('cliente_id',$clienteId)->first();

        if($busqueda) $this->emit('errorSize', 'Este cliente esta asociado a una orden, no puede eliminarlo');
        else $this->emit('confirm', 'Esta seguro de eliminar este cliente?','admin.admin-clientes','confirmacion','El cliente se ha eliminado.');
    }

    public function confirmacion(){
        $cliente_destroy = Cliente::where('id',$this->cliente)->first();
        $cliente_destroy->delete();
    }
}
