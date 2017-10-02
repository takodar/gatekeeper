<?php
	ob_start();
	@session_start();
	if (!isset($_SESSION['cart'])) $_SESSION['cart']=array();
	$_SESSION['curr']='$';

/*############ SITE DETAILS ############*/

	$sitename = 'Full Admin';			
	$siteurl  = 'http://localhost/full-admin';		

/*############ MYSQL CONFIGURATION ############*/
	
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	
	$data = 'full_admin';

	$db = mysql_connect($host,$user,$pass) or die("Could Not Connect: ".mysql_error());
	mysql_select_db($data);

	$Thisurl = $_SERVER['PHP_SELF'];
	if ($_SERVER['QUERY_STRING'] != '') $Thisurl .= '?'.$_SERVER['QUERY_STRING'];

/*##################### THIS IS FOR THE NO OF ENTRIES TO BE DISPLAYED IN EACH PAGE ###########################*/

	$noofpage = 20;

//#################### FOR REDIRECTING PAGE ON CLICK ###########################
	
	
	
	function pageRedirectFront($page){
				
		if($_SERVER[HTTP_HOST]=='localhost' || $_SERVER[HTTP_HOST]=='ww3.vitualvox.com'  )
		{
			header("Location: http://$_SERVER[HTTP_HOST]/shivalik/$page");
			die();
		}
		else
		{
			header("Location: http://$_SERVER[HTTP_HOST]/$page");
			die();
		}
		//echo "<script language=javascript>";
		//echo "location.replace('http://voxweb/shivalik/admin/$page')";
		//echo "< /script>";
	}
	function pageRedirect($page){
				
		if($_SERVER[HTTP_HOST]=='localhost' || $_SERVER[HTTP_HOST]=='ww3.virtualvox.com'  )
		{
			header("Location: http://$_SERVER[HTTP_HOST]/shivalik/admin/$page");
			die();
		}
		else
		{
			header("Location: http://$_SERVER[HTTP_HOST]/admin/$page");
			die();
		}
		//echo "<script language=javascript>";
		//echo "location.replace('http://voxweb/shivalik/admin/$page')";
		//echo "< /script>";
	}
	

	function getOrdId($fld,$tbl,$prefix){
		$fsSql = "select $fld from ".$tbl." order by $fld desc limit 0,1";
		$fres  = mysql_query($fsSql);
		if (mysql_num_rows($fres)>0) {
			$frow = mysql_fetch_row($fres);
			$fid = $frow[0] + 1;
		} else
			$fid = 1;
		if($fid<=9) $fid = "0".$fid;
		$fcode = $prefix.date('Ymd').$fid;
		@mysql_free_result($fres);
		return $fcode;
	}

	//Function to send mail
	function send_usrmail($from,$to,$subj,$msg,$cc,$bcc)
	{
		$message = $msg;
		$headers = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "From: $from\r\n";
		$headers .= "Cc: $cc\r\n";
		$headers .= "Bcc: $bcc\r\n";
		$headers .= "X-Mailer: PHP/".phpversion();
		return (mail($to,$subj,$message,$headers));
	}

	//pagination params
	/*if (strpos($Thisurl,'newsletteradmin'))
	{
		include("../../include/PaginateIt.php");
	}
	else
	{	
		if (!strpos($Thisurl,'admin'))
			include("include/PaginateIt.php");
		else
			include("../include/PaginateIt.php");
	}
	$PaginateIt->SetItemsPerPage(6);  //display entries per page
	$PaginateIt->SetLinksToDisplay(5); //display page links per page
	$PaginateIt->SetLinksFormat( '<< Back', ' | ', 'Next >>' ); //page links format*/
?>