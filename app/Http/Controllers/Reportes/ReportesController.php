<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    public function ronurados($fecha_inicio,$fecha_fin)
    {
        return view('reportes.reporte',compact('fecha_inicio','fecha_fin'));
    }
}
