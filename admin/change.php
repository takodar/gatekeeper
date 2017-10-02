<?php  include('sessioncheck.php');
       include('connect.php');
	   
 if(isset($_POST['hidCheck']) == "Yes")
 {
  $admin_id=$_SESSION['id'];
  $result = mysql_query("SELECT password FROM loginmaster WHERE admin_id='$admin_id'");
  //$result = mysql_query($result11);
        if(mysql_num_rows($result)>0)
        {
            while($row=mysql_fetch_row($result))
            {
                    $txtoldpass=md5($_POST['txtoldpass']);
					$txtpass=md5($_POST['txtpass']);
					if($txtoldpass == $row['0'])
                    {
					    $sSql = "UPDATE loginmaster SET password = '".$txtpass."' WHERE admin_id='$admin_id'";
                        mysql_query($sSql);
                        $str = "Password Changed Successfully.";
                    }
                    else
                    {
                        $str = "Invalid Current Password.";
                    }
            }
        }
        else
        {
                $str = "Invalid UserName";
        }
        mysql_free_result($result);
        mysql_close();
 } 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>GatekeeperPro Administration</title>
		<!--                       CSS                       -->
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		<!-- Colour Schemes
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		<!-- Internet Explorer .png-fix -->
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
 <script type="text/javascript">
    function chk_frm1()
	{
    var chkValid;
	if (document.frmChangepasswd.txtoldpass.value=="")
    {
        alert("Insert Current Password");
        document.frmChangepasswd.txtoldpass.focus();
        return (false);
    }
    if (document.frmChangepasswd.txtpass.value=="")
    {
        alert("Insert New Password");
        document.frmChangepasswd.txtpass.focus();
        return (false);
    }
    if (document.frmChangepasswd.txtpass.value!="")
    {
		chkValid = trim(document.frmChangepasswd.txtpass.value);
		if(chkValid.length<8){
			alert("Password Must be Atleast 8 Character Long.");
			document.frmChangepasswd.txtpass.value = "";
			document.frmChangepasswd.txtconfpass.value = "";
			document.frmChangepasswd.txtpass.focus();
			return false;
		}
    }
    if (document.frmChangepasswd.txtconfpass.value=="")
    {
        alert("Insert Confirm New Password");
        document.frmChangepasswd.txtconfpass.focus();
        return (false);
    }
    if (trim(document.frmChangepasswd.txtconfpass.value)!=trim(document.frmChangepasswd.txtpass.value))
    {
        alert("Confirm New Password Should be same as New Password");
        document.frmChangepasswd.txtconfpass.value="";
        document.frmChangepasswd.txtconfpass.focus();
        return (false);
    }
	if(trim(document.frmChangepasswd.txtoldpass.value) == trim(document.frmChangepasswd.txtconfpass.value)){
		alert("New Password is Not Similar To Old Password");
        document.frmChangepasswd.txtpass.value="";
        document.frmChangepasswd.txtconfpass.value="";
        document.frmChangepasswd.txtpass.focus();
		return false;
	}
	  re = /[0-9]/; 
			  if(!re.test(frmChangepasswd.txtpass.value)) 
			   { 
			     alert("Error: password must contain at least one number (0-9)!"); 
				 frmChangepasswd.txtpass.focus(); 
				 return false; 
			   } 
			   re = /[a-z]/; if(!re.test(frmChangepasswd.txtpass.value)) 
			   { 
			     alert("Error: password must contain at least one lowercase letter (a-z)!"); 
				 frmChangepasswd.txtpass.focus(); 
				 return false; 
			   } 
			   re = /[A-Z]/; if(!re.test(frmChangepasswd.txtpass.value)) 
			   { 
			     alert("Error: password must contain at least one uppercase letter (A-Z)!"); 
				 frmChangepasswd.txtpass.focus(); 
				 return false; 
			   } 
	document.frmChangepasswd.hidCheck.value="Yes"; 
	return (true);
  }
	function trim(s) {
		 while (s.substring(0,1) == ' ') {
		    s = s.substring(1,s.length);
		 }
		 while (s.substring(s.length-1,s.length) == ' ') {
		    s = s.substring(0,s.length-1);
		 }
		 return s;
	}
	
	function setFocus(){
		document.frmChangepasswd.txtoldpass.focus();
	}

</script>
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<?php include("sidecontrol.php"); ?> 
		<div id="main-content"> <!-- Main Content Section with everything -->
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
		<!--	<h2>Welcome <?php //echo $na1 ; ?> </h2>-->
			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Change Password</h3>
                    </div>
<div align="center" >
  <?php if (isset($str)) { if($str =="Password Changed Successfully.")
  {  session_destroy(); ?>
                        <script type="text/javascript">
			   window.location="index.php?p=cp";
				</script><?php }
				
				}?>
 <form name="frmChangepasswd" method="post" action="" onSubmit="return chk_frm1()">
                 <input type="hidden" name="hidCheck" value= ""/ >
<table>
<?php if((isset($str))&&($str =="Invalid Current Password.")){echo $str; } ?>
<tr>
<!--<td><label>UserName :</label></td>
<td><input type="text" name="username"/><br /></td>
--></tr>
<tr>
<td><label>Current Password :</label></td>
<td> <input name="txtoldpass" type="password" class="txt_field" id="txtoldpass4"/></td>
</tr>
<tr>
<td><label>New Password :</label></td>
<td><input name="txtpass" type="password" class="txt_field" id="txtpass"/><br/></td>
</tr>
<tr>
<td><label>Confirm New Password :</label></td>
<td><input name="txtconfpass" type="password" class="txt_field" id="txtconfpass" /><br/></td>
</tr>
<td></td>
<td><input name="Submit" type="submit" class="button" id="Submit" value="Submit"  onclick="return chk_frm1()"/></td>
<td> </td>
</tr>
<tr><td><?php //echo $getemail; ?> </td>
<td> </td></tr>
</table>
</form>
</div>

					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
				
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			</div>
            
			
			
			
		</div> <!-- End #main-content -->
     
	</div></body>
  
</html>
