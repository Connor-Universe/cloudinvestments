<?php
session_start();
include("config.php");


   // define variables and set to empty values
   $email = $password ="";
 $email_err = $password_err= $fail = "";





if ($_SERVER["REQUEST_METHOD"] == "POST"){
 $email = $_POST['email'];
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
    $password_err = "
    <div class='alert alert-primary'>
      <strong>ERROR:</strong> Password is required!
    </div>";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
  }
  if (empty($_POST["email"])) {
    $email_err = "
     <div class='alert alert-primary'>
      <strong>ERROR:</strong> Email is required!
    </div>";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "<span class='error'>Invalid email format!</span>";
    }
  }

  //if validation is satified then create a token for the user 
  
  
             
  if($password_err == "" AND $email_err == "" ){
    $select_user = "select * from users where email='$email' AND password_user='$password' ";

    $run_user = mysqli_query($connect,$select_user);

    $row_user = mysqli_fetch_array($run_user);

    $token = $row_user['token'];
    $id_no = $row_user['id_no'];
    $verified = $row_user['verified'];
    $suspend = $row_user['Status'];
    


    if($row_user == 0){

        $fail = "
        <div class='alert alert-primary'>
      <strong>ERROR:</strong> Either Your Username or Password is incorrect
    </div>";
       
    
    }elseif($row_user == 0 AND $verified = 0){
      $fail = "
      <div class='alert alert-primary'>
      <strong>ERROR:</strong> Your account is not verified, please check your email and verify your account
    </div>";
    
    }elseif($suspend =="suspended"){
      $fail = "
      <div class='alert alert-primary'>
      <strong>ERROR:</strong> Your account has been suspended, please contact the support team to remove the ban
    </div>";
    
    }
    else{
        $_SESSION['token'] = $token;
        $_SESSION['id_no'] = $id_no;
        echo"<script>alert('You are logged in')</script>";
        echo"<script>window.open('dash/examples/dashboard.php','_self')</script>" ;
    }
}
}




  

  




        
  

?>