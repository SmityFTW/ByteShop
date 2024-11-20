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
}



//session_destroy();

//print_r($_SESSION);



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




            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
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
                            <td><?php echo MONEDA . number_format($precio_desc,2, '.', ','); ?></td>
                            <td>
                                <input type="number" min="1" max="10" step="1" value="<?php echo 
                                $cantidad; ?>" size="5" id="cantidad_<?php echo $_id; ?>" 
                                onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo 
                                MONEDA . number_format($subtotal,2, '.', ','); ?></div>
                            </td>
                            <td><a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo 
                            $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a></td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                <p class="h3" id="total">
                                    <?php echo MONEDA . number_format($total, 2, '.', ','); ?>
                                </p>
                            </td>
                        </tr>

                    </tbody>
                <?php } ?>                
                </table>
                
            </div>

            <?php if($lista_carrito != null){ ?>
            <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap-2">
                    <a href="pago.php" class="btn btn-primary btn-lg">Ir a pagar</a>
                </div>
            </div>
            <?php } ?>



        </div>

    </main>

    <!-- Modal -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ¿Está seguro que desea eliminar este articulo del carrito?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Sí, eliminar</button>
                </div>
            </div>
        </div>
    </div> 
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
  
    <!-- <script src="scripts/navbar.js"></script>
    <script src="scripts/script.js"></script> -->


    <script>

        let eliminaModal = document.getElementById('eliminaModal')
        eliminaModal.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget
            let id= button.getAttribute('data-bs-id')
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
            buttonElimina.value = id
        })

        function actualizaCantidad(cantidad, id){
            let url = 'clases/actualizar_carrito.php'
            let formData = new FormData()
            formData.append('action', 'agregar')
            formData.append('id', id)
            formData.append('cantidad', cantidad)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){

                        let divsubtotal = document.getElementById('subtotal_' + id)
                        divsubtotal.innerHTML = data.sub

                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]')

                        for(let i = 0; i < list.length; i++){
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                        }

                        total = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2
                        }).format(total)
                        document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
                    }
                })
        }


        function eliminar(){

            let botonElimina = document.getElementById('btn-elimina')
            let id = botonElimina.value

            let url = 'clases/actualizar_carrito.php'
            let formData = new FormData()
            formData.append('action', 'eliminar')
            formData.append('id', id)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){
                        location.reload()
                        
                    }
                })
        }
    </script>
    
  </body>


  <!-- 
    Smith Martinez - SmityFTW 

    Diseño Web e implementacion de apis
  -->

  
  
</html>