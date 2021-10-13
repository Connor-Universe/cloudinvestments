<?php


	include'../../include/config.php';
  $id=$_GET['id'];
  
	$delete = "DELETE FROM investment_request WHERE id=$id";
    $run = mysqli_query($connect,$delete);
    $result = $run;
     
      header("location:invest-request.php?success=true");
   
           
		
?>