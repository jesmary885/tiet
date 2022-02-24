<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReporteOrdenesController extends Controller
{
    public function index()
    {
        return view('reportes.ordenes.index');
    }

    public function generar($fecha_inicio,$fecha_fin)
    {
        return view('reportes.ordenes.reporte',compact('fecha_inicio','fecha_fin'));
    }
}
