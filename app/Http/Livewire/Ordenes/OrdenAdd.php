<?php

namespace App\Http\Livewire\Ordenes;

use App\Models\Operacion;
use Livewire\Component;

class OrdenAdd extends Component
{
    public $orden, $cantidad, $fase1 = '0' , $fase2 = '0', $fase3 = '0', $fase4 = '0', $fase5 = '0', $ord;

    public $isopen = false;

      
    protected $rules = [
        //'cantidad' => 'required',
    
    ];


    public function mount(){

        $orden = Operacion::where('orden_produccion_id',$this->orden->id)->first();
        $this->ord = $orden;

        if($orden->fase1 == 0) $this->fase1 = 1;
        elseif($orden->fase2 == 0) $this->fase2 = 1;
        elseif($orden->fase3 == 0) $this->fase3 = 1;
        elseif($orden->fase4 == 0) $this->fase4 = 1;
        elseif($orden->fase5 == 0) $this->fase5 = 1;
       
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
            'fase1' => '1', 
        ]);

    }

}
