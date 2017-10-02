<?php  session_start(); $_SESSION['product']="Logikey";
    include('admin/connect.php');
  if(isset($_REQUEST['prd']))
    {
    $str=$_REQUEST['prd']; 
    $price=49.99; 
	$fname=$_REQUEST['fname']; 
	$lname=$_REQUEST['lname']; 
	$add=$_REQUEST['add']; 
	$city=$_REQUEST['city']; 
	$state=$_REQUEST['state']; 
	$zipcode=$_REQUEST['zipcode']; 
	$email=$_REQUEST['email']; 
	
	$fnames=$_REQUEST['fnames']; 
	$lnames=$_REQUEST['lnames']; 
	$adds=$_REQUEST['adds']; 
	$citys=$_REQUEST['citys']; 
	$states=$_REQUEST['states']; 
	$zipcodes=$_REQUEST['zipcodes']; 
	$emails=$_REQUEST['emails']; 
	
	//echo " email=".$email; 
    //$date=Date('Y-m-d'); 
     $date=Date('m/d/Y');
	//echo " date=".$date;
    $sqlt="SELECT * FROM shipping_charge WHERE s_id=1";
    $resultt=mysql_query($sqlt);
	$rowst = mysql_fetch_array($resultt);
    $scharge=$rowst['charge'];
	$prices=$price+$scharge;
    $in="INSERT INTO order_master (prod_id, prod_subscription, prod_price, coupon_id, deduction,shipping_charge, total, payment_status,order_date) VALUES 
        ($str,0,$price,0,0,$scharge,$prices,0,'$date')";
    $result3=mysql_query($in);
    //echo $result3;
    $rid= mysql_insert_id(); //echo $rid;
	$in1="INSERT INTO coustomer_master (order_id, f_name, l_name, email_id, address, city, state,pincode) VALUES  ($rid,'$fname','$lname','$email','$add','$city','$state',$zipcode)";
   $result4=mysql_query($in1);
   //echo $result4;
   $in1="INSERT INTO shipping_master (order_id, f_name, l_name, email_id, address, city, state,pincode) VALUES  ($rid,'$fnames','$lnames','$emails','$adds','$citys','$states',$zipcodes)";
   $result4=mysql_query($in1);
        
?>
    <form name="discount" action="process.php" method="post">
        <h2>Logikey</h2>
        <?php $_SESSION['order']=$rid; ?>
            <input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>">
            <label>Product price: $49.99</label>
            <label>Shipping Charge: $
                <?php echo $scharge; ?>
            </label>
            <label>Total: $
                <?php $tot=$price+$scharge; echo $tot; ?>
            </label>
            <?php $_SESSION['price']=$tot; ?>
                <input type="hidden" name="price" id="price" value="<?php echo $price; ?>">
                <input type="hidden" name="shipcharge" id="shipcharge" value="<?php echo $scharge; ?>">
                <input type="hidden" name="total" id="total" value="<?php echo $tot; ?>">
                <label>Enter Coupon Code:</label>
                <input type="text" name="coupon" id="coupon" placeholder="Coupon Code" onfocus="change1(this);">
                <button class="btn" name="submit" onclick="return chk_discount();">Submit</button>
                <button class="btn" name="submit">Paypal Checkout</button>
    </form>

    <?php } else { 
	$id=$_REQUEST['id']; 
	$rid=$id;
	$total=$_REQUEST['price']; 
	$scharge=$_REQUEST['scharge'];
	$tot=$_REQUEST['tot'];
	$code=$_REQUEST['code'];
	$sql="SELECT * FROM coupon_master WHERE coupon_code_name='$code'";
    $result=mysql_query($sql); 
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
		if //(1==1)
		  ( ($date>=$sdate) && ($date<=$edate))
		   {
		   	 if($type==0)
			   { $benefit=$value; $ftotal=($tot-$value);
			   	 $in="UPDATE order_master SET coupon_id=$coupon_id, deduction=$benefit,total=$ftotal WHERE order_id=$rid";
                 $result3=mysql_query($in);?>
        <form name="discount" action="process.php" method="post">
            <h2>Logikey</h2>

            <input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>">
            <label>Product-price: $
                <?php echo $total; ?>
            </label>
            <label>Coupon accepted. Benefit $
                <?php  echo $benefit; ?>
            </label>
            <label>Shipping_charge: $
                <?php echo $scharge; ?>
            </label>
            <?php $_SESSION['price']=$ftotal;?>
                <label>Total: $
                    <?php echo $ftotal; ?>
                </label>
                <input type="hidden" name="total" id="total" value="<?php echo $ftotal; ?>">
                <br/>
                <button class="btn" name="submit">Paypal Checkout</button>
        </form>
        <?php    }
			 else 
			  {
			  	 $benefit= round((($total*$value)/100),2); $ftotal=($tot-$benefit);
			   	 $in="UPDATE order_master SET coupon_id=$coupon_id, deduction=$benefit, total=$ftotal WHERE order_id=$rid";
                 $result3=mysql_query($in);?>
            <form name="discount" action="process.php" method="post">
                <h2>Logikey</h2>

                <input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>">
                <br/>
                <label>Product-price: $
                    <?php echo $total; ?>
                </label>
                <label>Coupon accepted. Benefit $
                    <?php  echo $benefit; ?>
                </label>
                <label>Shipping_charge: $
                    <?php echo $scharge; ?>
                </label>
                <label>Now pay only $
                    <?php echo $ftotal; ?>
                </label>
                <?php $_SESSION['price']=$ftotal;?>
                    <input type="hidden" name="total" id="total" value="<?php echo $ftotal; ?>">
                    <br/>
                    <button class="btn" name="submit">Paypal Checkout</button>
                    <br/>
            </form>

            <?php  }  
		   }
		else 
		   {
		   ?>
                <form name="discount" action="process.php" method="post">
                    <h2>Logikey</h2>

                    <input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>">
                    <label>Product price: $
                        <?php echo $total; ?>
                    </label>
                    <label>Shipping Charge: $
                        <?php echo $scharge; ?>
                    </label>
                    <label>Total: $
                        <?php $tot=$total+$scharge; echo $tot; ?>
                    </label>
                    <input type="hidden" name="price" id="price" value="<?php echo $total; ?>">
                    <input type="hidden" name="shipcharge" id="shipcharge" value="<?php echo $scharge; ?>">
                    <input type="hidden" name="total" id="total" value="<?php echo $tot; ?>">
                    <label style="color: red;">Invalid coupon code.</label>
                    <label>Enter Coupon Code:</label>
                    <input type="text" name="coupon" id="coupon" placeholder="Coupon Code" onfocus="change1(this);">
                    <button class="btn" name="submit" onclick="return chk_discount();">Submit</button>
                    <br/>

                    <button class="btn" name="submit">Paypal Checkout</button>
                </form>

                <?php }   
	  }
	else  
	  { ?>
                    <form name="discount" action="process.php" method="post">
                        <h2>Logikey</h2>

                        <input type="hidden" name="p_id" id="p_id" value="<?php echo $rid; ?>">
                        <label>Product price: $
                            <?php echo $total; ?>
                        </label>
                        <label>Shipping Charge: $
                            <?php echo $scharge; ?>
                        </label>
                        <label>Total: $
                            <?php $tot=$total+$scharge; echo $tot; ?>
                        </label>
                        <input type="hidden" name="price" id="price" value="<?php echo $total; ?>">
                        <input type="hidden" name="shipcharge" id="shipcharge" value="<?php echo $scharge; ?>">
                        <input type="hidden" name="total" id="total" value="<?php echo $tot; ?>">
                        <label style="color: red;">Invalid coupon code.</label>
                        <label>Enter Coupon Code:</label>
                        <input type="text" name="coupon" id="coupon" placeholder="Coupon Code" onfocus="change1(this);">
                        <button class="btn" name="submit" onclick="return chk_discount();">Submit</button>

                        <button class="btn" name="submit">Paypal Checkout</button>
                    </form>

                    <?php } ?>



                        <?php } ?>
