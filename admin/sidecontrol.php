<div id="sidebar" style="padding-top:20px;">
	<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			<!-- Logo (221px wide) -->
			<div><img src="resources/images/inner_logo.png" width=221 height="103"/></div>
			<!-- Sidebar Profile links -->
			<div id="profile-links" style="padding-top:20px;">
				<?php /*?><!--Hello, <?php $na1=$_SESSION['fname']." ".$_SESSION['lname'];  echo $na1 ; ?> 
				<br />--><?php */?>
                <a href="change.php">Change Password</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php" title="Sign Out" >Sign Out</a>
			</div>       
            <ul id="main-nav"><!-- Menu -->
   		         <li>
                	<a class="nav-top-item no-submenu" href="order.php">Orders</a>       
                </li>
				<li>
                	<a class="nav-top-item no-submenu" href="shipping_charge.php">Channge Shipping Rate</a>       
                </li>
		        <li>
                	<a class="nav-top-item no-submenu" href="coupon.php">Coupons Management</a>       
                </li>
               
                
             </ul> <!-- End #main-nav -->
         </div>
  </div>