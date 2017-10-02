<?php  include('sessioncheck.php');
       include('connect.php');
	   
 $do = $_REQUEST['do'];
 if(isset($_REQUEST['id']))
 {
 $id=$_REQUEST['id'];
 $result = mysql_query("SELECT * FROM conference WHERE ConferenceID='$id'");
 $rows=mysql_fetch_array($result);
 }
if(isset($_POST['FormSubmit']))
{
echo "Form Submit";
  if(($_REQUEST['do'])== "add")
  {
    echo $_REQUEST['do'];
   //echo "SUBMIT----";
 	 $name=$_POST['ValidField'];
	 $details=$_POST['details'];
	 echo $details;
	 
	  $add=$_POST['con_add'];
	 $con_no=$_POST['con_no'];
	 
	  $img=$_POST['img'];
	 $locdp=$_POST['locdp'];
	 
	  $room_cat=$_POST['room_cat'];
	 $cat_desc=$_POST['cat_desc'];

    $in="INSERT INTO conference(ConferenceName, City, StartingDate, EndingDate, ManagingDirector, Website, Logo, EmailID, ChargesForStudent, ChargesForDelegates, Description) VALUES ('$name','$details','$add','$con_no','$img','$locdp','$room_cat','$cat_desc')";
    $result3=mysql_query($in);
    echo $result3;
			if(!$result3)
			{	
				die("Error".mysql_error());
			}
		
			else
			 {
			     echo "Record inserted successfully";?>
              <?php }
			mysql_close($conn);
	}	
	elseif(($_REQUEST['do'])=="edit")
	{
	echo $_REQUEST['do'];
	echo "----------------EDit--------"."<br/>";
	  $eid=$_REQUEST['id'];
	  $name=$_POST['ValidField'];
	 $details=$_POST['details'];

	  $add=$_POST['con_add'];
	 $con_no=$_POST['con_no'];
	 
	  $img=$_POST['img'];
	 $locdp=$_POST['locdp'];
	 
	  $room_cat=$_POST['room_cat'];
	 $cat_desc=$_POST['cat_desc'];
	 echo "ID->".$eid.'<br/>';
	 echo "NAme->".$name.'<br/>';
	 echo "Details->".$details.'<br/>';
	 echo "Address".$add.'<br/>';
	 echo "No->".$con_no.'<br/>';
	 echo "Imag->".$img.'<br/>';
	 //echo $gender;
     $in="UPDATE conference SET name='$name',hotel_details='$details',hotel_contact_add='$add',hotel_contact_no='$con_no',hotel_img='$img',hotel_loc='$locdp',room_cat='$room_cat',cat_desc='$cat_desc' WHERE id='$eid'";
     $result3=mysql_query($in);
     echo $result3;
			if(!$result3)
			{	
				die("Error".mysql_error());
			}
		
			else
			 {
			     echo "Record updated successfully";
			 }
			mysql_close($conn);
	}
 
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event Management System</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
         <script type="text/javascript">
		       function lout(){
			   window.location="index.php/?l=true";}
				</script>
<script src="js/jquery-1.3.2.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/jquery.validation.functions.js" type="text/javascript"></script>
      
       
        <style type="text/css">
           .adHeadline {font: bold 10pt Arial; text-decoration: underline; color: #003366;}
           .adText {font: normal 10pt Arial; text-decoration: none; color: #000000;}
        </style>
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
			<h3>Add/Edit User</h3>
				<div class="clear"></div>
				</div>
				<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
			
                <div align="center">
                 <div id="up" style="visibility:hidden; height:30px;" class='notification success png_bg'><div id="up1" style="visibility:hidden; padding: 0px;"><strong> <p  id="up2" style="visibility:hidden;float:left; margin-left:30px;">------------------------------------------Record Inserted Successfully.</p></strong></div></div>
    
<form action="conference_add_edit.php?do=<?php echo $_REQUEST['do'];?><?php if(($_REQUEST['do'])!="add"){?>&id=<?php echo $_REQUEST['id'];}?>" method="post" class="AdvancedForm" name="f1">
		<table>
        
        	<tr>
            	<td>Conference</td>
                <td width="80%"><select><option>Select Conference</option></select></td>
           </tr>
           <tr>
            	<td>Title</td>
                <td width="80%"><input type="text" name="ValidField" id="Title" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['Title'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>FullName</td>
                <td width="80%"><input type="date" name="ValidField" id="FullName" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['FullName'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Name on Certificate</td>
                <td width="80%"><input type="date" name="ValidField" id="CertificateName" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['CertificateName'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Gender</td>
                <td width="80%">
                <select>
                	<option>Selecy Gender</option>
                	<option>Male</option>
                	<option>Female</option>
                </select></td>
           </tr>
           <tr>
            	<td>Mobile</td>
                <td width="80%"><input type="url" name="ValidField" id="Mobile" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['Mobile'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Contact Address</td>
			 <td width="80%"><textarea  name="details" id="ContactAddress"> <?php if(($_REQUEST['do'])!="add"){?> <?php echo $rows['ContactAddress'];}?></textarea></td>
           </tr>
           
           <tr>
            	<td>Alternate Contact No</td>
                <td width="80%"><input type="email" name="ValidField" id="AlternateContactNo" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['AlternateContactNo'];?>" <?php }?>/></td>
           </tr>
           
           <tr>
            	<td>EmailID</td>
                <td width="80%"><input type="email" name="ValidField" id="email" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['EmailID'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Type</td>
                <td width="80%"><select>
                	<option>Selecy User Type</option>
                	<option>Doctor</option>
                	<option>Delegate</option>
                	<option>Student</option>
                </select></td>
           </tr>
           <tr>
            	<td>Charges for Delegates</td>
                <td width="80%"><input type="number" name="ValidField" id="delegate_charges" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['ChargesForDelegates'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>No Of Associate Delegates</td>
                <td width="80%"><input type="number" name="delegate_charges" id="NoDelegates" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['NoDelegates'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Transportation Required</td>
                <td width="80%">
                	<input type="checkbox" title="Yes" />
                </td>
           </tr>
           <tr>
            	<td>Accomodation Required</td>
                <td width="80%"><input type="checkbox" title="Yes" /></td>
           </tr>
           <tr>
            	<td>Total</td>
                <td width="80%"><input type="number" name="delegate_charges" id="Total" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['Total'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td><hr /></td>
                <td width="80%"><hr /></td>
           </tr>
           <tr>
            	<td>Arrival Date</td>
                <td width="80%"><input type="number" name="ArrivalDate" id="ArrivalDate" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['ArrivalDate'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Arrival Time</td>
                <td width="80%"><input type="number" name="ArrivalTime" id="ArrivalTime" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['ArrivalTime'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Pickup Time</td>
                <td width="80%"><input type="number" name="PickupTime" id="PickupTime" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['PickupTime'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Hotel Check-In Time</td>
                <td width="80%"><input type="number" name="HotelCheckInTime" id="HotelCheckInTime" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['HotelCheckInTime'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Departure Date</td>
                <td width="80%"><input type="number" name="DepartureDate" id="DepartureDate" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['DepartureDate'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Departure Time</td>
                <td width="80%"><input type="number" name="DepartureTime" id="DepartureTime" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['DepartureTime'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Drop Time</td>
                <td width="80%"><input type="number" name="DropTime" id="DropTime" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['DropTime'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Hotel Check-Out Time</td>
                <td width="80%"><input type="number" name="HotelCheckOutTime" id="HotelCheckOutTime" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['HotelCheckOutTime'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Breakfast</td>
                <td width="80%"><input type="checkbox" title="Yes" /></td>
           </tr>
           <tr>
            	<td>Lunch</td>
                <td width="80%"><input type="checkbox" title="Yes" /></td>
           </tr>
           <tr>
            	<td>Dinner</td>
                <td width="80%"><input type="checkbox" title="Yes" /></td>
           </tr>
           <tr>
            	<td><hr /></td>
                <td width="80%"><hr /></td>
           </tr>
           <tr>
            	<td>Abstract Title</td>
                <td width="80%"><input type="number" name="AbstractTitle" id="AbstractTitle" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['AbstractTitle'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Presenting Author</td>
                <td width="80%"><input type="number" name="PresentingAuthor" id="PresentingAuthor" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['PresentingAuthor'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Co Authors</td>
                <td width="80%"><input type="number" name="CoAuthors" id="CoAuthors" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['CoAuthors'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Institute Details</td>
                <td width="80%"><input type="number" name="InstituteDetails" id="InstituteDetails" <?php if(($_REQUEST['do'])!="add"){?> value="<?php echo $rows['InstituteDetails'];?>" <?php }?>/></td>
           </tr>
           <tr>
            	<td>Abstract Intro</td>
                <td width="80%"><textarea  name="AbstractIntro" id="AbstractIntro"> <?php if(($_REQUEST['do'])!="add"){?> <?php echo $rows['AbstractIntro'];}?></textarea></td>
           </tr>
           <tr>
            	<td>Method And Material</td>
                <td width="80%"><textarea  name="MethodAndMaterial" id="MethodAndMaterial"> <?php if(($_REQUEST['do'])!="add"){?> <?php echo $rows['MethodAndMaterial'];}?></textarea></td>
           </tr>
           <tr>
            	<td>Results</td>
                <td width="80%"><textarea  name="Results" id="Results"> <?php if(($_REQUEST['do'])!="add"){?> <?php echo $rows['Results'];}?></textarea></td>
           </tr>
           <tr>
            	<td>Discussion</td>
                <td width="80%"><textarea  name="Discussion" id="Discussion"> <?php if(($_REQUEST['do'])!="add"){?> <?php echo $rows['Discussion'];}?></textarea></td>
           </tr>
           <tr>
            	<td>Conclusion</td>
                <td width="80%"><textarea  name="Conclusion" id="Conclusion"> <?php if(($_REQUEST['do'])!="add"){?> <?php echo $rows['Conclusion'];}?></textarea></td>
           </tr>
                      
           <tr><td><input type="submit" value="Insert" id="FormSubmit" style="background: #EFEFEF;" name="FormSubmit" class="button"/></td></tr>
        </table>
</form>

</div></div>
</body>

</html>
