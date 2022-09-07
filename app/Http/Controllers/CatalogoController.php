<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\Ejemplares;
use App\Models\Bibliograficos;
use App\Models\Categorias;
use App\Models\Autores;
use App\Models\Editoriales;
use App\Models\Secciones;
use App\Models\Lectores;
use App\Models\Usuario;
use App\Models\Reservas;
use App\Models\Personal;
use App\Models\Notificaciones;
use Hash;

class CatalogoController extends Controller
{
    public function index()
    {
        $categorias = Categorias::select('CAT_ID','CAT_NOMBRE')->get();
        $autores = Autores::select('AUT_ID','AUT_NOMBRE')->get();
        $editoriales = Editoriales::select('EDI_ID','EDI_NOMBRE')->get();
        $secciones = Secciones::select('SEC_ID','SEC_NOMBRE')->get();
        $biblios = Bibliograficos::select('contenidos.CON_ID', 'categorias.CAT_NOMBRE', 'autores.AUT_NOMBRE', 'editoriales.EDI_NOMBRE', 'secciones.SEC_NOMBRE', 'contenidos.CON_ISBN', 'contenidos.CON_TITULO', 'contenidos.CON_SUBTITULO', 'contenidos.CON_DESC', 'contenidos.CON_RESUMEN', 'contenidos.CON_EDICION', 'contenidos.CON_ANIOP', 'contenidos.CON_LENGUAJE', 'contenidos.CON_NPAGS', 'contenidos.CON_ESTADO', 'contenidos.CON_IMAGEN', 'contenidos.CON_TIPO')
            ->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
            ->join('autores','autores.AUT_ID','contenidos.AUT_ID')
            ->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
            ->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
			->where("CON_ESTADO",1)
            ->get();
        return view('catalogo.index',compact('biblios','categorias','autores','editoriales','secciones'));
    }
	public function get_ejemplares($id){
		return Ejemplares::where("CON_ID",$id)->where("EJE_ESTADO",1)->first();
	}
	public function get_contenido($id){
		//Bibliograficos::join('ejemplares','contenidos.CON_ID','ejemplares.CON_ID', 'left')->where("contenidos.CON_ID",$id)->where("EJE_ESTADO",1)->first();
		return Bibliograficos::join('ejemplares','contenidos.CON_ID','=','ejemplares.CON_ID', 'left outer')->where("contenidos.CON_ID",$id)
		->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
		->join('autores','autores.AUT_ID','contenidos.AUT_ID')
		->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
		->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
		->select('contenidos.CON_ID','CON_ISBN','CON_TITULO','CON_IMAGEN','CON_ESTADO','CON_EDICION','EJE_ID','EJE_CODIGO','EJE_ESTADO','CAT_NOMBRE','AUT_NOMBRE','EDI_NOMBRE','SEC_NOMBRE','CON_RESUMEN','CON_SUBTITULO')
		->first();
	}
	
    public function login(Request $request)
    {
		try {            
			$usuario = Usuario::where(['USU_CODIGO'=>$request->USU_CODIGO,'USU_CLAVE'=>sha1($request->USU_CLAVE)])->where("USU_TIPO",$request->USU_TIPO)->join('personal','usuarios.PER_ID','personal.PER_ID')->where("USU_ESTADO",1)->first();
			if (!is_null($usuario)) {
				//$request->session()->put('login', '1');
				session(['nombre' => $usuario->LEC_NOMBRES.' '.$usuario->LEC_APELLIDOS]);
				session(['email' => $usuario->LEC_EMAIL]);  
				session(['ci' => $usuario->LEC_CI]); 
				session(['tipo' => $usuario->USU_TIPO]);  
				session(['uid' => $usuario->USU_ID]);
				session(['lid' => $usuario->LEC_ID]);
				return redirect('')->with('success', 'Usuarios y contraseña autentificados, Bienvenid@!...');
			} else {
				//echo 'NO autenticado';
				//return redirect()->back()->withErrors('danger', 'El Usuarios y o contraseña no son correctos');
				return back()->with('danger', 'Usuarios y o contraseña incorrectos');
			}
		} catch (Exception $e) {
			return $e;
		}
    }

