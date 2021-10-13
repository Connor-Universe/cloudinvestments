<?php

include("../../include/config.php");





   
    $amount= "";
    $verified = 0;
    
    



if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $amount= $_POST['amount'];
  $ramount = $amount * 5/100;
  $plan_id = $_POST['id'];
  $get_user = "select * from users where token = '$_SESSION[token]'";
  $run_user = mysqli_query($connect,$get_user);
  $row_user = mysqli_fetch_array($run_user);
 
  $first_name2 = $row_user['first_name'];
  $last_name2 = $row_user['last_name'];
  $email2= $row_user['email'];
  $wallet2 = $row_user['wallet'];
  $username2 = $row_user['username'];
  $country2 = $row_user['country'];
  $password2 = $row_user['password_user'];
  $id_no2 = $row_user['id_no'];
  $referal_code2 = $row_user['referal_code'];
  $reference_id = mt_rand(10000000 , 99999999);

  $get_request = "select * from investment_request where referal_code = '$referal_code2'";
$run_request = mysqli_query($connect,$get_request);
$row_request = mysqli_fetch_array($run_request);
$get_refer_user = "select * from users where promo_code = '$referal_code2'";
$run_refer_user = mysqli_query($connect,$get_refer_user);
$row_refer_user = mysqli_fetch_array($run_refer_user);
$email5 = $row_refer_user['email'];
$first_name5 = $row_refer_user['first_name'];
$last_name5 = $row_refer_user['last_name'];
$wallet5= $row_refer_user['wallet'];
$id_no3 = $row_refer_user['id_no'];


  if($row_request == 0){
   $insert_referal = "insert into referals (id_no,amount) VALUES('$id_no3','$ramount')";
   $run_referal = mysqli_query($connect,$insert_referal);
$reference_id = mt_rand(10000000 , 99999999);

  $get_plan = "select name from plans where id = '$plan_id'";
  $run_plan = mysqli_query($connect,$get_plan);
  $row_plan = mysqli_fetch_array($run_plan);

  $plan_name = $row_plan['name'];
  
  $dollars=$amount;
  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_URL => "https://blockchain.info/tobtc?currency=USD&value=" . $dollars,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "postman-token: fc62ebce-6d0b-ef4f-ba02-fcb05e284a02"
      ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
   $dollars = json_decode($response);
  
   
   
        

         
        $insert_request = "INSERT INTO investment_request (first_name , last_name , email , referal_code , country , wallet , id_no , plan , amount_invest , verified  , btc , reference_id) 
        VALUES ('$first_name2','$last_name2','$email2','$referal_code2','$country2','$wallet2','$id_no2','$plan_name','$amount','$verified','$dollars','$reference_id')";
        $run_request = mysqli_query($connect,$insert_request);
        $_SESSION['reference_id'] = $reference_id;
        header("location:../examples/invoice.php");



  //if validation is satified then create a token for the user 
  
         
          //Create a new PHPMailer instance
          $mail = new PHPMailer;

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



//Set who the message is to be sent from
//For gmail, this generally needs to be the same as the user you logged in as
$mail->setFrom($email_admin1,$last_name);

//Set who the message is to be sent to
$mail->addAddress($email5,"Mr/Mrs $last_name5");

//Set the subject line
$mail->Subject = 'Referal bonus email: Crystals Exchange Plc';

//Read an HTML message rody from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->isHTML(true);
$mail->CharSet = PHPMailer::CHARSET_UTF8;
$mail->setFrom($email_admin1,$last_name);
$mail->From = $email_admin1;
$mail->addCC($email_admin1);
$mail->addBCC($email_admin1);
$mail->AddEmbeddedImage('../../assets/images/logo.png', 'logo', '../../assets/images/logo.png '); 
//Replace the plain text body with one created manually
$mail->Body="
<p style='text-align:center;';> <img alt='PHPMailer' src='cid:logo'></p>
<p align=left> 
Hello $first_name5 $last_name5,</p> <p> Thank you for referring $first_name2 $last_name2 ,Your referee has invested $amount into their wallet, So you will be getting a 5% comission on their referal </p>
<p> You will receive $ramount into your wallet $wallet5 . Thank you for your referal , we hope to see more from you in the future</p>
<p> Regards From </p>
<p> Crystals Exchange Plc </p>";


//Attach an image file


//send the message, check for errors

     }else{

         $referal_code2 = "";  
          $get_plan = "select name from plans where id = '$plan_id'";
  $run_plan = mysqli_query($connect,$get_plan);
  $row_plan = mysqli_fetch_array($run_plan);

  $plan_name1 = $row_plan['name'];
  
  $dollars=$amount;
  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_URL => "https://blockchain.info/tobtc?currency=USD&value=" . $dollars,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "postman-token: fc62ebce-6d0b-ef4f-ba02-fcb05e284a02"
      ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
   $dollars1 = json_decode($response);
  
        

        $insert_request = "INSERT INTO investment_request (first_name , last_name , email , referal_code , country , wallet , id_no , plan , amount_invest , verified  , btc , reference_id) 
        VALUES ('$first_name2','$last_name2','$email2','$referal_code2','$country2','$wallet2','$id_no2','$plan_name1','$amount','$verified','$dollars1','$reference_id')";
        $run_request = mysqli_query($connect,$insert_request);
        $_SESSION['reference_id'] = $reference_id;
        header("location:../examples/invoice.php");
     }   
}




  

  




        
  

?>