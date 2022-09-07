<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
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

//AUTENTICACIÓN
Route::get('iniciar-sesion', [AuthController::class, 'loginForm'])
    ->name('login.form');
Route::post('iniciar-sesion', [AuthController::class, 'loginGrabar'])
    ->name('login.grabar');
Route::post('cerrar-sesion', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware(['auth']);
Route::get('registro', [AuthController::class, 'registroForm'])
    ->name('registro.form');
Route::post('registro', [AuthController::class, 'registroGrabar'])
    ->name('registro.grabar');

// HOME
Route::get('/', [HomeController ::class, 'home']) ->name ('home');
Route::get('nosotros', [HomeController::class, 'nosotros']);
Route::get('contacto', [HomeController::class, 'contacto']);

//PRODUCTOS
Route::get('productos/index', [ProductosController::class, 'index'])
    ->name('productos.index');
Route::get('productos/nuevo', [ProductosController::class, 'agregarForm'])
    ->name('productos.agregar')
    ->middleware(['admin']);
Route::get('productos/{id}', [ProductosController::class, 'ver'])
    ->name('productos.ver')
    ->whereNumber('id');
Route::post('productos/nuevo', [ProductosController::class, 'grabarForm'])
    ->name('productos.nuevo.grabar')
    ->middleware(['admin']);
Route::post('productos/{id}/eliminar', [ProductosController::class, 'eliminar'])
    ->name('productos.eliminar')
    ->middleware(['admin']);
Route::get('productos/{id}/editar', [ProductosController::class, 'editarForm'])
    ->name('productos.editar')
    ->middleware(['admin']);
Route::post('productos/{id}/editar', [ProductosController::class, 'editarFormGrabar'])
    ->name('productos.editar.grabar')
    ->middleware(['admin']);

//CARRITO
Route::post('productos/agregarCarrito', [CarritoController::class, 'agregarCarrito'])
    ->name('productos.agregarCarrito')
    ->middleware('auth');
Route::get('carrito', [CarritoController::class, 'verCarrito'])
    ->name('carrito')
    ->middleware('auth');
Route::post('carrito/{id}/eliminar', [CarritoController::class, 'deleteItem'])
    ->name('carrito.eliminar')
    ->whereNumber('id')
    ->middleware('auth');
Route::get('carrito/comprar', [CarritoController::class, 'compra'])
    ->name('carrito.comprar')
    ->middleware('auth');
Route::get('carrito/vaciar', [CarritoController::class, 'vaciarCarrito'])
    ->name('carrito.vaciar')
    ->middleware('auth');
Route::get('compras', [ComprasController::class, 'verCompras'])
    ->name('carrito.compras')
    ->middleware('auth');
Route::get('compra/exito', [CarritoController::class, 'compraExito'])
    ->name('compra.exito')
    ->middleware('auth');

//NOTICIAS
Route::get('noticias/index', [NoticiasController::class, 'index'])
    ->name('index');
Route::get('noticias/nueva', [NoticiasController::class, 'agregarForm'])
    ->name('noticias.agregar')
    ->middleware(['admin']);
Route::post('noticias/nueva', [NoticiasController::class, 'grabarForm'])
    ->name('noticias.nueva.grabar')
    ->middleware(['admin']);
Route::post('noticias/{id}/eliminar', [NoticiasController::class, 'eliminar'])
    ->name('noticias.eliminar')
    ->middleware(['admin']);
Route::get('noticias/{id}/editar', [NoticiasController::class, 'editarForm'])
    ->name('noticias.editar')
    ->middleware(['admin']);
Route::post('noticias/{id}/editar', [NoticiasController::class, 'editarFormGrabar'])
    ->name('noticias.editar.grabar')
    ->middleware(['admin']);
Route::get('noticias/{id}', [NoticiasController::class, 'ver'])
    ->name('noticias.ver');

//ADMIN
Route::get('admin/index', [AdminController::class, 'index'])
    ->name('admin.index')
    ->middleware(['admin']);
Route::get('admin/noticias', [AdminController::class, 'noticias'])
    ->name('admin.noticias')
    ->middleware(['admin']);
Route::get('admin/productos', [AdminController::class, 'productos'])
    ->name('admin.productos')
    ->middleware(['admin']);
Route::get('admin/usuarios', [AdminController::class, 'usuarios'])
    ->name('admin.usuarios')
    ->middleware(['admin']);
Route::get('admin/noticias/{id}', [AdminController::class, 'verNoticias'])
    ->name('admin.noticias.ver')
    ->middleware(['admin']);
Route::get('admin/productos/{id}', [AdminController::class, 'verProductos'])
    ->name('admin.productos.ver')
    ->middleware(['admin']);
Route::get('admin/usuarios/{id}', [AdminController::class, 'verUsuario'])
    ->name('admin.usuarios.ver')
    ->middleware(['admin']);

//PERFIL
Route::get('perfil', [UsuariosController::class, 'verPerfil'])
    ->name('perfil')
    ->middleware(['auth']);
Route::post('perfil', [UsuariosController::class, 'grabarPerfil'])
    ->name('grabar.perfil')
    ->middleware(['auth']);

//MERCADO PAGO
Route::get('mp/test', [MercadoPagoController::class, 'show'])
    ->name('mp.test')
    ->middleware(['auth']);
Route::get('mp/process-success', [MercadoPagoController::class, 'processSuccess'])
    ->name('mp.success')
    ->middleware(['auth']);
Route::get('mp/process-pending', [MercadoPagoController::class, 'processPending'])
    ->name('mp.pending')
    ->middleware(['auth']);
Route::get('mp/process-failure', [MercadoPagoController::class, 'processFailure'])
    ->name('mp.failure')
    ->middleware(['auth']);
