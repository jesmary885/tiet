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

    //Declaración de variables
    public $cantidad,$tipo_ranurado_id,$diametro,$rosca,$lbs,$grados,$ext_libre,$ranura,$aa,$densidad_rpp,$long,$observaciones,$suplidor_id;
    public $fecha_i_toquelar_ident,$fecha_f_toquelar_ident,$fecha_i_limpiar_reb,$fecha_f_limpiar_reb,$fecha_i_prot_tub,$fecha_f_prot_tub,$fecha_i_alm,$fecha_f_alm,$fecha_i_ranura,$fecha_f_ranura;
    public $clientes, $suplidores, $ranurados, $fecha_actual, $maq, $cliente_id;

    //Reglas de validación
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
        //  'fecha_i_toquelar_ident' => 'required',
        //  'fecha_f_toquelar_ident' => 'required',
        //  'fecha_i_limpiar_reb' => 'required',
        //  'fecha_f_limpiar_reb' => 'required',
        //  'fecha_i_prot_tub' => 'required',
        //  'fecha_f_prot_tub' => 'required',
        //  'fecha_i_alm' => 'required',
        //  'fecha_f_alm' => 'required',
        //  'fecha_i_ranura' => 'required',
        //  'fecha_f_ranura' => 'required',
      ];

    //Funcion que se ejecuta solo una vez (al iniciar el componente)
    public function mount(){
        $this->ranurados=Tipo_ranurado::all();
        $this->clientes=Cliente::all();
        $this->suplidores=Suplidor::all();
    }

    //Función que renderiza la vista del componente
    public function render()
    {
        return view('livewire.orden-produccion-create');
    }

    //Función donde se realiza el registro en bdd y se genera el archivo Pdf
    public function save()
    {
        $rules = $this->rules;
        $this->validate($rules);

        $this->fecha_actual = date('Y-m-d');
    
        $user_auth =  auth()->user();

        //Registrando en tabla Orden de producción
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
        $orden->estado = 'activa';
        $orden->save();

        //Registrando fechas en la tabla relacional Operación
         $operacion = new Operacion();
         $operacion->fecha_i_fase1 = $this->fecha_actual;
         $operacion->fecha_i_fase2 = $this->fecha_actual;
         $operacion->fecha_i_fase3 = $this->fecha_actual;
         $operacion->fecha_i_fase4 = $this->fecha_actual;
         $operacion->fecha_i_fase5 = $this->fecha_actual;
         $operacion->fase1 = 'no';
         $operacion->fase2 = 'no';
         $operacion->fase3 =  'no';
         $operacion->fase4 = 'no';
         $operacion->fase5 = 'no';
         $operacion->almacen_id = '1';
         $operacion->orden_produccion_id = $orden->id;
         $operacion->save();

        //Variable tipo arreglo, con la data que completara los campos de la planilla "orden de producción" en formato PDF.
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
             'fecha1' => ' ',
             'fecha2' =>  ' ',
            'fecha3' =>  ' ',
             'fecha4' => ' ',
             'fecha5' => ' ',
           
        ];

        //Envio del arreglo al archivo pdf para llenar la planilla con los datos requeridos
        $pdf = PDF::loadView('PlanillaOrdenProduccion',$data)->output();

        //Resetear inputs del formulario
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
        // 'fecha_i_toquelar_ident',
        // 'fecha_f_toquelar_ident',
        // 'fecha_i_limpiar_reb',
        // 'fecha_f_limpiar_reb',
        // 'fecha_i_prot_tub',
        // 'fecha_f_prot_tub',
        // 'fecha_i_alm',
        // 'fecha_f_alm',
        // 'fecha_i_ranura',
        // 'fecha_f_ranura',
        'maq']);

        //Emitiendo evento informativo sobre la finalización del proceso solicitado.
        $this->emit('alert','Orden creada correctamente');

        //Generando documento Pdf
        return response()->streamDownload(
            fn () => print($pdf),
        "OrdenProduccion.pdf"
            );
    
    }

}
