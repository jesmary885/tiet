<?php

namespace App\Http\Livewire\Admin;

use App\Models\Almacen;
use Livewire\Component;

class CreateAlmacenes extends Component
{
    public $nombre, $direccion;
    public $isopen = false;
    public $accion, $almacen;
      
    protected $rules = [
        'nombre' => 'required|string',
        'direccion' => 'required|string',
      
    ];

    public function render()
    {
        return view('livewire.admin.create-almacenes');
    }

    public function mount(Almacen $almacen){

        $this->almacen = $almacen;

        if($almacen){
      
            $this->nombre = $this->almacen->nombre;
            $this->direccion = $this->almacen->direccion;
  
        }
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
                $almacen = new Almacen();
                $almacen->nombre = $this->nombre;
                $almacen->direccion = $this->direccion;
            
                $almacen->save();

                $this->reset(['nombre','direccion','isopen']);
                $this->emitTo('admin.admin-suplidores','render');
                $this->emit('alert','Almacen creado correctamente');
            }
            else
            {
                $this->almacen->update([
                    'nombre' => $this->nombre,
                    'direccion' => $this->direccion,
     
                ]);
                $this->reset(['isopen']);
                $this->emitTo('admin.admin-almacenes','render');
                $this->emit('alert','Datos modificados correctamente');
            }
    }
}
