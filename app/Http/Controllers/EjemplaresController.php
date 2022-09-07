<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Bibliograficos;
use App\Models\Categorias;
use App\Models\Autores;
use App\Models\Editoriales;
use App\Models\Secciones;
use App\Models\Ejemplares;
use Hash;

class EjemplaresController extends Controller
{
    public function index($id)
    {
        $contenido = Bibliograficos::select('contenidos.CON_ID', 'categorias.CAT_NOMBRE', 'autores.AUT_NOMBRE', 'editoriales.EDI_NOMBRE', 'secciones.SEC_NOMBRE', 'contenidos.CON_ISBN', 'contenidos.CON_TITULO', 'contenidos.CON_SUBTITULO', 'contenidos.CON_DESC', 'contenidos.CON_RESUMEN', 'contenidos.CON_EDICION', 'contenidos.CON_ANIOP', 'contenidos.CON_LENGUAJE', 'contenidos.CON_NPAGS', 'contenidos.CON_ESTADO', 'contenidos.CON_IMAGEN', 'contenidos.CON_TIPO')
            ->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
            ->join('autores','autores.AUT_ID','contenidos.AUT_ID')
            ->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
            ->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
			->where("CON_ID",$id)
            ->first();
        $ejemplares = Ejemplares::where("EJE_ESTADO","<",3)
			->where("CON_ID",$id)
            ->get();
        return view('ejemplares.index',compact('ejemplares','contenido'));
    }

    public function store(Request $req)
    { 
        Ejemplares::create($req->all());
		return redirect()->back()->with('success', 'Se adiciono el registro exitosamente!..');
    }

    public function show($id)
    {
        return Ejemplares::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$biblioss = Ejemplares::find($id);
        $biblioss->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //$biblioss = Bibliograficos::destroy($id);
		$registro = Ejemplares::find($id);
		$registro->EJE_ESTADO = 3;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

}
