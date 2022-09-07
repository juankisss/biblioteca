<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
//php artisan schedule:run //solo una vez
//php artisan schedule:work //en local funciona
//while true; do php artisan schedule:run; sleep 60; done //laravel 7
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];
	/**
	 * Get the timezone that should be used by default for scheduled events.
	 *
	 * @return \DateTimeZone|string|null
	 */
	protected function scheduleTimezone()
	{
		return 'America/La_Paz';
	}
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
		// the call method
		$schedule->call(function () {
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
		  //DB::table('lector_tipo')->insert(['LET_NOMBRE' => 'NOMBRE','LET_DETALLE' => 'DETALLE','LET_TIEMPOM' => '1']);
		//$url = url();
		})->everyMinute()->pingBefore('http://localhost:8080/sis_biblioteca/public/twilio-php-main/index.php');
		//->appendOutputTo($filePath); 
		//->before(function () { // Task is about to start... })
        //->after(function () { // Task is complete... });
		//->pingBefore($url) "guzzlehttp/guzzle": "~5.3|~6.0"
		//$schedule->call('App\Http\Controllers\ReservasController@send_msg')->everyMinute()->pingBefore('http://localhost/sis_biblioteca/public/twilio-php-main/index.php?id=123');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

}
