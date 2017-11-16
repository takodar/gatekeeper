<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Authentry Gatekeeper Pro – Password 101: Protecting Your Online Account Information</title>
    <meta name="description"
          content="Gatekeeper Pro lets you creates one secure, easy to remember Master Password for all of your online accounts using two factor authentication.  Your accounts go from hackable to uncrackable.">
    <meta name="keywords"
          content="Gatekeeper Pro, Online Password Manager, Two Factor Password Manager, Mobile Password Manager,  Safe Passwords">
    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/introjs.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107268314-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-107268314-3');
    </script>
</head>

<body>
<div id="wrapper">
    <!--Header-->
    <div id="header">
        <div class="containerOld navContainer">
            <h1 class="logo"><a href="index.html" title="Gate Keeper"><img src="images/logo.png" width="316"
                                                                           height="289" alt="Gate Keeper"/></a></h1>
            <div class="navOld">
                <ul class="navbarOld">
                    <li class="first"><a href="index.html" title="Home">Home</a></li>
                    <li><a href="howTo.html" title="How To">How To</a></li>
                    <li><a href="product.html" title="Products">Products</a></li>
                    <li><a href="#" class="active" title="Download">Download</a></li>
					<li><a href="forum" title="forum">Forum</a></li>
<li class="last" id="outterHelp"><i id="btnHelp" title="Help" onclick="startHelper()" class="fa fa-question-circle"></i></li>                </ul>
            </div>
        </div>
    </div>
    <!--Header End-->
    <!--Main Bannr-->
    <div id="banner">
        <ul class="slider cf">
            <li><img src="images/banner3.jpg" width="1400" height="361" alt="Banner"/>
                <div class="containerOld">
                    <div class="bx-caption">
                        <h2>Free Trial</h2>

                        <?php
                        $user_agent = getenv("HTTP_USER_AGENT");

                        if(strpos($user_agent, "Win") !== FALSE)
                        $os = "Windows";
                        elseif(strpos($user_agent, "Mac") !== FALSE)
                        $os = "Mac";

                        if($os === "Windows")
                        {
echo " <p><a class='btnOld active btnDownload' href='images/WINDOWS' id='windowDownload' download>
                                                             Download Now <i class='fa fa-download'></i> </a></p>
                                                         </p>";
                        }
                        elseif($os === "Mac")
                        {
                           echo " <p><a class='btnOld active btnDownload' id='macDownload' href='images/MAC' download>
                                                             Download Now <i class='fa fa-download'></i> </a></p>
                                                         </p>";
                        }
                        ?>

                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!--Main Bannr End-->
    <!--Inner Page Cantent-->
    <div class="pageCantent innerCantent">
        <div class="containerOld">
            <table class="table table-hover table-responsive table-bordered" id="tblDownload">
                <thead>
                <tr>
                    <th>Version</th>
                    <th>Release Date</th>
                    <th>Windows Download</th>
                    <th>Mac Download</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <td class="version">1.0 </td>
                    <td>09/27/2017</td>
                    <td><a class="btnOld active btnDownload" href="images/affordable-icon.png" download>
                        Download  <i class="fa fa-download"></i> </a>
                    </td>
                    <td><a class="btnOld active btnDownload" href="images/affordable-icon.png" download>
                        Download  <i class="fa fa-download"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td class="version">1.1</td>
                    <td>09/30/2017</td>
                    <td><a class="btnOld active btnDownload" href="images/affordable-icon.png" download>
                        Download  <i class="fa fa-download"></i> </a>
                        </td>
                    <td><a class="btnOld active btnDownload" href="images/affordable-icon.png" download>
                        Download  <i class="fa fa-download"></i> </a>
                    </td>
                </tr>
                <tr>
                    <td class="version">1.2</td>
                    <td>10/02/2017</td>
                    <td><a class="btnOld active btnDownload" href="images/affordable-icon.png" download>
                        Download  <i class="fa fa-download"></i> </a>
                    </td>
                    <td><a class="btnOld active btnDownload" href="images/affordable-icon.png" download>
                        Download  <i class="fa fa-download"></i> </a>
                    </td>
                </tr>
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!--Inner Page Cantent End-->
    <!--Footer-->
    <div id="footer">
        <div class="containerOld">
            <div class="columns">
                <div class="column">
                    <h2>Company</h2>
                    <ul>
                        <li><a href="about.html" title="About">About</a></li>
                        <li><a href="howTo.html" title="Faq’s">FAQ’s</a></li>
                        <li><a href="contact_us.html" title="Contact us">Contact us</a></li>
                    </ul>
                </div>
                <div class="column">
                    <h2>Help</h2>
                    <ul>
                        <li><a href="privacy_policy.html" title="Privacy Policy">Privacy Policy</a></li>
                        <li><a href="term_of_use.html" title="Terms & Conditions">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="column iconColumn">
                    <h2>Connect</h2>
                    <ul class="icon cf">
                        <li><a target="_blank" href="https://www.facebook.com/pages/Gatekeeperpro/1510819719133844"
                               title="Facebook"><span></span>Facebook</a></li>
                        <li><a target="_blank" href="https://twitter.com/GateKeeperPro99" title="Twitter"><span></span>Twitter</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="fLogs">
                <a href="#" title="Norton"><img src="images/norton.jpg" alt="Norton" width="102" height="56"/></a>
                <a href="#" title="BBB"><img src="images/bbb.jpg" alt="BBB" width="101" height="56"/></a>
                <a href="#" title="Truste"><img src="images/truste.jpg" alt="Truste" width="137" height="56"/></a>
            </div>
            <p>Copyright © 2014 GateKeeper. All Rights Reserved.</p>
        </div>
    </div>
    <!--Footer End-->
</div>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/viewportSize-min.js"></script>
<script type="text/javascript" src="js/introjs/intro.js"></script>
<script type="text/javascript" src="js/introjs/download.js"></script>
</body>
</html>
