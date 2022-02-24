<?php

namespace App\Http\Livewire\Ordenes;

use Livewire\Component;

class OrdenEdit extends Component
{

    public $orden, $cantidad;

    public $isopen = false;

      
    protected $rules = [
        'cantidad' => 'required',
    
    ];


    public function mount(){


        $this->cantidad = $this->orden->cantidad;
       
    }
    public function render()
    {
        return view('livewire.ordenes.orden-edit');
    }

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

    public function update(){
        $rules = $this->rules;
        $this->validate($rules);
 
        
            $this->orden->update([
                'cantidad' => $this->cantidad,
               
            ]);
     

            $this->reset(['isopen']);
            $this->emitTo('orden-produccion','render');
            $this->emit('alert','Los datos han sido modificados correctamente');
    
    }

}
