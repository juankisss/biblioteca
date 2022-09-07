<?php

namespace App\Http\Controllers;

use App\Models\Lector_tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LectorTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["registros"] = Lector_tipo::where("LET_ESTADO",1)->get();
		return view('tipol.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lector_tipo::create($request->all());
		return redirect()->back()->with('success', 'Se adiciono el registro exitosamente!..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Lector_tipo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request['id'];
		$Lector_tipo = Lector_tipo::find($id);
        $Lector_tipo->update($request->all());
        return redirect()->back()->with('success', 'Se actualizo el registro exitosamente!..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	
    public function destroy($id)
    {
        $Lector_tipo = Lector_tipo::find($id);
		$Lector_tipo->LET_ESTADO = 2;
		$Lector_tipo->save();
		return redirect()->back()->with('success', 'Se elimino el registro exitosamente!..');
		//Lector_tipo::destroy($id);
    }

     /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Lector_tipo::where('name', 'like', '%'.$name.'%')->get();
    }
}
