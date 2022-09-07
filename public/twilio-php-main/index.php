<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_biblioteca');

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(mysqli_connect_errno()){
	echo "fallo al conectar a la BD: " . mysqli_connect_error();
	die();
}
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'src/Twilio/autoload.php'; 
use Twilio\Rest\Client; 
 
$sid    = "ACd43f6651173d677567a61262212f20e6"; 
$token  = "d4662830f3959c02d6c3f79ad29013f2"; 
$twilio = new Client($sid, $token); 

$sql = "select * from notificaciones where NOT_ESTADO=2";
$res=mysqli_query($conn,$sql); 
while($row = @mysqli_fetch_array($res)){
	if($row["NOT_TIPO"]==2){
		$sql1 = "select * from reservas where RES_ID=".$row["RES_ID"];
		$res1=mysqli_query($conn,$sql1); 
		$reg = @mysqli_fetch_array($res1);
		$idl = $reg["USL_ID"];
	}elseif($row["NOT_TIPO"]==3){
		$sql1 = "select * from prestamos where PRE_ID=".$row["PRE_ID"];
		$res1=mysqli_query($conn,$sql1); 
		$reg = @mysqli_fetch_array($res1);
		$idl = $reg["USL_ID"];
	}
	$mensaje = $row["NOT_MENSAJE"];
	$mensajedb = str_replace("*","",$row["NOT_MENSAJE"]);
	$sqlr = "UPDATE notificaciones SET `NOT_MENSAJE` = '$mensajedb',`NOT_ESTADO` = 1 where NOT_ID=".$row["NOT_ID"];
	mysqli_query($conn,$sqlr);
	$sqll = "select * from lectores where LEC_ID=".$idl;
	$resl=mysqli_query($conn,$sqll); 
	$rel = @mysqli_fetch_array($resl);
	//$mensaje = 'Biblioteca UE Luis Espinal: Debe confirmar su solicutud de reserva ingresando al siguiente enlace: http://localhost/sis_biblioteca/public';
	$message = $twilio->messages 
		  ->create("whatsapp:+591".$rel["LEC_CELULAR"], // to 
				   array( 
					   "from" => "whatsapp:+14155238886",       
					   "body" => $mensaje,
					   "mediaUrl" => "https://www.uv.es/recursos/fatwirepub/ccurl/701/868/Int-ciencias-salud.jpg"
				   ) 
		  ); 
	print($message->sid);
}
?>