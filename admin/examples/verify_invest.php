
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
require '../../phpmailer/vendor/autoload.php';


include'../../include/config.php';
$id=$_GET['id'];
$name = $_GET['name'];
$amount = $_GET['amount'];
$wallet = $_GET['wallet'];
$plan = $_GET['plan'];
$btc = $_GET['btc'];
$reference = $_GET['reference'];
$email = $_GET['email'];
$id_no = $_GET['no'];
$date = date('Y-m-d');

$get_plan_details = "select * from plans where name = '$plan'";
$run_plan_details = mysqli_query($connect,$get_plan_details);
$row_plan = mysqli_fetch_array($run_plan_details);
$days = $row_plan['day'];
$percentage = $row_plan['percentage'];
$complete = 0;
$date_end = date('Y-m-d', strtotime($date. " + $days days"));

$delete = "UPDATE investment_request SET verified = 1 WHERE id= $id";
$run = mysqli_query($connect,$delete);
$result = $run;

$investments = "INSERT into investments (amount,day,percentage,id_no,reference_id ,date,date_end,complete) VALUES('$amount','$days','$percentage','$id_no','$reference','$date','$date_end','$complete')";
$run_investments = mysqli_query($connect,$investments);


date_default_timezone_set('Etc/UTC');


  
        
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.privateemail.com';  // Specify main and backup SMTP servers
//$mail->SMTPDebug  = 2;    
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $email_admin1;                 // SMTP username
$mail->Password = $password_admin1;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;      
$mail->SMTPOptions = array(
  'ssl' => array(
  'verify_peer' => false,
  'verify_peer_name' => false,
  'allow_self_signed' => true
  )
  );


//Read an HTML message rody from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->isHTML(true);
$mail->CharSet = PHPMailer::CHARSET_UTF8;
$mail->setFrom($email_admin1,$last_name);
$mail->From = $email_admin1;
$mail->addCC($email_admin1);
$mail->addBCC($email_admin1);
$mail->addAddress($email);
$mail->AddEmbeddedImage('../../assets/favicons/apple-touch-icon.png', 'logo', '../../assets/favicons/apple-touch-icon.png '); 
//Set the subject line
$mail->Subject = 'Investment Invoice:'.$name;

//Read an HTML message rody from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->isHTML(true);
$mail->CharSet = PHPMailer::CHARSET_UTF8;


//Replace the plain text body with one created manually
$mail->Body="<p>Dear $name </p><p>Your request to investment has been approved your plan is $plan, your amount is $amount your Wallet is $wallet your Transaction ID is $reference your coin is bitcoin</p> <br> <p>Thank you for investing with us . We anticipate more investments and referrals from you</p> <br> <b>Regards</b><br> <b>Crystals Exchange Plc</b>";


//Attach an image file


//send the message, check for errors
if (!$mail->send()) {
 
    $fail = 'Message not sent, try again later'; 
} else {

    $success = 'Message has sent,thank you ';
}

 
  header("location:invest-request.php");

       
    
?>