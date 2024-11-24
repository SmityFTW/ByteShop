<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
    echo 'Error al procesar la peticion';
    exit;
} else {

  $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

  if($token == $token_tmp){

    $sql = $con->prepare('SELECT count(id_articulo) FROM articulo WHERE id_categoria=? AND estado=1');
    $sql->execute([$id]);
    if($sql->fetchColumn() > 0){

      $sql = $con->prepare('SELECT * FROM `articulo` WHERE id_categoria=? AND estado=1');
      $sql->execute([$id]);
      $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);



    }
  }else{
    echo 'Error al procesar la peticion';
    exit;
  }

};

//session_destroy();

//print_r($_SESSION);



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tienda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" />
    <link rel="stylesheet" href="styles/tienda.css" />
    <link rel="stylesheet" href="styles/amazon.css" />
  </head>
  <body>
    <div class="main-container">
      <div class="navbar">
      <div class="image">

      <img src="imagenes/navbar/byteshop-logo.jpg" style="width: 100px; height: 48px;">

      </div>
        <div class="social-links">

          <button class="button" >
            <div class="button-1">
              <div class="button-2">
                <div class="button-base">
                  <span class="label">Iniciar</span>
                </div>
              </div>
            </div>
            
          </button>
          <button class="button-3">
            <div class="button-4">
              <div class="button-base-5">
                <span class="label-6">Registro</span>
              </div>
            </div>
          </button>

          <a href="checkout.php" class="btn btn-primary">
            Carrito <span id="num_cart" class="badge bg-secondary" ><?php echo $num_cart; ?></span>
          </a>


        </div>
        <div class="left-nav">
          <div class="logo"></div>
          <div class="nav-group">
            <div class="nav-item" id="inicio-button"><span class="label-7">Inicio</span></div>
            <div class="menu-item-default" id="tienda-button" >
              <span class="label-8">Tienda</span>
              <div class="essential-icon"><div class="vector"></div></div>
            </div>

            

            <div class="menu-item-default-9" id="contactanos-button">
              <span class="label-a">Contactanos</span>
              <div class="essential-icon-b"><div class="vector-c"></div></div>
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
        
      <main>
        <div class="page-product-results">
          <div class="section-product-grid">
            <div class="filter-bar">
              <div class="search-filter">
                <div class="search">
                  <span class="value"></span>
                  <input class="search-filter-input" id="inputBuscar" />
                </div>
                <button class="btn" id="botonBuscar">Buscar</button>
                
              </div>
              <div class="tag-toggle-group">
                <button class="tag-toggle">
                  <div class="check"><div class="icon-e"></div></div>
                  <span class="title-nuevo">Nuevo</span></button
                ><button class="tag-toggle-f">
                  <span class="title-precio-mas-alto"
                    >Precio mas alto</span
                  ></button
                ><button class="tag-toggle-10">
                  <span class="title-precio-mas-bajo"
                    >Precio mas bajo</span
                  ></button
                ><button class="tag-toggle-11">
                  <span class="title-rating">Rating</span>
                </button>
              </div>
            </div>

              <div class="card-grid">
                <!-- Elementos generados a partir del JSON -->
                <main id="items" class="col-sm-8 row">

                <?php foreach($resultado as $row) { ?>

                  

                
                <a1  class="product-info-card">
                  <?php
                  
                  $imagen = $row['imagen'];
                  $img = "imagenes/item/$imagen";

                  if(!file_exists($img)) {
                    $img = "imagenes/no-photo.jpg";
                  }

                  ?>
                  <a class="btn product-info-card2" href="detalles.php?id=<?php echo $row['id_articulo']; ?>&token=<?php echo 
                    hash_hmac('sha1', $row['id_articulo'], KEY_TOKEN); ?>">

                  
                  

                  <img class="image-12" src="<?php echo $img; ?>">
                  <div class="body">
                    <div class="text a-size-mini">
                      <span class="btn text-google-play-giftcard"><?php echo $row['nombre']; ?></span>
                    </div>
                    <div class="text-strong">
                      <span class="text-strong-15"><?php echo number_format($row['precio_venta'], 2, '.', ',') . MONEDA; ?></span>
                    
                    
                    </div>
                  </div>
                  </a>

                  

                  <div class="botones-articulo">

                    <button class="btn btn-primary agregar-item" onclick="addProducto(
                      <?php echo $row['id_articulo']; ?>, 
                      '<?php echo hash_hmac('sha1', $row['id_articulo'], KEY_TOKEN); ?>')">Añadir al carrito</button>

                    <button class="btn btn-secundary" marcador="1">Comprar</button>

                  </div>
                  
                  
                </a1>
                

                <?php } ?>


                </main>
            
              </div>
            
            </div>
          </div>


          <div class="footer">
            <div class="title">
              <div class="button-list">
                <div class="x-logo"><div class="icon-47"></div></div>
                <div class="logo-instagram"><div class="icon-48"></div></div>
                <div class="logo-youtube"><div class="icon-49"></div></div>
                <div class="linkedin"><div class="icon-4a"></div></div>
              </div>
            </div>
            <div class="text-link-list">
              <div class="title-4b">
                <div class="text-strong-4c">
                  <span class="text-strong-4d">Sobre nosotros</span>
                </div>
              </div>
              <div class="text-link-list-item">
                <span class="list-item">Informaciones</span>
              </div>
              <div class="text-link-list-item-4e">
                <span class="list-item-4f">Contactanos</span>
              </div>
              <div class="text-link-list-item-50">
                <span class="list-item-51">Comunidad</span>
              </div>
              <div class="text-link-list-item-52">
                <span class="list-item-53">Garantia </span>
              </div>
              <div class="text-link-list-item-54">
                <span class="list-item-55">Envios y devoluciones</span>
              </div>
              <div class="text-link-list-item-56">
                <span class="list-item-57">Terminos y condiciones</span>
              </div>
              <div class="text-link-list-item-58">
                <span class="list-item-59">Team collaboration</span>
              </div>
            </div>
            <div class="text-link-list-5a">
              <div class="title-5b">
                <div class="text-strong-5c">
                  <span class="text-strong-5d">Tienda</span>
                </div>
              </div>
              <div class="text-link-list-item-5e">
                <span class="list-item-5f">PC Oficinas</span>
              </div>
              <div class="text-link-list-item-60">
                <span class="list-item-61">Pc Gaming</span>
              </div>
              <div class="text-link-list-item-62">
                <span class="list-item-63">Laptop</span>
              </div>
              <div class="text-link-list-item-64">
                <span class="list-item-65">Consolas</span>
              </div>
              <div class="text-link-list-item-66">
                <span class="list-item-67">Redes</span>
              </div>
              <div class="text-link-list-item-68">
                <span class="list-item-69">Accesorios</span>
              </div>
              <div class="text-link-list-item-6a">
                <span class="list-item-6b">Mobiliario</span>
              </div>
            </div>
            <div class="text-link-list-6c">
              <div class="title-6d">
                <div class="text-strong-6e">
                  <span class="text-strong-6f">Comunidad</span>
                </div>
              </div>
              <div class="text-link-list-item-70">
                <span class="list-item-71">Blog</span>
              </div>
              <div class="text-link-list-item-72">
                <span class="list-item-73">Ultimas noticias</span>
              </div>
              <div class="text-link-list-item-74">
                <span class="list-item-75">Preguntas frecuentes</span>
              </div>
              <div class="text-link-list-item-76">
                <span class="list-item-77">Soporte</span>
              </div>
              <div class="text-link-list-item-78">
                <span class="list-item-79">Privacidad de cookies</span>
              </div>
              <div class="text-link-list-item-7a">
                <span class="list-item-7b">Recursos</span>
              </div>
            </div>
          </div>
      </main>
    </div>
      

      
  
    <script src="scripts/navbar.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/ajax_cart.js"></script>
    
  </body>


  <!-- 
    Smith Martinez - SmityFTW 

    Diseño Web e implementacion de apis
  -->

  
  
</html>
