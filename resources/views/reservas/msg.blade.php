<?php 

// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'src/Twilio/autoload.php'; 
 
use Twilio\Rest\Client; 
/*$tip = $_GET["tip"];
$tc = $_GET["tc"];
if($tip==1){
	if($tc==1){
		$msg = '';
	}else{
		
	}
}else{
	if($tc==1){
		
	}else{
		
	}
}*/
 
$sid    = "ACd43f6651173d677567a61262212f20e6"; 
$token  = "d4662830f3959c02d6c3f79ad29013f2"; 
$twilio = new Client($sid, $token); 


$mensaje = 'Biblioteca UE Luis Espinal--: Debe confirmar su solicutud de reserva ingresando al siguiente enlace: http://localhost/sis_biblioteca/public';
$message = $twilio->messages 
	  ->create("whatsapp:+59162329106", // to 
			   array( 
				   "from" => "whatsapp:+14155238886",       
				   "body" => $mensaje,
				   "mediaUrl" => "https://www.uv.es/recursos/fatwirepub/ccurl/701/868/Int-ciencias-salud.jpg"
			   ) 
	  ); 
print($message->sid);

?>