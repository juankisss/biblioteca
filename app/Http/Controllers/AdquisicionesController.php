<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adquisiciones;
use App\Models\Bibliograficos;
use App\Models\Usuarios;

class AdquisicionesController extends Controller
{
    public function index()
    {
        $ejemplares = Bibliograficos::all();
        $usuarios = Usuarios::all();
        $adquisiciones = Adquisiciones::select('adquisiciones.ADQ_ID','contenidos.CON_TITULO','usuarios.USU_CODIGO','adquisiciones.ADQ_CANTIDAD','adquisiciones.ADQ_FECHA','adquisiciones.ADQ_OBS')
            ->join('contenidos','contenidos.CON_ID','adquisiciones.EJE_ID')
            ->join('usuarios','adquisiciones.USU_ID','usuarios.USU_ID')
            ->get();
        return view('adquisiciones.list',compact('adquisiciones','ejemplares','usuarios'));
    }

    public function store(Request $req)
    { 
        Adquisiciones::create($req->all());
		return redirect()->back()->with('success', 'Se realizó el prestamo exitosamente!');
    }

    public function show($id)
    {
        return Adquisiciones::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$adquisiciones = Adquisiciones::find($id);
        $adquisiciones->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        $adquisiciones = Adquisiciones::destroy($id);
		/*$registro = Adquisiciones::find($id);
		$registro->ADQ_ESTADO = 2;
		$registro->save();*/
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function search($name)
    {
        return Adquisiciones::where('name', 'like', '%'.$name.'%')->get();
    }
}
