<?php 
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$category = $_POST['category'];
$Quantity = $_POST['Quantity'];
$email = $_POST['email'];
$Price = $_POST['Price'];
$discription = $_POST['discription'];







	$message = '<html><body>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr><td><strong> Name:</strong> </td><td>" . $name . "</td></tr>";
    $message .= "<tr><td><strong>Mobile:</strong> </td><td>" . $mobile . "</td></tr>";
	$message .= "<tr><td><strong>Category :</strong> </td><td>" . $category . "</td></tr>";
	$message .= "<tr><td><strong>Quantity  :</strong> </td><td>" . $Quantity . "</td></tr>";
	$message .= "<tr><td><strong>Email  :</strong> </td><td>" . $email . "</td></tr>";
	$message .= "<tr><td><strong>Price  :</strong> </td><td>" . $Price . "</td></tr>";
	$message .= "<tr><td><strong>Discription  :</strong> </td><td>" . $discription . "</td></tr>";

	
	
	$to = 'hr@shoppingmoney.in';
	$subject = 'shoppingmoney.in';
	$from = $email;
	$headers = "From: " . $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$mailsent= mail($to, $subject, $message, $headers);
	if($mailsent)
	{	
		echo "<script>window.location='index.php?success=true';</script>";
                
	}
	else
	{
		echo "<p class='error'><strong>Error: </strong> mail not send.</p>";
	}		

?>