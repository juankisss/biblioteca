<?php 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'twilio-php-main/src/Twilio/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "ACd43f6651173d677567a61262212f20e6"; 
$token  = "d4662830f3959c02d6c3f79ad29013f2"; 
$twilio = new Client($sid, $token); 

$mensaje = '*Biblioteca U.E. Luis Espinal:* Reserva Realizada para la *Fecha:* '.$res->RES_FECHAR.' y *Hora:* '.$res->RES_HORAR.', del ejemplar: *ISBN:* '.$eje->CON_ISBN.' *Titulo:* '.$eje->CON_TITULO.' *Autor:* '.$eje->AUT_NOMBRE.' *Editorial:* '.$eje->EDI_NOMBRE.' *Edición:* '.$eje->CON_EDICION;
$message = $twilio->messages 
	  ->create("whatsapp:+591".$lec->LEC_CELULAR, // to 
		   array( 
			   "from" => "whatsapp:+14155238886",       
			   "body" => $mensaje,
			   "mediaUrl" => "https://www.uv.es/recursos/fatwirepub/ccurl/701/868/Int-ciencias-salud.jpg"
		   ) 
	  ); 
print($message->sid);

?>