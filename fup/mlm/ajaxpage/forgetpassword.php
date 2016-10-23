<?php
include_once '../includes/config.php';
$conf = new config();
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Shoppingmoney<info@shoppingmoney.com>' . "\r\n";
//date_default_timezone_set("Asia/Kolkata");
//$date=date("d:m:Y h:i:sa");
$subject = "Reset Password";
//Generate random password
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$email = $_GET['email'];
$id = $conf->single("firstimeregd WHERE uemail='$email'",'id');
if($id <= 0 || empty($id)){
	echo "This email is not register yet";
}else{
	$pass = randomPassword();
	$password = sha1($pass);
	$message = "Your new password is : ".$pass;
	$res = $conf->query("UPDATE firstimeregd SET upassword = '$password' WHERE id='$id'");
	$body = "
         <html>
		 <body>
		 <p>$message</p>
		 </body>
		 </html>
        ";
if($res > 0){
	echo "Password has sent to your mail";
	mail($email,$subject,$body,$headers);
}
}
$conf->closeConnection();

?>