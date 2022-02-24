<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ciudad;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUsuarios extends Component
{
    public $estado_id ="" ,$ciudad_id = "", $roles_id="" ;
    public $name, $apellido, $cedula, $telefono, $email, $estados, $password, $password_confirm;
    public $ciudades, $roles;
    public $isopen = false;
    public $accion, $usuario;
      
    protected $rules = [
        'estado_id' => 'required',
        'ciudad_id' => 'required',
        'name' => 'required|max:50|string',
        'apellido' => 'required|max:50|string',
        'cedula' => 'required|numeric|min:5',
        'telefono' => 'required|numeric|min:11',
        'email' => 'required|max:50|email',
        'roles_id' => 'required',
        'password' => 'required',
    ];

    protected $rul_password_confirm = [
        'password' => 'required|confirmed',
    ];


    public function render()
    {
        return view('livewire.admin.create-usuarios');
    }

    public function updatedEstadoId($value)
    {
        $estado_select = Estado::find($value);
        $this->ciudades = $estado_select->ciudades;
    }

    public function mount(){

        if($this->accion=='create'){
            $this->ciudades=[];
        }else{
            $this->ciudades=Ciudad::all();
        }
       
        if($this->usuario){
            $this->cedula = $this->usuario->cedula;
            $this->telefono = $this->usuario->telefono;
            $this->name = $this->usuario->name;
            $this->apellido = $this->usuario->apellido;
            $this->email = $this->usuario->email;
            $this->ciudad_id = $this->usuario->ciudad_id;
            $this->estado_id = $this->usuario->estado_id;
           $this->password = Crypt::decryptString($this->usuario->password_cifrada);
            $this->password_confirm = $this->password;
            $this->roles_id = $this->usuario->roles->first()->id;
        }
        //
        $this->estados=Estado::all();
        $this->roles=Role::all();
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
                if($this->password == $this->password_confirm){
                $usuario = new User();
                $usuario->name = $this->name;
                $usuario->apellido = $this->apellido;
                $usuario->email = $this->email;
                $usuario->cedula = $this->cedula;
                $usuario->telefono = $this->telefono;
                $usuario->ciudad_id = $this->ciudad_id;
                $usuario->estado_id = $this->estado_id;
                $usuario->password = Hash::make($this->password);
                $usuario->password_cifrada = Crypt::encryptString($this->password);
                $usuario->save();
                $usuario->roles()->sync($this->roles_id);

                $this->reset(['name','roles_id','apellido','email','telefono','cedula','ciudad_id','estado_id','isopen','password','password_confirm']);
                $this->emitTo('admin.admin-usuarios','render');
                $this->emit('alert','Usuario creado correctamente');
                }
                else{
                    $rul_password_conf = $this->rul_password_confirm;
                    $this->validate($rul_password_conf);
                }
            }
            else
            {
                if($this->password == $this->password_confirm){
                    $this->usuario->update([
                        'name' => $this->name,
                        'apellido' => $this->apellido,
                        'email' => $this->email,
                        'cedula' => $this->cedula,
                        'telefono' => $this->telefono,
                        'ciudad_id' => $this->ciudad_id,
                        'estado_id' => $this->estado_id,
                        'password' => Hash::make($this->password),
                        'password_encriptada' => Crypt::encryptString($this->password),
                    ]);
                    $this->usuario->roles()->sync($this->roles_id);
                    $this->reset(['isopen']);
                    $this->emitTo('admin.admin-usuarios','render');
                    $this->emit('alert','Datos modificados correctamente');
                }
                else{
                    $rul_password_conf = $this->rul_password_confirm;
                        $this->validate($rul_password_conf);
                }
            }
    }

}
