<?php
include("clases/conect.php");
$mensaje = $_POST['mensaje'];
$tipo = $_POST['tipo'];

$conex=new conect();
$conex->dbconect("localhost","root","","chat");

$timestamp = date("Y-m-d H:i:s");

$q = "INSERT INTO mensajes values ('','$mensaje','$timestamp','1','$tipo')";
$res = mysqli_query($conex->getCon(), $q) or die (mysql_error());

$arrayjson = array();

$arrayjson[] = array(
					'tipo'          => $tipo,//tipo de actualizacion
					'mensaje'      => $mensaje,//mensaje
					'fecha'         => $timestamp,//fecha de envio
					'actualizacion' => '1'
);

echo json_encode($arrayjson);
?>
