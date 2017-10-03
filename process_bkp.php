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
                        <li class="first"><a href="index.html" title="Home">Home</a></li>
                        <li><a href="faqs.html" title="How To">How To</a></li>
                        <li><a href="product.html" title="Products">Products</a></li>
                        <li><a href="download.html" title="Download">Download</a></li>
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
$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';

if($_POST) //Post Data received from product list page.
{
	$ItemName 		= $_SESSION['product']; //Item Name
	$ItemPrice 		= $_SESSION['price']; //Item Price
	$ItemNumber 	= $_SESSION['order']; //Item Number
	$ItemDesc 		= 0; //Item Number
	$ItemQty 		= 1; // Item Quantity
	$ItemTotalPrice = ($ItemPrice*$ItemQty); //(Item Price x Quantity = Total) Get total amount of product; 
	
	//Other important variables like tax, shipping cost
	$TotalTaxAmount 	= 0;  //Sum of tax for all items in this order. 
	$HandalingCost 		= 0;  //Handling cost for this order.
	$InsuranceCost 		= 0;  //shipping insurance cost for this order.
	$ShippinDiscount 	= 0; //Shipping discount for this order. Specify this as negative number.
	$ShippinCost 		= 0;  //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
	
	//Grand total including all tax, insurance, shipping cost and discount
	$GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);
	
	//Parameters for SetExpressCheckout, which will be sent to PayPal
	$padata = 	'&METHOD=SetExpressCheckout'.
				'&RETURNURL='.urlencode($PayPalReturnURL ).
				'&CANCELURL='.urlencode($PayPalCancelURL).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				
				'&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
				'&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
				'&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
				'&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
				'&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).
				'&SOLUTIONTYPE=Sole'.
				
				/* 
				//Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
				'&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
				'&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
				'&L_PAYMENTREQUEST_0_DESC1='.urlencode($ItemDesc2).
				'&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
				'&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
				*/
				
				/* 
				//Override the buyer's shipping address stored on PayPal, The buyer cannot edit the overridden address.
				'&ADDROVERRIDE=1'.
				'&PAYMENTREQUEST_0_SHIPTONAME=J Smith'.
				'&PAYMENTREQUEST_0_SHIPTOSTREET=1 Main St'.
				'&PAYMENTREQUEST_0_SHIPTOCITY=San Jose'.
				'&PAYMENTREQUEST_0_SHIPTOSTATE=CA'.
				'&PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE=US'.
				'&PAYMENTREQUEST_0_SHIPTOZIP=95131'.
				'&PAYMENTREQUEST_0_SHIPTOPHONENUM=408-967-4444'.
				*/
				
				'&NOSHIPPING=0'. //set 1 to hide buyer's shipping address, in-case products that does not require shipping
				
				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
				'&LOCALECODE=GB'. //PayPal pages to match the language on your website.
				'&LOGOIMG='. //site logo
				'&CARTBORDERCOLOR=FFFFFF'. //border color of cart
				'&ALLOWNOTE=1';
				
				############# set session variable we need later for "DoExpressCheckoutPayment" #######
				$_SESSION['ItemName'] 			=  $ItemName; //Item Name
				$_SESSION['ItemPrice'] 			=  $ItemPrice; //Item Price
				$_SESSION['ItemNumber'] 		=  $ItemNumber; //Item Number
				$_SESSION['ItemDesc'] 			=  $ItemDesc; //Item Number
				$_SESSION['ItemQty'] 			=  $ItemQty; // Item Quantity
				$_SESSION['ItemTotalPrice'] 	=  $ItemTotalPrice; //(Item Price x Quantity = Total) Get total amount of product; 
				$_SESSION['TotalTaxAmount'] 	=  $TotalTaxAmount;  //Sum of tax for all items in this order. 
				$_SESSION['HandalingCost'] 		=  $HandalingCost;  //Handling cost for this order.
				$_SESSION['InsuranceCost'] 		=  $InsuranceCost;  //shipping insurance cost for this order.
				$_SESSION['ShippinDiscount'] 	=  $ShippinDiscount; //Shipping discount for this order. Specify this as negative number.
				$_SESSION['ShippinCost'] 		=   $ShippinCost; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
				$_SESSION['GrandTotal'] 		=  $GrandTotal;


		//We need to execute the "SetExpressCheckOut" method to obtain paypal token
		$paypal= new MyPayPal();
		$httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode); ?>
        
		
		<?php 
		//Respond according to message we receive from Paypal
		if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
		{

				//Redirect user to PayPal store with Token received.
			 	$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
				header('Location: '.$paypalurl);
			 
		}else{
			//Show error message
			echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			echo '<pre>';
			print_r($httpParsedResponseAr);
			echo '</pre>';
		}

}

