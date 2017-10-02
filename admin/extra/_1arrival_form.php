<?php  include('sessioncheck.php');
       include('connect.php');
	   
 
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
        
        <link rel="stylesheet" href="resources/css/jquery-ui.css">
        <script src="resources/scripts/jquery-1.9.1.js"></script>
        <script src="resources/scripts/jquery-ui.js"></script>
         <script>
         $(function() {
           $("#adatea").datepicker({
           showOn: "button",
           buttonImage: "images/calendar.gif",
           buttonImageOnly: true
           });
         });
        </script>
        <script>
        $(function() {
          $("#ddate").datepicker({
          showOn: "button",
          buttonImage: "images/calendar.gif",
          buttonImageOnly: true
          });
        });
		 $(function() {
          $("#checkin_date").datepicker({
          showOn: "button",
          buttonImage: "images/calendar.gif",
          buttonImageOnly: true
          });
        });
		 $(function() {
          $("#checkout_date").datepicker({
          showOn: "button",
          buttonImage: "images/calendar.gif",
          buttonImageOnly: true
          });
        });
       </script>
      
       
       
        <style type="text/css">
           .adHeadline {font: bold 10pt Arial; text-decoration: underline; color: #003366;}
           .adText {font: normal 10pt Arial; text-decoration: none; color: #000000;}
        </style>
        <script>
		 function flights()
		  {
		  if(document.flight.fno.value== "")
		   { alert("Enter Arrival Flight Number"); document.flight.fno.focus(); return false; }
		    if(document.flight.source.value== "")
		   { alert("Set Arrival Source"); document.flight.source.focus(); return false; }
		    if(document.flight.destination.value== "")
		   { alert("Set Arrival Destination"); document.flight.destination.focus(); return false; }
		   if(document.flight.adate.value== "")
		   { alert("Set Arrival Date"); document.flight.adate.focus(); return false; }	
		   if( (document.flight.arrih.value==0) && (document.flight.arrim.value==0))
		   { alert("Set Arrival Time"); return false; }
		  
		   
		   
		   
		    if(document.flight.dfno.value== "")
		   { alert("Enter Departure Flight Number"); document.flight.dfno.focus(); return false; }
		    if(document.flight.dsource.value== "")
		   { alert("Set Departure Source"); document.flight.dsource.focus(); return false; }
		    if(document.flight.ddestination.value== "")
		   { alert("Set Departure Destination"); document.flight.ddestination.focus(); return false; }
		   if(document.flight.ddate.value== "")
		   { alert("Set Departure Date"); document.flight.ddate.focus(); return false; }	
		   if((document.flight.deph.value==0)&& (document.flight.depm.value==0))
		   { alert("Set Departure Time"); return false; }
		    
		   
		   if( document.flight.dphotel.value==0)
		   { alert ("Select Hotel For Stay"); return false;} 
		  
		
		   
		    if(document.flight.checkin_date.value== "")
		   { alert("Set CheckIn Date"); document.flight.checkin_date.focus(); return false; }	
		   if( (document.flight.checkin_hour.value==0) && (document.flight.checkin_min.value==0))
		   { alert("Set CheckIn Time"); return false; }
		    if(document.flight.checkout_date.value== "")
		   { alert("Set CheckOut Date"); document.flight.checkout_date.focus(); return false; }	
		   if( (document.flight.checkout_hour.value==0) && (document.flight.checkout_min.value==0))
		   { alert("Set CheckOut Time"); return false; }
		   return true;
		   }
		   	
		   
		
		</script>
        <script>
        		function  picktime()
				{
					var hour = document.getElementById('arrih1').value;
					var mint =document.getElementById('arrim1').value;
					var pickup_time=hour+":"+mint;
					document.getElementById('pickup_time').value=pickup_time;
					var adate=document.getElementById('adatea').value;
					document.getElementById('checkin_date1').value=adate;
				}
				
				function droptime()
				{
					var dhour = document.getElementById('deph1').value;
					var dmint =document.getElementById('depm1').value;
					var drop_time=dhour+":"+dmint;
					document.getElementById('drop_time').value=drop_time;
					var ddate=document.getElementById('ddate').value;
					document.getElementById('checkout_date1').value=ddate;
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
			<h3>Flight Schedule</h3>
				<div class="clear"></div>
				</div>
				<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
			
                <div align="center">
                 
                  <?php if(isset($_POST['FormSubmit']))
				    {
                    $r_id=$_REQUEST['id'];// echo "registrant id==".$r_id;
					
					$fno=$_POST['fno'];//echo "<br>flight No=".$fno;
					$dipar_fli_no=$_POST['dfno']; //echo "<br>Departure flight No=".$dipar_fli_no;
					
                    $airport=$_POST['air']; //echo "<br>airport=".$airport;
					$depar_airport=$_POST['dair'];// echo "<br>airport=".$depar_airport;
					
                    $adate=$_POST['adate']; 
					$adate=date("Y-m-d", strtotime($adate));
					//echo "<br/>adate=".$adate;
					$ddate=$_POST['ddate']; 
					$ddate=date("Y-m-d", strtotime($ddate));
					//echo "<br/>Departure date=".$ddate;
					
                    $ah=$_POST['arrih'];// echo "<br/>arri_hour=".$ah;
                    $am=$_POST['arrim']; //echo "<br/>arri_min=".$am;
                    $atime=$ah.".".$am; //echo "<br/>arrival time=".$atime; 
					$ptime=$atime; //echo "<br/>pick up time=".$ptime;
				
                    $dh=$_POST['deph'];// echo "<br/>deph=".$dh;
			        $dm=$_POST['depm']; //echo "<br/>depm=".$dm;
				    $dtime=$dh.".".$dm; //echo "<br/>departure time=".$dtime;
					  if($dh==00)
					  { $droptime="23".".".$dm; }
					  else { $droptime=($dh-01).".".$dm; }
					  if(strlen($droptime)==4)
					   {
					    $droptime="0".$droptime; 
					   }
					 //echo "<br/>Droptime=".$droptime;
					$hotel=$_POST['dphotel'];// echo "<br/>hotel=".$hotel;
					
				    $arr_source=$_POST['source']; //echo "<br>arrival source=".$arr_source;
					$arr_desti=$_POST['destination']; //echo "<br>arrival desti=".$arr_desti;
					
					$depar_source=$_POST['dsource']; //echo "<br>departure source=".$depar_source;
					$depar_desti=$_POST['ddestination']; //echo "<br>departure desti=".$depar_desti;
					
					
				   $sql1="INSERT INTO flightmaster(registrant_id, flight_no, airport, arrival_date, arrival_time, pickup_time, departure_date, departure_time, drop_time, hotel_stay) VALUES ('$r_id','$fno','$airport','$adate','$atime','$ptime','$ddate','$dtime','$droptime','$hotel')";
				   
				   $result3=mysql_query($sql1);
                      if(!$result3)
			            { die("Error".mysql_error()); }
			          else
			            { ?> <div id="up" style=" height:30px;" class='notification success png_bg'><div id="up1" style=" padding: 0px;"><strong> <p  id="up2" style="float:left; margin-left:30px;">Flight Information Added successfully.</p></strong></div></div>
			   <?php }
				  } ?>
    
                <form action="arrival_form.php?id=<?php echo $_REQUEST['id']; ?>" method="post"  name="flight" id="flight1" onsubmit="return flights();">
		<table  style="border:2px solid #f3f2ef">
        <tr style="background-color:#f3f2ef; color:#000000">
        		<td></td><td>Arrival</td>
                <td></td><td>Departure</td>
        
        </tr>
        	<tr>
            	<td>Flight Number</td>
                <td><input type="text" name="fno" id="fno1"/></td>
                <td>Flight Number</td>
                <td><input type="text" name="dfno" id="dfno1"/></td>
           </tr> 
           <tr>
            	<td>Airport</td>
                <td> <input type="radio" name="air" id="air1" value="0" checked="checked"/>Domestic
                                 <input type="radio" name="air" id="air1" value="1"/>International</td>
                <td>Airport</td>
                <td> <input type="radio" name="dair" id="dair1" value="0" checked="checked"/>Domestic
                                 <input type="radio" name="dair" id="dair1" value="1"/>International</td>
           </tr>
           <tr>
           		<td>Source</td>
        		<td><input type="text" name="source" id="source" /></td> 
            	<td>Source</td>
          		 <td><input type="text" name="dsource" id="dsource" /></td> 
           </tr>
           <tr>
         	<td>Destination</td>
        	<td><input type="text" name="destination" id="destination" /></td> 
            <td>Destination</td>
        	<td><input type="text" name="ddestination" id="ddestination" /></td> 
         </tr>
            <tr>
            	<td height="33">Arrival Date</td>
              <td><input type="text" name="adate" id="adatea"/></td>
              <td>Departure Date</td>
                <td><input type="text" name="ddate" id="ddate" /></td>
           </tr>
           <tr>
            <td>Arrival Time</td>
             <td> H<select name="arrih" id="arrih1" onchange="picktime()"> 
             <option value="00">00</option> <option value="01">01</option> <option value="02">02</option> <option value="03">03</option> <option value="04">04</option>             <option value="05">05</option> <option value="06">06</option> <option value="07">07</option> <option value="08">08</option> <option value="09">09</option>             <option value="10">10</option> <option value="11">11</option><option value="12">12</option> <option value="13">13</option> <option value="14">14</option>             <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option>
             <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option>
             </select>
            M<select name="arrim" id="arrim1" onchange="picktime()" > 
             <option value="00">00</option> <option value="01">01</option> <option value="02">02</option> <option value="03">03</option> <option value="04">04</option>             <option value="05">05</option> <option value="06">06</option> <option value="07">07</option> <option value="08">08</option> <option value="09">09</option>             <option value="10">10</option> <option value="11">11</option><option value="12">12</option> <option value="13">13</option> <option value="14">14</option>             <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option>
             <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option><option value="24">24</option> 
             <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> 
                     <option value="28">28</option> <option value="29">29</option> <option value="30">30</option> <option value="31">31</option> 
                     <option value="32">32</option> <option value="33">33</option> <option value="34">34</option> <option value="35">35</option> 
                     <option value="36">36</option> <option value="37">37</option> <option value="38">38</option> <option value="39">39</option> 
                     <option value="40">40</option> <option value="41">41</option> <option value="42">42</option> <option value="43">43</option>
                     <option value="44">44</option> <option value="45">45</option> <option value="46">46</option> <option value="47">47</option> 
                     <option value="48">48</option> <option value="49">49</option> <option value="50">50</option> <option value="51">51</option> 
                     <option value="52">52</option> <option value="53">53</option> <option value="54">54</option> <option value="55">55</option> 
                     <option value="56">56</option> <option value="57">57</option> <option value="58">58</option> <option value="59">59</option> 
                     </select>
               </td>
               <td>Departure Time</td>
                <td> H<select name="deph" id="deph1" onchange="droptime()" >
             <option value="00">00</option> <option value="01">01</option> <option value="02">02</option> <option value="03">03</option> <option value="04">04</option>             <option value="05">05</option> <option value="06">06</option> <option value="07">07</option> <option value="08">08</option> <option value="09">09</option>             <option value="10">10</option> <option value="11">11</option><option value="12">12</option> <option value="13">13</option> <option value="14">14</option>             <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option>
             <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option>
             </select>
          M<select name="depm" id="depm1" onchange="droptime()" >
             <option value="00">00</option> <option value="01">01</option> <option value="02">02</option> <option value="03">03</option> <option value="04">04</option>             <option value="05">05</option> <option value="06">06</option> <option value="07">07</option> <option value="08">08</option> <option value="09">09</option>             <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option>             <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option>
             <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> 
             <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option value="28">28</option> <option value="29">29</option>             <option value="30">30</option> <option value="31">31</option> <option value="32">32</option> <option value="33">33</option> <option value="34">34</option>             <option value="35">35</option> <option value="36">36</option> <option value="37">37</option> <option value="38">38</option> <option value="39">39</option> 
             <option value="40">40</option> <option value="41">41</option> <option value="42">42</option> <option value="43">43</option> <option value="44">44</option>             <option value="45">45</option> <option value="46">46</option> <option value="47">47</option> <option value="48">48</option> <option value="49">49</option>             <option value="50">50</option> <option value="51">51</option> <option value="52">52</option> <option value="53">53</option> <option value="54">54</option>             <option value="55">55</option> <option value="56">56</option> <option value="57">57</option> <option value="58">58</option> <option value="59">59</option> 
          </select>
               </td>
              </tr>
              
               <tr>
               <td>Pickup Time </td>
               <td><input type="text" name="pickup_time" id="pickup_time" disabled="disabled"/></td>
               <td>Drop Time</td>
               <td><input type="text" name="drop_time" id="drop_time" disabled="disabled" /></td>
               
           </tr>
        
         
          
      
         </table>
      <!------------------------------------------------------------------------------------------------------------------------------------------->  
        
    	<table  style="border:2px solid #f3f2ef">
        <tr style="background-color:#f3f2ef; color:#000000">
        <td></td>
        <td colspan="2">Hotel Details</td>
        </tr>
           <tr>
            	<td>Hotel (Stay)</td> <?php $sql33="SELECT * FROM hotelmaster ORDER BY hotel_name"; $result33=mysql_query($sql33); ?>
                <td width="70%"><select name="dphotel" id="dphotel1" style="width:150px;">
                      <option value="0">Select Venue</option>
                      <?php  while($rows33 = mysql_fetch_array($result33)) {?>
                     <option value="<?php echo $rows33['hotel_name']; ?>"> <?php echo $rows33['hotel_name']; ?> </option>
		            <?php } ?> </select></td>
           </tr>
           <tr>
           		<td>CheckIn Date</td>
                <td><input type="text" name="checkin_date1" id="checkin_date1" /></td>
                </tr>
              
                     <tr>
                <td>CheckOut Date</td>
                <td><input type="text" name="checkout_date1" id="checkout_date1" /></td>
                </tr>
              
          
           <tr><td colspan="2"> <a href="users.php" class="button"> Back </a><input type="submit" value="Insert" id="FormSubmit" style="background: #EFEFEF; margin-left:20px;" name="FormSubmit" class="button" onclick="return flights();"/></td></tr>
       </table>
        
</form>

</div></div>
</body>

</html>
