<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\LectorTipoController;
use App\Http\Controllers\LectoresController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\SeccionesController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EditorialesController;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\AdquisicionesController;
use App\Http\Controllers\BibliograficoController;
use App\Http\Controllers\DevolucionesController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\EjemplaresController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ReportesController;
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
Route::resource('/', InicioController::class)->middleware('usuario');
Route::get('clear', function () {
   $exitCode = Artisan::call('cache:clear');
   echo Artisan::call('config:clear'); 
   //echo Artisan::call('config:cache'); 
   echo Artisan::call('cache:clear'); 
   echo Artisan::call('route:clear');
   echo Artisan::call('view:clear');
});
Route::resource('inicio', InicioController::class)->middleware('usuario');
/*Route::get('/', function(){ //echo Session::get('login');
	if(Session::get('login')!='1') { 
		return redirect('login');
	}else {
	    return view('inicio');
	}
});*/

Route::resource('adquisiciones', AdquisicionesController::class)->middleware('usuario');
//Route::get('/adquisiciones/{id}', [AdquisicionesController::class, "delete"]);
Route::resource('usuarios', UsuarioController::class);
//Route::get('/usuarios/{id}', [UsuarioController::class, "delete"]);
Route::resource('materialbibliografico', BibliograficoController::class)->middleware('usuario');
Route::get('contenidos_del', [BibliograficoController::class, "contenidos_del"])->middleware('usuario');
//Route::get('/materialbibliografico/{id}', [BibliograficoController::class, "delete"]);
Route::resource('prestamos', PrestamosController::class)->middleware('usuario');
Route::get('ejemplar/{cid}', [PrestamosController::class, "get_contenido"])->middleware('usuario');
Route::get('ejemplar_reservas/{eid}', [PrestamosController::class, "get_reservas"])->middleware('usuario');
Route::get('lectores_tipo/{tid}', [PrestamosController::class, "get_lectores"])->middleware('usuario');
Route::get('lector_prestamo/{lid}', [PrestamosController::class, "get_lectorp"]);
Route::get('lector_reserva/{lid}', [PrestamosController::class, "get_lectorr"]);
Route::get('rev_reservas/{eid}/{fed}/{feh}', [PrestamosController::class, "rev_reservas"])->middleware('usuario');
//Route::get('/prestamos/{id}', [PrestamosController::class, "delete"]);
Route::resource('reservas', ReservasController::class)->middleware('usuario');
Route::get('ejemplar_reservasp/{eid}/{rid}', [ReservasController::class, "get_reservas"])->middleware('usuario');
Route::get('ejemplar_reservasf/{eid}/{fec}', [ReservasController::class, "get_reservasf"]);
Route::get('ejemplar_prestamo/{eid}/{fec}', [ReservasController::class, "get_prestamo"])->middleware('usuario');
Route::get('get_reserva/{rid}', [ReservasController::class, "get_reserva"])->middleware('usuario');
//Route::get('/reservas/{id}', [ReservasController::class, "delete"]);
Route::resource('devoluciones', DevolucionesController::class)->middleware('usuario');
//Route::get('/devoluciones/{id}', [DevolucionesController::class, "delete"]);
Route::resource('lectores', LectoresController::class)->middleware('usuario');
//Route::get('/lectores/{id}', [LectoresController::class, "delete"]);
Route::resource('adquisiciones', AdquisicionesController::class)->middleware('usuario');
//Route::get('/adquisiciones/{id}', [AdquisicionesController::class, "delete"]);
Route::resource('ejemplares', EjemplaresController::class)->middleware('usuario');
Route::get('/ejemplaresc/{id}', [EjemplaresController::class, "index"])->middleware('usuario');
Route::resource('autores', AutoresController::class)->middleware('usuario');
//Route::get('/autores/{id}', [AutoresController::class, "delete"]);
Route::resource('editoriales', EditorialesController::class)->middleware('usuario');
//Route::get('/editoriales/{id}', [EditorialesController::class, "delete"]);
Route::resource('categorias', CategoriasController::class)->middleware('usuario');
//Route::get('/categorias/{id}', [CategoriasController::class, "delete"]);
Route::resource('secciones', SeccionesController::class)->middleware('usuario');
//Route::get('/secciones/{id}', [SeccionesController::class, "delete"]);
Route::resource('personal', PersonalController::class)->middleware('usuario');
Route::get('personal_del', [PersonalController::class, "personal_del"])->middleware('usuario');
//Route::get('/personal/{id}', [PersonalController::class, "delete"]);
Route::resource('lectortipo', LectorTipoController::class);
/*Route::get('/lectortipo/{id}', [LectorTipoController::class, "show"]);*/
//Route::get('/lectortipod/{id}', [LectorTipoController::class, "delete"]);
Route::resource('page', CatalogoController::class);
Route::get('detalle_cont/{cid}', [CatalogoController::class, "get_contenido"]);

//Route::resource('reportes', ReportesController::class);
Route::get('reportes/{id}', [ReportesController::class, "index"])->middleware('usuario');
Route::get('rep_personal', [ReportesController::class, "personal"])->middleware('usuario');
Route::get('rep_lectores/{id}/{id1}', [ReportesController::class, "lectores"])->middleware('usuario');
Route::get('rep_contenidos/{id}/{id1}/{id2}/{id3}', [ReportesController::class, "contenidos"])->middleware('usuario');
Route::get('rep_reservas/{id}/{id1}/{id2}/{id3}/{id4}/{id5}/{id6}/{id7}/{id8}/{id9}/{id0}', [ReportesController::class, "reservas"])->middleware('usuario');
Route::get('rep_prestamos/{id}/{id1}/{id2}/{id3}/{id4}/{id5}/{id6}/{id7}/{id8}/{id9}/{id0}', [ReportesController::class, "prestamos"])->middleware('usuario');
Route::get('rep_prestamos', [ReportesController::class, "prestamos"])->middleware('usuario');

Route::get('verifica_codigo/{cod}', 'UsuarioController@verifica_codigo');
Route::get('salir', function(){ 
	Session::put('login', '0');
	return redirect('login');
});
Route::post('login', [UsuarioController::class, 'login']);
Route::get('logout', [UsuarioController::class, 'logout'])->middleware('usuario');

Route::get('login', function(){ return view('login'); });
//Route::resource('login','LoginController');

Route::get('send_msg/{cod}', function(){
	//return redirect('twilio-php-main/index.php?id=123');
});
Route::get('prueba', [ReservasController::class, "send_msg"])->middleware('usuario');