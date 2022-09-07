<?php

namespace App\Http\Controllers;

use App\Models\Devoluciones;
use App\Models\Prestamos;
use App\Models\Ejemplares;

use Illuminate\Http\Request;

class DevolucionesController extends Controller
{
    public function index()
    {
        $prestamos = Prestamos::all();
        $devoluciones = Devoluciones::select('prestamos.PRE_ID','devoluciones.DEV_ID','devoluciones.DEV_FECHA','devoluciones.DEV_HORA','devoluciones.DEV_OBS')
            ->join('prestamos','prestamos.PRE_ID','devoluciones.PRE_ID')
			->where("PRE_ESTADO",1)
            ->get();
        return view('devoluciones.list',compact('devoluciones','prestamos'));
    }

    public function store(Request $req)
    {   
        $devoluciones = Devoluciones::create($req->all());
		$registrop = Prestamos::find($req->input('PRE_ID'));
		$registrop->PRE_ESTADO = 2;
		$registrop->save();
		$registro = Ejemplares::find($registrop->EJE_ID);
		$registro->EJE_ESTADO = 1;
		$registro->save();
        return redirect()->back()->with('success', 'devolución registrado exitosamente!');
    }

    public function show($id)
    {
        return Devoluciones::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$devoluciones = Devoluciones::find($id);
        $devoluciones->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //$devoluciones = Devoluciones::destroy($id);
		$registro = Devoluciones::find($id);
		$registro->DEV_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }
}
