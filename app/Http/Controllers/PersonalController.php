<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Hash;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::where("PER_ESTADO",1)->get();
        return view('personal.list',compact('personal'));
    }
	
	public function personal_del()
    {
        $personal = Personal::where("PER_ESTADO",2)->get();
        return view('personal.listd',compact('personal'));
    }

    public function store(Request $req)
    {   
		if(!$req->input('active')){
			$personal = new Personal([
				'PER_NOMBRES' => $req->input('PER_NOMBRES'), 
				'PER_APELLIDOS' => $req->input('PER_APELLIDOS'), 
				'PER_CI' => $req->input('PER_CI'), 
				'PER_GENERO' => $req->input('PER_GENERO'), 
				'PER_FECHAN' => $req->input('PER_FECHAN'), 
				'PER_ROL' => $req->input('PER_ROL'), 
				'PER_EMAIL' => $req->input('PER_EMAIL'), 
				'PER_CELULAR' => $req->input('PER_CELULAR'), 
				'PER_DIRECCION' => $req->input('PER_DIRECCION'), 
				'PER_CARGO' => $req->input('PER_CARGO')
			]);
			$personal->save();
			if($req->file('file')){
				$img = $req->file('file');
				$dateiname = 'per-'.rand(10000,99999).'.'.$img->getClientOriginalExtension();
				$req->file->move(public_path('fotos'),$dateiname);
				$con = Personal::find($personal->PER_ID);
				$con->PER_FOTO = $dateiname;
				$con->save();
			}
			//if($req->file('file')){ $req->file->move(public_path('fotos/personal_'.$personal->PER_ID),$filename); }
			return redirect()->back()->with('success', 'Personal registrado exitosamente!');
		}else{
			$registro = Personal::find($req->input('active'));
			$registro->PER_ESTADO = 1;
			$registro->save();
			return redirect()->back()->with('success', 'Se reintegro el registro exitosamente!');
		}
    }

    public function show($id)
    {
        return Personal::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$personal = Personal::find($id);
        $personal->update($req->all());
		if($req->file('file')){
			$img = $req->file('file');
        	$dateiname = 'per-'.rand(10000,99999).'.'.$img->getClientOriginalExtension();
			$req->file->move(public_path('fotos'),$dateiname);
			$con = Personal::find($id);
			$con->PER_FOTO = $dateiname;
			$con->save();
		}
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //$personal = Personal::destroy($id);
		$registro = Personal::find($id);
		$registro->PER_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function search($name)
    {
        return Personal::where('name', 'like', '%'.$name.'%')->get();
    }
}
