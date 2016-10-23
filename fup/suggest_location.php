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
//echo "select * from state_district where state='".$d."' and (pin like '%".$string."%' or area like '%".$string."%')";
//echo "<script> alert('$d');</script> ";






	$qurey = $dbAccess->selectData("select * from state_district where state='".$d."' and (pin like '%".$string."%' or area like '%".$string."%')");
  echo "<ul>";
 //echo "<script> alert('inside location;'); </script>";
  foreach($qurey as $nth){ 
$str = $nth['area']." ".$nth['district']." ".$nth['state']." ".$nth['pin'];
$keyword = $string;
$str = preg_replace("/\b([a-z]*${keyword}[a-z]*)\b/i","<span id='ty'>$1</span>",$str);
// echo "$str";  prints 'Its <b>fun</b
	   ?> 
	   
	 

 <li onClick="fill_f('<?php echo $nth['area'];?>','<?php echo $nth['pin'];?>','<?php echo $nth['district'];?>','<?php echo $nth['state'];?>');"> <?php echo $str;?></li>
	   
<?php
	}


	echo "</ul>";
?>

 <style>
    #ty{
    font-weight: bold;
    }
</style>  

  
         
	



