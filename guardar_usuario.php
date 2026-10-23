<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$celular = $_POST['celular'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$municipio = $_POST['municipio'];

$sql = "INSERT INTO usuarios(nombre, correo, usuario, celular, contrasena, municipio)
VALUES('$nombre','$correo','$usuario','$celular','$contrasena','$municipio')";

if(mysqli_query($conexion,$sql)){
    echo "<script>
    alert('Usuario registrado correctamente');
    window.location='InicioSesion.php';
    </script>";
}else{
    echo "Error: ".mysqli_error($conexion);
}
?>