<?php

include("../../include/config.php");





   
    $amount= "";
    $verified = 0;
    $wallet = "";
    



if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $amount= $_POST['amount'];
  $wallet = $_POST['wallet'];
  $get_user = "select * from users where token = '$_SESSION[token]'";
  $run_user = mysqli_query($connect,$get_user);
  $row_user = mysqli_fetch_array($run_user);
 
  $first_name2 = $row_user['first_name'];
  $last_name2 = $row_user['last_name'];
  $id_no2 = $row_user['id_no'];
  
  $reference_id = mt_rand(10000000 , 99999999);
  
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
  

   
        

         
        $insert_request = "INSERT INTO withdraw_request (first_name , last_name , wallet , id_no , amount , btc , reference_no , verified) 
        VALUES ('$first_name2','$last_name2','$wallet','$id_no2','$amount','$dollars','$reference_id','$verified')";
        $run_request = mysqli_query($connect,$insert_request);
        $_SESSION['reference_no'] = $reference_id;
        echo "<script>window.open('../examples/withdraw-invoice.php','_self')</script>";
        
}




  

  




        
  

?>