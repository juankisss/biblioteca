<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Reservas;
use App\Models\Bibliograficos;
use App\Models\Personal;
use App\Models\Lectores;
use App\Models\Lector_tipo;
use App\Models\Prestamos;
use DateTime;
use DatePeriod;
use DateInterval;

class ReservasController extends Controller
{
    /*public function index()
    {
        $ejemplares = Bibliograficos::select('ejemplares.EJE_ID','ejemplares.EJE_CODIGO','contenidos.CON_ID', 'categorias.CAT_NOMBRE', 'autores.AUT_NOMBRE', 'editoriales.EDI_NOMBRE', 'secciones.SEC_NOMBRE', 'contenidos.CON_ISBN', 'contenidos.CON_TITULO', 'contenidos.CON_SUBTITULO', 'contenidos.CON_DESC', 'contenidos.CON_RESUMEN', 'contenidos.CON_EDICION', 'contenidos.CON_ANIOP', 'contenidos.CON_LENGUAJE', 'contenidos.CON_NPAGS', 'contenidos.CON_ESTADO', 'contenidos.CON_IMAGEN', 'contenidos.CON_TIPO')
            ->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
            ->join('autores','autores.AUT_ID','contenidos.AUT_ID')
            ->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
            ->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
			->join('ejemplares','ejemplares.CON_ID','contenidos.CON_ID')
			->where("CON_ESTADO",1)
            ->get();
        $personales = Personal::all();
        $lectores = Lectores::join('lector_tipo','lectores.LET_ID','lector_tipo.LET_ID')->where("LEC_ESTADO",1)->get();
        $reservas = Reservas::select('reservas.RES_ID','contenidos.CON_TITULO AS EJE_ID',DB::raw('CONCAT(personal.PER_NOMBRES," ",personal.PER_APELLIDOS) AS USP_ID'),DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS USL_ID'),'reservas.RES_FECHA','reservas.RES_DESDEF','reservas.RES_DESDEH','RES_HASTAF','RES_HASTAH','reservas.RES_FECHAD','reservas.RES_OBS','reservas.RES_ESTADO')
            ->join('contenidos','reservas.EJE_ID','contenidos.CON_ID')
            ->join('personal','personal.PER_ID','reservas.USP_ID')
            ->join('lectores','reservas.USL_ID','lectores.LEC_ID')
			->where("RES_ESTADO",1)
            ->get();
	    $tipo = Lector_tipo::all();
		$fechasr = array();
		foreach($reservas as $res):
			$fechasr[] = $res->RES_DESDEF;
		endforeach;
		$fechasr = json_encode($fechasr);
        //return json_encode($fechasr); 
		return view('reservas.list',compact('reservas','ejemplares','personales','lectores','tipo','fechasr'));
    }*/
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
        $lectores = Lectores::where("LET_ID",1)->where("LEC_ESTADO",1)->get();
        //$reservas = Reservas::all();
		$tipo = Lector_tipo::all();
        $registros = Reservas::select('reservas.RES_ID','contenidos.CON_TITULO',DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS USL_ID'),'reservas.RES_FECHA','reservas.RES_FECHAR','reservas.RES_HORAR','reservas.RES_OBS','reservas.RES_ESTADO','reservas.EJE_ID','LET_NOMBRE')
            ->join('personal','reservas.USP_ID','=','personal.PER_ID', 'left outer')
			->join('ejemplares','reservas.EJE_ID','ejemplares.EJE_ID')
			->join('contenidos','ejemplares.CON_ID','contenidos.CON_ID')
            ->join('lectores','reservas.USL_ID','lectores.LEC_ID')
			->join('lector_tipo','lector_tipo.LET_ID','lectores.LET_ID')
			->where("RES_ESTADO","<",4)
			->orderBy("RES_FECHAR", "DESC")->orderBy("RES_HORAR", "DESC")->orderBy("RES_FECHA", "DESC")
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
        return view('reservas.list',compact('registros','contenidos','personales','lectores','reservas','tipo'));
    }
	
