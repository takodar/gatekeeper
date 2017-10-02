<?php
function register($oid, $pass, $pin, $pin_hint, $master_pin, $amount)
{
    $result3 = mysql_query("SELECT prod_subscription FROM  order_master WHERE order_id=$oid");
    if(mysql_num_rows($result3)  > 0)
    {
        while($rows = mysql_fetch_array($result3))
        {
             $term=$rows['prod_subscription'];
             //echo $term;
         }
    }

    $result4 = mysql_query("SELECT email_id FROM  coustomer_master WHERE order_id=$oid");
    if(mysql_num_rows($result4)  > 0)
    {
        while($rows1 = mysql_fetch_array($result4))
        {
             $email=$rows1['email_id'];
             //echo $email;
         }
   }
   else
   {
       return 'Customer email not found for order id: ' +$oid;
   }

    $in1="INSERT INTO success_url_master (order_id, email, term, amount)  VALUES  ($oid,'$email','$term','$amount')";
    $result4=mysql_query($in1);

    $email = urlencode($email);
    $pass = urlencode($pass);
    $pin = urlencode($pin);
    $pin_hint = urlencode($pin_hint);
    $master_pin = urlencode($master_pin);

    $url = "https://gatekeeperpro.us/subscribe/$email/$pass/$pin/$pin_hint/$master_pin/$term/$amount";
    // Open the file using the HTTP headers set above
    if ($result4) {
        $datares = file_get_contents($url, false);
        $obj = json_decode($datares);
        return $obj->{'status'};
    }
    else
    {
        return 'User already exists: Please email support@authentry.com with the "user name" will get it resolved!';
    }
}
?>
