<?php session_start(); $_SESSION['product']="Gatekeeper Pro";
    include('admin/connect.php');
  if(isset($_REQUEST['prd']))
    {
    $str=$_REQUEST['prd']; 
    //echo "product=".$str; 
	if($_REQUEST['duration']==19.99){$duration=1;} else { $duration=2;} 
	//echo "duration=".$duration; 
	$price=$_REQUEST['duration']; 
	//echo " price=".$price; 
	$fname=$_REQUEST['fname']; 
	//echo " firstname=".$fname; 
	$lname=$_REQUEST['lname']; 
	//echo " lname=".$lname; 
	$add=$_REQUEST['add']; 
	//echo "  address=".$add; 
	$city=$_REQUEST['city']; 
	//echo "  city=".$city; 
	$state=$_REQUEST['state']; 
	//echo " state=".$state; 
	$zipcode=$_REQUEST['zipcode']; 
	//echo " zipcode=".$zipcode;  
	$email=$_REQUEST['email']; 
	//echo " email=".$email; 
    $date=Date('m/d/Y'); 
    //echo " date=".$date;

    $_SESSION['password']=$_REQUEST['password'];
	$_SESSION['pin']=$_REQUEST['pin']; 
	$_SESSION['pin_hint']=$_REQUEST['pin_hint']; 
	$_SESSION['master_pin']=$_REQUEST['master_pin']; 
	
    $in="INSERT INTO order_master (prod_id, prod_subscription, prod_price, coupon_id, deduction,shipping_charge, total, payment_status,order_date) VALUES 
        ($str,$duration,$price,0,0,0,$price,0,'$date')";
    $result3=mysql_query($in);
    //echo $result3;
    $rid= mysql_insert_id(); //echo $rid;
	$in1="INSERT INTO coustomer_master (order_id, f_name, l_name, email_id, address, city, state,pincode) VALUES  ($rid,'$fname','$lname','$email','$add','$city','$state',$zipcode)";
   $result4=mysql_query($in1);
   //echo $result4;
        
?>
  <form name="discount" action="process.php" method="post" >
   <input type="hidden" name="o_id" id="o_id" value="<?php echo $rid; ?>">
    <?php $_SESSION['order']=$rid; ?>
  	<h2>Gatekeeper Pro</h2>
  	<input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>"><br/>
  	<h3>Price $<?php echo $price; ?></h3>
  	<input type="hidden" name="total" id="total" value="<?php echo $price; ?>"><br/>
     <?php $_SESSION['price']=$price; //echo  $_SESSION['product']; echo  $_SESSION['price'];?>
  	<label>Enter Coupon Code:</label>
  	<input type="text" name="coupon" id="coupon" placeholder="Coupon Code" onfocus="change1(this);">
  	<button class="btn" name="submit" onclick="return chk_discount();">Submit</button><br/>
  	
  	<button  class="btn" name="submit" >Paypal Checkout</button><br/>
  </form>

<?php } 
else { 
	$id=$_REQUEST['id']; 
	$rid=$id;
	$total=$_REQUEST['total']; 
	$code=$_REQUEST['code'];
	$sql="SELECT * FROM coupon_master WHERE coupon_code_name='$code'";
    $result=mysql_query($sql); 
	//echo $result;
	//print_r($result);
	
	
    if($result)
	   {
	   	$rows=mysql_fetch_array($result);
		$d1=$rows['start_date'];
	    $sdate=date( "m/d/Y", strtotime( "$d1" ) ); //echo "sdate=".$sdate;
		//strtotime($rows['start_date']); 
		$d2=$rows['end_date'];
		$edate=date( "m/d/Y", strtotime( "$d2" ) ); //echo "edate=".$edate;
		$type=$rows['type'];
		$coupon_id=$rows['coupon_code_id'];
		$value=$rows['value'];
		$date=Date('m/d/Y'); //echo $date;
		if( ($date>=$sdate) && ($date<=$edate))
		   {
		   	 if($type==0)
			   { $benefit=$value; $ftotal=($total-$value);
			   	 $in="UPDATE order_master SET coupon_id=$coupon_id, deduction=$benefit,total=$ftotal WHERE order_id=$rid";
                 $result3=mysql_query($in);?>
			      <form name="discount" action="process.php" method="post" >
			      	<h2>Gatekeeper Pro</h2>
               	  <!--  <label>Order_id=<?php // echo $rid; ?></label>-->
  	               <?php $_SESSION['price']=$ftotal; //echo $_SESSION['price']."price";?>
                   <h3>Price $<?php echo $total; ?></h3>
                    <input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>"><br/>
  	               <!-- <label>total=<?php // echo $total; ?></label>-->
  	                <label>Coupon accepted. <br/> Benefit   $<?php  echo $benefit; ?></label>
  	                 <label>Now pay only  $<?php echo $ftotal; ?></label>
  	                <input type="hidden" name="total" id="total" value="<?php echo $ftotal; ?>"><br/>
  	                <button  class="btn" name="submit" >Paypal Checkout</button><br/>
                  </form>  	
	  <?php    }
			 else 
			  {
			  	 $benefit= round((($total*$value)/100),2); $ftotal=($total-$benefit);
			   	 $in="UPDATE order_master SET coupon_id=$coupon_id, deduction=$benefit, total=$ftotal WHERE order_id=$rid";
                 $result3=mysql_query($in);?>
			      <form name="discount" action="process.php" method="post" >
			      	 	<h2>Gatekeeper Pro</h2>
               	   <!-- <label>Order_id=<?php //echo $rid; ?></label>-->
                    <?php $_SESSION['price']=$ftotal; //echo $_SESSION['price']."price";?>
  	                <input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>"><br/>
  	                 <h3>Price $<?php echo $total; ?></h3>
  	                <input type="hidden" name="total" id="total" value="<?php echo $total; ?>"><br/>
  	                <label>Coupon accepted.  <br/>Benefit   $<?php  echo $benefit; ?></label>
  	                <label>Now pay only  $<?php echo $ftotal; ?></label>
  	                <input type="hidden" name="total" id="total" value="<?php echo $ftotal; ?>"><br/>
  	                <button  class="btn" name="submit" >Paypal Checkout</button><br/>
                  </form>
				 
		<?php  }  
		   }
		else 
		   {
		   	 ?>
             <form name="discount" action="process.php" method="post" >
             	 	<h2>Gatekeeper Pro</h2>
  	<!--<label>Order_id=<?php // echo $rid; ?></label>-->
  	<input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>"><br/>
  	<!-- <label>total=<?php // echo $total; ?></label>-->
  	<input type="hidden" name="total" id="total" value="<?php echo $total; ?>">
  	 <h3>Price $<?php echo $_SESSION['price']; ?></h3>
    <label style="color: red;">Invalid coupon code.</label>
  	<label>Enter Coupon Code:</label>
  	<input type="text" name="coupon" id="coupon" placeholder="Coupon Code" onfocus="change1(this);">
  	<button class="btn" name="submit" onclick="return chk_discount();">Submit</button><br/>
  	
  	<button  class="btn" name="submit" >Paypal Checkout</button><br/>
  </form>
		<?php  }   
	  }
	
	
	// main if dont gaet result....
 else {  
	  	  ?>
          <form name="discount" action="process.php" method="post" >
          	 	<h2>Gatekeeper Pro</h2>
  <!--	<label>Order_id=<?php echo $rid; ?></label>-->
  	<input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>"><br/>
  <!-- <label>total=<?php // echo $total; ?></label>-->
  	<input type="hidden" name="total" id="total" value="<?php echo $total; ?>">
  	 <h3>Price $<?php echo $_SESSION['price']; ?></h3>
    <label style="color: red;"> Coupon code doesnt match.</label>
  	<label>Enter Coupon Code:</label>
  	<input type="text" name="coupon" id="coupon" placeholder="Coupon Code" onfocus="change1(this);">
  	<button class="btn" name="submit" onclick="return chk_discount();">Submit</button><br/>
  	
  	<button  class="btn" name="submit" >Paypal Checkout</button><br/>
  </form>
 <?php	  } ?>


	
<?php } ?>
