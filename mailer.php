<?php 
$name = $_POST['name'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$skills = $_POST['skills'];

 $F = $_FILES['file']['name'];

move_uploaded_file($_FILES['file']['tmp_name'],"file/".$F);



	$message = '<html><body>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr><td><strong>First Name:</strong> </td><td>" . $name . "</td></tr>";
    $message .= "<tr><td><strong>Last Name:</strong> </td><td>" . $lname . "</td></tr>";
	$message .= "<tr><td><strong>Email :</strong> </td><td>" . $email . "</td></tr>";
	$message .= "<tr><td><strong>Mobile  :</strong> </td><td>" . $mobile . "</td></tr>";
	$message .= "<tr><td><strong>Skills  :</strong> </td><td>" . $skills . "</td></tr>";
$message .= "<tr><td><strong>Attachments:</strong> </td><td><a href='http://shoppingmoney.in/beta/file/".$F."' download><img src='http://shoppingmoney.in/beta/img/716970-clip-512.png' /></a></td></tr>";
	
	
	
	$to = 'hr@shoppingmoney.in';
	$subject = 'shoppingmoney.in';
	$from = $email;
	$headers = "From: " . $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$mailsent= mail($to, $subject, $message, $headers);
	if($mailsent)
	{	
		echo "<script>window.location='hiring.php?success=true';</script>";
                
	}
	else
	{
		echo "<p class='error'><strong>Error: </strong> mail not send.</p>";
	}		

?>