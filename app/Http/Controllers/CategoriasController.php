<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Categorias;
use Hash;

class CategoriasController extends Controller
{
    public function index()
    {
        $categoria = Categorias::where("CAT_ESTADO",1)->get();
        return view('categorias.list',compact('categoria'));
    }

    public function store(Request $req)
    { 
        /*if($req->file('file')){
			$img = $req->file('file');
        	$filename = sha1($img->getClientOriginalName()).'.'.$img->getClientOriginalExtension();
		}else{
			$filename = '';
		}*/
        $categoria = new Categorias([
            'CAT_NOMBRE' => $req->input('CAT_NOMBRE'), 
            'CAT_DESC' => $req->input('CAT_DESC'), 
            'CAT_RESUMEN' => $req->input('CAT_RESUMEN')
        ]);
        $categoria->save();
        //if($req->file('file')){ $req->file->move(public_path('images/categoria_'.$categoria->CAT_ID),$filename);}
        return redirect()->back()->with('success', 'Categoría registrado exitosamente!');
    }

    public function show($id)
    {
        return Categorias::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$categorias = Categorias::find($id);
        $categorias->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //$categorias = Categorias::destroy($id);
		$registro = Categorias::find($id);
		$registro->CAT_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function search($name)
    {
        return Categorias::where('name', 'like', '%'.$name.'%')->get();
    }
}
