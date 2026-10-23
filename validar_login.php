<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) > 0){

    $fila = mysqli_fetch_assoc($resultado);

    if(password_verify($contrasena, $fila['contrasena'])){

        $_SESSION['id_usuario'] = $fila['id'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['usuario'] = $fila['usuario'];

        header("Location: index.php");
        exit();

    }else{

        echo "<script>
        alert('Contraseña incorrecta');
        window.location='InicioSesion.php';
        </script>";

    }

}else{

    echo "<script>
    alert('El usuario no existe');
    window.location='InicioSesion.php';
    </script>";

}
?>