//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
if(isset($_GET["token"]) && isset($_GET["PayerID"]))
{
	//we will be using these two variables to execute the "DoExpressCheckoutPayment"
	//Note: we haven't received any payment yet.
	
	$token = $_GET["token"];
	$payer_id = $_GET["PayerID"];
	
	//get session variables
	$ItemName 			= $_SESSION['ItemName']; //Item Name
	$ItemPrice 			= $_SESSION['ItemPrice'] ; //Item Price
	$ItemNumber 		= $_SESSION['ItemNumber']; //Item Number
	$ItemDesc 			= $_SESSION['ItemDesc']; //Item Number
	$ItemQty 			= $_SESSION['ItemQty']; // Item Quantity
	$ItemTotalPrice 	= $_SESSION['ItemTotalPrice']; //(Item Price x Quantity = Total) Get total amount of product; 
	$TotalTaxAmount 	= $_SESSION['TotalTaxAmount'] ;  //Sum of tax for all items in this order. 
	$HandalingCost 		= $_SESSION['HandalingCost'];  //Handling cost for this order.
	$InsuranceCost 		= $_SESSION['InsuranceCost'];  //shipping insurance cost for this order.
	$ShippinDiscount 	= $_SESSION['ShippinDiscount']; //Shipping discount for this order. Specify this as negative number.
	$ShippinCost 		= $_SESSION['ShippinCost']; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
	$GrandTotal 		= $_SESSION['GrandTotal'];

	$padata = 	'&TOKEN='.urlencode($token).
				'&PAYERID='.urlencode($payer_id).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				
				//set item info here, otherwise we won't see product details later	
				'&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
				'&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
				'&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
				'&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
				'&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).

				/* 
				//Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
				'&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
				'&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
				'&L_PAYMENTREQUEST_0_DESC1=Description text'.
				'&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
				'&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
				*/

				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);
	
	//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
	$paypal= new MyPayPal();
	$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
	
	//Check if everything went ok..
	if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
	{ ?>
    
    

     <?php	echo '<h2>Success</h2>';
			echo '<div  align="center">Your Transaction ID : '.urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"])."</div><br/>";
			echo '<div  align="center">Your Order ID : '.$_SESSION['order']."</div><br/>";
			
				/*
				//Sometimes Payment are kept pending even when transaction is complete. 
				//hence we need to notify user about it and ask him manually approve the transiction
				*/
				
				if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					echo '<div style="color:green;font-weight:bold;" align="center">Thank You. Your Payment Received. <br> <br> You will be receiving a verification email shortly.</div><br/>';
					echo '<div style="color:green;font-weight:bold;" align="center">The email will be from support@authentry.com. <br> <br> It will contain a link you need to click to complete your subscription.</div><br/>';

				}
				elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					echo '<div style="color:red">Transaction Complete, but payment is still pending! '.
					'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
				}

				// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
				// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
				$padata = 	'&TOKEN='.urlencode($token);
				$paypal= new MyPayPal();
				$httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
				{
					
					//echo '<div  align="center"><b>Transaction Complete. Your Transaction ID is'.urldecode($httpParsedResponseAr["PAYMENTREQUESTINFO_0_TRANSACTIONID"]).'</b><br /></div>';
				    //0-5
					//$PAYMENTINFO_0_TRANSACTIONID=urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
					$TOKEN=urldecode($httpParsedResponseAr["TOKEN"]);
					$BILLINGAGREEMENTACCEPTEDSTATUS=$httpParsedResponseAr["BILLINGAGREEMENTACCEPTEDSTATUS"];
					$CHECKOUTSTATUS=$httpParsedResponseAr["CHECKOUTSTATUS"];
					$TIMESTAMP=urldecode($httpParsedResponseAr["TIMESTAMP"]);
					//echo "0-5".$TOKEN. " ".$BILLINGAGREEMENTACCEPTEDSTATUS." ".$CHECKOUTSTATUS." ".$TIMESTAMP."<br/>";
					//6-10
					$CORRELATIONID=$httpParsedResponseAr["CORRELATIONID"];
					$ACK=$httpParsedResponseAr["ACK"];
					$VERSION=urldecode($httpParsedResponseAr["VERSION"]);
					$BUILD=$httpParsedResponseAr["BUILD"];
					$EMAIL=urldecode($httpParsedResponseAr["EMAIL"]);
					//echo " 6-10".$CORRELATIONID." ".$ACK." ".$VERSION." ".$BUILD." ".$EMAIL."<br/>";
			        
					//11-15
					$PAYERID=$httpParsedResponseAr["PAYERID"];
					$PAYERSTATUS=$httpParsedResponseAr["PAYERSTATUS"];
                     if(isset($httpParsedResponseAr["BUSINESS"]))
					 { $BUSINESS=$httpParsedResponseAr["BUSINESS"];}
					 else
					  { $BUSINESS=""; }
					$FIRSTNAME=$httpParsedResponseAr["FIRSTNAME"];
					$LASTNAME=$httpParsedResponseAr["LASTNAME"];
					//echo " 11-15"." ".$PAYERID." ".$PAYERSTATUS." ".$BUSINESS." ".$FIRSTNAME." ".$LASTNAME."<br/>";
					
					//16-20
					$COUNTRYCODE=$httpParsedResponseAr["COUNTRYCODE"];
					$SHIPTONAME=($httpParsedResponseAr["SHIPTONAME"]);
					$SHIPTOSTREET=($httpParsedResponseAr["SHIPTOSTREET"]);
					$SHIPTOCITY=($httpParsedResponseAr["SHIPTOCITY"]);
					$SHIPTOSTATE=($httpParsedResponseAr["SHIPTOSTATE"]);
				//	echo " 16-20"." ".$COUNTRYCODE." ".$SHIPTONAME." ".$SHIPTOSTREET." ".$SHIPTOCITY." ".$SHIPTOSTATE."<br/>";
					
					//21-25
					$SHIPTOZIP=$httpParsedResponseAr["SHIPTOZIP"];
					$SHIPTOCOUNTRYCODE=$httpParsedResponseAr["SHIPTOCOUNTRYCODE"];
					$SHIPTOCOUNTRYNAME=urldecode($httpParsedResponseAr["SHIPTOCOUNTRYNAME"]);
					$ADDRESSSTATUS=urldecode($httpParsedResponseAr["ADDRESSSTATUS"]);
					$CURRENCYCODE=urldecode($httpParsedResponseAr["CURRENCYCODE"]);
				//	echo " 20-25"." ".$SHIPTOZIP." ".$SHIPTOCOUNTRYCODE." ".$SHIPTOCOUNTRYNAME." ".$ADDRESSSTATUS." ".$CURRENCYCODE."<br/>";
					
					//26-30
					$AMT =urldecode($httpParsedResponseAr["AMT"]);
					$ITEMAMT =urldecode($httpParsedResponseAr["ITEMAMT"]);
					$SHIPPINGAMT =urldecode($httpParsedResponseAr["SHIPPINGAMT"]);
					$HANDLINGAMT =urldecode($httpParsedResponseAr["HANDLINGAMT"]);
					$TAXAMT =urldecode($httpParsedResponseAr["TAXAMT"]);
				//	echo " 26-30"." ".$AMT." ".$ITEMAMT." ".$SHIPPINGAMT." ".$HANDLINGAMT." ".$TAXAMT."<br/>";
					//$sql="INSERT INTO transc_master(TOKEN, BILLINGAGREEMENTACCEPTEDSTATUS, CHECKOUTSTATUS, TIMESTAMP, CORRELATIONID, ACK, VERSION, BUILD, EMAIL,PAYERID,PAYERSTATUS,BUSINESS,FIRSTNAME,LASTNAME,COUNTRYCODE,SHIPTONAME,SHIPTOSTREET,SHIPTOCITY,SHIPTOSTATE,SHIPTOZIP, SHIPTOCOUNTRYCODE, SHIPTOCOUNTRYNAME, ADDRESSSTATUS ,CURRENCYCODE, AMT, ITEMAMT, SHIPPINGAMT, HANDLINGAMT, TAXAMT) VALUES ('$TOKEN', '$BILLINGAGREEMENTACCEPTEDSTATUS', '$CHECKOUTSTATUS', '$TIMESTAMP', '$CORRELATIONID', '$ACK', '$VERSION', '$BUILD', '$EMAIL', '$PAYERID', '$PAYERSTATUS', '$BUSINESS','$FIRSTNAME','$LASTNAME','$COUNTRYCODE','$SHIPTONAME','$SHIPTOSTREET','$SHIPTOCITY','$SHIPTOSTATE','$SHIPTOZIP', '$SHIPTOCOUNTRYCODE', '$SHIPTOCOUNTRYNAME', '$ADDRESSSTATUS','$CURRENCYCODE','$AMT','$ITEMAMT','$SHIPPINGAMT','$HANDLINGAMT','$TAXAMT' )";
					//$result3=mysql_query($sql);
					//if(!$result3){echo "error".mysql_error();}
					
					//31-35
					$INSURANCEAMT =urldecode($httpParsedResponseAr["INSURANCEAMT"]);
					$SHIPDISCAMT =urldecode($httpParsedResponseAr["SHIPDISCAMT"]);
					$L_NAME0 =($httpParsedResponseAr["L_NAME0"]);
					$L_NUMBER0 =urldecode($httpParsedResponseAr["L_NUMBER0"]);
					$pro_no=$L_NUMBER0;
					$L_QTY0 =urldecode($httpParsedResponseAr["L_QTY0"]);
				//	echo " 26-30"." ".$INSURANCEAMT." ".$SHIPDISCAMT." ".$L_NAME0." ".$L_NUMBER0." ".$L_QTY0."<br/>";
										
					//36-40
					$L_TAXAMT0 =urldecode($httpParsedResponseAr["L_TAXAMT0"]);
					$L_AMT0 =urldecode($httpParsedResponseAr["L_AMT0"]);
					$L_DESC0 =urldecode($httpParsedResponseAr["L_DESC0"]);
					$L_ITEMWEIGHTVALUE0 =urldecode($httpParsedResponseAr["L_ITEMWEIGHTVALUE0"]);
					$L_ITEMLENGTHVALUE0 =urldecode($httpParsedResponseAr["L_ITEMLENGTHVALUE0"]);
				//	echo " 36-40"." ".$L_TAXAMT0." ".$L_AMT0." ".$L_DESC0." ".$L_ITEMWEIGHTVALUE0." ".$L_ITEMLENGTHVALUE0."<br/>";
					
					//41-45
					$L_ITEMWIDTHVALUE0 =urldecode($httpParsedResponseAr["L_ITEMWIDTHVALUE0"]);
					$L_ITEMHEIGHTVALUE0 =urldecode($httpParsedResponseAr["L_ITEMHEIGHTVALUE0"]);
					$PAYMENTREQUEST_0_CURRENCYCODE =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_CURRENCYCODE"]);
					$PAYMENTREQUEST_0_AMT =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_AMT"]);
					$PAYMENTREQUEST_0_ITEMAMT =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_ITEMAMT"]);
				//	echo " 41-45"." ".$L_ITEMWIDTHVALUE0." ".$L_ITEMHEIGHTVALUE0." ".$PAYMENTREQUEST_0_CURRENCYCODE." ".$PAYMENTREQUEST_0_AMT." ".$PAYMENTREQUEST_0_ITEMAMT."<br/>";
					
					//45-50
					$PAYMENTREQUEST_0_SHIPPINGAMT =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_SHIPPINGAMT"]);
					$PAYMENTREQUEST_0_HANDLINGAMT =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_HANDLINGAMT"]);
					$PAYMENTREQUEST_0_TAXAMT =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_TAXAMT"]);
					$PAYMENTREQUEST_0_INSURANCEAMT =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_INSURANCEAMT"]);
					$PAYMENTREQUEST_0_SHIPDISCAMT =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_SHIPDISCAMT"]);
				//	echo " 45-50"." ".$PAYMENTREQUEST_0_SHIPPINGAMT." ".$PAYMENTREQUEST_0_HANDLINGAMT." ".$PAYMENTREQUEST_0_TAXAMT." ".$PAYMENTREQUEST_0_INSURANCEAMT." ".$PAYMENTREQUEST_0_SHIPDISCAMT."<br/>";
					
					//51-55
					$PAYMENTREQUEST_0_TRANSACTIONID =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_TRANSACTIONID"]);
					$PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED"]);
					$PAYMENTREQUEST_0_SHIPTONAME =($httpParsedResponseAr["PAYMENTREQUEST_0_SHIPTONAME"]);
					$PAYMENTREQUEST_0_SHIPTOSTREET =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_SHIPTOSTREET"]);
					$PAYMENTREQUEST_0_SHIPTOCITY =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_SHIPTOCITY"]);
				//	echo " 51-55"." ".$PAYMENTREQUEST_0_TRANSACTIONID." ".$PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED." ".$PAYMENTREQUEST_0_SHIPTONAME." ".$PAYMENTREQUEST_0_SHIPTOSTREET." ".$PAYMENTREQUEST_0_SHIPTOCITY."<br/>";
					
					//56-60
					$PAYMENTREQUEST_0_SHIPTOSTATE =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_SHIPTOSTATE"]);
					$PAYMENTREQUEST_0_SHIPTOZIP =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_SHIPTOZIP"]);
					$PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE"]);
					$PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME"]);
					$PAYMENTREQUEST_0_ADDRESSSTATUS =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_ADDRESSSTATUS"]);
				//	echo " 56-60"." ".$PAYMENTREQUEST_0_SHIPTOSTATE." ".$PAYMENTREQUEST_0_SHIPTOZIP." ".$PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE." ".$PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME." ".$PAYMENTREQUEST_0_ADDRESSSTATUS."<br/>";
					
					//61-65
					$PAYMENTREQUEST_0_ADDRESSNORMALIZATIONSTATUS =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_ADDRESSNORMALIZATIONSTATUS"]);
					$L_PAYMENTREQUEST_0_NAME0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_NAME0"]);
					$L_PAYMENTREQUEST_0_NUMBER0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_NUMBER0"]);
					$L_PAYMENTREQUEST_0_QTY0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_QTY0"]);
					$L_PAYMENTREQUEST_0_TAXAMT0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_TAXAMT0"]);
				//	echo " 61-65"." ".$PAYMENTREQUEST_0_ADDRESSNORMALIZATIONSTATUS." ".$L_PAYMENTREQUEST_0_NAME0." ".$L_PAYMENTREQUEST_0_NUMBER0." ".$L_PAYMENTREQUEST_0_QTY0." ".$L_PAYMENTREQUEST_0_TAXAMT0."<br/>";
					
					//66-70
					$L_PAYMENTREQUEST_0_AMT0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_AMT0"]);
					$L_PAYMENTREQUEST_0_DESC0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_DESC0"]);
					$L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0"]);
					$L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0"]);
					$L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0"]);
				//	echo " 66-70"." ".$L_PAYMENTREQUEST_0_AMT0." ".$L_PAYMENTREQUEST_0_DESC0." ".$L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0." ".$L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0." ".$L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0."<br/>";
					
					//71-73
					$L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0 =urldecode($httpParsedResponseAr["L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0"]);
					$PAYMENTREQUESTINFO_0_TRANSACTIONID =urldecode($httpParsedResponseAr["PAYMENTREQUESTINFO_0_TRANSACTIONID"]);
					$PAYMENTREQUESTINFO_0_ERRORCODE =urldecode($httpParsedResponseAr["PAYMENTREQUESTINFO_0_ERRORCODE"]);
					
				//	echo " 71-73"." ".$L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0." ".$PAYMENTREQUESTINFO_0_TRANSACTIONID." ".$PAYMENTREQUESTINFO_0_ERRORCODE."<br/>";            
					 $sql="INSERT INTO transc_master(TOKEN, BILLINGAGREEMENTACCEPTEDSTATUS, CHECKOUTSTATUS, TIMESTAMP, CORRELATIONID, ACK, VERSION, BUILD, EMAIL,PAYERID,PAYERSTATUS,BUSINESS,FIRSTNAME,LASTNAME,COUNTRYCODE,SHIPTONAME,SHIPTOSTREET,SHIPTOCITY,SHIPTOSTATE,SHIPTOZIP, SHIPTOCOUNTRYCODE, SHIPTOCOUNTRYNAME, ADDRESSSTATUS ,CURRENCYCODE, AMT, ITEMAMT, SHIPPINGAMT, HANDLINGAMT, TAXAMT,INSURANCEAMT ,SHIPDISCAMT ,L_NAME0 ,L_NUMBER0 ,L_QTY0 , L_TAXAMT0,L_AMT0 ,L_DESC0 ,L_ITEMWEIGHTVALUE0 ,L_ITEMLENGTHVALUE0, L_ITEMWIDTHVALUE0, L_ITEMHEIGHTVALUE0, PAYMENTREQUEST_0_CURRENCYCODE, PAYMENTREQUEST_0_AMT , PAYMENTREQUEST_0_ITEMAMT, PAYMENTREQUEST_0_SHIPPINGAMT ,PAYMENTREQUEST_0_HANDLINGAMT ,PAYMENTREQUEST_0_TAXAMT ,PAYMENTREQUEST_0_INSURANCEAMT , PAYMENTREQUEST_0_SHIPDISCAMT, PAYMENTREQUEST_0_TRANSACTIONID ,PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED ,   PAYMENTREQUEST_0_SHIPTONAME , PAYMENTREQUEST_0_SHIPTOSTREET ,PAYMENTREQUEST_0_SHIPTOCITY ,PAYMENTREQUEST_0_SHIPTOSTATE ,PAYMENTREQUEST_0_SHIPTOZIP ,PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE ,PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME ,PAYMENTREQUEST_0_ADDRESSSTATUS, PAYMENTREQUEST_0_ADDRESSNORMALIZATIONSTATUS , L_PAYMENTREQUEST_0_NAME0, L_PAYMENTREQUEST_0_NUMBER0, L_PAYMENTREQUEST_0_QTY0, L_PAYMENTREQUEST_0_TAXAMT0, L_PAYMENTREQUEST_0_AMT0, L_PAYMENTREQUEST_0_DESC0, L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0, L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0,L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0, L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0,PAYMENTREQUESTINFO_0_ERRORCODE , TRANS_ID)  VALUES ('$TOKEN', '$BILLINGAGREEMENTACCEPTEDSTATUS', '$CHECKOUTSTATUS', '$TIMESTAMP', '$CORRELATIONID', '$ACK', '$VERSION', '$BUILD', '$EMAIL', '$PAYERID', '$PAYERSTATUS', '$BUSINESS','$FIRSTNAME','$LASTNAME','$COUNTRYCODE', '$SHIPTONAME', '$SHIPTOSTREET', '$SHIPTOCITY', '$SHIPTOSTATE','$SHIPTOZIP', '$SHIPTOCOUNTRYCODE', '$SHIPTOCOUNTRYNAME', '$ADDRESSSTATUS','$CURRENCYCODE', '$AMT','$ITEMAMT','$SHIPPINGAMT','$HANDLINGAMT','$TAXAMT','$INSURANCEAMT' ,'$SHIPDISCAMT' ,'$L_NAME0' ,'$L_NUMBER0' ,'$L_QTY0' ,'$L_TAXAMT0' ,'$L_AMT0' ,'$L_DESC0' ,'$L_ITEMWEIGHTVALUE0' ,'$L_ITEMLENGTHVALUE0', '$L_ITEMWIDTHVALUE0', '$L_ITEMHEIGHTVALUE0', '$PAYMENTREQUEST_0_CURRENCYCODE', '$PAYMENTREQUEST_0_AMT', '$PAYMENTREQUEST_0_ITEMAMT', '$PAYMENTREQUEST_0_SHIPPINGAMT', '$PAYMENTREQUEST_0_HANDLINGAMT', '$PAYMENTREQUEST_0_TAXAMT' ,'$PAYMENTREQUEST_0_INSURANCEAMT', '$PAYMENTREQUEST_0_SHIPDISCAMT', '$PAYMENTREQUEST_0_TRANSACTIONID' ,'$PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED' , '$PAYMENTREQUEST_0_SHIPTONAME', '$PAYMENTREQUEST_0_SHIPTOSTREET', '$PAYMENTREQUEST_0_SHIPTOCITY' ,'$PAYMENTREQUEST_0_SHIPTOSTATE' ,'$PAYMENTREQUEST_0_SHIPTOZIP' ,'$PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE' ,'$PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME' ,'$PAYMENTREQUEST_0_ADDRESSSTATUS', '$PAYMENTREQUEST_0_ADDRESSNORMALIZATIONSTATUS', '$L_PAYMENTREQUEST_0_NAME0', '$L_PAYMENTREQUEST_0_NUMBER0 ', '$L_PAYMENTREQUEST_0_QTY0', '$L_PAYMENTREQUEST_0_TAXAMT0', '$L_PAYMENTREQUEST_0_AMT0', '$L_PAYMENTREQUEST_0_DESC0','$L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0', '$L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0', '$L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0', '$L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0','$PAYMENTREQUESTINFO_0_ERRORCODE', '$PAYMENTREQUESTINFO_0_TRANSACTIONID' )";
					$result3=mysql_query($sql);
					if(!$result3){echo "error".mysql_error();}
					$sqlp="UPDATE `order_master` SET payment_status=1 WHERE order_id=$pro_no";
					$resultp=mysql_query($sqlp);
					if(!$resultp){ echo "error".mysql_error(); }

     if($_SESSION['product']=="Gatekeeper Pro")
	  { $oid1=$_SESSION['order'];
		
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

		}

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