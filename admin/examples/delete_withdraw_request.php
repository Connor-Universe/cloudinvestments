<?php


	include'../../include/config.php';
  $id=$_GET['id'];
  
	$delete = "DELETE FROM withdraw_request WHERE id=$id";
    $run = mysqli_query($connect,$delete);
    $result = $run;
     
      header("location:withdraw-request.php?success=true");
   
           
		
?>