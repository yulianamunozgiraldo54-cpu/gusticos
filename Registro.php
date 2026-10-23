<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Gusticos</title>

    <link rel="icon" href="img/LOGOGUSTICOS.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="registro.css">

    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

<header class="encabezado">

    <div class="contenedor-header">

        <div class="logos animate__animated animate__zoomIn">
            <img src="img/LOGOGUSTICOS.png" alt="Logo Gusticos">
        </div>

        <nav class="menu">

            <a href="index.php">INICIO</a>

            <a href="Especialidades.php">ESPECIALIDADES</a>

            <a href="Infantiles.php">INFANTILES</a>

            <a href="Copas Deliciosas.php">COPAS DELICIOSAS</a>

            <a href="Helados.php">HELADOS</a>

        </nav>

        <div class="icono animate__animated animate__heartBeat">

            <a href="Carrito.php">

                <img src="img/Carrito de compras.png"
                    alt="Carrito de compras">

            </a>
  
        </div>

    </div>

</header>

<section class="titulo-registro">

    <h1>🍨 Crea una cuenta en Gusticos 🍨</h1>

    <p>¡Únete a nuestra dulce familia y disfruta de nuestros deliciosos antojos!</p>

</section>

<section class="contenedor-registro">

<form class="formulario-registro"
      action="guardar_usuario.php"
      method="POST"> action="GuardarUsuario.php" method="POST">
<input type="text"
name="nombre"
placeholder="👤 Nombre completo"
required>

<input type="email"
name="correo"
placeholder="📧 Correo electrónico"
required>

<input type="text"
name="usuario"
placeholder="🆔 Nombre de usuario"
required>

    <small>
        Elige un nombre de usuario único. Ejemplo: Daniela123
    </small>

<input type="tel"
name="celular"
placeholder="📱 Número de celular"
required>
<input type="password"
name="contrasena"
placeholder="🔒 Contraseña"
required>

     <input
        type="password"
        name="confirmar"
        placeholder="🔒 Confirmar contraseña"
        required>

   <select name="municipio" required>

        <option value="">📍 Selecciona tu municipio</option>

        <option value="Pácora, Caldas">Pácora, Caldas</option>

    </select>

    <div class="check">

        <input
            type="checkbox"
            name="politicas"
            required>

        <label>
            Acepto las Políticas de Tratamiento de Datos.
        </label>

    </div>

    <button type="submit">

        Crear cuenta

    </button>

    <p class="login">

        ¿Ya tienes una cuenta?

        <a href="InicioSesion.php">

            Inicia sesión aquí

        </a>

    </p>

</form>

</section>

<footer class="footer">

    <div class="footer-contenedor">

        <div class="footer-col">

            <img src="img/LOGOGUSTICOS.png" class="footer-logo">

            <div class="redes">

                <a href="https://www.facebook.com/share/1CtyWS2kGD/"><i class="bi bi-facebook"></i></a>

                <a href="https://www.instagram.com/gusticos_pacora?utm_source=qr&igsh=aXQzeW1nNXBnZmp2"><i class="bi bi-instagram"></i></a>

                <a href="https://wa.me/qr/OWU2J7W6CBZEL1"><i class="bi bi-whatsapp"></i></a>

            </div>

        </div>

        <div class="footer-col">

            <h3>Nosotros</h3>

            <a href="Acerca de nosotros.php">Acerca de Nosotros</a>

            <a href="">Política de Tratamiento de Datos</a>

            <a href="">Términos y Condiciones</a>

        </div>

        <div class="footer-col">

            <h3>Categorías</h3>

            <a href="Helados.php">Helados</a>

            <a href="Infantiles.php">Infantiles</a>

            <a href="Especialidades.php">Especialidades</a>

            <a href="Copas Deliciosas.php">Copas Deliciosas</a>

            <a href="Malteadas.php">Malteadas</a>

            <a href="Bebidas.php">Bebidas</a>

        </div>

        <div class="footer-col">

            <h3>Servicio al Cliente</h3>

            <p>📧 gusticos@gmail.com</p>

            <p>📱 +57 300 9653624</p>

            <p>📍 Dirección Pácora Caldas CLL 5 #4-16 Local 101</p>

            <p>🕐 Horario: Lunes a viernes 11:00 AM a 12:30 PM <br>
                2:00 PM a 7:00 PM <br>
                Sábados y domingos 10:30 AM a 7:00 PM
            </p>

        </div>

    </div>

    <hr>

    <p class="copy">

        © 2026 Gusticos | Un antojo que enamora 🍨💕

    </p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>