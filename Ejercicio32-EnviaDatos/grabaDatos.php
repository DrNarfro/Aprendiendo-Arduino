<?php

//recojo variables
$arduino = $_GET["arduino"];
$temperatura = $_GET["temperatura"];

//Crear conexi�n a la Base de Datos
$conexion = mysql_connect("localhost","arduino","arduino");
if (!$conexion){
	die("Fallo la conexi�n a la Base de Datos: " . mysql_error());
}

// Seleccionar la Base de Datos a utilizar
$seleccionar_bd = mysql_select_db("Arduino", $conexion);
if (!$seleccionar_bd) {
	die("Fallo la selecci�n de la Base de Datos: " . mysql_error());
}

// compruebo que la conexion es corecta
if (!$conexion || !$seleccionar_bd) {
	die('Unable to connect or select database!');
}

$query = "INSERT INTO Datos (Fecha, Arduino, Temperatura) VALUES (CURRENT_TIMESTAMP, {$arduino}, {$temperatura})";
	
$result = mysql_query($query,$conexion);

if (!$result) {
		die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
	}
	
mysql_close($conexion);

echo ("GRABADOS");

?>