<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdenProduccionController extends Controller
{
    public function index()
    {
        return view('orden_produccion');
    }

    public function create()
    {
        return view('orden_produccion_create');
    }
}
