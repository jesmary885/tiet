<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Orden_produccion;
use App\Models\Tipo_ranurado;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipo_ranurados_cant = Tipo_ranurado::count();
        $orden_produccion_cant = Orden_produccion::count();
        $clientes_cant = Cliente::count();


        return view('home',compact('tipo_ranurados_cant','orden_produccion_cant','clientes_cant'));
    }
}
