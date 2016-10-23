<?php
include 'lib/Connection.php';
include 'lib/DBQuery.php';
include 'lib/Fileupload.php';
include 'lib/Helpers.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
if(isset($_GET['H'])){
$rose=$dbAccess->selectData("select * from product_filter_category where product_category_id = '".$_GET['H']."'");
foreach($rose as $flower){ ?>
<div style="float:left; position:relative;">
<label><b><?=$flower['filter_category_name'];?>&nbsp;(<?=$flower['mentfor'];?>)</b></label>

<ul style="list-style:none;">
<?php
$lotus=$dbAccess->selectData("select * from product_filter_value where filter_category_id = '".$flower['id']."'");
foreach($lotus as $lilly){
?>
<li><input type="checkbox" value="<?=$lilly['id'];?>" name="filter[]"> <?=$lilly['filter_value'];?></li>
<?php } ?>
</ul>
</div>
<?php
}

}
?>