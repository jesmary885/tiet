<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\OrdenProduccion;
use App\Models\Cliente;
use App\Models\Orden_produccion;
use App\Models\User;
Use Livewire\WithPagination;

use Livewire\Component;

class AdminUsuarios extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render','confirmacion' => 'confirmacion'];

    public $search,$usuario;

    public function updatingSearch(){
        $this->resetPage();
    }
   
    public function render()
    {

        $usuarios = User::where('name', 'LIKE', '%' . $this->search . '%')
        ->orwhere('cedula', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(5);

        return view('livewire.admin.admin-usuarios',compact('usuarios'));
    }

    public function delete($usuarioId){
        $this->usuario = $usuarioId;
        $busqueda = Orden_produccion::where('user_id',$usuarioId)->first();

        if($busqueda) $this->emit('errorSize', 'Este usuario esta asociado a una orden, no puede eliminarlo');
        else $this->emit('confirm', 'Esta seguro de eliminar este usuario?','admin.admin-usuarios','confirmacion','El usuario se ha eliminado.');
    }

    public function confirmacion(){
        $usuario_destroy = User::where('id',$this->usuario)->first();
        $usuario_destroy->delete();
    }
}
