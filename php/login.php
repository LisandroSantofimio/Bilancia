<?php
require 'conexión.php';
 // Aquí vamos a buscar al usuario por su nombre y contraseña, se selecciona de la base de datos "usuarios" y se tiene un mensaje final donde dice si accede o no.
if(isset($_POST['login'])) {
    $usuario=$_POST['nombre_user'];
    $contraseña=$_POST['contraseña_user'];
    $sql="SELECT * FROm usuarios WHERE nombre_user='$usuario' and contraseña_user = '$contraseña'";
    $resultado= mysqli_query($conexion,$sql);
    $numero_registros= mysqli_num_rows($resultado);
    if ($numero_registros !=0) {
        // Inicio de sesión exitoso
        echo "Inicio de sesión exitoso. Bienvenido a Bilancia,".$usuario. "!";
    } else {
        //Credenciales inválidas
        echo "Credemciales inválidas. Por favor, verifica tu nombre de usuario y/0 contraseña."."<br>";
        // Este es para enseñar los datos ingresados por el usuario para que vea su error, pero no es del todo seguro:
        // echo "ERROR:" . $sql."<br>" . mysqli_error($conexion);
    }
    
}
?>