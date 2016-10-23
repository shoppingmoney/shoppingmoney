<?php
include 'class/Connection.php';
include 'class/Fileupload.php';
include 'class/DBQuery.php';
include 'class/Helpers.php';
include 'class/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();

$LoadMsg = new ReturnMsg();


$yii=$dbAccess->selectSingleStmt("select * from product_tbl where product_id='".$_GET['poid']."'");
?>
<form method="post" style="width:325px;">

<b>Mrp</b>:- &nbsp; <?=$yii['mrp'];?>.<br/>

<b>Landing Price</b>:- &nbsp; <?=$yii['landing_price'];?>.<br/>


Select Color:- &nbsp;
   <select name="opt" class="form-control">      
      <?php                          
                                                             	$morning=$dbAccess->selectData("select * from point where status = '1'");
                                                             	foreach($morning as $tt){													
                                                             	?>
                                                             	<option <?php if($yii['color_code']==$tt['id']) echo "selected"?> value="<?=$tt['id'];?>"><?=$tt['point_color'];?></option>
                                                             	
                                                             	<?php } ?>
                                                             	</select>
<?php

$ds = $dbAccess->selectSingleStmt("select * from discount where product_id='".$_GET['poid']."'");
?>
ManualPoint:-&nbsp;

<input type="text" name="menual" id="xx<?=$_GET['poid'];?>" value="<?=$yii['menual'];?>" class="form-control" />
															
																Billing Type:- &nbsp;
																<select name="billtype" class="form-control">
																<option <?php if($yii['billing_type'] == 'Customer Name') echo "selected";?> value="Customer Name">Customer Name</option>
																<option <?php if($yii['billing_type'] == 'Shopping Money') echo "selected";?> value="Shopping Money">Shopping Money</option>
																
																</select>
																Commission Type:- &nbsp;
																<select name="comtype" class="form-control">
																<option <?php if($yii['commission_type'] == 'percent') echo "selected";?> value="percent">percent</option>
																<option <?php if($yii['commission_type'] == 'rupees') echo "selected";?> value="rupees">rupees</option>
																
																</select>
																Commission Ammount:- &nbsp;
																<input type="text" name="commission" class="form-control" value="<?=$yii['commission'];?>" >
Discount Type:- &nbsp;
<select name="discounttype" class="form-control">
<option <?php if($ds['discount_type'] == 'percent') echo "selected";?> value="percent">percent</option>
<option <?php if($ds['discount_type'] == 'rupees') echo "selected";?> value="rupees">rupees</option>
</select>													

Discount Amount:- &nbsp;
																<input type="text" name="discountamount" class="form-control" value="<?=$ds['discount']?>" placeholder="Discount Amount">
																
																<input type="hidden" name="hid" value="<?=$_GET['poid'];?>"/>
																<br/>
																<input type="submit" class="btn btn-info btn-sm" name="setting" value="submit"/>
																</form>
																
																
																
																