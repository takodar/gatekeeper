<?php  include('sessioncheck.php');
       include('connect.php');

  if(isset($_REQUEST['id']))
   {  include('connect.php');
      $id1=$_REQUEST['id'];
      $que1="DELETE FROM coupon_master WHERE coupon_code_id='$id1';";
	  $result1 = mysql_query("$que1");
	 
	 $delete1= "Record Deleted";
	 //echo $delete1;
	 
   }

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		       function lout(){
			   window.location="index.php/?l=true";}
				</script>
                <script type="text/javascript">
         function conform()
         {
          var retVal = confirm("Are you sure you want to delete this Record?");
          if( retVal == true ){
             return true;
         }else{
            return false;
         }
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
			
		<!--	<h2>Welcome <?php //echo $na1 ; ?> </h2>-->
        <div class="clear"></div>
        <div class="content-box">		
				<div class="content-box-header">
                	<h3 style="width:97%">Coupon Master Infomation<span style="float:right"> <font size="-4">Welcome </font><?php $na1=$_SESSION['fname']." ".$_SESSION['lname'];  echo strtoupper($na1) ; ?>, You logged as ADMIN</span></h3>
                    <div class="clear"></div>
                    </div>
				<div class="content-box-content">
                <div class="tab-content default-tab" id="tab1">
<?php 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$var=0;
include("connect.php");
$result = mysql_query("SELECT * FROM  coupon_master ORDER BY coupon_code_id DESC");
if(mysql_num_rows($result)  > 0)
{ 
 $var =1;
}
$rows=mysql_num_rows($result);
$per_page=10;

$total_pages=ceil($rows/$per_page);
//echo "$total_pages"."dn";
//echo "<font color='black'>you are on page $page of $total_pages <br> </font>";

$x = ($page-1) * $per_page; 
$sql = "SELECT coupon_code_id, coupon_code_name,start_date,end_date, CASE
WHEN (type = 1) THEN 'Percentage'
ELSE 'Amount'
END as type , value FROM coupon_master  ORDER BY coupon_code_id DESC LIMIT $x, $per_page"; 
$rs_result = mysql_query ($sql, $conn); 
?> 
			
     <a href="coupon_add_edit.php?do=add" name="up" class="button" >Insert New Coupon</a>
  <?php if($var != 1) { echo "<br /><br /><strong>No record to display.</strong>"; }else { ?>
                                <table width="400" border="1" cellspacing="1" cellpadding="0">
								<?php if(isset($_REQUEST['id'])) {echo "<br/><br/><br/><div class='notification success png_bg'><div><strong>Record Deleted Successfully.</strong></div></div>"; } ?>
                              
                        <thead>
<tr>
                    <th align="center"><strong>Coupon Code Name</strong></th>
					<th align="center"><strong>Start Date</strong></th>
					<th align="center"><strong>End Date</strong></th>
                    <th align="center"><strong>Type</strong></th>
				 	<th align="center"><strong>Value</strong></th>
				 	<th align="center"><strong>Edit</strong></th>
				 	<th align="center"><strong>Delete</strong></th>
                                        
</tr>
</thead>
<?php

					while($rows = mysql_fetch_array($rs_result))
					{?>
						<tr>
							<td><?php echo $rows['coupon_code_name']; ?></td>
							<td><?php echo $rows['start_date']; ?></td>
							<td><?php echo $rows['end_date']; ?></td>
                            <td><?php echo $rows['type']; ?></td>
							<td><?php echo $rows['value']; ?></td>			
							<td align="center"><a href="coupon_add_edit.php?do=edit&id=<?php echo $rows['coupon_code_id']; ?>" name="up" class="button" >Edit</a></td> <td align="center"><a href="coupon.php?id=<?php echo $rows['coupon_code_id']; ?>&page=<?php if(isset($_REQUEST['page'])){echo $_REQUEST['page'];}else echo 1;?>"class="button" style="padding-left:0px;" onClick="return conform();">Delete</a></td>

						</tr>

							<?php }
                                
                                  mysql_close($conn);?> 
                <br /><br /><br />
               <?php if(isset($_REQUEST['c']))
			{
			echo "<div class='notification success png_bg'><div><strong>Record Update Successfully.</strong></div></div>"; 
			} ?>
                                  </table>
                                  
                                    <div class="pagination">
											<?php
                                            if($page!=1)
                                            {
                                             echo "<a href='coupon.php?page=1'> << First </a>"." ";
                                             $prev=$page-1;
                                             echo "<a href='coupon.php?page=$prev'> << Previous </a>"." ";
                                            }
                                            if (($page!=1)&&($page!=$total_pages))
                                            
                                             echo "|";
                                             if($page!=$total_pages)
                                             {
                                                 $next=$page+1;
                                                //echo print_r($next);
                                                echo "<a href='coupon.php?page=$next'> Next >> </a> "." ";
                                                echo "<a href='coupon.php?page=$total_pages'> Last >> </a>"." ";
                                                
                                             }
											 ?>
			</div>
 <?php } ?>						
<div align="center">

</div>
					</div> 
					<div class="tab-content" id="tab2">
					</div>					
				</div>
			</div> 
			</div>
			<div class="clear"></div>
			</div>
		</div>
      <?php /*?>  <?php 
		 function lout()
		 {
		  session_destroy();
		  header("location:index.php");
		 }
		?><?php */?>
	</div></body>
  </html>

