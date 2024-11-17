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
            <div class="image"></div>
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
            <a href="#">Smartphone</a>
            <a href="#">Almacenamiento</a>
            <a href="tienda.php?id=3&token=<?php echo 
                      hash_hmac('sha1', 3, KEY_TOKEN); ?>">Tarjetas de regalo</a>
            <a href="#" id="tienda-menu-button">Accesorios de computadora</a>
          </div>
          <div class="dropdown-menu-menu" id="tienda-menu-menu">
            <a href="#">Mochila para Laptop</a>
            <a href="#">Audifonos</a>
            <a href="#">Ratones</a>
            <a href="#">Alfombrillas</a>
            <a href="#">Teclados</a>
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
                <button class="button">
                  <div class="twitter-icon">
                    <div class="frame-4"><div class="vector"></div></div>
                  </div>
                  <div class="linkedin-icon">
                    <div class="frame-5"><div class="vector-6"></div></div>
                  </div>
                  <div class="facebook-icon">
                    <div class="frame-7"><div class="vector-8"></div></div>
                  </div>
                </button>
              </div>
            </div>
            <div class="card-9">
              <div class="frame-a">
                <div class="ellipse-b"></div>
                <div class="frame-c">
                  <span class="yuliya-mikhailova">Abdiel Smith Marínez</span
                  ><span class="director">Developer</span>
                </div>
                <button class="frame-d">
                  <div class="twitter-brands">
                    <div class="frame-e"><div class="vector-f"></div></div>
                  </div>
                  <div class="linkedin-in-brands">
                    <div class="frame-10"><div class="vector-11"></div></div>
                  </div>
                  <div class="facebook-brands">
                    <div class="frame-12"><div class="vector-13"></div></div>
                  </div>
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
                <button class="button-19">
                  <div class="icon-social-twitter">
                    <div class="frame-1a"><div class="vector-1b"></div></div>
                  </div>
                  <div class="icon-social-linkedin">
                    <div class="frame-1c"><div class="vector-1d"></div></div>
                  </div>
                  <div class="icon-social-facebook">
                    <div class="frame-1e"><div class="vector-1f"></div></div>
                  </div>
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
                <button class="button-24">
                  <div class="icon-social-twitter-25">
                    <div class="frame-26"><div class="vector-27"></div></div>
                  </div>
                  <div class="social-linkedin-brands">
                    <div class="frame-28"><div class="vector-29"></div></div>
                  </div>
                  <div class="social-facebook-brands">
                    <div class="frame-2a"><div class="vector-2b"></div></div>
                  </div>
                </button>
              </div>
            </div>
            
            <div class="component-card-3b">
              <div class="frame-3c">
                <div class="ellipse-3d"></div>
                <div class="frame-3e">
                  <span class="yuliya-mikhailova-3f">Mara Belén Tellez</span
                  ><span class="programmist-kopirayter">Designer</span>
                </div>
                <button class="frame-40">
                  <div class="icon-social-twitter-41">
                    <div class="frame-42"><div class="vector-43"></div></div>
                  </div>
                  <div class="icon-social-linkedin-44">
                    <div class="frame-45"><div class="vector-46"></div></div>
                  </div>
                  <div class="icon-social-facebook-47">
                    <div class="frame-48"><div class="vector-49"></div></div>
                  </div>
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
