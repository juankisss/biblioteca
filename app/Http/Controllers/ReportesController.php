<?php

namespace App\Http\Controllers;

use App\Models\Lector_tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Personal;
use App\Models\Lectores;
use App\Models\Prestamos;
use App\Models\Reservas;
use App\Models\Bibliograficos;
use App\Models\Categorias;
use App\Models\Autores;
use App\Models\Editoriales;
use App\Models\Secciones;
use DB;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($con=null)
    {
        $data['lectortipos'] = Lector_tipo::select('LET_ID','LET_NOMBRE')->get();
		$data['categorias'] = Categorias::select('CAT_ID','CAT_NOMBRE')->where("CAT_ESTADO",1)->get();
        $data['autores'] = Autores::select('AUT_ID','AUT_NOMBRE')->where("AUT_ESTADO",1)->get();
        $data['editoriales'] = Editoriales::select('EDI_ID','EDI_NOMBRE')->where("EDI_ESTADO",1)->get();
        $data['secciones'] = Secciones::select('SEC_ID','SEC_NOMBRE')->where("SEC_ESTADO",1)->get();
		$data['personal'] = Personal::select('PER_ID','PER_NOMBRES','PER_APELLIDOS')->where("PER_ESTADO",1)->get();
		$data['lectores'] = Lectores::select('LEC_ID','LEC_NOMBRES','LEC_APELLIDOS','LEC_CI')->where("LEC_ESTADO",1)->get();
		$data['ejemplares'] = Bibliograficos::select('ejemplares.EJE_ID','ejemplares.EJE_CODIGO','contenidos.CON_ID', 'categorias.CAT_NOMBRE', 'autores.AUT_NOMBRE', 'editoriales.EDI_NOMBRE', 'secciones.SEC_NOMBRE', 'contenidos.CON_ISBN', 'contenidos.CON_TITULO', 'contenidos.CON_SUBTITULO', 'contenidos.CON_DESC', 'contenidos.CON_RESUMEN', 'contenidos.CON_EDICION', 'contenidos.CON_ANIOP', 'contenidos.CON_LENGUAJE', 'contenidos.CON_NPAGS', 'contenidos.CON_ESTADO', 'contenidos.CON_IMAGEN', 'contenidos.CON_TIPO')
            ->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
            ->join('autores','autores.AUT_ID','contenidos.AUT_ID')
            ->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
            ->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
			->join('ejemplares','ejemplares.CON_ID','contenidos.CON_ID')
			->where("CON_ESTADO",1)
            ->get();
		$data['link'] = 'reportes';
		$data['con'] = $con;
		if($con=='personal'){ 
			$data['title'] = 'Reporte de Personal';
		}elseif($con=='lectores'){
			$data['title'] = 'Reporte de Lectores';
		}elseif($con=='contenidos'){
			$data['title'] = 'Reporte de Material Bibliografico';
		}elseif($con=='reservas'){
			$data['title'] = 'Reporte de Reservas';
		}elseif($con=='prestamos'){
			$data['title'] = 'Reporte de Prestamos';
		}
		return view('reportes.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function personal()
    {
        $personal = Personal::where("PER_ESTADO",1)->get();
		$usuario = Session::get('nombre');
		return view('reportes.personal', compact('personal','usuario'));
    }
	public function lectores($gen=-1,$tip=-1)
    {
		$usuario = Session::get('nombre');
		$registro = Lectores::select('lectores.LEC_ID','lector_tipo.LET_NOMBRE','lectores.LEC_NOMBRES','lectores.LEC_APELLIDOS','lectores.LEC_CI','lectores.LEC_GENERO','lectores.LEC_ROL','lectores.LEC_EMAIL','lectores.LEC_CELULAR','lectores.LEC_DIRECCION','lectores.LEC_ESTADO')
            ->join('lector_tipo','lector_tipo.LET_ID','lectores.LET_ID')
			->where("LEC_ESTADO",1);
		if($gen!=-1){ $registro = $registro->where("LEC_GENERO",$gen);}
		if($tip!=-1){ $registro = $registro->where("lectores.LET_ID",$tip);}
		$registro = $registro->get();
		return view('reportes.lectores', compact('registro','usuario'));
    }
	public function contenidos($cat=-1,$sec=-1,$aut=-1,$edi=-1)
    {
		$usuario = Session::get('nombre');
		$registro = Bibliograficos::select('contenidos.CON_ID', 'categorias.CAT_NOMBRE', 'autores.AUT_NOMBRE', 'editoriales.EDI_NOMBRE', 'secciones.SEC_NOMBRE', 'contenidos.CON_ISBN', 'contenidos.CON_TITULO', 'contenidos.CON_SUBTITULO', 'contenidos.CON_DESC', 'contenidos.CON_RESUMEN', 'contenidos.CON_EDICION', 'contenidos.CON_ANIOP', 'contenidos.CON_LENGUAJE', 'contenidos.CON_NPAGS', 'contenidos.CON_ESTADO', 'contenidos.CON_IMAGEN', 'contenidos.CON_TIPO')
            ->join('categorias','categorias.CAT_ID','contenidos.CAT_ID')
            ->join('autores','autores.AUT_ID','contenidos.AUT_ID')
            ->join('editoriales','editoriales.EDI_ID','contenidos.EDI_ID')
            ->join('secciones','secciones.SEC_ID','contenidos.SEC_ID')
			->where("CON_ESTADO",1);
		if($cat!=-1){ $registro = $registro->where("contenidos.CAT_ID",$cat);}
		if($sec!=-1){ $registro = $registro->where("contenidos.SEC_ID",$sec);}
		if($aut!=-1){ $registro = $registro->where("contenidos.AUT_ID",$aut);}
		if($edi!=-1){ $registro = $registro->where("contenidos.EDI_ID",$edi);}
		$registro = $registro->get();
		return view('reportes.contenidos', compact('registro','usuario'));
    }
	public function reservas($fei=-1,$fef=-1,$eje=-1,$per=-1,$lec=-1,$est=-1,$tip=-1,$cat=-1,$sec=-1,$aut=-1,$edi=-1)
    {
		$usuario = Session::get('nombre');
		$registro = Reservas::select('reservas.RES_ID','contenidos.CON_TITULO AS EJE_ID',DB::raw('CONCAT(personal.PER_NOMBRES," ",personal.PER_APELLIDOS) AS USP_ID'),DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS USL_ID'),'reservas.RES_FECHA','reservas.RES_FECHAR','reservas.RES_HORAR','reservas.RES_OBS','reservas.RES_ESTADO')
            ->join('ejemplares','reservas.EJE_ID','ejemplares.EJE_ID')
			->join('contenidos','ejemplares.CON_ID','contenidos.CON_ID')
            ->join('personal','reservas.USP_ID','=','personal.PER_ID', 'left outer')
            ->join('lectores','reservas.USL_ID','lectores.LEC_ID')
			->where("RES_ESTADO","<",4);
		if($fei!=-1){ $registro = $registro->where("RES_FECHAR",">=",$fei);}
		if($fef!=-1){ $registro = $registro->where("RES_FECHAR","<=",$fef);}
		if($eje!=-1){ $registro = $registro->where("ejemplares.EJE_ID",$eje);}
		if($per!=-1){ $registro = $registro->where("USP_ID",$per);}
		if($lec!=-1){ $registro = $registro->where("USL_ID",$lec);}
		if($est!=-1){ $registro = $registro->where("RES_ESTADO",$est);}
		if($tip!=-1){ $registro = $registro->where("LET_ID",$tip);}
		if($cat!=-1){ $registro = $registro->where("contenidos.CAT_ID",$cat);}
		if($sec!=-1){ $registro = $registro->where("contenidos.SEC_ID",$sec);}
		if($aut!=-1){ $registro = $registro->where("contenidos.AUT_ID",$aut);}
		if($edi!=-1){ $registro = $registro->where("contenidos.EDI_ID",$edi);}
		$registro = $registro->get();
		return view('reportes.reservas', compact('registro','usuario'));
    }
	public function prestamos($fei=-1,$fef=-1,$eje=-1,$per=-1,$lec=-1,$est=-1,$tip=-1,$cat=-1,$sec=-1,$aut=-1,$edi=-1)
    {
        $usuario = Session::get('nombre');
		$registro = Prestamos::select('prestamos.PRE_ID','contenidos.CON_TITULO AS EJE_ID',DB::raw('CONCAT(personal.PER_NOMBRES," ",personal.PER_APELLIDOS) AS USP_ID'),DB::raw('CONCAT(lectores.LEC_NOMBRES," ",lectores.LEC_APELLIDOS) AS USL_ID'),'prestamos.RES_ID','prestamos.PRE_FECHA','prestamos.PRE_HORA','prestamos.PRE_FECHAD','prestamos.PRE_HORAD','prestamos.PRE_OBS','prestamos.PRE_ESTADO')
            ->join('ejemplares','prestamos.EJE_ID','ejemplares.EJE_ID')
			->join('contenidos','ejemplares.CON_ID','contenidos.CON_ID')
            ->join('personal','prestamos.USP_ID','personal.PER_ID')
            ->join('lectores','prestamos.USL_ID','lectores.LEC_ID')
			->where("PRE_ESTADO","<",5);
		if($fei!=-1){ $registro = $registro->where("PRE_FECHA",">=",$fei);}
		if($fef!=-1){ $registro = $registro->where("PRE_FECHA","<=",$fef);}
		if($eje!=-1){ $registro = $registro->where("ejemplares.EJE_ID",$eje);}
		if($per!=-1){ $registro = $registro->where("USP_ID",$per);}
		if($lec!=-1){ $registro = $registro->where("USL_ID",$lec);}
		if($est!=-1){ $registro = $registro->where("PRE_ESTADO",$est);}
		if($tip!=-1){ $registro = $registro->where("LET_ID",$tip);}
		if($cat!=-1){ $registro = $registro->where("contenidos.CAT_ID",$cat);}
		if($sec!=-1){ $registro = $registro->where("contenidos.SEC_ID",$sec);}
		if($aut!=-1){ $registro = $registro->where("contenidos.AUT_ID",$aut);}
		if($edi!=-1){ $registro = $registro->where("contenidos.EDI_ID",$edi);}
		$registro = $registro->get();
		return view('reportes.prestamos', compact('registro','usuario'));
    }
	

	
	public function reportes_s()
    {
        if(Session::get('login')!='1') { return redirect('login');}
        return view('reportes.reportes_s', ['titulo' => 'Reportes']);
    }
	
	
	public function invoice() 
    {
        $data = array();
		$proyectos = Proyectos::all();
		echo $proyectos;
		/*foreach($proyectos as $registro):
			array_push($data,$registro->gestion);
			$proyecto = Proyectos::where("gestion",$registro->gestion)->select(DB::raw('count(*) as user_count'))->first();
			array_push($can,$proyecto->user_count);
		endforeach;*/
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }
 
    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }

}
