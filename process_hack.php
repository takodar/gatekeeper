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
$paypalmode = 'sandbox';

//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
if($paypalmode)
{
	//Check if everything went ok..
	if($paypalmode)
	{ ?>

     <?php	echo '<h2>Success</h2>';

     $oid1=$_SESSION['order'];
     $result3 = mysql_query("SELECT prod_subscription FROM  order_master WHERE order_id=$oid1");
             if(mysql_num_rows($result3)  > 0)
              {
                while($rows = mysql_fetch_array($result3))
     					{
     						 $term=$rows['prod_subscription'];
     						 //echo $term;
                         }
               }

     		  $result4 = mysql_query("SELECT email_id FROM  coustomer_master WHERE order_id=$oid1");
             if(mysql_num_rows($result4)  > 0)
              {
                while($rows1 = mysql_fetch_array($result4))
     					{
     						 $email=$rows1['email_id'];
     						 //echo $email;
                         }
               }

		//
		// $pass=gen_random_string(20);
		 $pass=$_SESSION['password'];
		 $pin=$_SESSION['pin'];
		 $pin_hint=$_SESSION['pin_hint'];
		 $master_pin=$_SESSION['master_pin'];
		 
		 $amount=$_SESSION['price'];
		 $in1="INSERT INTO success_url_master (order_id, email, term, amount)  VALUES  ($oid1,'$email','$term','$amount')";
		$result4=mysql_query($in1); 
		   
		$url = "https://gatekeeperpro.us/subscribe/$email/$pass/$pin/$pin_hint/$master_pin/$term/$amount";
		// Open the file using the HTTP headers set above
		if ($result4) {
			$datares = file_get_contents($url, false);
		}	
		print_r($datares);

					/*
					#### SAVE BUYER INFORMATION IN DATABASE ###
					//see (http://www.sanwebe.com/2013/03/basic-php-mysqli-usage) for mysqli usage
					
					$buyerName = $httpParsedResponseAr["FIRSTNAME"].' '.$httpParsedResponseAr["LASTNAME"];
					$buyerEmail = $httpParsedResponseAr["EMAIL"];
					
					//Open a new connection to the MySQL server
					$mysqli = new mysqli('host','username','password','database_name');
					
					//Output any connection error
					if ($mysqli->connect_error) {
						die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
					}		
					
					$insert_row = $mysqli->query("INSERT INTO BuyerTable 
					(BuyerName,BuyerEmail,TransactionID,ItemName,ItemNumber, ItemAmount,ItemQTY)
					VALUES ('$buyerName','$buyerEmail','$transactionID','$ItemName',$ItemNumber, $ItemTotalPrice,$ItemQTY)");
					
					if($insert_row){
						print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
					}else{
						die('Error : ('. $mysqli->errno .') '. $mysqli->error);
					}
					
					*/
					
					echo '<pre>';
					//print_r($httpParsedResponseAr);
					echo '</pre>';
				} else  {
					echo '<div style="color:red"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
					echo '<pre>';
					print_r($httpParsedResponseAr);
					echo '</pre>';

				}
	
	}else{
			echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			echo '<pre>';
			print_r($httpParsedResponseAr);
			echo '</pre>';
	}
?>
   </div>
 </div>
                </div>
                
            </div>
        </div>
    <!--Inner Page Cantent End-->
    <!--Footer-->
        <div id="footer">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h2>Company</h2>
                        <ul>
                            <li><a href="about.html" title="About">About</a></li>
                            <li><a href="faqs.html" title="Faq’s">FAQ’s</a></li>
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
                            <li><a target="_blank" href="https://www.facebook.com/pages/Gatekeeperpro/1510819719133844" title="Facebook"><span></span>Facebook</a></li>
                            <li><a target="_blank" href="https://twitter.com/GateKeeperPro99" title="Twitter"><span></span>Twitter</a></li>
                            <!--<li><a href="#" title="Linkedin"><span></span>Linkedin</a></li>-->
                            <!--<li><a href="#" title="Google+"><span></span>Google+</a></li>-->
                            <!--<li><a href="#" title="YouTube"><span></span>YouTube</a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="fLogs">
                    <a href="#" title="Norton"><img src="images/norton.jpg" alt="Norton" width="102" height="56" /></a>
                    <a href="#" title="BBB"><img src="images/bbb.jpg" alt="BBB" width="101" height="56" /></a>
                    <a href="#" title="Truste"><img src="images/truste.jpg" alt="Truste" width="137" height="56" /></a>
                </div>
                <p>Copyright © 2014 GateKeeper. All Rights Reserved.</p>
            </div>
        </div>
    <!--Footer End-->
    </div>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/general.js"></script>
</body>
</html>