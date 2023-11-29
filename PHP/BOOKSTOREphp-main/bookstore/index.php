<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Index";
  require_once "./template/header.php";
?>
      <!-- Example row of columns -->
     
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>