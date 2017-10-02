<?php  session_start();  
  if(isset($_POST['hidCheck']))
    {
    	 require_once('connect.php'); // sql database connection file.
		 $user1=$_POST['name1']; // stores username textbox value into variable
		 $pass1=md5($_POST['pass']); // stores password textbox value into variable
		 $passm=$pass1; // converting password to md5 format, encryption
			$sql="SELECT * FROM loginmaster WHERE user_name='$user1' && password='$passm'";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$count=mysql_num_rows($result);
			if($count==1)
				{   
					$_SESSION['id']=$id1=$row['admin_id'];
					//$_SESSION['type']=$row['admin_type'];
					$_SESSION['fname']=$row['first_name'];
					$_SESSION['lname']=$row['last_name'];
					//$_SESSION['status']=$row['status'];
					
					$red=0;
				}
		     else
			    {  $cap_error="Enter Valid Username Or Password";
				   $my_date = date("Y-m-d H:i:s");
					//echo "Current Date".$my_date;
			    }
			 if(isset($red))
			     {	     
					 date_default_timezone_set('Asia/Calcutta');
				     $my_date = date("Y-m-d H:i:s");
					//echo "Current Date".$my_date;
			        //$sql1= "INSERT INTO loginmaster (last_loggin) VALUES ('$my_date')";
					 $sql1="UPDATE `loginmaster` SET `last_loggin`='$my_date' WHERE `admin_id` =$id1";
					 mysql_query($sql1);
				 }	 
   }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>GatekeeperPro Administration</title>
		<!--                       CSS                       -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
<script language="javascript" type="text/javascript">
    function chk_frm()
    {
	if(document.form1.name1.value=="")
	{
		alert("Please Enter Username.");
		document.form1.name1.focus();
		return false;
	}
	
	if(document.form1.pass.value=="")
	{
		alert("Please Enter Password");
		document.form1.pass.focus();
		return false;
	}
	
	if(document.form1.captcha1.value=="")
	{
		alert("Please Enter Captcha");
		document.form1.captcha1.focus();
		return false;
	}
	
	if(document.form1.captcha1.value!=document.form1.captcha.value)
	{
		alert("Please Enter Valid Captcha");
		document.form1.captcha1.focus();
		return false;
	}
    
	document.form1.hidCheck.value = "Yes";
	document.form1.action="index.php";
	document.form1.submit();
	return true;
}
</script>
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
</head>
	<body id="login">
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>GatekeeperPro Administration</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="resources/images/logo.png" alt="Event Management System" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
                 <form method="post" name="form1" action=""  onSubmit= "return chk_frm()">
                 <input type="hidden" name="hidCheck" value = ""/ >
				      <?php if( (isset($cap_error)) ) { ?>
                         <p align="center" style="font-size:16px; color:#336600"><b><?php echo $cap_error; ?> </b></p><br />  <div class="clear"></div>  
					  <?php } ?>
                      <?php if( (isset($_REQUEST['p'])) ) { ?>
                         <p align="center" style="font-size:16px; color:#336600"><b>Password Changed Successfully. Please Loggin Again. </b></p><br />  <div class="clear"></div>  
					  <?php } ?>
					<p>
                    	<label>Username</label>
                        <input class="text-input" name="name1" type="text"  />
                    </p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" name="pass" type="password" />
					</p>
                    <div class="clear"></div>
                    <p>
						<label>Captcha </label>
					 <input class="text-input" style="width:40px; float:left; margin-left:20px;" name="captcha" type="text"  value="<?php $digit=4; $val=rand(pow(10,$digit-1),pow(10,$digit)-1); echo $val;?>" disabled="disabled" />
					 <input class="text-input" style="width:140px; float:right;"name="captcha1" type="text"   />
                    </p>
					<div class="clear"></div>
					<div class="clear"></div>
					<p>
						<input class="button" name="btn_submit" type="submit" value="Sign In" onClick="return chk_frm()" />
					</p>
				</form>
			</div>
		</div>
  </body>
  <?php if( (isset($red)) ) {
  ?>
  <script>
        window.location="order.php";
  </script>
  <?php }?>
</html>
