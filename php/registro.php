<?php
require 'conexión.php';
// Este if es para identificar las variables que se tienen con "$" y mandarlas a la base de datos, estos son los que terminan en user.
if(isset($_POST['registro'])){
    $usuario = $_POST['nombre_user'];
    $contraseña = $_POST['contraseña_user'];
    $correo = $_POST['correo_user'];
    // Estos son los valores que se redirigen a la base de datos para crear un usuario
    $sql = "INSERT INTO usuarios (nombre_user, contraseña_user, correo_user) VALUES ('$usuario', '$contraseña', '$correo')";
    $resultado = mysqli_query($conexion, $sql);
    // Mensajes que deben de salir por si ocurre un error al momento de insertar los datos.
    if ($resultado) {
        echo "¡Se insertaron los datos correctamente!";
    } else {
        echo "¡No se puede insertar la información!<br>";
        echo "ERROR: " . $sql . "<br>" . mysqli_error($conexion);
    }
}
?>
