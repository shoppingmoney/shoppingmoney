<?php
session_start();
ob_start();
if ($_SESSION['superEmail'] == null || $_SESSION['superEmail'] == '') {
    header("location:login.php");
}
include 'class/Connection.php';
include 'class/Fileupload.php';
include 'class/DBQuery.php';
include 'class/Helpers.php';
include 'class/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
$dbBlock = new DBQuery();
$LoadMsg = new ReturnMsg();

 if(isset($_GET['state']))
 { 
   
   $state=explode(',',$_GET['state']);

   $str=implode("', '",$state);

 //  echo $str;
   //echo "Select * from state_district group by district where state IN ('$str')";
  $getDataDist=$dbAccess->selectData("Select * from state_district  where state IN ('$str') group by district");
 
?>
<!--  Dist search start -->
<select  id="myselectDist" name="character" multiple="multiple">
  <?php foreach( $getDataDist as $getDist ) {?>
 <option  value="<?=$getDist['district'];?>" ><?=$getDist['district'];?></option>
 <?php } ?>
</select>

<script type="text/javascript">
    $(function() {
        // initialize sol
        $('#myselectDist').searchableOptionList();
    });
</script>
<button onclick='fetchPin();'> Filter District</button>
 <? } ?>
<!--  Dist search end -->

<?php 
if(isset($_GET['dist']))
 { $dist=explode(',',$_GET['dist']);
   $strdist=implode("', '",$dist);
 //  echo $str;
   //echo "Select * from state_district group by district where state IN ('$str')";
  $getDataPin=$dbAccess->selectData("Select * from state_district  where district IN ('$strdist') group by pin");
 
?>
<form action="" method="post" >
<input type="hidden" name="id" value="<?=$_GET['id'];?>">
<!--  Pin search start -->
<select id="my-selectPin" name="pin[]" multiple="multiple">
   <?php foreach( $getDataPin as $getPin ) {?>
 <option  value="<?=$getPin['pin'];?>" ><?=$getPin['pin'];?></option>
 <?php } ?>
 
</select>

<script type="text/javascript">
    $(function() {
        // initialize sol
        $('#my-selectPin').searchableOptionList();
    });
</script>
<!--  Pin search end -->
<input type="submit" name="submit" >
</form>
 <? } ?>