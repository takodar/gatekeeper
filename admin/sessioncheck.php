<?php session_start();

  if(!isset($_SESSION['id']))
       {  ?>
 
   <script type="text/javascript">
   window.location="index.php";
   </script>
 
 <?php } ?>
  