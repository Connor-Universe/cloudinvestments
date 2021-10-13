<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;


date_default_timezone_set('Etc/UTC');

require '../../phpmailer/vendor/autoload.php';
   // define variables and set to empty values
$file_error ="";

 $success = $fail = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $get_user = "select * from users where token = $_SESSION[token]";
 $run_user = mysqli_query($connect,$get_user);
 $row_user = mysqli_fetch_array($run_user);
 $first_name = $row_user['first_name'];
 $last_name = $row_user['last_name'];
 $wallet = $row_user['wallet'];
 $id_no = $row_user['id_no'];
 $amount = $_POST['amount'];
 $email  = $row_user['email'];
 
 $target_dir = "uploads/";
 $target_file = $target_dir . basename($_FILES["verify"]["name"]);
 $uploadOk = 1;
 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 // Check if image file is a actual image or fake image

     $check = getimagesize($_FILES["verify"]["tmp_name"]);
     if($check !== false) {
         echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
     } else {
        $fail="File is not an image.";
         $uploadOk = 0;
     }
 
 // Check if file already exists
 if (file_exists($target_file)) {
    $fail= "Sorry, file already exists.";
     $uploadOk = 0;
 }
 // Check file size
 if ($_FILES["verify"]["size"] > 500000) {
    $fail= "Sorry, your file is too large.";
     $uploadOk = 0;
 }
 // Allow certain file formats
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
     $fail= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
 }
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
    $fail= "Sorry, your file was not uploaded.";
 // if everything is ok, try to upload file
 } else {
     if (move_uploaded_file($_FILES["verify"]["tmp_name"], $target_file)) {
        $fai="The file ". basename( $_FILES["verify"]["name"]). " has been uploaded.";
     } else {
        $fai= "Sorry, there was an error uploading your file.";
     }
 }
   
       
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = false;
$mail->SMTPOptions = array(
  'ssl' => array(
  'verify_peer' => false,
  'verify_peer_name' => false,
  'allow_self_signed' => true
  )
  );

//Set AuthType to use XOAUTH2
$mail->AuthType = 'XOAUTH2';

//Fill in authentication details here
//Either the gmail account owner, or the user that gave consent
$email1 = 'dummyouth123@gmail.com';
$clientId = '1044474112853-aa91skh2pdqiqna92g7lr0vcam7vac34.apps.googleusercontent.com';
$clientSecret = '_gHRv_yHmNuIULJv0PYRqsMp';

//Obtained by configuring and running get_oauth_token.php
//after setting up an app in Google Developer Console.
$refreshToken = '1//03SEAiLBdMUDiCgYIARAAGAMSNwF-L9Ir7CoYrJ6n5BVHnpbxiiMb0YCI5zxkOiFEmI8_kmEq-eIV9bvCkOEZLo9zSUEuRlTK6mo';

$mail->oauthUserEmail = "dummyouth123@gmail.com";
$mail->oauthClientId = "1044474112853-aa91skh2pdqiqna92g7lr0vcam7vac34.apps.googleusercontent.com";
$mail->oauthClientSecret = "_gHRv_yHmNuIULJv0PYRqsMp";
$mail->oauthRefreshToken = "1//03SEAiLBdMUDiCgYIARAAGAMSNwF-L9Ir7CoYrJ6n5BVHnpbxiiMb0YCI5zxkOiFEmI8_kmEq-eIV9bvCkOEZLo9zSUEuRlTK6mo";
//Create a new OAuth2 provider instance
$provider = new Google(
    [   
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
    ]
);

//Pass the OAuth provider instance to PHPMailer
$mail->setOAuth(
    new OAuth(
        [
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $email1,
        ]
    )
);

//Set who the message is to be sent from
//For gmail, this generally needs to be the same as the user you logged in as
$mail->setFrom($email,$first_name);

//Set who the message is to be sent to
$mail->addAddress('support@explicitexchange.com');

//Set the subject line
$mail->Subject = 'Verification email:'.$first_name.$last_name;

//Read an HTML message rody from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->isHTML(true);
$mail->CharSet = PHPMailer::CHARSET_UTF8;


//Replace the plain text body with one created manually
$mail->Body="<p>Name:$first_name $last_name</p> <p>Amount:$amount</p> <p> Id no: $id_no</p> <p>Wallet:$wallet</p>";


//Attach an image file
$mail->AddAttachment($target_file);

//send the message, check for errors
if (!$mail->send()) {
 
    $fail = 'Verification not sent , please try again later'; 
    unlink($target_file);
} else {

    $success = "Verification sent! Please wait 12hrs-24hrs for admins to process your payment";
}



      }
      
  


 





?>