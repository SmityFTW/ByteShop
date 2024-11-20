<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

//print_r($_SESSION);

$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {

        $sql = $con->prepare("SELECT id_articulo, nombre, precio_venta, descuento, $cantidad AS cantidad FROM articulo WHERE
        id_articulo=? AND estado=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);

    }
} else {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" />
    <link rel="stylesheet" href="styles/tienda.css" />
  </head>
  <body>

    <header>
        ...
    </header>


    <main>

        <div class="container">

            <div class="row">


                <div class="col-6">
                    <h4>Detalles de pago</h4>
                    <div id="paypal-button-container"></div>
                </div>

                <div class="col-6">
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($lista_carrito == null){
                                    echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                                } else {

                                    $total = 0;
                                    foreach($lista_carrito as $productos){
                                        $_id = $productos['id_articulo'];
                                        $nombre = $productos['nombre'];
                                        $precio = $productos['precio_venta'];
                                        $descuento = $productos['descuento'];
                                        $cantidad = $productos['cantidad'];
                                    
                                        $precio_desc = $precio - (($precio * $descuento) / 100);
                                        $subtotal = $cantidad * $precio_desc;
                                        $total += $subtotal;
                                    ?>

                                <tr>
                                    <td><?php echo $nombre; ?></td>
                                    
                                    <td>
                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo 
                                        MONEDA . number_format($subtotal,2, '.', ','); ?></div>
                                    </td>
                    
                                </tr>
                                <?php } ?>

                                <tr>
                                    <td colspan="2">
                                        <p class="h3 text-end" id="total">
                                            <?php echo MONEDA . number_format($total, 2, '.', ','); ?>
                                        </p>
                                    </td>
                                </tr>

                            </tbody>
                        <?php } ?>                
                        </table>
                        
                    </div>

                </div>
            </div>


        </div>

    </main>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>

    <script
        src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"
    ></script>


    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total; ?>
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
                let URL = 'clases/captura.php'
                actions.order.capture().then(function(detalles){
                    console.log(detalles);

                    let url= 'clases/captura.php'

                    return fetch(url, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    })
                });
            },

            onCancel: function(data){
                alert("Pago canselado!");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>


    <!-- 
    Smith Martinez - SmityFTW 

    Diseño Web e implementacion de apis
    -->



    
  </body>


 
  
  
</html>