<?php
//start session in all pages
if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
//if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

$PayPalMode 			= 'live'; // sandbox or live
$PayPalApiUsername 		= 'jtardif70_api1.comcast.net'; //PayPal API Username
$PayPalApiPassword 		= '2JEFY4JNGC7YBC67'; //Paypal API password
$PayPalApiSignature 	= 'A94W.69I44ohItj6ZOjx5WqAzBUuAgboTPu5Zn9BYr3-FT63nEwIhlCz'; //Paypal API Signature

/*
$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'info-facilitator_api1.micropixel.co.in'; //PayPal API Username
$PayPalApiPassword 		= '1405066168'; //Paypal API password
$PayPalApiSignature 	= 'AFcWxV21C7fd0v3bYYYRCpSSRl31AeE.esk1kgt910PgLnXr2oRkvF68'; //Paypal API Signature
*/

$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= 'https://www.gatekeeperpro.com/process.php'; //Point to process.php page
$PayPalCancelURL 		= 'https://www.gatekeeperpro.com/cancel.php'; //Cancel URL if user clicks cancel
?>