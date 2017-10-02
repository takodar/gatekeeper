<?php session_start(); $_SESSION['product']="Logikey";
       include('admin/connect.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<title>Authentry Gatekeeper Pro – Password Generator for Identity Theft Protection</title>
<meta name="description" content="Gatekeeper Pro is a convenient, secure & affordable password generator that creates one easy to remember password for all of your online accounts from your mobile device">
<meta name="keywords" content="Gatekeeper Pro, LogiKey, Mobile Two Factor Authentication, Password Safe, 2 Factor Authentication, Password Manager, Secure Password Generator, Identity Theft Protection">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--term-condition-->
 <link rel="stylesheet" href="css/colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/jquery.colorbox.js"></script>
		<script>
		var police;
		var total=0;
			$(document).ready(function(){
				$(".inline").colorbox({inline:true, width:"60%", height:"60%"});
			});
		</script>
<script>
  
   function get_shipping()
    {
         var fname=document.getElementById("firstName").value;
		 if( (fname=="")|| (fname=="Enter First Name"))
		  {  document.getElementById("firstName").value = 'Enter First Name';
			 document.getElementById("firstName").style.color="red";
		     return false; }
		 var lname=document.getElementById("lastName").value;
		 if( (lname=="")|| (lname=="Enter Last Name"))
		  {  document.getElementById("lastName").value = 'Enter Last Name';
			 document.getElementById("lastName").style.color="red";
		     return false; }
		  var add=document.getElementById("address").value;	
		  if( (add=="")|| (add=="Enter Address"))
		  {  document.getElementById("address").value = 'Enter Address';
			 document.getElementById("address").style.color="red";
		     return false; } 
		  var city=document.getElementById("city").value;
		   if( (city=="")|| (city=="Enter City"))
		   {  document.getElementById("city").value = 'Enter City';
			  document.getElementById("city").style.color="red";
		      return false; }
		  var state=document.getElementById("state").value;
		   if( (state=="")|| (state=="Enter State"))
		   {  document.getElementById("state").value = 'Enter State';
			  document.getElementById("state").style.color="red";
		      return false; }
		  var zipcode=document.getElementById("zipCode").value;
		   if( (zipcode=="")|| (zipcode=="Enter Zipcode"))
		   {  document.getElementById("zipCode").value = 'Enter Zipcode';
			  document.getElementById("zipCode").style.color="red";
		      return false; }
		   else
		   {
			   if(isNaN(zipcode))
			   {   document.getElementById("zipCode").value = 'Enter Valid Zipcode';
			       document.getElementById("zipCode").style.color="red";
		           return false; }
		   }
		  var email=document.getElementById("email").value;
		  if( (email=="")|| (email=="Enter Email"))
		   {  document.getElementById("email").value = 'Enter Email';
			  document.getElementById("email").style.color="red";
		      return false; }
		  else{
		    	var y=email;
				var atpos=y.indexOf("@");
				var dotpos=y.lastIndexOf(".");
			    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=y.length)
  						{ document.getElementById("email").value = 'Enter Valid Email';
			              document.getElementById("email").style.color="red";
		                  return false; }
		       }
		    
		 document.getElementById("td4").style.display='none'; 
 	     document.getElementById("td6").style.display='block';  return false; 
    }
