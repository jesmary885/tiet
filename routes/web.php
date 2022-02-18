<?php

use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RonuradosController;
use App\Http\Controllers\Admin\SuplidoresController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\CambiarContrasenaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenProduccionController;
use App\Http\Controllers\Reportes\ReportesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth/login');
});

// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth')->name('home');

Route::get('/home',[HomeController::class,'index'])->name('home');

Auth::routes();


//Admin
Route::get('usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
Route::resource('roles', RoleController::class)->only('index','edit','update','destroy','create','store')->names('admin.roles');
Route::get('clientes',[ClientesController::class,'index'])->name('clientes.index');
Route::get('suplidores',[SuplidoresController::class,'index'])->name('suplidores.index');
Route::get('tipos_ronurados',[RonuradosController::class,'index'])->name('ronurados.index');

//Orden de produccion

Route::get('orden_produccion',[OrdenProduccionController::class,'index'])->name('orden_produccion.index');
Route::get('orden_produccion_registro',[OrdenProduccionController::class,'create'])->name('orden_produccion.create');

//reportes

Route::get('reportes',[ReportesController::class,'index'])->name('reporte.index');
Route::get('reportes_ronurados/{fecha_inicio}/{fecha_fin}',[ReportesController::class,'ronurados'])->name('ronurados.reportes');

//Ajustes

Route::get('cambiar_contrasena',[CambiarContrasenaController::class,'index'])->name('cambiar_contrasena');



