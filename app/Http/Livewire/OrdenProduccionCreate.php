<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Operacion;
use App\Models\Orden_produccion;
use App\Models\Suplidor;
use App\Models\Tipo_ranurado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PDF;

class OrdenProduccionCreate extends Component
{

    public $cantidad,$tipo_ranurado_id,$diametro,$rosca,$lbs,$grados,$ext_libre,$ranura,$aa,$densidad_rpp,$long,$observaciones,$suplidor_id;
    public $fecha_i_toquelar_ident,$fecha_f_toquelar_ident,$fecha_i_limpiar_reb,$fecha_f_limpiar_reb,$fecha_i_prot_tub,$fecha_f_prot_tub,$fecha_i_alm,$fecha_f_alm,$fecha_i_ranura,$fecha_f_ranura;
    public $clientes, $suplidores, $ranurados, $fecha_actual, $maq, $cliente_id;

     protected $rules = [
         'cantidad' => 'required|numeric',
         'tipo_ranurado_id' => 'required',
         'diametro' => 'required|numeric',
         'rosca' => 'required',
         'lbs' => 'required',
         'grados' => 'required',
         'maq' => 'required',
         'ext_libre' => 'required',
         'aa' => 'required',
         'ranura' => 'required',
         'densidad_rpp' => 'required',
         'long' => 'required',
         'observaciones' => 'required',
         'suplidor_id' => 'required',
         'cliente_id' => 'required',
         'fecha_i_toquelar_ident' => 'required',
         'fecha_f_toquelar_ident' => 'required',
         'fecha_i_limpiar_reb' => 'required',
         'fecha_f_limpiar_reb' => 'required',
         'fecha_i_prot_tub' => 'required',
         'fecha_f_prot_tub' => 'required',
         'fecha_i_alm' => 'required',
         'fecha_f_alm' => 'required',
         'fecha_i_ranura' => 'required',
         'fecha_f_ranura' => 'required',
      ];

      public function mount(){
        $this->ranurados=Tipo_ranurado::all();
        $this->clientes=Cliente::all();
        $this->suplidores=Suplidor::all();
    }



    public function render()
    {
        return view('livewire.orden-produccion-create');
    }

    public function save()
    {
        $rules = $this->rules;
        $this->validate($rules);

        $this->fecha_actual = date('Y-m-d');
    
        $user_auth =  auth()->user();

        //agregando orden
        $orden = new Orden_produccion();
        $orden->fecha = $this->fecha_actual;
        $orden->cantidad = $this->cantidad;
        $orden->tipo_ranurado_id = $this->tipo_ranurado_id;
        $orden->diametro = $this->diametro;
        $orden->rosca = $this->rosca;
        $orden->lbs = $this->lbs;
        $orden->grado = $this->grados;
        $orden->maq = $this->maq;
        $orden->ranura = $this->ranura;
        $orden->ext_libres = $this->ext_libre;
        $orden->aa = $this->aa;
        $orden->densidad_rpp = $this->densidad_rpp;
        $orden->long = $this->long;
        $orden->observaciones = $this->observaciones;
        $orden->suplidor_id = $this->suplidor_id;
        $orden->cliente_id = $this->cliente_id;
        $orden->user_id = $user_auth->id;
        $orden->save();


        $operacion = new Operacion();
        $operacion->fecha_i_toquelar_ident = date("Y-m-d",strtotime($this->fecha_i_toquelar_ident));
        $operacion->fecha_f_toquelar_ident = date("Y-m-d",strtotime($this->fecha_f_toquelar_ident));
        $operacion->fecha_i_limpiar_reb = date("Y-m-d",strtotime($this->fecha_i_limpiar_reb));
        $operacion->fecha_f_limpiar_reb = date("Y-m-d",strtotime($this->fecha_f_limpiar_reb));
        $operacion->fecha_i_prot_tub = date("Y-m-d",strtotime($this->fecha_i_prot_tub));
        $operacion->fecha_f_prot_tub = date("Y-m-d",strtotime($this->fecha_f_prot_tub));
        $operacion->fecha_i_alm = date("Y-m-d",strtotime($this->fecha_i_alm));
        $operacion->fecha_f_alm = date("Y-m-d",strtotime($this->fecha_f_alm));
        $operacion->fecha_i_ranura = date("Y-m-d",strtotime($this->fecha_i_ranura));
        $operacion->fecha_f_ranura = date("Y-m-d",strtotime($this->fecha_f_ranura));
        $operacion->orden_produccion_id = $orden->id;
        $operacion->save();

        $data = [
            'fecha' => $this->fecha_actual,
            'id' => $orden->id,
            'cantidad' =>$this->cantidad,
            'tipo_ranurado' => $orden->tipo_ranurado->nombre,
            'diametro'=> $this->diametro,
            'rosca'=> $this->rosca,
            'lbs' => $this->lbs,
            'grado' => $this->grados,
            'maq' => $this->maq,
            'ext' => $this->ext_libre,
            'ranura' => $this->ranura,
            'aa' => $this->aa,
            'densidad' => $this->densidad_rpp,
            'long' => $this->long,
            'observaciones' => $this->observaciones,
            'suplidor' => $orden->suplidor->nombre,
            'cliente'=> $orden->cliente->nombre.' '.$orden->cliente->apellido,
            'usuario' => $user_auth->name.' '.$user_auth->apellido,
            'fecha1' => date("d-m-Y",strtotime($this->fecha_i_toquelar_ident)),
            'fecha2' =>  date("d-m-Y",strtotime($this->fecha_f_toquelar_ident)),
            'fecha3' =>  date("d-m-Y",strtotime($this->fecha_i_limpiar_reb)),
            'fecha4' =>  date("d-m-Y",strtotime($this->fecha_f_limpiar_reb)),
            'fecha5' =>  date("d-m-Y",strtotime($this->fecha_i_prot_tub)),
            'fecha6' =>  date("d-m-Y",strtotime($this->fecha_f_prot_tub)),
            'fecha7' =>  date("d-m-Y",strtotime($this->fecha_i_alm)),
            'fecha8' =>  date("d-m-Y",strtotime($this->fecha_f_alm)),
            'fecha9' =>  date("d-m-Y",strtotime($this->fecha_i_ranura)),
            'fecha10' =>  date("d-m-Y",strtotime($this->fecha_f_ranura)),
        ];

        $pdf = PDF::loadView('PlanillaOrdenProduccion',$data)->output();

      


    $this->reset(['cantidad',
    'tipo_ranurado_id',
    'diametro',
    'rosca',
    'lbs',
    'grados',
    'ext_libre',
    'ranura',
    'aa',
    'densidad_rpp',
    'long',
    'observaciones',
    'suplidor_id',
    'cliente_id',
    'fecha_i_toquelar_ident',
    'fecha_f_toquelar_ident',
    'fecha_i_limpiar_reb',
    'fecha_f_limpiar_reb',
    'fecha_i_prot_tub',
    'fecha_f_prot_tub',
    'fecha_i_alm',
    'fecha_f_alm',
    'fecha_i_ranura',
    'fecha_f_ranura',
    'maq']);

    $this->emit('alert','Orden creada correctamente');

    return response()->streamDownload(
        fn () => print($pdf),
       "OrdenProduccion.pdf"
        );
    
    }

    


}
