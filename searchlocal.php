<?php //echo "<script> alert('hello fetch');</script>";
include 'vendor/lib/Connection.php';
include 'vendor/lib/Fileupload.php';
include 'vendor/lib/DBQuery.php';
include 'vendor/lib/Helpers.php';
include 'vendor/lib/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
 $string = $_GET['queryString'];
  $d = $_GET['qd'];

//echo "select * from product_tbl where category_id like '%".$d."%' and (title like '%".$string."%' or brand like '%".$string."%' or ptoduct_type like '%".$string."%')";
//echo "<script> alert('$d');</script> ";

if($d==null || $d=='Select Categories'){
$qurey = $dbAccess->selectData("select * from product_tbl where (title like '%".$string."%' or brand like '%".$string."%' or ptoduct_type like '%".$string."%')");
}else{
	$qurey = $dbAccess->selectData("select * from product_tbl where category_id like '%".$d."%' and (title like '%".$string."%' or brand like '%".$string."%' or ptoduct_type like '%".$string."%')");
}
  echo "<ul>";
 //echo "<script> alert('inside location;'); </script>";
  foreach($qurey as $nth){ 
	   ?> 
	   
	    <li onClick="fill_r('<?php echo $nth['title'];?>');"> <?php echo $nth['title'];?></li>
	   <?php
	}


	echo "</ul>";
?>

   

  
         
	



