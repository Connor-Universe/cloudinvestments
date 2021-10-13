<?php
session_start();
include("config.php");


   // define variables and set to empty values
   $username = $password ="";
 $username_err = $password_err= $fail = "";





if ($_SERVER["REQUEST_METHOD"] == "POST"){
 $username = $_POST['username'];
  $password = $_POST['password'];
  
  
  
 //check for unique password 

 
  //the next code is for checking the form data
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  
  
  if (empty($_POST["password"])) {
    $password_err = "<span class='error'>Password is required!</span>";
  } 
  
  if (empty($_POST["username"])) {
    $username_err = "<span class='error'>Username is required!</span>";
  } 

  //if validation is satified then create a token for the user 
  
  
             
  if($password_err == "" AND $username_err == "" ){
    $select_user = "select * from admin where username='$username' AND password='$password' ";

    $run_user = mysqli_query($connect,$select_user);

    $row_user = mysqli_fetch_array($run_user);

    $username = $row_user['username'];



    if($row_user == 0){

        $fail = "<span class='error'>Either Your Username or Password is incorrect</span>";
 
    
    }
    else{
        $_SESSION['username'] = $username;
        echo"<script>alert('You are logged in')</script>";
        echo"<script>window.open('admin/examples/dashboard.php','_self')</script>" ;
    }
   }
}


  

  




        
  

?>