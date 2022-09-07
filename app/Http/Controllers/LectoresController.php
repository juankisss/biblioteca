<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lectores;
use App\Models\Usuario;
use App\Models\Lector_tipo;

class LectoresController extends Controller
{
    public function index()
    {
        $lectortipos = Lector_tipo::select('LET_ID','LET_NOMBRE')->get();
        $lectores = Lectores::select('lectores.LEC_ID','lector_tipo.LET_NOMBRE','lectores.LEC_NOMBRES','lectores.LEC_APELLIDOS','lectores.LEC_CI','lectores.LEC_GENERO','lectores.LEC_ROL','lectores.LEC_EMAIL','lectores.LEC_CELULAR','lectores.LEC_DIRECCION','lectores.LEC_ESTADO')
            ->join('lector_tipo','lector_tipo.LET_ID','lectores.LET_ID')
			->where("LEC_ESTADO",1)
            ->get();
        return view('lectores.list',compact('lectores','lectortipos'));
    }

    public function store(Request $req)
    { 
        $len = Lectores::create($req->all());
		$usuario = new Usuario([
            'LEC_ID' => $len->LEC_ID, 
            'USU_CODIGO' => $req->input('LEC_EMAIL'), 
            'USU_CLAVE' => sha1($req->input('USU_CLAVE')),
			'USU_TIPO' => 3
        ]);
        $usuario->save();
		return redirect()->back()->with('success', 'Se creó el lector exitosamente!');
    }

    public function show($id)
    {
        return Lectores::join('usuarios','usuarios.LEC_ID','lectores.LEC_ID')->find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$lectores = Lectores::find($id);
        $lectores->update($req->all());
		if($req->input('USU_CLAVE')!=$req->input('CLAVE')){
			$registro = Usuario::find($req->input('USU_ID'));
			$registro->USU_CLAVE = sha1($req->input('USU_CLAVE'));
			$registro->save();
		}
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //Lectores::destroy($id);
		$registro = Lectores::find($id);
		$registro->LEC_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function search($name)
    {
        return Lectores::where('name', 'like', '%'.$name.'%')->get();
    }
}
