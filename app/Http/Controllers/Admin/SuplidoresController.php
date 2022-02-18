<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuplidoresController extends Controller
{
    public function index()
    {
        return view('admin.suplidores');
    }
}
