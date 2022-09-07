<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Prestamos;
use App\Models\Devoluciones;
use App\Models\Bibliograficos;
use App\Models\Lectores;
use App\Models\Personal;
use App\Models\Reservas;
use DB;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$ccontenidos = Bibliograficos::select("CON_ID")->where("CON_ESTADO",1)->count();
		$clectores = Lectores::select("LEC_ID")->where("LEC_ESTADO",1)->count();
		$cpersonal = Personal::select("PER_ID")->where("PER_ESTADO",1)->count();
		$creservas = Reservas::select("RES_ID")->where("RES_ESTADO","<",4)->count();
		$gprestamos = json_encode(Prestamos::select(DB::raw("DATE_FORMAT(PRE_HORA,'%H:%i') as rango"),DB::raw('count(PRE_ID) as cant'))->where("PRE_ESTADO","<",5)->where(DB::raw("DATE_FORMAT(PRE_FECHA,'%Y-%m-%d')"),date("Y-m-d"))->groupBy("PRE_HORA")->orderBy('PRE_HORA', 'ASC')->get());
		$gdevoluciones = json_encode(Devoluciones::select(DB::raw("DATE_FORMAT(DEV_HORA,'%H:%i') as rango"),DB::raw('count(DEV_ID) as cant'))->where("DEV_FECHA",date("Y-m-d"))->groupBy("DEV_HORA")->orderBy('DEV_HORA', 'ASC')->get());
		$gtotalps = json_encode(Prestamos::select(DB::raw('DAY(PRE_FECHA) as rango'),DB::raw('count(PRE_ID) as cant'))->where("PRE_ESTADO",1)->whereRaw('PRE_FECHA >= DATE_ADD(NOW(), INTERVAL -7 DAY)')->groupBy("rango")->orderBy('PRE_FECHA', 'ASC')->get());
		/*foreach($prestamos as $reg):
			$pre[] = json_encode($reg->PRE_HORA);
			$cpr[] = json_encode(Prestamos::where("PRE_ESTADO",1)->where("PRE_FECHA",date("Y-m-d"))->where("PRE_HORA",$reg->PRE_HORA)->count());
		endforeach;*/
		//return json_encode($gprestamos);
		return view('inicio',compact('ccontenidos','clectores','cpersonal','creservas','gprestamos','gdevoluciones','gtotalps'));
    }
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
