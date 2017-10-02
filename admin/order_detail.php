<?php  include('sessioncheck.php');
       include('connect.php');
	   
if(isset($_POST['submit1']))
{
 if(($_REQUEST['do'])== "edit")
  {
      $process=$_REQUEST['dpcon'];
	  $id=$_REQUEST['id'];
	   
     $in="UPDATE order_master SET process=$process WHERE order_id=$id";
    $result3=mysql_query($in);
    echo $result3;
			if(!$result3)
			{	die("Error".mysql_error());  }
			else
			 {  $msg10= "Process Updated successfully."; }
	}	
}

 if(isset($_REQUEST['id']))
 {
 $id=$_REQUEST['id'];
 $result = mysql_query("SELECT * FROM order_master WHERE order_id='$id'");
 $rows=mysql_fetch_array($result);
 }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Purchase System</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
        <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        
       
        <style type="text/css">
           .adHeadline {font: bold 10pt Arial; text-decoration: underline; color: #003366;}
           .adText {font: normal 10pt Arial; text-decoration: none; color: #000000;}
        </style>
        <script>
		 function  chk_frm()
		  {  
		   if(document.f1.contitle.value=="")
		     { alert("Enter Coupon Code Name"); document.f1.contitle.focus(); return false;}
		   if(document.f1.sdate.value=="")
		     { alert("Enter Starting Date"); document.f1.sdate.focus(); return false;}
		   if(document.f1.edate.value=="")
		     { alert("Enter Ending Date"); document.f1.edate.focus(); return false;}
		     var x = new Date(document.f1.sdate.value);
             var today = new Date(document.f1.edate.value);
             if (x > today) {
               alert("End date must be greater then start date");
               document.f1.edate.focus();
               return false;
             } 
              if(document.f1.lasttitle.value=="")
		     { alert("Enter Coupon Value"); document.f1.lasttitle.focus(); return false;}
		      if(isNaN(document.f1.lasttitle.value))
		     { alert("Enter Numeric Value"); document.f1.lasttitle.focus(); return false;}
		   return true;	 
		  }
		</script>
         
       
        <script type="text/javascript">
         function conform()
         {
           var retVal = confirm(" Are you sure you want to delete this Image");
           if( retVal == true )
		     { return true; }
		  else
		     { return false; }
         }
        </script> 
        <!-- for date  -->
        <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>
        $(document).ready(
             /* This is the function that will get executed after the DOM is fully loaded */
          function () {
            $( "#datepicker" ).datepicker({
            changeMonth: true,//this option for allowing user to select month
            changeYear: true //this option for allowing user to select from year range
            });
            $( "#datepicker1" ).datepicker({
            changeMonth: true,//this option for allowing user to select month
            changeYear: true //this option for allowing user to select from year range
            });
          }
          
        );
        </script>
</head>


<body><div id="body-wrapper">
			<?php include("sidecontrol.php"); ?>		
		<div id="main-content">			
			<noscript> 
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			<div class="clear"></div>
			<div class="content-box">
			<div class="content-box-header">
			<h3 style="width:97%">Order Detail Information<span style="float:right"> <font size="-4">Welcome </font><?php $na1=$_SESSION['fname']." ".$_SESSION['lname'];  echo strtoupper($na1) ; ?>, You logged as ADMIN</span></h3>
                <div class="clear"></div>
				</div> 
<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
			   <table>
               		<tr>
                    		<td width="50%"><?php if(isset($msg1)) { ?>
                	 <div id="up" style=" height:30px;" class='notification success png_bg'><div id="up1" style="padding: 0px;"><strong> <p  id="up2" style="float:left; margin-left:30px;"> <?php echo $msg1; ?></p></strong></div>
                 <?php } ?>
                 
<form action="order_detail.php?do=<?php echo $_REQUEST['do'];?>&id=<?php echo $_REQUEST['id'];?>" method="post"  name="f1" onsubmit="return chk_frm();" id="f1" >
		<h3 style="padding:0px;">Order Information</h3>
        <table>
        	<tr>
            	<td>Order No</td>
                <td width="80%"><?php $order_id=$rows['order_id']; echo $rows['order_id'];?></td>
           </tr>
           <tr>
           	    <td>Product</td> 
           	    <td><?php if ($rows['prod_id']==1) { echo "Gatekeeper Pro"; } else { echo "Logikey"; }?></td>
           </tr>
          <?php if($rows['prod_subscription']!=0) { ?>
           <tr>
           	    <td>Subscription</td> 
           	    <td><?php echo $rows['prod_subscription'];?> Year</td>
           </tr>
           <?php } else { ?>
            <tr>
           	    <td>Shipping Charge</td> 
           	    <td><?php echo "$".$rows['shipping_charge'];?></td>
           </tr>
           <?php } ?>
           <tr>
           	    <td>Price</td> 
           	    <td><?php echo "$".$rows['prod_price'];?></td>
           </tr>
            <?php if($rows['coupon_id']!=0) { $id2=$rows['coupon_id'];
			$result1 = mysql_query("SELECT * FROM coupon_master WHERE coupon_code_id=$id2");
            $rows1=mysql_fetch_array($result1); ?>
           <tr>
           	    <td>Coupon Code</td> 
           	    <td><?php echo $rows1['coupon_code_name'];?> </td>
           </tr>
            <tr>
           	    <td>Discount Type</td> 
           	    <td><?php if($rows1['type']==0) {echo "$";} ?><?php echo $rows1['value'];?><?php if($rows1['type']==1) {echo "%";} ?> </td>
           </tr>
           <tr>
           	    <td>Discount</td> 
           	    <td><?php echo "$".$rows['deduction'];?></td>
           </tr>
           <?php } ?>
           <tr>
           	    <td>Total</td> 
           	    <td><?php echo "$".$rows['total'];?></td>
           </tr>
           <tr>
           	    <td>Date</td> 
           	    <td><?php $dt=$rows['order_date'];echo date( "m/d/Y", strtotime( "$dt" ) );?></td>
           </tr>
            <?php if($rows['prod_subscription']==0) { ?>
          <?php if(isset($msg10)) {?>
          <tr><th colspan="2"><b><?php echo $msg10; ?></b></th></tr>
         <?php } ?>
           <tr>
           	    <td>Process</td> 
           	 <td><form action="order_detail.php?do=<?php echo $_REQUEST['do'];?>&id=<?php echo $_REQUEST['id'];?>" method="post"  name="f2"  id="f2" >
                     <select name="dpcon" id="dpcon">
                      <option value="0">Unproccessed</option>
					 <option value="1" <?php  if(1==$rows['process']) {echo "selected='selected'"; } ?>>On Way</option>
		              <option value="2" <?php  if(2==$rows['process']) {echo "selected='selected'"; } ?>>Delivered</option>  
                   </select> <input type="submit" name="submit1" value="Update" onclick="return update();"/> </form> </td>
           </tr>
           <?php } ?>
                     
           </table>
           
           
           
           
           
           </td>

<td> <h3> Billing Address </h3>
     <table>
            <?php $result2 = mysql_query("SELECT * FROM coustomer_master WHERE order_id=$order_id");
            $rows2=mysql_fetch_array($result2); ?>
        	<tr>
            	<td>Name</td>
                <td width="80%"><?php echo $rows2['f_name']."".$rows2['l_name'];?></td>
            </tr>
            <tr>
           	    <td>Email</td> 
           	    <td><?php echo $rows2['email_id'];?></td>
            </tr>
            <tr>
           	    <td>Address</td> 
           	    <td><?php echo $rows2['address'];?> Year</td>
            </tr>
            <tr>
           	    <td>City</td> 
           	    <td><?php echo $rows2['city'];?></td>
            </tr>
            <tr>
           	    <td>State</td> 
           	    <td><?php echo $rows2['state'];?></td>
            </tr>
            <tr>
           	    <td>Pincode</td> 
           	    <td><?php echo $rows2['pincode'];?> </td>
           </tr>
           <?php if($rows['prod_subscription']==0) { 
		    $result3 = mysql_query("SELECT * FROM shipping_master WHERE order_id=$order_id");
            $rows3=mysql_fetch_array($result3);?>          
           <tr><th colspan="2"><b>Shipping Address</b></th></tr>
           <tr>
            	<td>Name</td>
                <td width="80%"><?php echo $rows3['f_name']."".$rows3['l_name'];?></td>
            </tr>
            <tr>
           	    <td>Email</td> 
           	    <td><?php echo $rows3['email_id'];?></td>
            </tr>
            <tr>
           	    <td>Address</td> 
           	    <td><?php echo $rows3['address'];?> Year</td>
            </tr>
            <tr>
           	    <td>City</td> 
           	    <td><?php echo $rows3['city'];?></td>
            </tr>
            <tr>
           	    <td>State</td> 
           	    <td><?php echo $rows3['state'];?></td>
            </tr>
            <tr>
           	    <td>Pincode</td> 
           	    <td><?php echo $rows3['pincode'];?> </td>
           </tr>
		   <?php } ?>
           </table>






</td>
                    
                    </tr>
                        </table>
               		
</div></div></div>
</div>
</div>
</body>

</html>
