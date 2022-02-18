<?php

namespace App\Http\Livewire\Admin;

use App\Models\Suplidor;
use Livewire\Component;

class CreateSuplidores extends Component
{
  
    public $nombre, $apellido, $rif, $telefono, $email, $direccion;
    public $isopen = false;
    public $accion, $suplidor;
      
    protected $rules = [
        'nombre' => 'required|max:50|string',
        'direccion' => 'required|max:50|string',
        'rif' => 'required|min:5',
        'telefono' => 'required|numeric|min:11',
        'email' => 'required|max:50|email',
    ];

    public function render()
    {
        return view('livewire.admin.create-suplidores');
    }

    public function mount(Suplidor $suplidor){

        $this->suplidor = $suplidor;

        if($suplidor){
            $this->cedula = $this->suplidor->cedula;
            $this->telefono = $this->suplidor->telefono;
            $this->nombre = $this->suplidor->nombre;
            $this->direccion = $this->suplidor->direccion;
            $this->email = $this->suplidor->email;
            $this->rif = $this->suplidor->rif;
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
                $suplidor = new Suplidor();
                $suplidor->nombre = $this->nombre;
                $suplidor->direccion = $this->direccion;
                $suplidor->email = $this->email;
                $suplidor->rif = $this->rif;
                $suplidor->telefono = $this->telefono;
            
                $suplidor->save();

                $this->reset(['nombre','direccion','email','telefono','isopen']);
                $this->emitTo('admin.admin-suplidores','render');
                $this->emit('alert','Suplidor creado correctamente');
            }
            else
            {
                $this->suplidor->update([
                    'nombre' => $this->nombre,
                    'apellido' => $this->apellido,
                    'email' => $this->email,
                    'direccion' => $this->direccion,
                    'rif' => $this->rif,
                    'telefono' => $this->telefono,
                    
                ]);
                $this->reset(['isopen']);
                $this->emitTo('admin.admin-suplidores','render');
                $this->emit('alert','Datos modificados correctamente');
            }
    }


}
