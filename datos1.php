<?php
session_start();

include("conexion.php");

$usuario = $_POST['username'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios
        WHERE usuario='$usuario'
        AND contrasena='$contrasena'";

$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) > 0){

    $fila = mysqli_fetch_assoc($resultado);

    $_SESSION['id'] = $fila['id'];
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['usuario'] = $fila['usuario'];

    header("Location: index.php");
    exit();

}else{

    echo "<script>
        alert('Usuario o contraseña incorrectos');
        window.location='InicioSesion.php';
    </script>";

}
?>