<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Authentry Gatekeeper Pro – Two Factor Authentication Password Manager</title>
<meta name="description" content="Authentry’s Gatekeeper Pro secure Password Manager and LogiKey USB Token use the latest Two Factor Authentication technology to keep all of your passwords safe.">
<meta name="keywords" content="Authentry, Gatekeeper Pro, LogiKey, Secure Password Generator, Password Manager, Password Management, Password Recovery, Identity Theft Protection, Password Vault, Password Safe, Two Factor Authentication, 2 Factor Authentication, Duo Security, Last Pass, Yubico, YubiKey">
    <title>GateKeeper Pro</title>

    <link rel="stylesheet" href="css/bootstrap4.min.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="css/device-mockups/device-mockups.min.css">
    <link rel="stylesheet" type="text/css" href="css/introjs.css"/>
    <!--TODO Minify after development is complete-->
    <!--<link href="css/new-age.min.css" rel="stylesheet">-->
    <link href="css/new-age.css" rel="stylesheet">

    <link href="css/takodaCSS.css" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107268314-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-107268314-3');
    </script>

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container" style="max-width: 100%">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <img src="images/testBrandLogo.png" alt="Gate Keeper">
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#download">Download</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#howTo">How To</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="forum">Forum</a>
                </li>
                <li class="nav-item">
                    <i id="btnHelp" title="Help" onclick="startHelper()" class="fa fa-question-circle"></i>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <video autoplay class="col-lg-12" id="homepageVideo">
                <source src="images/TestScreenCast.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                Video not supported.
            </video>
        </div>
    </div>
</header>

<section class="download bg-primary text-center" id="download">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="section-heading">Discover what all the buzz is about!</h2>
                <p>GateKeeper Pro is available on any mobile device! Download now to get started!</p>
                <div class="badges">
                    <a class="badge-link" href="#"><img src="images/Bootstrap4/google-play-badge.svg" alt=""></a>
                    <a class="badge-link" href="#"><img src="images/Bootstrap4/app-store-badge.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'features.php'
?>

<section class="cta">
    <div class="cta-content">
        <div class="container">
            <h2>Stop waiting.<br>Start building.</h2>
            <a href="#howTo" class="btn btn-outline btn-xl js-scroll-trigger" id="btnGetStarted">Let's Get Started!</a>
        </div>
    </div>
    <div class="overlay"></div>
</section>

<?php
    include 'howTo.php';
?>


<section class="contact bg-primary" id="contact">
    <div class="container">
        <h2>We
            <i class="fa fa-heart"></i>
            new friends!</h2>
        <ul class="list-inline list-social">
            <li class="list-inline-item social-twitter">
                <a href="https://twitter.com/GateKeeperPro99">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li class="list-inline-item social-facebook">
                <a href="https://www.facebook.com/TRSSolutions/">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li class="list-inline-item social-google-plus">
                <a href="#">
                    <i class="fa fa-google-plus"></i>
                </a>
            </li>
        </ul>
    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; 2014 GateKeeper. All Rights Reserved.</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#" data-toggle="modal" data-target="#privacyModal">Privacy</a>
            </li>
            <li class="list-inline-item">
                <a href="#" data-toggle="modal" data-target="#termsModal">Terms</a>
            </li>
            <li class="list-inline-item">
                <a href="#" data-toggle="modal" data-target="#faqModal">FAQ</a>
            </li>
        </ul>
    </div>
</footer>

<?php
  include 'faq_modal.php';
  include 'terms_modal.php';
  include 'privacy_modal.php';
?> 


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-easing/jquery.easing.min.js"></script>
<script src="js/new-age.min.js"></script>
<script type="text/javascript" src="js/introjs/intro.js"></script>
<script type="text/javascript" src="js/introjs/home.js"></script>
</body>
</html>