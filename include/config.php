<?php 

 $connect = mysqli_connect("localhost","root","","asset");
 $get_settings1 = "select * from settings";
$run_settings1 = mysqli_query($connect,$get_settings1);
$row_settings1 = mysqli_fetch_array($run_settings1);
$email_admin1 = $row_settings1['email'];
$password_admin1 = $row_settings1['password'];
?>