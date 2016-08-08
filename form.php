<?php
$otro = shell_exec('php -n -q server.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="javascript" src="js/jquery-1.7.2.min.js"></script>
<script language="javascript" src="js/fancywebsocket.js"></script>
<script language="javascript">
function insertar()
{
	var mensaje = document.getElementById('mensaje').value;
	var tipo             = document.getElementById('para').value;

	$.ajax({
		type: "POST",
		url: "insertar.php",
		data: "mensaje="+mensaje+"&tipo="+tipo,
		dataType:"html",
		success: function(data)
		{
		 	send(data);// array JSON
		}
		});
}

function crear()
{
	var mensaje = document.getElementById('s').value;

	$.ajax({
		type: "POST",
		url: "crearSesion.php",
		data: "id="+mensaje,
		dataType:"html"
		});
}
</script>
</head>

<body>
<input type="text" name="mensaje" id="mensaje" /><br />
<input id="para" placeholder="para"><br />
<input type="submit" value="enviar" onclick="insertar();" />

<br>
<input type="text" name="mensaje" id="s" /><br />
<input type="submit" value="Crear Sesion" onclick="crear();" />
<div id="sm<?php session_start(); echo $_SESSION['ID'] ?>">0</div>
<div id="c<?php  echo $_SESSION['ID'] ?>"></div>

</body>
</html>
