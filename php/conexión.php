<?php
//Identifica la dirección de la base de datos en Mysql.
$conexion = new mysqli("localhost", "root", "", "bilancia_php", 3306);

// Establecer el charset
$conexion->set_charset("utf8");

// Verificar si hubo error en la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>