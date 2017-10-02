<?php
ob_start();
include_once("config.php");
include_once("paypal.class.php");
include_once('admin/connect.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<title>Authentry Gatekeeper Pro</title>
<meta name="description" content="Authentry is the leading provider of tokenless and token-based Multi-factor Authentication, Identity Access Management and Two-factor Secure Desktop login in one seamless solution.">
<meta name="keywords" content="Authentry, Gatekeeper Pro, LogiKey, Secure Password Generator, Password Manager, Password Management, Password Recovery, Identity Theft Protection, Password Vault, Password Safe, Two Factor Authentication, 2 Factor Authentication, Duo Security, Last Pass, Yubico, YubiKey">

<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--[if lte IE 8]>
    <link href="css/ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
</head>

<body>
    <div id="wrapper">
    <!--Header-->
        <div id="header">
            <div class="container">
                <h1 class="logo"><a href="index.html" title="Gate Keeper"><img src="images/logo.png" width="316" height="289" alt="Gate Keeper" /></a></h1>
                <div class="nav">
                    <ul class="navbar">
                        <li class="first"><a href="product.html" title="Products" class="active">Products</a></li>
                        <li><a href="how_it_works.html" title="How it Works" >How it Works</a></li>
                        <li><a href="password101.html" title="Password 101">Password 101</a></li>
                        <li><a href="how_we_differ.html" title="We’re Different">We’re Different</a></li>
                        <li class="last"><a href="more_security.html" title="More Security">More Security</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <!--Header End-->
    <!--Main Bannr-->
        <div id="banner">
            <ul class="slider cf">
                <li><img src="images/banner_cloud.jpg" width="1400" height="361" alt="Banner" />
                    <div class="container"><div class="bx-caption">
                        <h2>Thank You</h2>
                        
                    </div></div>
                </li>
            </ul>
        </div>
    <!--Main Bannr End-->
    <!--Inner Page Cantent-->
        <div class="pageCantent innerCantent">
            <div class="container">
                <div class="password101 cf">
                    <div class="howItWorks">
                        <h2></h2>
                         <div class="header">


        <?php 
        		$url = "http://localhost:9000/subscribe/joe@smoe.com/PaSsWoRd/PIN/PIN_HINT/MASTER_PIN/2/20.00";
                $datares = file_get_contents($url, false);
                print_r($datares);
        ?>
   </div>
 </div>
                </div>
                
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/general.js"></script>
</body>
</html>