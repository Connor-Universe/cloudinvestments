<?php


	 include("../../include/config.php");
  $id=$_GET['id'];
  
	$delete = "DELETE FROM users WHERE id=$id";
    $run = mysqli_query($connect,$delete);
    $result = $run;
     
      header("location:users.php?success=true");
   
           
		
?>