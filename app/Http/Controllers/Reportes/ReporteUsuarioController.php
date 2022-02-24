<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReporteUsuarioController extends Controller
{
    public function index()
    {
        return view('reportes.usuarios.index');
    }

    public function generar($usuario)
    {
        return view('reportes.usuarios.reporte',compact('usuario'));
    }
}
