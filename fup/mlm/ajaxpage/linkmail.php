<?php
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ShoppingMoney<info@shoppingmoney.com>' . "\r\n";
//date_default_timezone_set("Asia/Kolkata");
//$date=date("d:m:Y h:i:sa");
$subject = "Referral Link";
$message = $_GET['msg'];
//$email = "alam.buoyant@gmail.com";
$email = $_GET['email'];
$body = "
         <html>
		 <body>
		 <p>$message</p>
		 </body>
		 </html>
        ";
mail($email,$subject,$body,$headers);
?>