    public function store(Request $req)
    { 
        if($req->input('opt')=='1'){
			$lector = Lectores::create($req->all());
			$usuario = new Usuario([
				'LEC_ID' => $lector->LEC_ID, 
				'USU_CODIGO' => $req->input('LEC_EMAIL'), 
				'USU_CLAVE' => sha1($req->input('USU_CLAVE')), 
				'USU_TIPO' => 3 
			]);
			$usuario->save();
			session(['nombre' => $lector->LEC_NOMBRES.' '.$lector->LEC_APELLIDOS]);
			session(['email' => $lector->LEC_EMAIL]);  
			session(['ci' => $lector->LEC_CI]); 
			session(['tip' => $lector->TIP_ID]);
			session(['tipo' => $usuario->USU_TIPO]);  
			session(['uid' => $usuario->USU_ID]);
			session(['lid' => $lector->LEC_ID]);
			session(['login' => 1]);
			return redirect()->back()->with('success', 'Usuario registrado exitosamente!.. Ya puede realizar su reserva..');
		}elseif($req->input('opt')=='2'){
			$usuario = Usuario::where(['USU_CODIGO'=>$req->USU_CODIGO,'USU_CLAVE'=>sha1($req->USU_CLAVE),"USU_TIPO"=>$req->USU_TIPO,"LET_ID"=>$req->LET_ID])->join('lectores','usuarios.LEC_ID','lectores.LEC_ID')->where("USU_ESTADO",1)->first();
			if (!is_null($usuario)) {
				session(['login' => 1]);
				session(['nombre' => $usuario->LEC_NOMBRES.' '.$usuario->LEC_APELLIDOS]);
				session(['email' => $usuario->LEC_EMAIL]);  
				session(['ci' => $usuario->LEC_CI]); 
				session(['tipo' => $usuario->USU_TIPO]);  
				session(['uid' => $usuario->USU_ID]);
				session(['lid' => $usuario->LEC_ID]);
				return back()->with('success', 'Usuarios y contraseña autentificados, Bienvenid@!...');
			} else {
				return back()->with('danger', 'Usuarios y o contraseña incorrectos');
			}
		}elseif($req->input('opt')=='3'){
			Session::put('login', '0');
			return redirect()->back()->with('success', 'Sesión cerrada!..');
		}elseif($req->input('opt')=='4'){
			$reserva = Reservas::create($req->all());
			/*$registro = Ejemplares::find($req->EJE_ID);
			$registro->EJE_ESTADO = 2;
			$registro->save();*/
			//echo redirect('twilio-php-main/index.php?id=123');
			//datos para reserva
			$res = Reservas::find($reserva->RES_ID);
			$eje = Bibliograficos::join('ejemplares','contenidos.CON_ID','ejemplares.CON_ID')->where("EJE_ID",$res->EJE_ID)
			->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
			->join('autores','autores.AUT_ID','contenidos.AUT_ID')
			->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
			->select('contenidos.CON_ID','CON_ISBN','CON_TITULO','CON_IMAGEN','CON_ESTADO','CON_EDICION','EJE_ID','EJE_CODIGO','EJE_ESTADO','CAT_NOMBRE','AUT_NOMBRE','EDI_NOMBRE')
			->first();
			$lec = Lectores::find($res->USL_ID);
			//registro BD
			$data = [
				'RES_ID' => $reserva->RES_ID,
				'NOT_MENSAJE' => 'Biblioteca U.E. Luis Espinal: Reserva Realizada para la Fecha: '.$res->RES_FECHAR.' y Hora: '.$res->RES_HORAR.', del ejemplar: ISBN: '.$eje->CON_ISBN.' Titulo: '.$eje->CON_TITULO.' Autor: '.$eje->AUT_NOMBRE.' Editorial: '.$eje->EDI_NOMBRE.' Edición: '.$eje->CON_EDICION,
				'NOT_ESTADO' => '1',
				'NOT_TIPO' => '1'
			];
			$nt = Notificaciones::create($data);
			//envio MSG
			echo view("catalogo.msg",compact('res','eje','lec'));
			return redirect()->back()->with('success', 'Reservación exitosa!');
		}
    }

    public function show($id)
    {
        return Bibliograficos::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$biblioss = Bibliograficos::find($id);
        $biblioss->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //$biblioss = Bibliograficos::destroy($id);
		$registro = Bibliograficos::find($id);
		$registro->CON_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function search($name)
    {
        return Bibliograficos::where('name', 'like', '%'.$name.'%')->get();
    }
}
