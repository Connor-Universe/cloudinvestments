<?php

include("../../include/config.php");
date_default_timezone_set('Etc/UTC');




   
    $first_name_err = $email_err = $last_name_err = $password_err = $btc_address_error = $country_error = $username_err = "";
    $first_name = $email = $last_name = $username = $password = $btc_address = $country = $success = $fail = "";
    



if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $first_name= $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $btc_address = $_POST['wallet'];
  $country = $_POST['country'];
  $id_no3 = $_POST['id'];


  
  
 //check for unique password 

 $get_password = "select password_user from users";
 $run_password = mysqli_query($connect,$get_password);
 $column_password = mysqli_fetch_array($run_password);

 //check for unique username

 $get_username = "select username from users";
 $run_username = mysqli_query($connect,$get_username);
 $column_username = mysqli_fetch_array($run_username);

 //check for unique email address

 $get_email = "select email from users";
 $run_email = mysqli_query($connect,$get_email);
 $column_email = mysqli_fetch_array($run_email);

 $get_wallet = "select wallet from users";
 $run_wallet = mysqli_query($connect,$get_wallet);
 $column_wallet = mysqli_fetch_array($run_wallet);

 $get_refer = "select referal_code from users";
 $run_refer = mysqli_query($connect,$get_refer);
 $column_refer = mysqli_fetch_array($run_refer);

 

 
  //the next code is for checking the form data
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if (empty($_POST["first_name"])) {
    $first_name_err = "<span class='error'>First name is required!</span>";
  } else {
    $first_name = test_input($_POST["first_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
      $first_name_err = " <span class='error'>Only letters and white space allowed!</span>";
    }
  }
  if (empty($_POST["last_name"])) {
    $last_name_err = "<span class='error'>Last name is required!</span>";
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
      $last_name_err = "<span class='error'>Only letters and white space allowed!</span>";
    }
  }
  if(empty($_POST["country"])){
    $country_error = "<span class='error'>Please Enter a perfect money address</span>";
  }
  if (empty($_POST["username"])) {
    $username_err = "<span class='error'>Username is required!</span>";
  } else {
    $username = test_input($_POST["username"]);
    if($username == $column_username){
        $username_err = "<span class='error'>This username is already in use</span>";
    }
    }
   
  if (empty($_POST["password"])) {
    $password_err = "<span class='error'>Password is required!</span>";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
   if($password != $password2){
        $password_err = "<span class='error'>Your passwords are not the same </span>";
      } elseif($password == $column_password){
        $password_err = "<span class='error'>This password is already in use</span>";
    }
  }
  if (empty($_POST["email"])) {
    $email_err = "<span class='error'>Email is required!</span>";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "<span class='error'>Invalid email format!</span>";
    }elseif($email == $column_email){
      $email_err = "<span class='error'>This email is already in use</span>";
  }
  }
  if (empty($_POST["wallet"])) {
    $btc_address_error = "<span class='error'>bitcoin wallet is required!</span>";
  } else {
    $btc_address = test_input($_POST["wallet"]);
    // check if name only contains letters and whitespace
    if($btc_address == $column_wallet){
        $btc_address_error = "<span class='error'>This bitcoin address is already in use</span>";
    }
  }

  //if validation is satified then create a token for the user 
  
  
        if ($first_name_err == "" and $last_name_err == "" and $email_err == "" and $username_err == "" and $password_err == "" and $btc_address_error == "" and $country_error ==""){
        
      
         
         
        $update_user = "UPDATE users SET first_name = '$first_name', last_name = '$last_name' , email ='$email' , wallet= '$btc_address' , username =  '$username', country =  '$country' , password_user ='$password' where id = $id_no3";
        $update_user = mysqli_query($connect,$update_user);
        }
}




  

  




        
  

?>