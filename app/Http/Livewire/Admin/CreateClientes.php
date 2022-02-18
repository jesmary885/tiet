<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ciudad;
use App\Models\Cliente;
use App\Models\Estado;
use Livewire\Component;

class CreateClientes extends Component
{

    public $estado_id ="" ,$ciudad_id = "";
    public $nombre, $apellido, $cedula, $telefono, $email, $direccion, $estados;
    public $ciudades;
    public $isopen = false;
    public $accion, $cliente;
      
    protected $rules = [
        'estado_id' => 'required',
        'ciudad_id' => 'required',
        'nombre' => 'required|max:50|string',
        'apellido' => 'required|max:50|string',
        'direccion' => 'required|max:50',
        'cedula' => 'required|numeric|min:5',
        'telefono' => 'required|numeric|min:11',
        'email' => 'required|max:50|email',
    ];

    public function render()
    {
       
        return view('livewire.admin.create-clientes');
    }

    
    public function updatedEstadoId($value)
    {
        $estado_select = Estado::find($value);
        $this->ciudades = $estado_select->ciudades;
    }

    public function mount(Cliente $cliente){

        if($this->accion=='create'){
            $this->ciudades=[];
        }else{
            $this->ciudades=Ciudad::all();
        }
        $this->cliente = $cliente;
        if($cliente){
            $this->cedula = $this->cliente->cedula;
            $this->telefono = $this->cliente->telefono;
            $this->nombre = $this->cliente->nombre;
            $this->apellido = $this->cliente->apellido;
            $this->email = $this->cliente->email;
            $this->direccion = $this->cliente->direccion;
            $this->ciudad_id = $this->cliente->ciudad_id;
            $this->estado_id = $this->cliente->estado_id;
        }
        //
        $this->estados=Estado::all();
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
                $cliente = new Cliente();
                $cliente->nombre = $this->nombre;
                $cliente->apellido = $this->apellido;
                $cliente->email = $this->email;
                $cliente->cedula = $this->cedula;
                $cliente->direccion= $this->direccion;
                $cliente->telefono = $this->telefono;
                $cliente->ciudad_id = $this->ciudad_id;
                $cliente->estado_id = $this->estado_id;
                $cliente->save();

                $this->reset(['nombre','apellido','email','telefono','cedula','direccion','ciudad_id','estado_id','isopen']);
                $this->emitTo('admin.admin-clientes','render');
                $this->emit('alert','Cliente creado correctamente');
            }
            else
            {
                $this->cliente->update([
                    'nombre' => $this->nombre,
                    'apellido' => $this->apellido,
                    'email' => $this->email,
                    'cedula' => $this->cedula,
                    'direccion' => $this->direccion,
                    'telefono' => $this->telefono,
                    'ciudad_id' => $this->ciudad_id,
                    'estado_id' => $this->estado_id,
                ]);
                $this->reset(['isopen']);
                $this->emitTo('admin.admin-clientes','render');
                $this->emit('alert','Datos modificados correctamente');
            }
    }


}
