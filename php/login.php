<?php
require 'conexión.php'; 

// Indicamos que vamos a devolver JSON SIEMPRE - Esto es nuevo
header('Content-Type: application/json');

 // Aquí vamos a buscar al usuario por su nombre y contraseña, se selecciona de la base de datos "usuarios" y se tiene un mensaje final donde dice si accede o no.
if(isset($_POST['login'])) {
    $usuario=$_POST['nombre_user'];
    $contraseña=$_POST['contraseña_user'];
    $sql="SELECT * FROm usuarios WHERE nombre_user='$usuario' and contraseña_user = '$contraseña'";
    $resultado= mysqli_query($conexion,$sql);
    $numero_registros= mysqli_num_rows($resultado);
    if ($numero_registros !=0) {
        // Inicio de sesión exitoso
        $response = array(
            "status" => "success",
            "message" => "Inicio de sesión exitoso. Bienvenido a Bilancia, $usuario!",
            "username" => $usuario,
            "token" => bin2hex(random_bytes(16)) // Puedes generar un token aleatorio (opcional)
        );
    } else {
        //Credenciales inválidas
        $response = array(
            "status" => "error",
            "message" => "Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña."
        );
        // Este es para enseñar los datos ingresados por el usuario para que vea su error, pero no es del todo seguro:
        // echo "ERROR:" . $sql."<br>" . mysqli_error($conexion);
    }
    echo json_encode($response);
} else {
    // Si no se envió el botón 'login', también respondemos JSON
    echo json_encode(array(
        "status" => "error",
        "message" => "No se recibió solicitud de login."
    ));
    
}
?>