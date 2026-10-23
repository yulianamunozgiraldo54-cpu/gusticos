<?php
session_start();
include("conexion.php");

$usuario = "";

if (isset($_SESSION['nombre'])) {
    $usuario = $_SESSION['nombre'];
}

$ocultariniciar = ($usuario != '') ? 'hidden' : '';
$ocultarcerrar = ($usuario != '') ? '' : 'hidden';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>GUSTICOS</title>
   
    <link rel="icon" href="img/LOGOGUSTICOS.png">
    <link rel="stylesheet" href="assets/css/iniciogusticos.css?v=1.5">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body onload="contadorCarrito()">
    <?php include("menu.php") ?>
    <section class="text-center mt-5">
        <h1 class="animate__animated animate__bounceIn">😍 ¡Bienvenidos a Gusticos! 😍</h1>
        <h3><em>🌸 Gusticos, un antojo que enamora 🌸</em></h3> <?php if ($usuario != "") { ?> <h4 style="color:#9c27b0;margin-top:20px">👋 ¡Hola, <?php echo $usuario; ?>! Bienvenido nuevamente.</h4> <?php } ?>
    </section>
    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-indicators"><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button></div>
        <div class="carousel-inner">
            <div class="carousel-item active"><img src="img/Promocion del mes.png" class="d-block w-100" alt="Promoción 1"></div>
            <div class="carousel-item"><img src="img/Promoción del mes1.png" class="d-block w-100" alt="Promoción 2"></div>
            <div class="carousel-item"><img src="img/Promocion3.png" class="d-block w-100" alt="Promoción 3"></div>
        </div><button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Anterior</span></button><button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Siguiente</span></button>
    </div>
    <section class="titulo-catalogo">
        <h1 class="animate__animated animate__shakeX">🍨 Catálogo de Productos 🍨</h1>
        <p>¡Ven y échale un vistazo a nuestras delicias!</p>
    </section>
    <div class="catalogo">
        <?php
        $consultarProductos = $conexion->prepare("SELECT idproducto, nombre, descripcion, precio, imagen FROM productos WHERE estado = 1 ORDER BY nombre, precio");
        $consultarProductos->execute();
        $resultadoProductos = $consultarProductos->get_result();
        while ($filaProductos = $resultadoProductos->fetch_assoc()) {
        ?>
            <div class="card"><img src="img/<?php echo $filaProductos['imagen'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $filaProductos['nombre'] ?></h5>
                    <p class="card-text"><?php echo $filaProductos['descripcion'] ?></p>
                    <h4 class="precio">$<?php echo number_format($filaProductos['precio']) ?></h4>
                    <button type="button" class="btn-agregar btnAgregarProducto" data-bs-toggle="offcanvas" data-bs-target="#panelCarrito" aria-controls="panelCarrito" onclick="agregarCarrito('<?php echo $filaProductos['idproducto'] ?>')">
                        <i class="bi bi-cart-plus"></i> Agregar al carrito
                    </button>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <?php include("Carrito.php") ?>

    <?php include("footer.php") ?>

    <script src="assets/js/carrito.js?v=<?php echo time() ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>