<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RonuradosController extends Controller
{
    public function index()
    {
        return view('admin.tipo_ronurados');
    }
}
