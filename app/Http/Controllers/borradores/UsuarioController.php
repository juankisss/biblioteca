<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Usuario::create($request->all());
		return redirect()->back()->with('success', 'Se adicionó el registro exitosamente!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Usuario::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$usuario = Usuario::find($id);
        $usuario->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$personal = Usuario::destroy($id);
		$registro = Usuario::find($id);
		$registro->USU_ESTADO = 2;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }
}
