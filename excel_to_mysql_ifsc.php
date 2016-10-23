<html>
<body>

<?php

mysql_connect("localhost","httpshop_demo","Buoyant@123");
mysql_select_db('httpshop_money');	
?>

<?php

if(isset($_POST['submit']))
{
	
	print_r($_FILES);
	
	
    $filename=$_FILES['myfile']['tmp_name'];
	$file = fopen($filename, "r");
	$c=1;
	
	while (($emapData = fgetcsv($file, 0, ",")) !== FALSE)
	{
		print_r($emapData);
		if($c==1)
		{}
		else
		{
			//if($c==10)
			//break;
	echo	$sql=mysql_query("insert into bank_ifsc_code(bank_name,ifsc_code,micr_code,branch,address,contact,city,district,state) values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]',)") or die(mysql_error()) ;
	
	
	}
	
	$c++;
	
	}
	fclose($file);
	
	
	
	
}





?>

<form method="post" action="" enctype="multipart/form-data">

  <input type="file" name="myfile">
  </br>
  <input type="submit" name="submit">
  
</form>

</body>
</html>
