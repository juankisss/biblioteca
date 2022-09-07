<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secciones;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class SeccionesController extends Controller
{
    public function index()
    {
        $secciones = Secciones::where("SEC_ESTADO",1)->get();
        return view('secciones.list',compact('secciones'));
    }

    public function store(Request $req)
    { 
        Secciones::create($req->all());
		return redirect()->back()->with('success', 'Se adicionó el registro exitosamente!');
    }

    public function show($id)
    {
        return Secciones::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$secciones = Secciones::find($id);
        $secciones->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //$secciones = Secciones::destroy($id);
		$registro = Secciones::find($id);
		$registro->SEC_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function search($name)
    {
        return Secciones::where('name', 'like', '%'.$name.'%')->get();
    }
}
