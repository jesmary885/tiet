<?php

namespace App\Http\Livewire\Ordenes;

use App\Models\Almacen;
use App\Models\Operacion;
use Livewire\Component;

class OrdenAdd extends Component
{
    public $orden, $usuario, $fecha_actual, $almacenes, $cantidad, $fase1 = '0' , $fase2 = '0', $fase3 = '0', $fase4 = '0', $fase5 = '0', $fase6 = '0', $ord;
    public $almacen_id = "";
      
    public $isopen = false;

    protected $rules_almacen = [
        'almacen_id' => 'required',
    
    ];

    public function mount(){
        $this->fecha_actual = date('Y-m-d');
        $this->almacenes = Almacen::all();
        $this->usuario = auth()->user();

        $orden = Operacion::where('orden_produccion_id',$this->orden->id)->first();
        $this->ord = $orden;

        if($orden->fase1 == 'no') $this->fase1 = 1;
        elseif($orden->fase2 == 'no') $this->fase2 = 1;
        elseif($orden->fase3 == 'no') $this->fase3 = 1;
        elseif($orden->fase4 == 'no') $this->fase4 = 1;
        elseif($orden->fase5 == 'no') $this->fase5 = 1;
        else $this->fase6 = 1;
    }

    public function render()
    {

        return view('livewire.ordenes.orden-add');
    }

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

    public function fase1(){
        $this->ord->update([
            'fase1' => $this->usuario->id, 
            'fecha_i_fase1' => $this->fecha_actual,
        ]);
        $this->fase2 = 1;
        $this->reset(['isopen','fase1']);
        $this->emitTo('orden-produccion','render');
        $this->emit('alert','Fase 1 registrada correctamente');

    }
    public function fase2(){
        $this->ord->update([
            'fase2' => $this->usuario->id, 
            'fecha_i_fase2' => $this->fecha_actual,
        ]);
        $this->fase3 = 1;
        $this->reset(['isopen','fase2']);
        $this->emitTo('orden-produccion','render');
        $this->emit('alert','Fase 2 registrada correctamente');

    }

    public function fase3(){
        $this->ord->update([
            'fase3' => $this->usuario->id,  
            'fecha_i_fase3' => $this->fecha_actual,
        ]);
        $this->fase4 = 1;
        $this->reset(['isopen','fase3']);
        $this->emitTo('orden-produccion','render');
        $this->emit('alert','Fase 3 registrada correctamente');

    }

    public function fase4(){
        $this->ord->update([
            'fase4' => $this->usuario->id,  
            'fecha_i_fase4' => $this->fecha_actual,
        ]);
        $this->fase5 = 1;
        $this->reset(['isopen','fase4']);
        $this->emitTo('orden-produccion','render');
        $this->emit('alert','Fase 4 registrada correctamente');

    }

    public function fase5(){
        $rules_almacen = $this->rules_almacen;
        $this->validate($rules_almacen);
        
        $this->ord->update([
            'fase5' => $this->usuario->id, 
            'almacen_id' => $this->almacen_id, 
            'fecha_i_fase5' => $this->fecha_actual,
        ]);
        $this->fase6 = 1;
        $this->reset(['isopen','fase5']);
        $this->emitTo('orden-produccion','render');
        $this->emit('alert','Fase 5 registrada correctamente');

    }

}
