<?php
$conn=mysql_connect("localhost","gatekeeperdbuser","C95w%_8Q2#?d");
if(!$conn)
{
	echo "Unable to connect Database, Please try again later.";
}
else
{
mysql_select_db("gatekeeperprodb",$conn);
}
// site admin id
$site_name="Gatekeeper Pro";
$site_id="mkdesai@gmail.com";
$admin_id="mkdesai@gmail.com";
?>
