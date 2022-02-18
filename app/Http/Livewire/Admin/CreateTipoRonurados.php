<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tipo_ranurado;
use Livewire\Component;

class CreateTipoRonurados extends Component
{
    public $nombre;
    public $isopen = false;
    public $accion, $ranurado;
      
    protected $rules = [
        'nombre' => 'required|max:50|string',
    ];

    public function render()
    {
        return view('livewire.admin.create-tipo-ronurados');
    }

    public function mount(Tipo_ranurado $ranurado){

        $this->ranurado = $ranurado;

        if($ranurado) $this->nombre = $this->ranurado->nombre;
    }

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

    public function save(){
            $rules = $this->rules;
            $this->validate($rules);

            if($this->accion == 'create')
            {
                $ranurado = new Tipo_ranurado();
                $ranurado->nombre = $this->nombre;
            
            
                $ranurado->save();

                $this->reset(['nombre','isopen']);
                $this->emitTo('admin.admin-tipo-ronurados','render');
                $this->emit('alert','Tipo de ranurado creado correctamente');
            }
            else
            {
                $this->ranurado->update([
                    'nombre' => $this->nombre,
                    
                ]);
                $this->reset(['isopen']);
                $this->emitTo('admin.admin-tipo-ronurados','render');
                $this->emit('alert','Datos modificados correctamente');
            }
    }

}
