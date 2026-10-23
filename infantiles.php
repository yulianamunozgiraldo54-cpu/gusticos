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
    <!-- ICONO -->
    <link rel="icon" href="img/LOGOGUSTICOS.png">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/iniciogusticos.css?v=1.2">
    <link rel="stylesheet" href="assets/css/infantiles.css?v=1.3">

    <!-- LIBRERIAS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body onload="contadorCarrito()">
    <?php include("menu.php") ?>
    <section class="portada-infantil">
        <img src="img/Banner Infantil.png" alt="Menú Infantil">
    </section>
    <section class="titulo-catalogo">
        <h1 class="animate__animated animate__shakeX">🍨 Menú Infantil Gusticos 🍨</h1>
        <p>¡Los helados más divertidos para los pequeños!</p>
    </section>
    <div class="catalogo">
        <?php
        $consultarProductos = $conexion->prepare("SELECT idproducto, nombre, descripcion, precio, imagen FROM productos WHERE estado = 1 AND categoria_id = 2 ORDER BY nombre, precio");
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