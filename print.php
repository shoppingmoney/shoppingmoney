<?php

include 'vendor/lib/Connection.php';

include 'vendor/lib/DBQuery.php';


$connection = new Connection();


$dbAccess = new DBQuery();


$fill=$dbAccess->selectSingleStmt("select * from product_img where product_id='".$_GET['q']."'");

?>

<img src="<?=$fill['image'];?>" />