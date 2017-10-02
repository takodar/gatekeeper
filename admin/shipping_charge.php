<?php  include('sessioncheck.php');
       include('connect.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>GatekeeperPro Administration</title>
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
        <script type="text/javascript">
		     
         function  chk_sname()
		    {
			  if(document.st.sname.value=="")
			   {
			    alert("Enter Shipping Amount");
				document.st.sname.focus();
				return false; 
			   }
			   if(isNaN(document.st.sname.value))
			   {
			    alert("Enter Numeric Amount");
				document.st.sname.focus();
				return false; 
			   }
			   return true;
			}
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
                 <h3 style="width:97%">Shipping Information<span style="float:right"> <font size="-4">Welcome </font><?php $na1=$_SESSION['fname']." ".$_SESSION['lname'];  echo strtoupper($na1) ; ?>, You logged as ADMIN</span></h3>
                 <div class="clear"></div>
              </div>
		    <div class="content-box-content">
              <div class="tab-content default-tab" id="tab1">
                 <?php if(isset($_POST['submit']))
				     {
					     $sname1=$_REQUEST['sname'];
						   $sql1="UPDATE shipping_charge SET `charge`=$sname1 WHERE `s_id`=1";
					       $result1=mysql_query($sql1);
						   echo "<div class='notification success png_bg'><div><strong>Shipping Charge Updated Successfully.</strong></div></div>
						   <p><b></b></p>";
					 }
					 ?>
		<br/><br/><br/><br/>			 
		
        <?php $sql="SELECT * FROM shipping_charge WHERE s_id=1";
		$result=mysql_query($sql);
		//$row=mysql_fetch_array($result);
		$count=mysql_num_rows($result);
	     $rows = mysql_fetch_array($result);
		// print_r($rows);
		//echo $rows['charge'];	?>		
         <h4>Current Shipping RATE is <b>$</b><i><?php echo $rows['charge'];?></i> </h4>      
            <br/><br/>	   
                <form id="st" name="st" action="shipping_charge.php" onsubmit="return chk_sname();" method="post">
                  <h4>Enter New Shipping RATE</h4> <br/> 
                 <b>$</b><input type="text" name="sname" id="sname1" /> <input class="button" type="submit" name="submit" value="Submit" onclick="return chk_sname();" />
                </form> 
                <br/><br/><br/><br/><br/>
                
                
              </div> 
		      <div class="tab-content" id="tab2">
		      </div>					
		  </div>
		</div> 
	  </div>
	  <div class="clear"></div>
	</div>
	</div>
    </div></body>
  </html>
