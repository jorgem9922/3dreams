<?php
//ProPayPal es vital para declarar si es demo o prueba las transacciones

//define('ProPayPal', 0); // El cero simboliza entorno de Prueba
//define('ProPayPal', 1); // El 1 simboliza entorno de producción

define('ProPayPal', 0);
if(ProPayPal){
define("PayPalClientId", "*********************");
define("PayPalSecret", "*********************");
define("PayPalBaseUrl", "https://demo.baulphp.com/paypal-php-integracion-con-ejemplo-completo/");
define("PayPalENV", "production");
} else {
define("PayPalClientId", "Ac-wWzb8ykKExhd9I1UPKLmdowXpgLWS5dbPf0uf5s6BF2VjOv27rdtYt8PiAme3W_BnHxPRU3DNfVEM");
define("PayPalSecret", "EKH6n0JJoTuHOjdIfiUjvJWE3fflKqt0wXKeDg4PbhWiuJgIP-lqQ6tRwfIchLz2NpimZnqlofYlCs5I");
define("PayPalBaseUrl", "../paypal/");
define("PayPalENV", "sandbox");
}
?>