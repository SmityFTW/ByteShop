<?php

define("CLIENT_ID", "AT84Zh__Z_sIeZ4IAbmOq_GecFXflwqGjXgCHwPrNhKDfK6-6scSj5mI7JDVn5QsBEwShvwcpLm9VQPN");
define("CURRENCY", "USD");
define("KEY_TOKEN", "APR.wqc-354*");
define("MONEDA", "$");

session_start();



$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}


?>