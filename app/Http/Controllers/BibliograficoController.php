<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Bibliograficos;
use App\Models\Categorias;
use App\Models\Autores;
use App\Models\Editoriales;
use App\Models\Secciones;
use Hash;

class BibliograficoController extends Controller
{
    public function index()
    {
        $categorias = Categorias::select('CAT_ID','CAT_NOMBRE')->where("CAT_ESTADO",1)->get();
        $autores = Autores::select('AUT_ID','AUT_NOMBRE')->where("AUT_ESTADO",1)->get();
        $editoriales = Editoriales::select('EDI_ID','EDI_NOMBRE')->where("EDI_ESTADO",1)->get();
        $secciones = Secciones::select('SEC_ID','SEC_NOMBRE')->where("SEC_ESTADO",1)->get();
        $biblios = Bibliograficos::select('contenidos.CON_ID', 'categorias.CAT_NOMBRE', 'autores.AUT_NOMBRE', 'editoriales.EDI_NOMBRE', 'secciones.SEC_NOMBRE', 'contenidos.CON_ISBN', 'contenidos.CON_TITULO', 'contenidos.CON_SUBTITULO', 'contenidos.CON_DESC', 'contenidos.CON_RESUMEN', 'contenidos.CON_EDICION', 'contenidos.CON_ANIOP', 'contenidos.CON_LENGUAJE', 'contenidos.CON_NPAGS', 'contenidos.CON_ESTADO', 'contenidos.CON_IMAGEN', 'contenidos.CON_TIPO')
            ->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
            ->join('autores','autores.AUT_ID','contenidos.AUT_ID')
            ->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
            ->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
			->where("CON_ESTADO",1)
            ->get();
        return view('bibliograficos.list',compact('biblios','categorias','autores','editoriales','secciones'));
    }
	
	public function contenidos_del()
    {
        $biblios = Bibliograficos::select('contenidos.CON_ID', 'categorias.CAT_NOMBRE', 'autores.AUT_NOMBRE', 'editoriales.EDI_NOMBRE', 'secciones.SEC_NOMBRE', 'contenidos.CON_ISBN', 'contenidos.CON_TITULO', 'contenidos.CON_SUBTITULO', 'contenidos.CON_DESC', 'contenidos.CON_RESUMEN', 'contenidos.CON_EDICION', 'contenidos.CON_ANIOP', 'contenidos.CON_LENGUAJE', 'contenidos.CON_NPAGS', 'contenidos.CON_ESTADO', 'contenidos.CON_IMAGEN', 'contenidos.CON_TIPO')
            ->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
            ->join('autores','autores.AUT_ID','contenidos.AUT_ID')
            ->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
            ->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
			->where("CON_ESTADO",2)
            ->get();
        return view('bibliograficos.listd',compact('biblios'));
    }

    public function store(Request $req)
    { 
        if(!$req->input('active')){
			if($req->file('file')){
				$img = $req->file('file');
				$dateiname = 'con-'.rand(10000,99999).'.'.$img->getClientOriginalExtension();
			}else{
				$dateiname = '';
			}
			$biblios = new Bibliograficos([
				'CAT_ID' => $req->input('CAT_NOMBRE'),
				'AUT_ID' => $req->input('AUT_NOMBRE'),
				'EDI_ID' => $req->input('EDI_NOMBRE'),
				'SEC_ID' => $req->input('SEC_NOMBRE'),
				'CON_ISBN' => $req->input('CON_ISBN'),
				'CON_TITULO' => $req->input('CON_TITULO'),
				'CON_SUBTITULO' => $req->input('CON_SUBTITULO'),
				'CON_DESC' => $req->input('CON_DESC'),
				'CON_RESUMEN' => $req->input('CON_RESUMEN'),
				'CON_EDICION' => $req->input('CON_EDICION'),
				'CON_ANIOP' => $req->input('CON_ANIOP'),
				'CON_LENGUAJE' => $req->input('CON_LENGUAJE'),
				'CON_NPAGS' => $req->input('CON_NPAGS'),
				'CON_IMAGEN' => $dateiname,
				'CON_TIPO' => $req->input('CON_TIPO')
			]);
			$biblios->save();
			if($req->file('file')){ $req->file->move(public_path('fotos'),$dateiname); }
			return redirect()->back()->with('success', 'Material registrado exitosamente!');
		}else{
			$registro = Bibliograficos::find($req->input('active'));
			$registro->CON_ESTADO = 1;
			$registro->save();
			return redirect()->back()->with('success', 'Se reintegro el registro exitosamente!');
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
		if($req->file('file')){
			$img = $req->file('file');
        	$dateiname = 'con-'.rand(10000,99999).'.'.$img->getClientOriginalExtension();
			$req->file->move(public_path('fotos'),$dateiname);
			$con = Bibliograficos::find($id);
			$con->CON_IMAGEN = $dateiname;
			$con->save();
		}
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
