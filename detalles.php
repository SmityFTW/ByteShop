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

    $sql = $con->prepare('SELECT count(id_articulo) FROM articulo WHERE id_articulo=? AND estado=1');
    $sql->execute([$id]);
    if($sql->fetchColumn() > 0){

        $sql = $con->prepare('SELECT a.imagen, a.nombre, a.descripcion, c.nombre AS c_nombre, c.descripcion AS c_descripcion, a.precio_venta, a.descuento FROM articulo a 
        JOIN categoria c ON a.id_categoria = c.id_categoria WHERE a.id_articulo=? AND a.estado=1 
        LIMIT 1');

        $sql->execute([$id]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $nombre = $row['nombre'];
        $c_nombre = $row['c_nombre'];
        $descripcion = $row['descripcion'];
        $c_descripcion = $row['c_descripcion'];
        $precio_venta = $row['precio_venta'];
        $descuento = $row['descuento'];
        $precio_desc = $precio_venta - (($precio_venta * $descuento) / 100);
        $dir_images = 'images/productos/' . $row['imagen'];


        $imagen = $row['imagen'];




    }
  }else{
    echo 'Error al procesar la peticion';
    exit;
  }

};



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detalles</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/detalles.css" />
  </head>
  <body>

  <main>
    <div class="main-container">
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
            </div></button
          ><button class="button-3">
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
              <div class="essential-icon"><div class="vector"></div></div>
            </div>
            <div class="btn menu-item-default-9" id="contactanos-button">
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


      <div class="flex-row-b">
        <div class="page-product">
          <div class="section">
            <div class="icon-button">
              <div class="heart"><div class="icon"></div></div>
            </div>
            <img class="image-d" src="imagenes/item/<?php echo $imagen; ?>"></img>
            <div class="column">
              <div class="body">
                <div class="title">
                  <div class="text-heading">
                    <span class="text-heading-e"><?php echo $nombre; ?></span>
                  </div>
                  <div class="price">
                    <button class="tag"><span class="tag-f">Tag</span></button>
                    <div class="text-price">
                      <div class="price-10">
                        <span class="dollar"><?php echo MONEDA ?></span
                        ><span class="number"><?php echo number_format($precio_venta, 2, '.', ',');?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text">
                  <span class="text-11">Canjea en tu tienda</span>
                </div>
              </div>
              <div class="fields">
                <div class="select-field">
                  <span class="valor">Valor</span>
                  <div class="select">
                    <span class="value"><?php echo MONEDA . number_format($precio_venta, 2, '.', ',');?></span>
                    <div class="chevron-down"><div class="icon-12"></div></div>
                  </div>
                </div>
                <div class="select-field-13">
                  <span class="label-14">Cantidad</span>
                  <div class="select-15">
                    <span class="value-16">1</span>
                    <div class="chevron-down-17">
                      <div class="icon-18"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="fields-19">
                <button class="select-field-1a" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">
                  <div class="button-1b">
                    <div class="add-to-cart">
                      <span class="add-to-cart-1c">Añadir al carrito</span>
                    </div>
                  </div></button
                ><button class="select-field-1e">
                  <div class="button-1f">
                    <span class="buy">Comprar
                    </span>
                  </div>
                </button>
              </div>
              <div class="accordion">
                <div class="accordion-item">
                  <div class="accordion-title">
                    <span class="title-20"><?php echo $c_nombre; ?></span>
                    <div class="chevron-up"><div class="icon-21"></div></div>
                  </div>

                  <div class="accordion-content">
                    <span class="body-22"><?php echo $c_descripcion; ?></span>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="accordio-2">
          <div class="accordion-item">
            <div class="accordion-title">
              <span class="title-20">Acerca del producto</span>
              <div class="chevron-up"><div class="icon-21"></div></div>
            </div>

            <div class="accordion-content">
              <span class="body-22"><?php echo $descripcion; ?></span>
            </div>

          </div>
        </div>



        <div class="card-grid-reviews">
          <div class="text-heading-23">
            <span class="text-heading-24">Últimos comentarios</span>
          </div>
          <div class="card-grid">
            <div class="review-card">
              <div class="rating">
                <div class="star"><div class="icon-25"></div></div>
                <div class="star-26"><div class="icon-27"></div></div>
                <div class="star-28"><div class="icon-29"></div></div>
                <div class="star-2a"><div class="icon-2b"></div></div>
                <div class="star-2c"><div class="icon-2d"></div></div>
              </div>
              <div class="review-body">
                <div class="text-heading-2e">
                  <span class="text-heading-2f">Raquel Rodriguez</span>
                </div>
                <div class="text-30">
                  <span class="text-31">Macbook Pro</span>
                </div>
              </div>
              <div class="avatar-block">
                <div class="avatar"><div class="shape"></div></div>
                <div class="info">
                  <span class="title-32">Excelente producto de calidad.</span>
                </div>
              </div>
            </div>
            <div class="review-card-33">
              <div class="rating-34">
                <div class="star-35"><div class="icon-36"></div></div>
                <div class="star-37"><div class="icon-38"></div></div>
                <div class="star-39"><div class="icon-3a"></div></div>
                <div class="star-3b"><div class="icon-3c"></div></div>
                <div class="star-3d"><div class="icon-3e"></div></div>
              </div>
              <div class="review-body-3f">
                <div class="text-heading-40">
                  <span class="text-heading-sebasttian-stan"
                    >Sebasttian Stan</span
                  >
                </div>
                <div class="text-41">
                  <span class="text-hp-victus">HP Victus</span>
                </div>
              </div>
              <div class="avatar-block-42">
                <div class="avatar-43"><div class="shape-44"></div></div>
                <div class="info-45">
                  <span class="title-entrega-rapida">Entrega rápida.</span>
                </div>
              </div>
            </div>
            <div class="review-card-46">
              <div class="rating-47">
                <div class="star-48"><div class="icon-49"></div></div>
                <div class="star-4a"><div class="icon-4b"></div></div>
                <div class="star-4c"><div class="icon-4d"></div></div>
                <div class="star-4e"><div class="icon-4f"></div></div>
                <div class="star-50"><div class="icon-51"></div></div>
              </div>
              <div class="review-body-52">
                <div class="text-heading-53">
                  <span class="text-heading-lorenzo-lama">Lorenzo Lama</span>
                </div>
                <div class="text-54">
                  <span class="text-lenovo-legion">Lenovo Legion</span>
                </div>
              </div>
              <div class="avatar-block-55">
                <div class="avatar-56"><div class="shape-57"></div></div>
                <div class="info-58">
                  <span class="title-buen-equipo">Buen equipo</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="page-newsletter">
        <div class="text-content-heading">
          <span class="heading-recibe-nuestras-ultimas-ofertas"
            >Recibe nuestras ultimas ofertas</span
          ><span class="subheading-nuestras-ofertas-semanales"
            >Nuestras ofertas semanales</span
          >
        </div>
        <div class="newsletter">
          <div class="input">
            <input class="input-59" /><span class="hello-world-you-example-com"
              >you@example.com</span
            >
          </div>
          <button class="button-5a">
            <span class="button-submit">Submit</span>
          </button>
        </div>
      </div>
      <div class="flex-row-a">
        <div class="footer">
          <div class="title-5b">
            <div class="button-list">
              <div class="x-logo"><div class="icon-5c"></div></div>
              <div class="logo-instagram"><div class="icon-5d"></div></div>
              <div class="logo-youtube"><div class="icon-5e"></div></div>
              <div class="linkedin"><div class="icon-5f"></div></div>
            </div>
          </div>
          <div class="text-link-list">
            <div class="title-60">
              <div class="text-strong">
                <span class="text-strong-61">Sobre nosotros</span>
              </div>
            </div>
            <div class="text-link-list-item">
              <span class="list-item">Informaciones</span>
            </div>
            <div class="text-link-list-item-62">
              <span class="list-item-63">Contactanos</span>
            </div>
            <div class="text-link-list-item-64">
              <span class="list-item-65">Comunidad</span>
            </div>
            <div class="text-link-list-item-66">
              <span class="list-item-67">Garantia </span>
            </div>
            <div class="text-link-list-item-68">
              <span class="list-item-69">Envios y devoluciones</span>
            </div>
            <div class="text-link-list-item-6a">
              <span class="list-item-6b">Terminos y condiciones</span>
            </div>
            <div class="text-link-list-item-6c">
              <span class="list-item-6d">Team collaboration</span>
            </div>
          </div>
          <div class="text-link-list-6e">
            <div class="title-6f">
              <div class="text-strong-70">
                <span class="text-strong-71">Tienda</span>
              </div>
            </div>
            <div class="text-link-list-item-72">
              <span class="list-item-73">PC Oficinas</span>
            </div>
            <div class="text-link-list-item-74">
              <span class="list-item-75">Pc Gaming</span>
            </div>
            <div class="text-link-list-item-76">
              <span class="list-item-77">Laptop</span>
            </div>
            <div class="text-link-list-item-78">
              <span class="list-item-79">Consolas</span>
            </div>
            <div class="text-link-list-item-7a">
              <span class="list-item-7b">Redes</span>
            </div>
            <div class="text-link-list-item-7c">
              <span class="list-item-7d">Accesorios</span>
            </div>
            <div class="text-link-list-item-7e">
              <span class="list-item-7f">Mobiliario</span>
            </div>
          </div>
          <div class="text-link-list-80">
            <div class="title-81">
              <div class="text-strong-82">
                <span class="text-strong-83">Comunidad</span>
              </div>
            </div>
            <div class="text-link-list-item-84">
              <span class="list-item-85">Blog</span>
            </div>
            <div class="text-link-list-item-86">
              <span class="list-item-87">Ultimas noticias</span>
            </div>
            <div class="text-link-list-item-88">
              <span class="list-item-89">Preguntas frecuentes</span>
            </div>
            <div class="text-link-list-item-8a">
              <span class="list-item-8b">Soporte</span>
            </div>
            <div class="text-link-list-item-8c">
              <span class="list-item-8d">Privacidad de cookies</span>
            </div>
            <div class="text-link-list-item-8e">
              <span class="list-item-8f">Recursos</span>
            </div>
          </div>
        </div>
        <div class="footer-90">
          <div class="title-91">
            <div class="button-list-92">
              <div class="x-logo-93"><div class="icon-94"></div></div>
              <div class="logo-instagram-95"><div class="icon-96"></div></div>
              <div class="logo-youtube-97"><div class="icon-98"></div></div>
              <div class="linkedin-99"><div class="icon-9a"></div></div>
            </div>
          </div>
          <div class="text-link-list-9b">
            <div class="title-9c">
              <div class="text-strong-9d">
                <span class="sobre-nosotros">Sobre nosotros</span>
              </div>
            </div>
            <div class="text-link-list-item-9e">
              <span class="informaciones">Informaciones</span>
            </div>
            <div class="text-link-list-item-9f">
              <span class="contactanos">Contactanos</span>
            </div>
            <div class="text-link-list-item-a0">
              <span class="comunidad">Comunidad</span>
            </div>
            <div class="text-link-list-item-a1">
              <span class="garantia">Garantia </span>
            </div>
            <div class="text-link-list-item-a2">
              <span class="envios-y-devoluciones">Envios y devoluciones</span>
            </div>
            <div class="text-link-list-item-a3">
              <span class="terminos-y-condiciones">Terminos y condiciones</span>
            </div>
            <div class="text-link-list-item-a4">
              <span class="team-collaboration">Team collaboration</span>
            </div>
          </div>
          <div class="text-link-list-a5">
            <div class="title-a6">
              <div class="text-strong-a7">
                <span class="tienda">Tienda</span>
              </div>
            </div>
            <div class="text-link-list-item-a8">
              <span class="pc-oficinas">PC Oficinas</span>
            </div>
            <div class="text-link-list-item-a9">
              <span class="pc-gaming">Pc Gaming</span>
            </div>
            <div class="text-link-list-item-aa">
              <span class="laptop">Laptop</span>
            </div>
            <div class="text-link-list-item-ab">
              <span class="consolas">Consolas</span>
            </div>
            <div class="text-link-list-item-ac">
              <span class="redes">Redes</span>
            </div>
            <div class="text-link-list-item-ad">
              <span class="accesorios">Accesorios</span>
            </div>
            <div class="text-link-list-item-ae">
              <span class="mobiliario">Mobiliario</span>
            </div>
          </div>
          <div class="text-link-list-af">
            <div class="title-b0">
              <div class="text-strong-b1">
                <span class="comunidad-b2">Comunidad</span>
              </div>
            </div>
            <div class="text-link-list-item-b3">
              <span class="blog">Blog</span>
            </div>
            <div class="text-link-list-item-b4">
              <span class="ultimas-noticias">Ultimas noticias</span>
            </div>
            <div class="text-link-list-item-b5">
              <span class="preguntas-frecuentes">Preguntas frecuentes</span>
            </div>
            <div class="text-link-list-item-b6">
              <span class="soporte">Soporte</span>
            </div>
            <div class="text-link-list-item-b7">
              <span class="privacidad-de-cookies">Privacidad de cookies</span>
            </div>
            <div class="text-link-list-item-b8">
              <span class="recursos">Recursos</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <script src="scripts/navbar.js"></script>
  <script src="scripts/script.js"></script>

  </body>

  <!-- 
    Smith Martinez - SmityFTW 

    Diseño Web e implementacion de apis
  -->

  <script src="scripts/ajax_cart.js"></script>
</html>
