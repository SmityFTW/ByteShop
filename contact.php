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
    <title>Contactanos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" />
    <link rel="stylesheet" href="styles/tienda.css">
    <link rel="stylesheet" href="styles/contact.css" />
    
  </head>
  <body>
    <div class="main-container">
        
        <div class="navbar" style="align-items: center;">
            <div class="image">

              <img src="imagenes/navbar/byteshop-logo.jpg" style="width: 100px; height: 48px;">
              
            </div>
            <div class="social-links" >
    
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
            </div>
            <div class="left-nav">
              <div class="logo"></div>
              <div class="nav-group" style="justify-content: flex-start; gap: 20; width: 420px;">
                <div class="nav-item" id="inicio-button"><span class="label-7">Inicio</span></div>
                <div class="btn menu-item-default" id="tienda-button">
                  <span class="label-8">Tienda</span>
                  <div class="essential-icon"><div class="vector"></div></div>
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


      <div class="design">
        <div class="frame">
          <div class="frame-1">
            <div class="card">
              <div class="frame-2">
                <div class="ellipse"></div>
                <div class="frame-3">
                  <span class="name">Jonathan Santiago Suazo</span
                  ><span class="role">Developer</span>
                </div>
                <button class="frame-d" style="width: 200px">jonansuazo@gmail.com
                </button>
              </div>
            </div>
            <div class="card-9" >
              <div class="frame-a">
                <div class="ellipse-b"></div>
                <div class="frame-c">
                  <span class="yuliya-mikhailova">Abdiel Smith Marínez</span
                  ><span class="director">Developer</span>
                </div>
                <button class="frame-d" style="width: 200px">ladenc168@gmail.com
                </button>
              </div>
            </div>
            <div class="card-14">
              <div class="frame-15">
                <div class="ellipse-16"></div>
                <div class="frame-17">
                  <span class="yuliya-mikhailova-18">Luis Miguel Meza</span
                  ><span class="text-6">Designer</span>
                </div>
                <button class="frame-d" style="width: 200px">miguelmeza331@gmail.com
                </button>
              </div>
            </div>
          </div>
          <div class="frame-20">
            <div class="component-card">
              <div class="frame-21">
                <div class="ellipse-22"></div>
                <div class="frame-23">
                  <span class="yulia-mikhailova">Desbye Ahinoa Tercero</span
                  ><span class="programmist">Designer</span>
                </div>
                <button class="frame-d" style="width: 200px">ahinoadesbye@gmail.com
                </button>
              </div>
            </div>

            <div class="component-card">
              <div class="frame-21">
                <div class="ellipse-22"></div>
                <div class="frame-23">
                  <span class="yulia-mikhailova">Gema Bravo Lanzas</span
                  ><span class="programmist">Designer</span>
                </div>
                <button class="frame-d" style="width: 200px">bravolangema@gmail.com
                </button>
              </div>
            </div>
            
            <div class="component-card-3b"
            >
              <div class="frame-3c">
                <div class="ellipse-3d"></div>
                <div class="frame-3e">
                  <span class="yuliya-mikhailova-3f">Mara Belén Tellez</span
                  ><span class="programmist-kopirayter">Designer</span>
                </div>
                <button class="frame-d" style="width: 200px">maratellez5542@gmail.com
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="scripts/navbar.js"></script>
    <script src="scripts/script.js"></script>
  </body>
</html>
