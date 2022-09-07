<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Autores;
use Hash;

class AutoresController extends Controller
{
    public function index()
    {
        $autores = Autores::where("AUT_ESTADO",1)->get();
        return view('autores.list',compact('autores'));
    }

    public function store(Request $req)
    { 
        if($req->file('file')){
			$img = $req->file('file');
        	$filename = sha1($img->getClientOriginalName()).'.'.$img->getClientOriginalExtension();
		}else{
			$filename = '';
		}
        $autores = new Autores([
            'AUT_NOMBRE' => $req->input('AUT_NOMBRE'), 
            'AUT_FECHAN' => $req->input('AUT_FECHAN'), 
            'AUT_LUGARN' => $req->input('AUT_LUGARN'),
            'AUT_BIOGRAFIA' => $req->input('AUT_BIOGRAFIA'), 
            'AUT_EMAIL' => $req->input('AUT_EMAIL'),
            'AUT_IMAGEN' => $filename,
            'AUT_ESTADO' => 1
        ]);
        $autores->save();
        if($req->file('file')){ $req->file->move(public_path('fotos/autor_'.$autores->AUT_ID),$filename); }
        return redirect()->back()->with('success', 'Categoría registrado exitosamente!');
    }

    public function show($id)
    {
        return Autores::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$autores = Autores::find($id);
        $autores->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //$autores = Autores::destroy($id);
		$registro = Autores::find($id);
		$registro->AUT_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function search($name)
    {
        return Autores::where('name', 'like', '%'.$name.'%')->get();
    }
}
