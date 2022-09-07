<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamos;
use App\Models\Bibliograficos;
use App\Models\Personal;
use App\Models\Lectores;
use App\Models\Lector_tipo;
use App\Models\Reservas;
use App\Models\Ejemplares;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DateTime;
use DatePeriod;
use DateInterval;
use Auth;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contenidos = Bibliograficos::select('contenidos.CON_ID', 'categorias.CAT_NOMBRE', 'autores.AUT_NOMBRE', 'editoriales.EDI_NOMBRE', 'secciones.SEC_NOMBRE', 'contenidos.CON_ISBN', 'contenidos.CON_TITULO', 'contenidos.CON_SUBTITULO', 'contenidos.CON_DESC', 'contenidos.CON_RESUMEN', 'contenidos.CON_EDICION', 'contenidos.CON_ANIOP', 'contenidos.CON_LENGUAJE', 'contenidos.CON_NPAGS', 'contenidos.CON_ESTADO', 'contenidos.CON_IMAGEN', 'contenidos.CON_TIPO', 'EJE_ID','EJE_CODIGO')
            ->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
            ->join('autores','autores.AUT_ID','contenidos.AUT_ID')
            ->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
            ->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
			->join('ejemplares','ejemplares.CON_ID','contenidos.CON_ID')
			->where("CON_ESTADO",1)
			->where("EJE_ESTADO","<",3)
            ->get();
        $personales = Personal::all();
        $lectores = Lectores::where("LET_ID",1)->get();
        $reservas = Reservas::all();
		$tipo = Lector_tipo::all();
        $prestamos = Prestamos::select('prestamos.PRE_ID','contenidos.CON_TITULO AS EJE_ID',DB::raw('CONCAT(personal.PER_NOMBRES," ",personal.PER_APELLIDOS) AS USP_ID'),DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS USL_ID'),'prestamos.RES_ID','prestamos.PRE_FECHA','prestamos.PRE_HORA','prestamos.PRE_FECHAD','prestamos.PRE_HORAD','prestamos.PRE_OBS','prestamos.PRE_ESTADO')
            ->join('ejemplares','prestamos.EJE_ID','ejemplares.EJE_ID')
			->join('contenidos','ejemplares.CON_ID','contenidos.CON_ID')
            ->join('personal','prestamos.USP_ID','personal.PER_ID')
            ->join('lectores','prestamos.USL_ID','lectores.LEC_ID')
			->where("PRE_ESTADO","<",5)
			->orderBy('PRE_FECHA','DESC')
            ->get();
		$reservas = Reservas::select('reservas.RES_FECHA','reservas.RES_FECHAR','reservas.RES_HORAR','reservas.RES_OBS','reservas.RES_ESTADO')
			->where("RES_ESTADO",1)
            ->get();
		$fechasr = array();
		foreach($reservas as $res):
			if($res->RES_HASTAF!=NULL){
				$comienzo = new DateTime($res->RES_DESDEF);
				$final = new DateTime($res->RES_HASTAF);
				// Necesitamos modificar la fecha final en 1 día para que aparezca en el bucle
				$final = $final->modify('+1 day');
				$intervalo = DateInterval::createFromDateString('1 day');
				$periodo = new DatePeriod($comienzo, $intervalo, $final);
				foreach ($periodo as $dt) {
					$fechasr[] = $dt->format("Y-m-d");
				}
			}else{
				$fechasr[] = $res->RES_DESDEF;
			}
			/*for($i=$res->RES_DESDEF;$i<=$res->RES_HASTAF;$i++){
				$fechasr[] = $i;
			}*/
		endforeach;
		$fechasr = json_encode($fechasr);
        return view('prestamos.index',compact('prestamos','contenidos','personales','lectores','reservas','tipo'));
    }
	
	public function get_contenido($id){
		//Bibliograficos::join('ejemplares','contenidos.CON_ID','ejemplares.CON_ID', 'left')->where("contenidos.CON_ID",$id)->where("EJE_ESTADO",1)->first();
		//Bibliograficos::join('ejemplares','contenidos.CON_ID','=','ejemplares.CON_ID', 'left outer')->where("contenidos.CON_ID",$id)
		return Bibliograficos::join('ejemplares','contenidos.CON_ID','=','ejemplares.CON_ID')->where("EJE_ID",$id)
		->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
		->join('autores','autores.AUT_ID','contenidos.AUT_ID')
		->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
		->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
		->select('contenidos.CON_ID','CON_ISBN','CON_TITULO','CON_IMAGEN','CON_ESTADO','CON_EDICION','EJE_ID','EJE_CODIGO','EJE_ESTADO','CAT_NOMBRE','AUT_NOMBRE','EDI_NOMBRE','SEC_NOMBRE')
		->first();
	}
	public function get_reservas($id){
		return Reservas::select('reservas.RES_ID',DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS LECTOR'),'reservas.RES_FECHA','reservas.RES_FECHAR','reservas.RES_HORAR','reservas.RES_OBS','reservas.RES_ESTADO')
			->join('ejemplares','reservas.EJE_ID','ejemplares.EJE_ID')
            ->join('lectores','reservas.USL_ID','lectores.LEC_ID')
			->where("RES_ESTADO",1)
			->where("reservas.EJE_ID",$id)
			->where("RES_FECHAR",">=",date("Y-m-d"))
		->get();
	}
	public function rev_reservas($id,$fed,$feh=-1){
		$res = Reservas::select('reservas.RES_ID',DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS LECTOR'),'reservas.RES_FECHA','reservas.RES_FECHAR','reservas.RES_HORAR','reservas.RES_OBS','reservas.RES_ESTADO')
			->join('ejemplares','reservas.EJE_ID','ejemplares.EJE_ID')
            ->join('lectores','reservas.USL_ID','lectores.LEC_ID')
			->where("RES_ESTADO",1)
			->where("reservas.EJE_ID",$id);
		if($feh==-1){
			$res = $res->where("RES_FECHAR",">=",date("Y-m-d",strtotime($fed)));
			//$res = $res->where("RES_HASTAF","<=",date("Y-m-d",strtotime($fed)));
		}else{
			$res = $res->where("RES_FECHAR",">=",date("Y-m-d",strtotime($fed)));
			$res = $res->where("RES_FECHAR","<=",date("Y-m-d",strtotime($feh)));
		}
		$res = $res->first();
		return $res;
	}
	
	public function get_pendientes(){
		return $prestamos = Prestamos::select('prestamos.PRE_ID','contenidos.CON_TITULO AS EJE_ID',DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS LECTOR'),'prestamos.PRE_FECHA','prestamos.PRE_HORA','prestamos.PRE_FECHAD','prestamos.PRE_HORAD','prestamos.PRE_OBS','prestamos.PRE_ESTADO')
            ->join('ejemplares','prestamos.EJE_ID','ejemplares.EJE_ID')
			->join('contenidos','ejemplares.CON_ID','contenidos.CON_ID')
            ->join('lectores','prestamos.USL_ID','lectores.LEC_ID')
			->where("PRE_ESTADO",1)
			->whereDate("PRE_FECHAD","<",date("Y-m-d"))
			->orderBy('PRE_FECHA','ASC')
            ->get();
	}
	
	public function get_lectores($tip){
		return $lectores = Lectores::where("LET_ID",$tip)->get();
	}
	public function get_lectorp($id){
		//Bibliograficos::join('ejemplares','contenidos.CON_ID','ejemplares.CON_ID', 'left')->where("contenidos.CON_ID",$id)->where("EJE_ESTADO",1)->first();
		return Prestamos::join('lectores','prestamos.USL_ID','=','lectores.LEC_ID')->where("PRE_ESTADO",1)->where("LEC_ID",$id)->count();
	}
	public function get_lectorr($id){
		//Bibliograficos::join('ejemplares','contenidos.CON_ID','ejemplares.CON_ID', 'left')->where("contenidos.CON_ID",$id)->where("EJE_ESTADO",1)->first();
		return Reservas::join('lectores','reservas.USL_ID','=','lectores.LEC_ID')->where("RES_ESTADO",1)->where("LEC_ID",$id)->count();
	}
	
	public function sed_msg($tc=0){
		//return redirect('twilio-php-main/index.php?tip=2&tc='.$tc);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Prestamos::create($req->all());
		return redirect()->back()->with('success', 'Prestamo exitoso!');*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $pre = Prestamos::create($req->all());
		if($req->input('PRE_FECHAD')){
			$fecha = explode(" ",$req->input('PRE_FECHAD'));
			$pre->PRE_HORAD = $fecha[1];
			$pre->save();
		}
		$registro = Ejemplares::find($req->input('EJE_ID'));
		$registro->EJE_ESTADO = 2;
		$registro->save();
		if($req->input('RES_ID')){
			$res = Reservas::find($req->input('RES_ID'));	
			$res->RES_ESTADO = 2;
			$res->save();
		}
		return redirect()->back()->with('success', 'Prestamo exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Prestamos::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = $req['id'];
		$reservas = Reservas::find($id);
        $reservas->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
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
		$prestamos = Prestamos::find($id);
        $prestamos->update($req->all());
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
        //Prestamos::destroy($id);
		$registro = Prestamos::find($id);
		$registro->PRE_ESTADO = 5;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }
}