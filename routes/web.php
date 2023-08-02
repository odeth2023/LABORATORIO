<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\SaleController;

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
    return view('welcome');
});

Auth::routes();

Route::get('auth/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('auth.home')->middleware('Role');

Route::get('admin/CategoriaMaster', [App\Http\Controllers\Admin\CategoryparentController::class, 'index'])->name('admin.categoriaPadre')->middleware('Role');
Route::get('admin/SubCategorias', [App\Http\Controllers\Admin\CategorychildController::class, 'index'])->name('admin.categoriaHija')->middleware('Role');

//Route::get('/admin/pelicula', [PeliculaController::class, 'index'])->name('admin.MovieManagement.movie')->middleware('Role');
//Route::get('/admin/registroPelicula', [PeliculaController::class, 'index2'])->name('admin.MovieManagement.register')->middleware('Role');


//PELICULA
Route::resource("/movie", MovieController::class);
Route::get('admin/peliculas', [MovieController::class, 'index'])->name('admin.MovieManagement.movie')->middleware('Role');
Route::get('admin/registroPelicula', [MovieController::class, 'register'])->name('admin.MovieManagement.register')->middleware('Role');//vista crear
Route::post('admin/registrandoPelicula', [MovieController::class, 'store'])->name('admin.movie.register');//creando
Route::get('admin/{movie}-edit', [MovieController::class, 'edit'])->name('admin.MovieManagement.edit');//mostrando edit con datos
Route::put('admin/{movie}-editando', [MovieController::class, 'update'])->name('admin.MovieManagement.update');//Actualizando datos
Route::delete('admin/{movie}', [MovieController::class, 'delete'])->name('admin.MovieManagement.delete');//Actualizando datos



Route::get('admin/confiteria', [App\Http\Controllers\Admin\ProductconfectioneryController::class, 'index'])->name('admin.confiteria')->middleware('Role');
Route::get('admin/funcion', [App\Http\Controllers\Admin\MovieshowController::class, 'index'])->name('admin.funcion')->middleware('Role');
Route::get('admin/asiento', [App\Http\Controllers\Admin\SeatController::class, 'index'])->name('admin.asiento')->middleware('Role');
Route::get('admin/sala', [App\Http\Controllers\Admin\RoomController::class, 'index'])->name('admin.sala')->middleware('Role');


//VENTA
Route::get('admin/venta', [App\Http\Controllers\Admin\SaleController::class, 'index'])->name('admin.venta')->middleware('Role');
Route::get('admin/ventaPelicula', [App\Http\Controllers\Admin\SaleController::class, 'ventaPelicula'])->name('admin.ventaPelicula')->middleware('Role');
Route::get('admin/ventaConfiteria', [App\Http\Controllers\Admin\SaleController::class, 'ventaConfiteria'])->name('admin.ventaConfiteria')->middleware('Role');
Route::get('admin/{p}', [SaleController::class, 'agregarProductoVenta'])->name('admin.agregarProductoVenta')->middleware('Role');
Route::get('eliminando/{p}', [SaleController::class, 'quitarProductoVenta'])->name('admin.quitarProductoVenta')->middleware('Role');






Route::get('admin/reserva', [App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('admin.reserva')->middleware('Role');
Route::get('admin/empleado', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('admin.empleado')->middleware('Role');
Route::get('admin/cliente', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.cliente')->middleware('Role');



//VISTA NORMAL PARA CLIENTES
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
Route::get('user/compras', [App\Http\Controllers\User\HomeController::class, 'compras'])->name('compras.home');
Route::get('user/reporte', [App\Http\Controllers\User\HomeController::class, 'reporte'])->name('reporte.home');

//Route::get('user/candy', [App\Http\Controllers\User\HomeController::class, 'index2'])->name('user.candy');