function change1(that){
  if( (that.value=="Enter First Name")||(that.value=="")||(that.value=="Enter Last Name")||(that.value=="Enter Address")||(that.value=="Enter City")||(that.value=="Enter State") ||(that.value=="Enter Valid Zipcode") ||(that.value=="Enter Zipcode") ||(that.value=="Enter Valid Email") ||(that.value=="Enter Email")||(that.value=="Enter Coupon Code") )
     {
      that.value="";
      that.style.color = "grey";
	 }
}

   function  submitp1()
		  {  
		   var prd=2;
		   var duration=$("input[name='subscription']:checked").val();
		   var fname=document.getElementById("firstName").value;
		   var lname=document.getElementById("lastName").value;
		   var add=document.getElementById("address").value;
		   var city=document.getElementById("city").value;
		   var state=document.getElementById("state").value;
		   var zipcode=document.getElementById("zipCode").value;
		   var email=document.getElementById("email").value;
		   
		   var fnames=document.getElementById("firstNames").value;
		 if( (fnames=="")|| (fnames=="Enter First Name"))
		  {  document.getElementById("firstNames").value = 'Enter First Name';
			 document.getElementById("firstNames").style.color="red";
		     return false; }
		 var lnames=document.getElementById("lastNames").value;
		 if( (lnames=="")|| (lnames=="Enter Last Name"))
		  {  document.getElementById("lastNames").value = 'Enter Last Name';
			 document.getElementById("lastNames").style.color="red";
		     return false; }
		  var adds=document.getElementById("addresss").value;	
		  if( (adds=="")|| (adds=="Enter Address"))
		  {  document.getElementById("addresss").value = 'Enter Address';
			 document.getElementById("addresss").style.color="red";
		     return false; } 
		  var citys=document.getElementById("citys").value;
		   if( (citys=="")|| (citys=="Enter City"))
		   {  document.getElementById("citys").value = 'Enter City';
			  document.getElementById("citys").style.color="red";
		      return false; }
		  var states=document.getElementById("states").value;
		   if( (states=="")|| (state=="Enter State"))
		   {  document.getElementById("states").value = 'Enter State';
			  document.getElementById("states").style.color="red";
		      return false; }
		  var zipcodes=document.getElementById("zipCodes").value;
		   if( (zipcodes=="")|| (zipcodes=="Enter Zipcode"))
		   {  document.getElementById("zipCodes").value = 'Enter Zipcode';
			  document.getElementById("zipCodes").style.color="red";
		      return false; }
		   else
		   {
			   if(isNaN(zipcodes))
			   {   document.getElementById("zipCodes").value = 'Enter Valid Zipcode';
			       document.getElementById("zipCodes").style.color="red";
		           return false; }
		   }
		  var emails=document.getElementById("emails").value;
		  if( (emails=="")|| (emails=="Enter Email"))
		   {  document.getElementById("emails").value = 'Enter Email';
			  document.getElementById("emails").style.color="red";
		      return false; }
		  else{
		    	var y=emails;
				var atpos=y.indexOf("@");
				var dotpos=y.lastIndexOf(".");
			    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=y.length)
  						{ document.getElementById("emails").value = 'Enter Valid Email';
			              document.getElementById("emails").style.color="red";
		                  return false; }
		       }		   
		   if (window.XMLHttpRequest)
              { xmlhttp=new XMLHttpRequest(); }
           else
              { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
          
		   xmlhttp.onreadystatechange=function()
              { if (xmlhttp.readyState==4 && xmlhttp.status==200)
		         { document.getElementById("td6").innerHTML=xmlhttp.responseText; }
              } 
		   xmlhttp.open("GET","submitp2.php?prd="+prd+"&fname="+fname+"&lname="+lname+"&add="+add+"&city="+city+"&state="+state+"&zipcode="+zipcode+"&email="+email+"&fnames="+fnames+"&lnames="+lnames+"&adds="+adds+"&citys="+citys+"&states="+states+"&zipcodes="+zipcodes+"&emails="+emails,true);
           xmlhttp.send();
           return false;
		  }

   function acc_rej(str)
     { 
     	police=str;
     	//alert("acc-rej"+window.police);
     	$.colorbox.close();     	
     }
   function chk_term_fwd()
	  {
	   //var test=police;
	   //alert("test="+test);
	  	if( (police=="no") || (police=="") || (!police))
	  	 {
	  	 	alert("The 'Purchase' cannot be completed until you review and accept the license agreement.");
	  	 	return false;
	  	 }
	  	else
	  	{    // alert("alert in alert");
 	  		   document.getElementById("td4").style.display='block'; 
 	  		   document.getElementById("td2").style.display='none'; 
	  	}
	  }
  function chk_discount()
   {
   	       var prd="p1";
		   var id= document.getElementById("p_id").value;
		   var price= document.getElementById("price").value;
		   var scharge= document.getElementById("shipcharge").value;
		   var tot= document.getElementById("total").value;
		   var code= document.getElementById("coupon").value;
		   if( (code=="")|| (code=="Enter Coupon Code"))
		     {  document.getElementById("coupon").value = 'Enter Coupon Code';
			  document.getElementById("coupon").style.color="red";
		      return false; }
		   
		   if (window.XMLHttpRequest)
              { xmlhttp=new XMLHttpRequest(); }
           else
              { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
          
		   xmlhttp.onreadystatechange=function()
              { if (xmlhttp.readyState==4 && xmlhttp.status==200)
		         { document.getElementById("td6").innerHTML=xmlhttp.responseText; }
              } 
		   xmlhttp.open("GET","submitp2.php?id="+id+"&price="+price+"&code="+code+"&scharge="+scharge+"&tot="+tot,true);
           xmlhttp.send();
           return false;
   } 
</script>
 
</head>

<body>
	<div id="wrapper">
    <!--Header-->
        <div id="header">
          <div class="container">
            <h1 class="logo"><a href="index.html" title="Gate Keeper"><img src="images/logo.png" width="316" height="289" alt="Gate Keeper" /></a></h1>
                <div class="nav">
                	<ul class="navbar">
                    	<li class="first"><a href="product.html" title="Products"  class="active">Products</a></li>
                        <li><a href="how_it_works.html" title="How it Works">How it Works</a></li>
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
            	<li><img src="images/banner1.jpg" width="1400" height="361" alt="Banner" />
                	<div class="container"><div class="bx-caption">
                        <h2>Protect What Matters Most.</h2>
                        <p>Personal password and account security has<br />never been easier, or more affordable.</p>                    </div></div>
                </li>
            </ul>
        </div>
    <!--Main Bannr End-->
    <!--Inner Page Cantent-->
        <div class="pageCantent innerCantent">
        	<div class="container">
            	 <div class="cart1 cf" id="changesize">
            		<!---- tr1 td1 left ----->
      <div id="td1" class="Subscription passLeft last" >
      <div id="support-term-info-div" style="margin-top : 4em;">
        <div id="subscription-info-1" style="display: block;">
           <p>“The LogiKey™ offers a more convenient and secure way to  lock your computer, and sign-in to 
your personal accounts.  The LogiKey™ is a USB device that is built with military grade encryption for secure login and account access.”</p>
        </div>
     </div>
</div>

<!--- tr1 td2 start-------->

 <div class="passRight" id="td2">
    <form class="form-horizontal" name="pro" id="pro">
       
            <h2>Logikey</h2>
            <!-- Multiple Radios -->
            
                <label>Product price: $19.99<?php $sqlt="SELECT * FROM shipping_charge WHERE s_id=1";
                $total=19.99;
	            $resultt=mysql_query($sqlt);
	            $rowst = mysql_fetch_array($resultt);
                $scharge=$rowst['charge']; //echo $total; ?></label>
  				<label>Shipping Charge: $<?php echo $scharge; ?></label>
  				<label>Total: $<?php $tot=$total+$scharge; echo $tot; ?></label>
           
            
            <!-- Text input-->
            <div class="control-group">
                
            </div>
         
            <!-- Select Basic -->
           

            <!-- Button -->
            <div class="control-group">
                <label for="purchase" class="control-label"></label>
                <div class="controls">
                <p class="">“In order to complete your purchase, you must agree to our License Agreement.  Please click 
“License Agreement” below to accept our Terms and Conditions, then proceed to Purchase.</p>
                    <!--<button id="purchase" name="purchase" class="btn btn-primary" disabled>Purchase</button>-->
					<a data-toggle="modal" class="inline btn" role="button" href="#inline_content">License Agreement</a><br>
                    <a class="btn btn-primary" name="purchase" id="purchase" onclick="chk_term_fwd();">Purchase</a>
                    <!--<p><a class='inline' href="#inline_content">Inline HTML</a></p> -->
                </div>
            </div>
          </fieldset>
    </form>
</div>

 <!--- tr1 td2 over ------>

 <!---- tr2 td1 start---------->

  
 
 <!----- tr2 td1 over ------>
 <div class="formRight passRight" id="td4" style="display:none;">
      <form class="form-horizontal" >

  	<fieldset>
            <legend>Billing Information</legend>
            <div class="control-group">
                <label for="firstName" class="control-label">First Name</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="First Name" name="firstName" id="firstName" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="lastName" class="control-label">Last Name</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="Last Name" name="lastName" id="lastName" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="address" class="control-label">Address</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="Address" name="address" id="address" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="city" class="control-label">City</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="City" name="city" id="city" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="state" class="control-label">State</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="State" name="state" id="state" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="zipCode" class="control-label">Zip Code</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="Zip Code" name="zipCode" id="zipCode" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="zipCode" class="control-label">Email</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="Email" name="email" id="email" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" name="submit" id="submit-billing-info" onclick="return get_shipping();">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
 </div>
 
 
 		
    
    <div id="td6" style="display:none;" class="formRight passRight"><form class="form-horizontal">
        <fieldset>
            <legend>Shipping Information</legend>
            <div class="control-group">
                <label for="firstName" class="control-label">First Name</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="First Name" name="firstNames" id="firstNames" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="lastName" class="control-label">Last Name</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="Last Name" name="lastNames" id="lastNames" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="address" class="control-label">Address</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="Address" name="addresss" id="addresss" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="city" class="control-label">City</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="City" name="citys" id="citys" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="state" class="control-label">State</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="State" name="states" id="states" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="zipCode" class="control-label">Zip Code</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="Zip Code" name="zipCodes" id="zipCodes" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <label for="zipCode" class="control-label">Email</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" value="" placeholder="Email" name="emails" id="emails" onfocus="change1(this);">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" name="submit" id="submit-billing-info" onclick="return submitp1();">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
 </div>
 
    </div>

 
 	
    <div id="td7" style="display:none;"><h1>paypal form </h1></div>

 
 
 
 
                   
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
                            <li><a href="#" title="How We Differ">How We Differ</a></li>
                            <li><a href="#" title="Faq’s">FAQ’s</a></li>
                            <li><a href="#" title="Contact us">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h2>Help</h2>
                        <ul>
                            <li><a href="sitemap.html" title="Sitemap">Sitemap</a></li>
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
    <div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
			<div id="divChoices">
   <div class="modal-body">
   <p class="popup_content"><strong>Standard End User License Agreement (EULA)</strong></p>
        <p class="popup_content"><strong>PLEASE READ CAREFULLY BEFORE USING THIS PRODUCT: </strong>This End-User License Agreement ("EULA") is a legal agreement between (a) you (either an individual or a single entity) and (b) AuthEntry LLC ("AuthEntry") that governs your use of any Software Product, installed on or made available by AuthEntry.
</p>
<p class="popup_content"><strong>BY CLICKING "I AGREE", OR BY TAKING ANY STEP TO INSTALL OR USE THE SOFTWARE PRODUCT, YOU (1) REPRESENT THAT YOU ARE OF THE LEGAL AGE OF MAJORITY IN YOUR STATE, PROVINCE JURISDICTION OF RESIDENCE AND, IF APPLICABLE, YOU ARE DULY AUTHORIZED BY YOUR EMPLOYER TO ENTER INTO THIS CONTRACT AND (2) YOU AGREE TO BE BOUND BY THE TERMS OF THIS EULA. IF YOU DO NOT ACCEPT THE EULA TERMS, DO NOT USE THE SOFTWARE PRODUCT.
</strong></p>
<p class="popup_content"><strong>GRANT OF LICENSE.</strong> The Software Product includes two types of computer software (1) software that is owned by AuthEntry (and may include associated media, and "online" or electronic documentation) (collectively the "Software Product") and (2) other software provided by third parties and used with the Software Product ("Third Party Software"). AuthEntry grants you the following non-exclusive rights provided you agree to and comply with all terms and conditions of this EULA:
</p>
<p class="popup_content indent5"><strong>Use.</strong> You may use the Software Product on your computer (or computers if the Software Product is sold to you for use on multiple computers).. You may not use the Software Product on additional computers and do not have the right to distribute the Software Product. You agree to only use the Software Product as expressly permitted herein.
</p>
<p class="popup_content indent5"><strong>Reservation of Rights.</strong> The Software Product is licensed, not sold, to you by AuthEntry. AuthEntry and its suppliers own all right, title and interest in and to the Software Product and reserve all rights not expressly granted to you in this EULA. You agree to refrain from any action that would diminish such rights or would call them into question.
</p>
<p class="popup_content indent5"><strong>Third Party Software.</strong> Notwithstanding the terms and conditions of this EULA, all or any portion of the Software Product which constitutes Third Party Software, is licensed to you subject to the terms and conditions of the software license agreement accompanying such Third Party Software whether in the form of a discrete agreement, shrink wrap license or electronic license terms accepted at time of download. Use of the Third Party Software by you shall be governed entirely by the terms and conditions of such license.
</p>
<p class="popup_content indent5"><strong>Support.</strong> Technical support for the Software Product will be free for the first thirty (30) days after the activation date. Support will be available via e-mail or online chat during regular business hours EST. After 30 days, Technical Support may be offered by AuthEntry as a paid support service.
</p>
<p class="popup_content"><strong>UPGRADES.</strong> To use a Software Product identified by AuthEntry as an upgrade, you must first be licensed for the original Software Product identified by AuthEntry as eligible for the upgrade. After upgrading, you may no longer use the original Software Product that formed the basis for your upgrade eligibility and the upgraded software shall be deemed the "Software Product".
</p>
<p class="popup_content"><strong>ADDITIONAL SOFTWARE.</strong> This EULA applies to updates or supplements to the original Software Product provided by AuthEntry unless AuthEntry provides other terms along with the update or supplement. In case of a conflict between such terms, the other terms will prevail.
</p>
<p class="popup_content"><strong>TRANSFER.</strong></p>
<p class="popup_content indent5"><strong>Third Party.</strong> The Software Product may only be transferred to another end user as part of a transfer of the computer(s) on which it is installed. Any transfer must include all component parts, media, printed materials and this EULA. Prior to the transfer, the end user receiving the transferred product must agree to all the EULA terms. Upon transfer of your computer(s), your license is automatically terminated and you are no longer permitted to use the Software Product.
</p>
<p class="popup_content indent5"><strong>Restrictions.</strong> You may not rent, lease or lend the Software Product or use the Software Product for commercial timesharing or bureau use. You may not sublicense, assign or transfer the license or Software Product except as expressly provided in this EULA.
</p>
<p class="popup_content"><strong>PROPRIETARY RIGHTS.</strong> All intellectual property rights in the Software Product and user documentation are owned by AuthEntry or its suppliers and are protected by law, including but not limited to copyright, trade secret, and trademark law, as well as other applicable laws and international treaty provisions. The structure, organization and code of the Software Product are the valuable trade secrets and confidential information of AuthEntry and its suppliers. You shall not remove any product identification, copyright notices or proprietary restrictions from the Software Product.
</p>
<p class="popup_content"><strong>LIMITATION ON REVERSE ENGINEERING.</strong> Except to the extent that such restriction is not permitted under applicable law, you are not permitted (and you agree not to) reverse engineer, decompile, disassemble or create derivative works of or modify the Software Product. Nothing contained herein shall be construed, expressly or implicitly, as transferring any right, license or title to you other than those explicitly granted under this EULA. AuthEntry reserves all rights in its intellectual property rights not expressly agreed to herein. Unauthorized copying of the Software Product or failure to comply with the restrictions in this EULA (or other breach of the license herein) will result in automatic termination of this Agreement and you agree that it will constitute immediate, irreparable harm to AuthEntry for which monetary damages would be an inadequate remedy, and that injunctive relief will be an appropriate remedy for such breach.
</p>
<p class="popup_content"><strong>TERM.</strong> This EULA is effective unless terminated or rejected. This EULA will also terminate immediately and without additional notice in the event you breach this EULA and/or fail to comply with any term or condition of this EULA.
</p>
<p class="popup_content"><strong>CONSENT TO USE OF DATA.</strong> You agree that AuthEntry and its affiliates or suppliers may collect and use statistics on your use of the Software Product in performing backup operations and technical information you provide in relation to support services related to the Software Product. AuthEntry and its suppliers agree not to use this information in a form that personally identifies you except to the extent necessary to provide such services.
</p>
<p class="popup_content"><strong>DISCLAIMER OF WARRANTIES.</strong></p>
<p class="popup_content indent5">You acknowledge that the Software Product is for backup and redundancy only, and should not be used as a sole or primary source of storage. YOU AGREE THAT THE USE OF THE SOFTWARE PRODUCT IS AT YOUR SOLE RISK AS TO SATISFACTORY QUALITY PERFORMANCE, ACCURACY AND EFFORT. Use of the Software Product may adversely affect the operation of other software and devices. To the maximum extent permitted under applicable law, the Software Product is offered on an "AS-IS" basis and AuthEntry does NOT warrant that the functions contained in the Software Product will meet your requirements or that the operation of the Software Product will be uninterrupted or error free or that such errors will be corrected. Computer software is inherently subject to bugs and potential incompatibility with other computer software and hardware. You should not use the Software Product for any applications in which failure could cause any significant damage or injury to persons or tangible or intangible property.
</p>
<p class="popup_content indent5">EXCEPT AS MAY BE SET OUT IN A SPECIFIC WARRANTY ACCOMPANYING THE SOFTWARE PRODUCT, TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, AuthEntry AND ITS SUPPLIERS PROVIDE THE SOFTWARE PRODUCT AND THIRD PARTY SOFTWARE "AS IS" AND WITH ALL FAULTS AND WITHOUT ANY OTHER WARRANTY OF ANY KIND, AND HEREBY DISCLAIM ALL OTHER WARRANTIES AND CONDITIONS, EITHER EXPRESS, IMPLIED, OR STATUTORY, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF TITLE AND NON-INFRINGEMENT, ANY IMPLIED WARRANTIES, DUTIES OR CONDITIONS OF MERCHANTABILITY, OF FITNESS FOR A PARTICULAR PURPOSE, AND OF LACK OF VIRUSES ALL WITH REGARD TO THE SOFTWARE PRODUCT ANDTHIRD PARTY SOFTWARE. NO ORAL OR WRITTEN INFORMATION OR ADVICE GIVEN BY AuthEntry OR A AuthEntry AUTHORIZED REPRESENTATIVE SHALL CREATE A WARRANTY. Some states/jurisdictions do not allow exclusion of implied warranties or limitations on the duration of implied warranties, so the above disclaimer may not apply to you in its entirety. To the extent applicable law requires AuthEntry to provide warranties, you agree that the scope and duration of such warranty shall be to the minimum extent permitted under such applicable law.
</p>
<p class="popup_content indent5">IN NO EVENT DOES AuthEntry PROVIDE ANY WARRANTY OR REPRESENTATIONS WITH RESPECT TO ANY THIRD PARTY HARDWARE OR SOFTWARE WITH WHICH THE SOFTWARE PRODUCT IS DESIGNED TO BE USED, AND AuthEntry DISCLAIMS ALL LIABILITY WITH RESPECT TO ANY FAILURES THEREOF.
</p>
<p class="popup_content"><strong>LIMITATION OF LIABILITY.</strong> Notwithstanding any damages that you might incur, the entire liability of AuthEntry and any of its suppliers under any provision of this EULA and your exclusive remedy for all of the foregoing shall be limited to the amount actually paid by you for the Software Product. TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, IN NO EVENT SHALL AuthEntry OR ITS SUPPLIERS BE LIABLE FOR ANY SPECIAL, INCIDENTAL, INDIRECT, OR CONSEQUENTIAL DAMAGES WHATSOEVER (INCLUDING, BUT NOT LIMITED TO, DAMAGES FOR LOSS OF PROFITS, FOR LOSS OF DATA OR OTHER INFORMATION, FOR BUSINESS INTERRUPTION, FOR PERSONAL INJURY, FOR LOSS OF PRIVACY ARISING OUT OF OR IN ANY WAY RELATED TO THE USE OF OR INABILITY TO USE THE SOFTWARE PRODUCT, THIRD PARTY SOFTWARE AND/OR THIRD PARTY HARDWARE USED WITH THE SOFTWARE PRODUCT, OR OTHERWISE IN CONNECTION WITH ANY PROVISION OF THIS EULA), EVEN IF AuthEntry OR ANY SUPPLIER HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES AND EVEN IF THE REMEDY FAILS OF ITS ESSENTIAL PURPOSE. Some states/jurisdictions do not allow the exclusion or limitation of incidental or consequential damages, so the above limitation or exclusion may not apply to you.
</p>
<p class="popup_content"><strong>INDEMNITY.</strong> You agree to indemnify and hold AuthEntry and its officers, directors, employees and licensors harmless from any claim or demand (including but not limited to reasonable legal fees) made by a third party due to or arising out of or related to your violation of the terms and conditions of this Agreement, your violation of any laws, regulations or third party rights or your negligent act, omission or willful misconduct.
</p>
<p class="popup_content"><strong>U.S. GOVERNMENT CUSTOMERS.</strong> The Software Product is a "Commercial Item" as that term is defined in 48 C.F.R. 12.212 or 48 C.F.R. 227.7202, as applicable. Consistent with 48 C.F.R. 12.212 or 48 C.F.R. 227.7202, as applicable, Commercial Computer Software and Commercial Computer Software Documentation are licensed to the U.S. Government users (i) only as Commercial Items and (2) only with those rights granted to other users under this EULA. Unpublished rights are reserved under the copyrights of the United States.
</p>
<p class="popup_content"><strong>COMPLIANCE WITH LAWS.</strong> You shall comply with all laws and regulations of the United States and other countries ("Export Laws") to ensure that the Software Product is not (1) exported, directly or indirectly, in violation of Export Laws, or (2) used for any purpose prohibited by Export Laws, including, without limitation, nuclear, chemical, or biological weapons proliferation. You further agree that you will not use the Software Product for any purpose prohibited under applicable law.
</p>
<p class="popup_content"><strong>APPLICABLE LAW.</strong> This EULA is governed by the laws of the Province of Ontario exclusive of conflict of law provisions and you attorn to the jurisdiction of the courts of the province of Ontario with respect to any proceedings arising from this EULA. The parties hereby agree that this Agreement is not governed by the United Nations Convention on Contracts for the International Sale of Goods.
</p>
<p class="popup_content"><strong>ENTIRE AGREEMENT.</strong> This EULA is the entire agreement between you and AuthEntry relating to the Software Product and it supersedes all prior or contemporaneous oral or written communications, proposals and representations with respect to the Software Product or any other subject matter covered by this EULA. To the extent the terms of any AuthEntry policies or programs for support services conflict with the terms of this EULA, the terms of this EULA shall control. In the event of a conflict between the English and any non-English versions of this EULA, the English version shall govern. If any provision of this EULA is held by a court of competent jurisdiction to be contrary to law, such provision will be changed and interpreted so as to best accomplish the objectives of the original provision to the fullest extent allowed by law and the remaining provision of the EULA will remain in force and effect. Sections 5, 6, 9, 10, 11, 14 and 15 shall survive termination of this EULA.
</p>
<p class="popup_content">&copy; 2014 AuthEntry LLC. The only warranties for AuthEntry Software Products and services are set forth in the express warranty statements accompanying such products and services. Nothing herein should be construed as constituting an additional warranty. AuthEntry shall not be liable for technical or editorial errors or omissions contained herein. Rev. 7/14
</p>    
    </div>
    <div class="modal-footer">
        <button class="btn" id="decline-agreement" onclick="acc_rej('no');">Decline</button>
        <button class="btn btn-primary" id="accepted-agreement" onclick="acc_rej('yes')">Accepted and Agreed</button>
    </div>
</div>
			</div>
		</div>
    </div>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/general.js"></script>
</body>
</html>
