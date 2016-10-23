<?php //echo "<script> alert('hello fetch');</script>";

include 'class/Connection.php';
include 'class/Fileupload.php';
include 'class/DBQuery.php';
include 'class/Helpers.php';
include 'class/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
$FileUpload = new Fileupload();
 $string = $_GET['id'];
 
 //@extract($_GET);

//echo "select * from product_tbl where category_id like '%".$d."%' and (title like '%".$string."%' or brand like '%".$string."%' or ptoduct_type like '%".$string."%')";
//echo "<script> alert('$d');</script> ";

	$qurey = $dbAccess->selectData("select * from product_category where parent_id ='".$string."'");

 //echo "<script> alert('inside location;'); </script>";
  foreach($qurey as $nth){ 
	   ?> 
	   <option value="<?php echo $nth['id'];?>" ><?php echo $nth['category_name'];?></option>
	   <?php
	}

?>

   

  
         
	



