<?php

namespace App\Http\Livewire\Reportes;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteUsuariosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    
    public $fecha_inicio, $fecha_fin;

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

        return view('livewire.reportes.reporte-usuarios-index',compact('usuarios'));
    }

    
    public function buscar($usuarioID){
        $usuario = $usuarioID;
        return redirect()->route('reporte.usuarios.generar',compact('usuario'));
    }
}
