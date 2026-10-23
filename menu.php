<header class="encabezado">
    <div class="contenedor-header">
        <div class="logos animate__animated animate__zoomIn"><img src="img/LOGOGUSTICOS.png" alt="Logo Gusticos"></div>
        <nav class="menu">
            <a href="index.php">INICIO</a>
            <a href="#">👤 <?php echo $usuario ?></a>
            <a href="CerrarSesion.php" <?php echo $ocultarcerrar ?>>CERRAR SESIÓN</a>
            <a href="Registro.php" <?php echo $ocultariniciar ?>>REGISTRO</a>
            <a href="InicioSesion.php" <?php echo $ocultariniciar ?>>INICIAR SESIÓN</a>
            <a href="especialidades.php">ESPECIALIDADES</a>
            <a href="infantiles.php">INFANTILES</a>
            <a href="copasDeliciosas.php">COPAS DELICIOSAS</a>
            <a href="helados.php">HELADOS</a>
        </nav>

        <div class="icono animate__animated animate__heartBeat icono-carrito">
            <a href="#" id="btnAbrirCarrito" data-bs-toggle="offcanvas" data-bs-target="#panelCarrito" aria-controls="panelCarrito" aria-label="Abrir carrito de compras" onclick="tablaCarrito()">
                <img src="img/Carrito de compras.png" alt="Carrito de compras">
                <span class="contador-carrito" id="contadorCarrito">0</span>
            </a>
        </div>
    </div>
</header>