	public function get_reservas($eid,$rid){
		return Reservas::select('reservas.RES_ID',DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS LECTOR'),'reservas.RES_FECHA','reservas.RES_FECHAR','reservas.RES_HORAR','reservas.RES_OBS','reservas.RES_ESTADO')
			->join('ejemplares','reservas.EJE_ID','ejemplares.EJE_ID')
            ->join('lectores','reservas.USL_ID','lectores.LEC_ID')
			->where("RES_ESTADO",1)
			->where("RES_ID",$rid)
			->where("reservas.EJE_ID","!=",$eid)
			->where("RES_FECHAR",">=",date("Y-m-d"))
		->get();
	}
	
	public function get_reservasf($id,$fec){
		return Reservas::select('reservas.RES_ID',DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS LECTOR'),'reservas.RES_FECHA','reservas.RES_FECHAR','reservas.RES_HORAR','reservas.RES_OBS','reservas.RES_ESTADO')
			->join('ejemplares','reservas.EJE_ID','ejemplares.EJE_ID')
            ->join('lectores','reservas.USL_ID','lectores.LEC_ID')
			->where("RES_ESTADO",1)
			->where("reservas.EJE_ID",$id)
			->where("RES_FECHAR",$fec)
		->get();
	}
	
	public function get_prestamo($id,$fec){
		echo Prestamos::select('PRE_ID',DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS LECTOR'),'PRE_FECHA','PRE_HORA','PRE_FECHAD','PRE_HORAD','PRE_OBS','PRE_ESTADO')
			->join('ejemplares','prestamos.EJE_ID','ejemplares.EJE_ID')
            ->join('lectores','prestamos.USL_ID','lectores.LEC_ID')
			->where("PRE_ESTADO",1)
			->where("prestamos.EJE_ID",$id)
			->where(function($query) use ($fec){
				  $query->where(function($query1) use ($fec){
					  $query1->where(DB::raw('DATE_FORMAT(PRE_FECHA, "%Y-%m-%d")'),$fec)
					  ->where("PRE_FECHAD",NULL);
				  })
				  ->orWhere(function($query1) use ($fec){
						$query1->where(DB::raw('DATE_FORMAT(PRE_FECHA, "%Y-%m-%d")'),"<=",$fec)
							  ->where("PRE_FECHAD",">=",$fec);
				  }); //2022/01/01 - 2022/01/05 res: 3
			})
			->first();
	}
	
	public function get_reserva($id){
		return $reservas = Reservas::select('*')
			->join('lectores','reservas.USL_ID','lectores.LEC_ID')
			->join('ejemplares','ejemplares.EJE_ID','reservas.EJE_ID')
			->join('contenidos','ejemplares.CON_ID','contenidos.CON_ID')
			->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
            ->join('autores','autores.AUT_ID','contenidos.AUT_ID')
            ->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
            ->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
			->where("RES_ID",$id)
            ->first();
	}
	
	public function get_expirados(){
		return $reservas = Reservas::select('*')
			->join('lectores','reservas.USL_ID','lectores.LEC_ID')
			->where("RES_ESTADO",1)
			->whereDate("RES_FECHAR","<",date("Y-m-d"))
            ->get();
			//->whereDate("RES_HASTAF","<",date("Y-m-d"))
			//whereBetween(date("Y-m-d"), ["RES_DESDEF", "RES_HASTAF"])
	}

    public function store(Request $req)
    { 
        if(!$req->input('cancelar')){
			Reservas::create($req->all());
			return redirect()->back()->with('success', 'Reservación exitosa!');
		}else{
			$registro = Reservas::find($req->input('cancelar'));
			$registro->RES_ESTADO = $req->input('RES_ESTADO');
			$registro->RES_OBS = $req->input('RES_OBS');
			$registro->save();
			return redirect()->back()->with('success', 'Se actualizo el registro exitosamente!');
		}
    }
	
	public function send_msg(){
		//return redirect('twilio-php-main/index.php?tip=1&tc='.$tc);
		  //recordatorio de reserva solicitada
		  $reservas = DB::table('reservas')
			->select('RES_ID','USL_ID', 'RES_FECHAR','RES_HORAR','EJE_ID')
			->where('RES_FECHAR',date("Y-m-d"))
			->where(DB::raw('DATE_SUB(RES_HORAR, INTERVAL 1 HOUR)'),date("H:i"))
			->get();
		  foreach($reservas as $res)
		  { 
			$eje = DB::table('contenidos')->join('ejemplares','contenidos.CON_ID','=','ejemplares.CON_ID')->where("ejemplares.EJE_ID",$res->EJE_ID)
			->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
			->join('autores','autores.AUT_ID','contenidos.AUT_ID')
			->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
			->select('contenidos.CON_ID','CON_ISBN','CON_TITULO','CON_IMAGEN','CON_ESTADO','CON_EDICION','EJE_ID','EJE_CODIGO','EJE_ESTADO','CAT_NOMBRE','AUT_NOMBRE','EDI_NOMBRE')
			->first();
			//guardado en BD
			//'Biblioteca U.E. Luis Espinal: Estimado lector, recordarle que tiene una reserva pendiente en Fecha: '.$res->RES_FECHAR.' y Hora: '.$res->RES_HORAR.' del ejemplar: ISBN: '.$eje->CON_ISBN.' Titulo: '.$eje->CON_TITULO.' Autor: '.$eje->AUT_NOMBRE.' Editorial: '.$eje->EDI_NOMBRE.' Edición: '.$eje->CON_EDICION,
			$data = [
				'RES_ID' => $res->RES_ID,
				'NOT_MENSAJE' => '*Biblioteca U.E. Luis Espinal:* Estimado lector, recordarle que tiene una reserva pendiente en *Fecha:* '.$res->RES_FECHAR.' y *Hora:* '.$res->RES_HORAR.' del ejemplar: *ISBN:* '.$eje->CON_ISBN.' *Titulo:* '.$eje->CON_TITULO.' *Autor:* '.$eje->AUT_NOMBRE.' *Editorial:* '.$eje->EDI_NOMBRE.' *Edición:* '.$eje->CON_EDICION,
				'NOT_ESTADO' => '2',
				'NOT_TIPO' => '2'
			];
			//echo json_encode($data);
			DB::table('notificaciones')->insert($data);
		  }
		  
			//recordatorio de devolucion de prestamo
		  $prestamos = DB::table('prestamos')
			->select('PRE_ID','USL_ID', 'PRE_FECHAD','PRE_HORAD', 'EJE_ID')
			->where('PRE_FECHAD',date("Y-m-d"))
			->where(DB::raw('DATE_SUB(PRE_HORAD, INTERVAL 1 HOUR)'),date("H:i"))
			->get();
		  foreach($prestamos as $pre)
		  {
			$eje = DB::table('contenidos')->join('ejemplares','contenidos.CON_ID','=','ejemplares.CON_ID')->where("ejemplares.EJE_ID",$pre->EJE_ID)
			->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
			->join('autores','autores.AUT_ID','contenidos.AUT_ID')
			->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
			->select('contenidos.CON_ID','CON_ISBN','CON_TITULO','CON_IMAGEN','CON_ESTADO','CON_EDICION','EJE_ID','EJE_CODIGO','EJE_ESTADO','CAT_NOMBRE','AUT_NOMBRE','EDI_NOMBRE')
			->first();
			//guardado en BD
			//'Biblioteca UE Luis Espinal: Estimado lector, recordarle que tiene programada la devolución de un prestamo en Fecha: '.$pre->PRE_FECHAD.' y Hora: '.$pre->PRE_HORAD.' del ejemplar: ISBN: '.$eje->CON_ISBN.' Titulo: '.$eje->CON_TITULO.' Autor: '.$eje->AUT_NOMBRE.' Editorial: '.$eje->EDI_NOMBRE.' Edición: '.$eje->CON_EDICION
			$data = [
				'PRE_ID' => $pre->PRE_ID,
				'NOT_MENSAJE' => '*Biblioteca UE Luis Espinal:* Estimado lector, recordarle que tiene programada la devolución de un prestamo en *Fecha:* '.$pre->PRE_FECHAD.' y *Hora:* '.$pre->PRE_HORAD.' del ejemplar: *ISBN:* '.$eje->CON_ISBN.' *Titulo:* '.$eje->CON_TITULO.' *Autor:* '.$eje->AUT_NOMBRE.' *Editorial:* '.$eje->EDI_NOMBRE.' *Edición:* '.$eje->CON_EDICION,
				'NOT_ESTADO' => '2',
				'NOT_TIPO' => '3'
			];
			//echo json_encode($data);
			DB::table('notificaciones')->insert($data);
		  }
		  //echo view("reservas.msg");
	}

    public function show($id)
    {
        return Reservas::find($id);
    }

    public function update(Request $req, $id)
    {
        $id = $req['id'];
		$reservas = Reservas::find($id);
        $reservas->update($req->all());
        return redirect()->back()->with('success', 'Se actualizó el registro exitosamente!');
    }

    public function destroy($id)
    {
        //Reservas::destroy($id);
		$registro = Reservas::find($id);
		$registro->RES_ESTADO = 4;
		$registro->save();
		return redirect()->back()->with('success', 'Se eliminó el registro exitosamente!');
    }

    public function search($name)
    {
        return Reservas::where('name', 'like', '%'.$name.'%')->get();
    }
}
