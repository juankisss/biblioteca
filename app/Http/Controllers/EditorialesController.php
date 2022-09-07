<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editoriales;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class EditorialesController extends Controller
{
    public function index()
    {
        $editoriales = Editoriales::where("EDI_ESTADO",1)->get();
        return view('editoriales.list',compact('editoriales'));
    }

    public function store(Request $req)
    { 
        Editoriales::create($req->all());
		return redirect()->back()->with('success', 'Se adicionó el registro exitosamente!');
    }

    public function show($id)
    {
        return Editoriales::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$editoriales = Editoriales::find($id);
        $editoriales->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //$editoriales = Editoriales::destroy($id);
		$registro = Editoriales::find($id);
		$registro->EDI_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function search($name)
    {
        return Editoriales::where('name', 'like', '%'.$name.'%')->get();
    }
}
