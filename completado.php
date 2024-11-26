<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id_transaccion = isset($_GET['key']) ? $_GET['key'] : '0';

$error = '';
if($id_transaccion == '') {
    $error = 'Error al procesar la peticion';
} else {

    $sql = $con->prepare('SELECT count(id_venta) FROM venta WHERE id_transaccion=? AND estado=?');
        $sql->execute([$id_transaccion, 'COMPLETED']);
        if($sql->fetchColumn() > 0){

            $sql = $con->prepare('SELECT id_venta, fecha, correo, total FROM venta WHERE id_transaccion=? AND estado=? 
            LIMIT 1');

            $sql->execute([$id_transaccion, 'COMPLETED']);
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            $idCompra = $row['id_venta'];
            $total = $row['total'];
            $fecha = $row['fecha'];

            $sqlDet = $con->prepare('SELECT nombre, precio, cantidad FROM detalle_venta WHERE id_venta=?');
            $sqlDet->execute([$idCompra]);
        } else {
            $error = 'Error al comprobar la compra.';
        }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detalles</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="styles/detalles.css" />
</head>

<header>
    <div class="navbar">
        <div class="image">

            <img src="imagenes/navbar/byteshop-logo.jpg" style="width: 100px; height: 48px;">

        </div>
        <div class="social-links">
            <button class="button">
                <div class="button-1">
                    <div class="button-2">
                        <div class="button-base">
                            <span class="label">Iniciar</span>
                        </div>
                    </div>
                </div>
            </button><button class="button-3">
                <div class="button-4">
                    <div class="button-base-5">
                        <span class="label-6">Registro</span>
                    </div>
                </div>
            </button>

            <a href="checkout.php" class="btn btn-primary">
                Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
            </a>

            <div class="social-icon"></div>
        </div>
        <div class="left-nav">
            <div class="logo"></div>
            <div class="nav-group">
                <div class="btn nav-item"><span class="label-7">Inicio</span></div>
                <div class="btn menu-item-default" id="tienda-button">
                    <span class="label-8">Tienda</span>
                    <div class="essential-icon">
                        <div class="vector"></div>
                    </div>
                </div>
                <div class="btn menu-item-default-9" id="contactanos-button">
                    <span class="label-a">Contactanos</span>
                    <div class="essential-icon-b">
                        <div class="vector-c"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="dropdown-menu" id="tienda-menu">
        <a href="tienda.php?id=2&token=<?php echo 
                  hash_hmac('sha1', 2, KEY_TOKEN); ?>">Laptop</a>
        <a href="tienda.php?id=4&token=<?php echo 
                  hash_hmac('sha1', 4, KEY_TOKEN); ?>">Smartphone</a>
        <a href="tienda.php?id=5&token=<?php echo 
                  hash_hmac('sha1', 5, KEY_TOKEN); ?>">Almacenamiento</a>
        <a href="tienda.php?id=3&token=<?php echo 
                  hash_hmac('sha1', 3, KEY_TOKEN); ?>">Tarjetas de regalo</a>
        <a id="tienda-menu-button" href="tienda.php?id=10&token=<?php echo 
                  hash_hmac('sha1', 10, KEY_TOKEN); ?>">Accesorios de computadora</a>
    </div>
    <div class="dropdown-menu-menu" id="tienda-menu-menu">
        <a href="tienda.php?id=6&token=<?php echo 
                  hash_hmac('sha1', 6, KEY_TOKEN); ?>">Mochila para Laptop</a>
        <a href="tienda.php?id=7&token=<?php echo 
                  hash_hmac('sha1', 7, KEY_TOKEN); ?>">Audifonos</a>
        <a href="tienda.php?id=1&token=<?php echo 
                  hash_hmac('sha1', 1, KEY_TOKEN); ?>">Ratones</a>
        <a href="tienda.php?id=8&token=<?php echo 
                  hash_hmac('sha1', 8, KEY_TOKEN); ?>">Alfombrillas</a>
        <a href="tienda.php?id=9&token=<?php echo 
                  hash_hmac('sha1', 9, KEY_TOKEN); ?>">Teclados</a>
    </div>
</header>

<body>

    <main>

        <div class="container">

            <?php if(strlen($error) > 0) { ?>
            <div class="row">
                <div class="col">
                    <h3><?php echo $error; ?></h3>
                </div>

                <?php } else { ?>

                <div class="row">
                    <div class="col">
                        <b>Folio de la compra: </b><?php echo $id_transaccion; ?><br>
                        <b>Fecha de compra: </b><?php echo $fecha; ?><br>
                        <b>Total: </b><?php echo MONEDA . number_format($total, 2, '.', ','); ?><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php while ($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)) { 
                                        $importe = $row_det['precio'] * $row_det['cantidad']; ?>
                                <tr>
                                    <td><?php echo $row_det['nombre']; ?></td>
                                    <td><?php echo $row_det['cantidad']; ?></td>
                                    <td><?php echo MONEDA . number_format($importe, 2, '.', ','); ?></td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </main>
</body>

</html>