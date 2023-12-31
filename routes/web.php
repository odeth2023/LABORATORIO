<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\ProductconfectioneryController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\saleMovieController;
use App\Http\Controllers\Admin\CategoryparentController;
use App\Http\Controllers\Admin\CategorychildController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SeatController;
use App\Http\Controllers\Admin\ShowController;
//usuario cliente
use App\Http\Controllers\User\HomeController;

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

Route::get('/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('auth.home')->middleware('Role');

//CATEGORIAS PRINCIPALES
Route::get('admin/CategoriaMaster', [CategoryparentController::class, 'index'])->name('admin.categoriaPadre.principal')->middleware('Role');
Route::get('admin/listaCM', [CategoryparentController::class, 'lista'])->name('admin.categoriaPadre.lista')->middleware('Role');
Route::post('admin/registrandoCategoriaM', [CategoryparentController::class, 'store'])->name('admin.categoriaPadre.register')->middleware('Role');//creando
Route::put('admin/{item}-editandoCategoriaM', [CategoryparentController::class, 'update'])->name('admin.categoriaPadre.update')->middleware('Role');//Actualizando datos
Route::delete('adminBorrandoCategoriaM/{item}', [CategoryparentController::class, 'delete'])->name('admin.categoriaPadre.delete')->middleware('Role');//eliminando datos


//SUBCATEGORIAS
Route::get('admin/SubCategorias', [CategorychildController::class, 'index'])->name('admin.categorychild.principal')->middleware('Role');
Route::post('admin/registrandoSubCategoria', [CategorychildController::class, 'store'])->name('admin.categorychild.register')->middleware('Role');//creando
Route::put('admin/{item}-editandoSubCategoria', [CategorychildController::class, 'update'])->name('admin.categorychild.update')->middleware('Role');//Actualizando datos
Route::delete('adminBorrandoSubCategoria/{item}', [CategorychildController::class, 'delete'])->name('admin.categorychild.delete')->middleware('Role');//eliminando datos


//PELICULA
//Route::resource("/movie", MovieController::class);
Route::get('admin/peliculas', [MovieController::class, 'index'])->name('admin.MovieManagement.movie')->middleware('Role');
Route::get('admin/registroPelicula', [MovieController::class, 'register'])->name('admin.movie.vistaregistro');//vista crear
Route::post('admin/registrandoPelicula', [MovieController::class, 'store'])->name('admin.movie.register');//creando
Route::get('admin/{movie}-edit', [MovieController::class, 'edit'])->name('admin.MovieManagement.edit');//mostrando edit con datos
Route::put('admin/{movie}-editando', [MovieController::class, 'update'])->name('admin.MovieManagement.update');//Actualizando datos
Route::delete('admin/{movie}', [MovieController::class, 'delete'])->name('admin.MovieManagement.delete');//eliminando datos


//CONFITERIA
Route::get('admin/confiteria', [ProductconfectioneryController::class, 'index'])->name('admin.confiteria')->middleware('Role');
Route::get('admin/registroConfiteria', [ProductconfectioneryController::class, 'register'])->name('admin.confiteria.vistaregistro')->middleware('Role');
Route::post('admin/registrandoConfiteria', [ProductconfectioneryController::class, 'store'])->name('admin.confiteria.register')->middleware('Role');//creando
Route::get('admin/{item}-VistaEditar', [ProductconfectioneryController::class, 'edit'])->name('admin.confiteria.edit');//mostrando edit con datos
Route::put('admin/{item}-editandoProducto', [ProductconfectioneryController::class, 'update'])->name('admin.confiteria.update')->middleware('Role');//Actualizando datos
Route::delete('adminBorrandoProducto/{producto}', [ProductconfectioneryController::class, 'delete'])->name('admin.confiteria.delete');//eliminando datos

//SALA
Route::get('admin/sala', [RoomController::class, 'index'])->name('admin.sala')->middleware('Role');
Route::post('admin/registrandoSala', [RoomController::class, 'store'])->name('admin.room.register')->middleware('Role');//creando
Route::put('admin/{item}-editandoSala', [RoomController::class, 'update'])->name('admin.room.update')->middleware('Role');//Actualizando datos
Route::delete('adminBorrandoSala/{item}', [RoomController::class, 'delete'])->name('admin.room.delete')->middleware('Role');//eliminando datos


//ASIENTO
Route::get('admin/asiento', [SeatController::class, 'index'])->name('admin.asiento')->middleware('Role');
Route::post('admin/registrandoAsiento', [SeatController::class, 'store'])->name('admin.seat.register')->middleware('Role');//creando

//FUNCION
Route::get('admin/funcion', [ShowController::class, 'index'])->name('admin.funcion')->middleware('Role');


//VENTA
Route::get('admin/venta', [SaleController::class, 'index'])->name('admin.venta')->middleware('Role');
Route::get('admin/ventaConfiteria', [SaleController::class, 'ventaConfiteria'])->name('admin.ventaConfiteria')->middleware('Role');
Route::get('agregandoProducto/{p}', [SaleController::class, 'agregarProductoVenta'])->name('admin.agregarProductoVenta')->middleware('Role');
Route::get('agregandoProductoBuscado', [SaleController::class, 'agregarProductoBuscado'])->name('admin.agregarProductoBuscado')->middleware('Role');
Route::get('eliminando/{p}', [SaleController::class, 'quitarProductoVenta'])->name('admin.quitarProductoVenta')->middleware('Role');
Route::post('actualizar-cantidad/{p}', [SaleController::class, 'updateQuantity'])->name('admin.updateQuantity')->middleware('Role');
Route::get('CancelarVenta/producto', [SaleController::class, 'cancelarVenta'])->name('admin.cancelarVenta')->middleware('Role');
Route::post('VentaFinalizada/productosA', [SaleController::class, 'finalizarVenta'])->name('admin.finalizarVenta')->middleware('Role');


Route::get('admin/ventaPelicula', [SaleMovieController::class, 'ventaPelicula'])->name('admin.ventaPelicula')->middleware('Role');
Route::get('VMG/pelicula', [saleMovieController::class, 'store'])->name('admin.ventamg')->middleware('Role');





Route::get('admin/reserva', [App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('admin.reserva')->middleware('Role');
Route::get('admin/empleado', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('admin.empleado')->middleware('Role');
Route::get('admin/cliente', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.cliente')->middleware('Role');



//VISTA NORMAL PARA CLIENTES
Route::get('user/home', [HomeController::class, 'index'])->name('user.home');
Route::get('user/compras', [HomeController::class, 'compras'])->name('compras.home');
Route::get('user/reporte', [HomeController::class, 'reporte'])->name('reporte.home');
Route::get('user/confiteria', [HomeController::class, 'confiteria'])->name('user.confiteria');
Route::get('user/confiteriaD/{id}', [HomeController::class, 'confiteriaD'])->name('user.confiteriaD');

Route::get('user/peliculas', [HomeController::class, 'peliculas'])->name('user.peliculas');
Route::get('user/estrenos', [HomeController::class, 'estrenos'])->name('user.estrenos');

//Route::get('user/candy', [App\Http\Controllers\User\HomeController::class, 'index2'])->name('user.candy');


