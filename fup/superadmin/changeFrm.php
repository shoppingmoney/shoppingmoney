<?php
include 'class/Connection.php';
include 'class/DBQuery.php';
include 'class/Helpers.php';
$connection = new Connection();
$helper = new Helpers();
$dbAccess = new DBQuery();
$id = $_GET['H'];
$ids = explode(",",$id);
$log_directory = 'specificationFrm';
$product_id = 0;
$getFile = 0;
$specification_tbl='';
if (is_dir($log_directory))
{
        if ($handle = opendir($log_directory))
        {
                //Notice the parentheses I added:
                while(($file = readdir($handle)) !== FALSE)
                {       $fl = explode('_',$file);
                        //$results_array[] = $fl[0];
						if(in_array($fl[0],$ids)){
							$getFile = $file;
							$specification_tbl = "specification_".$fl[0];
							break;
						}
                }
                closedir($handle);
        }
}

//Output findings
if($getFile == 0){
	echo "<span style='color: red;'>No additional attribute in this category.</span>";
}else{
	$res=$dbAccess->selectSingleStmt("SELECT * FROM $specification_tbl WHERE product_id= $product_id");
	//echo "<a style='color: green;' href='$log_directory/$getFile' download>Download your excel here : $getFile </a>";
	include "specificationFrm/$getFile";
	$dbAccess->closeConnection();
}
?>