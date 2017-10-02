<?php  include('sessioncheck.php');
       include('connect.php');
	   
if(isset($_POST['FormSubmit']))
{
 if(($_REQUEST['do'])== "add")
  {
      $code_name=$_REQUEST['contitle'];
	  $sdate=$_POST['sdate'];
	  $edate=$_POST['edate'];
	  $type=$_POST['rad'];
	  $value=$_POST['lasttitle'];
      
	  
     $in="INSERT INTO coupon_master (coupon_code_name, start_date, end_date, type, value) VALUES ('$code_name', '$sdate', '$edate', $type,$value)";
    $result3=mysql_query($in);
    echo $result3;
			if(!$result3)
			{	die("Error".mysql_error());  }
			else
			 {  $msg1= "Record inserted successfully"; }
	}	
	elseif(($_REQUEST['do'])=="edit")
	{
	  $conid=$_REQUEST['id'];
	  $code_name=$_REQUEST['contitle'];
	  $sdate=$_POST['sdate'];
	  $edate=$_POST['edate'];
	  $type=$_POST['rad'];
	  $value=$_POST['lasttitle'];
	  
	
     $in="UPDATE coupon_master SET coupon_code_name='$code_name', start_date='$sdate', end_date='$edate',type=$type, value=$value WHERE coupon_code_id='$conid'";
     $result3=mysql_query($in);
     //echo $result3;
		if(!$result3)
			{	die("Error".mysql_error());		}
		else
			 {  $msg1= "Record updated successfully";	 }
		}
 
}
 $do = $_REQUEST['do'];
 if(isset($_REQUEST['id']))
 {
 $id=$_REQUEST['id'];
 $result = mysql_query("SELECT * FROM coupon_master WHERE coupon_code_id='$id'");
 $rows=mysql_fetch_array($result);
 }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GatekeeperPro Administration</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
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
			<h3 style="width:97%">Add/Edit Coupon<span style="float:right"> <font size="-4">Welcome </font><?php $na1=$_SESSION['fname']." ".$_SESSION['lname'];  echo strtoupper($na1) ; ?>, You logged as ADMIN</span></h3>
                <div class="clear"></div>
				</div> 
				<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
			
                <div align="center">
                 <?php if(isset($msg1)) { ?>
                 <div id="up" style=" height:30px;" class='notification success png_bg'><div id="up1" style="padding: 0px;"><strong> <p  id="up2" style="float:left; margin-left:30px;"> <?php echo $msg1; ?></p></strong></div></div>
                 <?php } ?>
<form action="coupon_add_edit.php?do=<?php echo $_REQUEST['do'];?><?php if(($_REQUEST['do'])!="add"){?>&id=<?php echo $_REQUEST['id'];}?>" method="post"  name="f1" onsubmit="return chk_frm();" id="f1" >
		<table>
        	<tr>
            	<td>Coupon Code Name</td>
                <td width="80%"><input type="text" name="contitle" id="contitle1" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['coupon_code_name'];?>" <?php }?>/></td>
           </tr>
           <tr>
           	    <td>Start Date</td> 
           	    <td><input type="text" id="datepicker" name="sdate" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['start_date'];?>" <?php }?>/></td>
           </tr>
           <tr>
           	    <td>End Date</td> 
           	    <td><input type="text" id="datepicker1" name="edate" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['end_date'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Type</td>
                <td width="80%"><input type="radio" name="rad" id="rad1" value="1"<?php  if(($_REQUEST['do'])!="add"){?>  <?php if (($rows['type'])==1) { echo 'checked=checked'; }?> <?php } else { echo 'checked=checked'; } ?>/>Percentage
                <input type="radio" name="rad" id="rad1" value="0"<?php  if(($_REQUEST['do'])!="add"){?>  <?php if (($rows['type'])==0) { echo 'checked=checked'; }?> <?php }?>/>Amount
                </td>
           </tr>
           <tr>
            	<td>Value</td>
                <td width="80%"><input type="text" name="lasttitle" id="lasttitle1" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['value'];?>" <?php }?>/></td>
           </tr>
         
           	    
           <tr><td><a href="coupon.php" class="button">Back</a><input type="submit" value="Insert" id="FormSubmit" style="background: #EFEFEF;margin-left:20px;" name="FormSubmit" class="button" onclick="return chk_frm();"/></td></tr>
        </table>
</form>

</div></div>
</body>

</html>
