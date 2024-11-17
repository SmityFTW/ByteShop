<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ByteShop</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" />

    <link rel="stylesheet" href="styles/index.css" />

  </head>
  <body>
    <div class="main-container">
      <div class="desktop">
        <div class="navbar">
          <div class="image"></div>
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
          </div>
          <div class="left-nav">
            <div class="logo"></div>
            <div class="nav-group">
              <div class="btn menu-item-default" id="tienda-button">
                <span class="label-7">Tienda</span>
                <div class="essential-icon"><div class="vector"></div></div>
              </div>
              <div class="btn menu-item-default-8" id="contactanos-button">
                <span class="contact-us">Contactanos</span>
                <div class="essential-icon-9"><div class="vector-a"></div></div>
              </div>
            </div>
          </div>
        </div>

        <div class="dropdown-menu" id="tienda-menu">
          <a href="tienda.php?id=2&token=<?php echo 
                    hash_hmac('sha1', 2, KEY_TOKEN); ?>">Laptop</a>
          <a href="#">Smartphone</a>
          <a href="#">Almacenamiento</a>
          <a href="tienda.php?id=3&token=<?php echo 
                    hash_hmac('sha1', 3, KEY_TOKEN); ?>">Tarjetas de regalo</a>
          <a href="#" id="tienda-menu-button">Accesorios de computadora</a>
        </div>
        <div class="dropdown-menu-menu" id="tienda-menu-menu">
          <a href="#">Mochila para Laptop</a>
          <a href="#">Audifonos</a>
          <a href="tienda.php?id=1&token=<?php echo 
                    hash_hmac('sha1', 1, KEY_TOKEN); ?>">Ratones</a>
          <a href="#">Alfombrillas</a>
          <a href="#">Teclados</a>
        </div>

        <div class="flex-row">
          <button class="frame">
            <span class="buy-now">Compra Ahora!</span>
          </button>
          <div class="rectangle"></div>
        </div>
        <div class="frame-b">
          <div class="ellipse"></div>
          <div class="ellipse-c"></div>
          <div class="ellipse-d"></div>
          <div class="ellipse-e"></div>
          <div class="ellipse-f"></div>
          <div class="ellipse-10"></div>
        </div>
        <div class="flex-row-ca">
          <div class="instagram-post-purple-blue"></div>
          <div class="instagram-post-purple-blue-11"></div>
          <button class="button-danger">
            <span class="button-see-more">Ver más</span></button
          ><button class="button-danger-12">
            <span class="button-see-more-13">Ver más</span>
          </button>
        </div>
        <div class="footer">
          <div class="title">
            <div class="button-list">
              <div class="x-logo"><div class="icon"></div></div>
              <div class="logo-instagram"><div class="icon-14"></div></div>
              <div class="logo-youtube"><div class="icon-15"></div></div>
              <div class="linked-in"><div class="icon-16"></div></div>
            </div>
          </div>
          <div class="text-link-list">
            <div class="title-17">
              <div class="text-strong">
                <span class="text-strong-18">Sobre nosotros</span>
              </div>
            </div>
            <div class="text-link-list-item">
              <span class="list-item">Informaciones</span>
            </div>
            <div class="text-link-list-item-19">
              <span class="list-item-1a">Contactanos</span>
            </div>
            <div class="text-link-list-item-1b">
              <span class="list-item-1c">Comunidad</span>
            </div>
            <div class="text-link-list-item-1d">
              <span class="list-item-1e">Garantia </span>
            </div>
            <div class="text-link-list-item-1f">
              <span class="list-item-20">Envios y devoluciones</span>
            </div>
            <div class="text-link-list-item-21">
              <span class="list-item-22">Terminos y condiciones</span>
            </div>
            <div class="text-link-list-item-23">
              <span class="list-item-24">Team collaboration</span>
            </div>
          </div>
          <div class="text-link-list-25">
            <div class="title-26">
              <div class="text-strong-27">
                <span class="text-strong-28">Tienda</span>
              </div>
            </div>
            <div class="text-link-list-item-29">
              <span class="list-item-2a">PC Oficinas</span>
            </div>
            <div class="text-link-list-item-2b">
              <span class="list-item-2c">Pc Gaming</span>
            </div>
            <div class="text-link-list-item-2d">
              <span class="list-item-2e">Laptop</span>
            </div>
            <div class="text-link-list-item-2f">
              <span class="list-item-30">Consolas</span>
            </div>
            <div class="text-link-list-item-31">
              <span class="list-item-32">Redes</span>
            </div>
            <div class="text-link-list-item-33">
              <span class="list-item-34">Accesorios</span>
            </div>
            <div class="text-link-list-item-35">
              <span class="list-item-36">Mobiliario</span>
            </div>
          </div>
          <div class="text-link-list-37">
            <div class="title-38">
              <div class="text-strong-39">
                <span class="text-strong-3a">Comunidad</span>
              </div>
            </div>
            <div class="text-link-list-item-3b">
              <span class="list-item-3c">Blog</span>
            </div>
            <div class="text-link-list-item-3d">
              <span class="list-item-3e">Ultimas noticias</span>
            </div>
            <div class="text-link-list-item-3f">
              <span class="list-item-40">Preguntas frecuentes</span>
            </div>
            <div class="text-link-list-item-41">
              <span class="list-item-42">Soporte</span>
            </div>
            <div class="text-link-list-item-43">
              <span class="list-item-44">Privacidad de cookies</span>
            </div>
            <div class="text-link-list-item-45">
              <span class="list-item-46">Recursos</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="scripts/ajax_cart.js"></script>
    <script src="scripts/navbar.js"></script>
    <script src="scripts/script.js"></script>

  </body>
</html>
