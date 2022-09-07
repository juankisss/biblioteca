<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Usuario;
use App\Models\Personal;
use App\Models\Lectores;
use Auth;
use DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('login'); 
		$usuariol = Usuario::select(DB::raw("CONCAT(LEC_NOMBRES,' ', LEC_APELLIDOS) AS nombre"),"LEC_CI AS CI","USU_ID","USU_TIPO","USU_CODIGO")->join('lectores','usuarios.LEC_ID',"=",'lectores.LEC_ID')->where("USU_ESTADO",1);
        $usuarios = Usuario::select(DB::raw("CONCAT(PER_NOMBRES,' ', PER_APELLIDOS) AS nombre"),"PER_CI AS CI","USU_ID","USU_TIPO","USU_CODIGO")->join('personal','usuarios.PER_ID',"=",'personal.PER_ID')->where("USU_ESTADO",1)->unionAll($usuariol)->OrderBy("USU_ID","desc")->get();
		$pereg = Usuario::select("PER_ID")->where("USU_ESTADO",1)->get()->toArray(); //echo json_encode($pereg);
		//$personal = Personal::where("PER_ESTADO",1)->whereNotIn("PER_ID",$pereg)->get();
		$personal = Personal::where("PER_ESTADO",1)->get();
        return view('usuarios.index', compact('usuarios','personal'));
    }

    public function login(Request $request)
    {
		try {            
			$usuario = Usuario::where(['USU_CODIGO'=>$request->USU_CODIGO,'USU_CLAVE'=>sha1($request->USU_CLAVE)])->join('personal','usuarios.PER_ID','personal.PER_ID')->where("USU_ESTADO",1)->first();
			if($usuario){
				session(['user_name' => $usuario->USU_CODIGO]);
				session(['password' => $usuario->USU_CLAVE]);
				session(['nombre' => $usuario->PER_NOMBRES.' '.$usuario->PER_APELLIDOS]);
				session(['foto' => $usuario->PER_FOTO]);  
				session(['email' => $usuario->PER_EMAIL]); 
				session(['tipo' => $usuario->USU_TIPO]);  
				session(['uid' => $usuario->USU_ID]);
				session(['pid' => $usuario->PER_ID]);
				return redirect('inicio')->with('success', 'Inicio de Sesión correcto, Bienvenid@!');
			} else {
				return redirect('login')->with('danger', 'Usuario o contraseña incorrectos! Ingrese los datos correctos..');;
			}
		} catch (Exception $e) {
			return $e;
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->except("USU_CLAVE");
		//array_push($data,['USU_CLAVE' => sha1($request->input('USU_CLAVE'))]);
		Usuario::create($data+['USU_CLAVE' => sha1($request->input('USU_CLAVE'))]);
		//$registro->save();
		return redirect()->back()->with('success', 'Se adicionó el registro exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Usuario::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$usuario = Usuario::find($id);
		$data = request()->except("USU_CLAVE");
        $usuario->update($data);
		if($req->input('USU_CLAVE')!=$req->input('CLAVE')){
			$usuario->USU_CLAVE = sha1($req->input('USU_CLAVE'));
			$usuario->save();
		}
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$personal = Usuario::destroy($id);
		$registro = Usuario::find($id);
		$registro->USU_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function logout()
    {
        Session::forget('user_name');
        Session::forget('password');
        return redirect('/login');
    }
}
