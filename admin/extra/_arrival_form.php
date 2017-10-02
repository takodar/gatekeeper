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
          $("#ddatea").datepicker({
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
		   { alert("Enter Flight Number"); document.flight.fno.focus(); return false; }
		   if(document.flight.adate.value== "")
		   { alert("Set Arrival Date"); document.flight.adate.focus(); return false; }	
		   if( (document.flight.arrih.value==0) && (document.flight.arrim.value==0))
		   { alert("Set Arrival Time"); return false; }
		   if(document.flight.ddate.value== "")
		   { alert("Set Departure Date"); document.flight.ddate.focus(); return false; }	
		   if((document.flight.deph.value==0)&& (document.flight.depm.value==0))
		   { alert("Set Departure Time"); return false; }	
		   if( document.flight.dphotel.value==0)
		   { alert ("Select Hotel For Stay"); return false;} 
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
                    $r_id=$_REQUEST['id']; //echo "registrant id==".$r_id;
					$fno=$_POST['fno']; //echo "<br>flight No=".$fno;
                    $airport=$_POST['air']; //echo "<br>airport=".$airport;
                    $adate=$_POST['adate']; 
					$adate=date("Y-m-d", strtotime($adate));
					//echo "<br/>adate=".$adate;
                    $ah=$_POST['arrih']; //echo "<br/>arrih=".$ah;
                    $am=$_POST['arrim']; //echo "<br/>arrim=".$am;
                    $atime=$ah.".".$am; //echo "<br/>arrival time=".$atime; 
					$ptime=$atime; //echo "<br/>pick up time=".$ptime;
					$ddate=$_POST['ddate'];
					$ddate=date("Y-m-d", strtotime($ddate));
					//echo "<br/>ddate=".$ddate;
                    $dh=$_POST['deph']; //echo "<br/>deph=".$dh;
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
					$hotel=$_POST['dphotel']; //echo "<br/>hotel=".$hotel;
				   
				   $sql1="INSERT INTO flightmaster(registrant_id, flight_no, airport, arrival_date, arrival_time, pickup_time, departure_date, departure_time, drop_time, hotel_stay) VALUES ('$r_id','$fno','$airport','$adate','$atime','$ptime','$ddate','$dtime','$droptime','$hotel')";
				   
				   $result3=mysql_query($sql1);
                      if(!$result3)
			            { die("Error".mysql_error()); }
			          else
			            { ?> <div id="up" style=" height:30px;" class='notification success png_bg'><div id="up1" style=" padding: 0px;"><strong> <p  id="up2" style="float:left; margin-left:30px;">Flight Information Added successfully.</p></strong></div></div>
			   <?php }
				  } ?>
    
                  <form action="arrival_form.php?id=<?php echo $_REQUEST['id']; ?>" method="post"  name="flight" id="flight1" onsubmit="return flights();">
		<table>
        	<tr>
            	<td>Flight Number</td>
                <td width="80%"><input type="text" name="fno" id="fno1"/></td>
           </tr> 
           <tr>
            	<td>Airport</td>
                <td width="80%"> <input type="radio" name="air" id="air1" value="0" checked="checked"/>Domestic
                                 <input type="radio" name="air" id="air1" value="1"/>International</td>
           </tr>
            <tr>
            	<td>Arrival Date</td>
                <td width="80%"><input type="date" name="adate" id="adatea"/></td>
           </tr>
           <tr>
            <td>Arrival Time</td>
             <td width="80%"> H<select name="arrih" id="arrih1"> 
             <option value="00">00</option> <option value="01">01</option> <option value="02">02</option> <option value="03">03</option> <option value="04">04</option>             <option value="05">05</option> <option value="06">06</option> <option value="07">07</option> <option value="08">08</option> <option value="09">09</option>             <option value="10">10</option> <option value="11">11</option><option value="12">12</option> <option value="13">13</option> <option value="14">14</option>             <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option>
             <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option>
             </select>
            M<select name="arrim" id="arrim1" > 
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
           </tr>
           <tr>
            	<td>Departure Date</td>
                <td width="80%"><input type="date" name="ddate" id="ddatea" /></td>
           </tr>
           <tr>
            	<td>Departure Time</td>
                <td width="80%"> H<select name="deph" id="deph1" >
             <option value="00">00</option> <option value="01">01</option> <option value="02">02</option> <option value="03">03</option> <option value="04">04</option>             <option value="05">05</option> <option value="06">06</option> <option value="07">07</option> <option value="08">08</option> <option value="09">09</option>             <option value="10">10</option> <option value="11">11</option><option value="12">12</option> <option value="13">13</option> <option value="14">14</option>             <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option>
             <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option>
             </select>
          M<select name="depm" id="depm1" >
             <option value="00">00</option> <option value="01">01</option> <option value="02">02</option> <option value="03">03</option> <option value="04">04</option>             <option value="05">05</option> <option value="06">06</option> <option value="07">07</option> <option value="08">08</option> <option value="09">09</option>             <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option>             <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option>
             <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> 
             <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option value="28">28</option> <option value="29">29</option>             <option value="30">30</option> <option value="31">31</option> <option value="32">32</option> <option value="33">33</option> <option value="34">34</option>             <option value="35">35</option> <option value="36">36</option> <option value="37">37</option> <option value="38">38</option> <option value="39">39</option> 
             <option value="40">40</option> <option value="41">41</option> <option value="42">42</option> <option value="43">43</option> <option value="44">44</option>             <option value="45">45</option> <option value="46">46</option> <option value="47">47</option> <option value="48">48</option> <option value="49">49</option>             <option value="50">50</option> <option value="51">51</option> <option value="52">52</option> <option value="53">53</option> <option value="54">54</option>             <option value="55">55</option> <option value="56">56</option> <option value="57">57</option> <option value="58">58</option> <option value="59">59</option> 
          </select>
               </td>
           </tr>
           <tr>
            	<td>Hotel (Stay)</td> <?php $sql33="SELECT * FROM hotelmaster ORDER BY hotel_name"; $result33=mysql_query($sql33); ?>
                <td width="80%"><select name="dphotel" id="dphotel1" style="width:150px;">
                      <option value="0">Select Venue</option>
                      <?php  while($rows33 = mysql_fetch_array($result33)) {?>
                     <option value="<?php echo $rows33['hotel_name']; ?>"> <?php echo $rows33['hotel_name']; ?> </option>
		            <?php } ?> </select></td>
           </tr>
          
           <tr><td colspan="2"> <a href="users.php" class="button"> Back </a><input type="submit" value="Insert" id="FormSubmit" style="background: #EFEFEF; margin-left:20px;" name="FormSubmit" class="button" onclick="return flights();"/></td></tr>
        </table>
</form>

</div></div>
</body>

</html>
