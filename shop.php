<?php
session_start();
ob_start();
@extract($_POST);
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

//print_r($_GET['filter']);
//echo $_SESSION['pin'];

if(isset($_GET['q'])){
	// for whishlist									
										$sum=$dbAccess->countDtata("select * from wishlist where user_id ='".$_SESSION['myemail']."' And product_id = '".$_GET['q']."' ");
										if($sum > 0){
											$dbAccess->updateData("delete from wishlist where user_id ='".$_SESSION['myemail']."' And product_id = '".$_GET['q']."'");
										}else{
$dbAccess->insertData("wishlist","user_id,product_id,status","'".$_SESSION['myemail']."','".$_GET['q']."','1'");
										}
										
										die();										
									}
if((!isset($_GET['filter'])) && (isset($_GET['prodfilter']))){
$zq=1;
$value=implode(',',$_GET['prodfilter']);
//echo "select * from product_tbl where brand IN(".$value.") OR product_type IN(".$value.")";
//die;
$iota=$dbAccess->selectData("select * from product_tbl where brand IN(".$value.") OR ptoduct_type IN(".$value.") OR color IN(".$value.") OR size IN(".$value.")");
$khal = array();
foreach($iota as $t){
$khal[] = $t['product_id'];
}
//print_r($khal);
$value = implode(',',$khal);
//echo "1";
$bill=true;
}
if((!isset($_GET['prodfilter'])) && (isset($_GET['filter']))){
$value=implode(',',$_GET['filter']);
//echo "2";
$bill=true;
}
if((isset($_GET['prodfilter'])) && (isset($_GET['filter']))){
$value1=implode(',',$_GET['prodfilter']);
//strong hold
$iota=$dbAccess->selectData("select * from product_tbl where brand IN(".$value1.") OR ptoduct_type IN(".$value1.") OR color IN(".$value1.") OR size IN(".$value1.")");
$khal = array();
foreach($iota as $t){
$khal[] = $t['product_id'];
}
$value1 = implode(',',$khal);
//strong hold
$value2=implode(',',$_GET['filter']);
$value=$value1.",".$value2;
//echo "3";
$bill=true;
}

//echo $value;
//echo "select * from features where filter_value_id IN(".$value.")";



?>
<!doctype html>
<html class="no-js" lang="">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shoppingmoney.in</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->		
         <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		
		<!-- Google Fonts
		============================================ -->		
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Font awesome CSS
		============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
		<!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="lib/css/nivo-slider.css" type="text/css" />
		<!-- meanmenu CSS
		============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="css/jquery-ui.css">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="css/main.css">
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="css/style.css">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="vendor/release/featherlight.min.css" />
<script src="vendor/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>				
		
		<style>

input[type=range] {
  -webkit-appearance: none;
  margin: 18px 0;
  width: 100%;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #26acce;
  border-radius: 1.3px;
 
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  
  height: 25px;
  width: 10px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -14px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #26acce;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #26acce;
  border-radius: 1.3px;
  
}
input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  
  height: 25px;
  width: 10px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 4px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
  border-width: 16px 0;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #26acce;
  
  border-radius: 2.6px;
  box-shadow: 0px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-fill-upper {
  background: #26acce;
  
  border-radius: 2.6px;
  box-shadow: 0px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-thumb {
  box-shadow: 0px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  
  height: 25px;
  width: 10px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]:focus::-ms-fill-lower {
  background: #26acce;
}
input[type=range]:focus::-ms-fill-upper {
  background: #367ebd;
}


.category-menu-list {
    width: 100%;
    z-index: 1000;
    margin-top: -30px;
    height: 381px;
    overflow-y: scroll;
}

.category-menu-list ul li .cat-left-drop-menu {
  background: hsl(0, 0%, 100%) none repeat scroll 0 0;
  border: 1px solid #eee;
  box-shadow: 0 0 5px -1px #666;
  left: 107%;
  opacity: 0;
  overflow: scroll;
  height: 382px;
  padding: 25px 20px 20px;
  position: absolute;
  text-align: left;
  top: 0;
  transition: all 0.3s ease 0s;
  visibility: hidden;
  width: 1000px;
  z-index: 999999999;
}

.category-menu-list ul li .cat-left-drop-menu {
    background: hsl(0, 0%, 100%) none repeat scroll 0 0;
    border: 1px solid #eee;
    box-shadow: 0 0 5px -1px #666;
    left: 107%;
    opacity: 0;
    overflow: scroll;
    height: 382px;
    padding: 25px 20px 20px;
    position: absolute;
    text-align: left;
    top: -30px;
    transition: all 0.3s ease 0s;
    visibility: hidden;
    width: 1000px;
    z-index: 999999999;
}


		.product-area {
    margin-top: 0px;
}
		.single-product{border: 1px solid #ddd;}
		
		.cat-left-drop-menu{
	margin-left:-17px !important;
			}
	
	.menuicon{float:left;width:80px;height:auto;margin: 15px 8px;}
	.divmenu {
    width: 32px;
    height: 3px;
    background-color: #fff;
    margin: 4px 0;
}


#mydiv-content {

        width: 100%;
        position: fixed;
        z-index: 10;
        /* margin-left: 15%; */
        bottom: 0px;
        padding: 25px 4px;
        background: -webkit-linear-gradient(#eeeeee,#bfbfbf);
        background: -ms-linear-gradient(#eeeeee,#bfbfbf);
        background: -moz-linear-gradient(#eeeeee,#bfbfbf);
        background: linear-gradient(#eeeeee,#bfbfbf);
        background: -o-linear-gradient(#eeeeee,#bfbfbf);
        border: 1px solid #bfbfbf;

}
	
	
		.dropdown-check-list {
  display: inline-block;
    position: absolute;
    top: 11px;
    left: 29px;
}
.dropdown-check-list .anchor {
  position: relative;
  background:#fff;
  cursor: pointer;
  display: inline-block;
  padding: 5px 92px 5px 10px;
  border: 1px solid #ccc;
}
.dropdown-check-list .anchor:after {
  position: absolute;
  content: "";
  border-left: 2px solid black;
  border-top: 2px solid black;
  padding: 5px;
  right: 10px;
  top: 20%;
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
.dropdown-check-list .anchor:active:after {
  right: 8px;
  top: 21%;
}
.dropdown-check-list ul.items {
  padding: 8px 31px;
  background: #FFFFFF;
  display: none;
      right: -1px;
    position: absolute;
    z-index: 99999;
  margin: 0;
  border: 1px solid #ccc;
  border-top: none;
}
.dropdown-check-list ul.items li {
  list-style: none;
}
.dropdown-check-list.visible .anchor {
  color: #474747;
}
.dropdown-check-list.visible .items {
  display: block;
}

.cobra{
position:fixed
top:0;
left:0;
right:0;
bottom:0;
/*/opacity:0.5;/*/
}
#iconmenu{
margin-left:57px;
}

.btn112{
background: #26acce;
    color: #fff;
    margin-left: 59%;
    padding: 9px 38px;
border:none;
}


<!------Compare css ------>

#mydiv {
    width: 100%;
    height: 100%;
    overflow: hidden;
    left: 100px;
    top: 100px;
    position: absolute;
    opacity: 0.5;
    z-index: 200;
}
#mydiv-container {
    margin-left: auto;
    margin-right: auto;
}

a {
    color: #5874BF;
    text-decoration: none;
}
a:hover {
    color: #112763;
}

.comparetxt{font-size:10px;}

.compareimg{width: 50px;float: left;height: 50px;margin-right:3px;}

#comparebox1{border: 1px solid #d0d0d0;padding: 5px 5px; background:#fff;height: 62px;}
#comparebox2{border: 1px solid #d0d0d0;padding: 5px 5px; background:#fff;height: 62px;}
#comparebox3{border: 1px solid #d0d0d0;padding: 5px 5px; background:#fff;height: 62px;}
#comparebox4{border: 1px solid #d0d0d0;padding: 5px 5px; background:#fff;height: 62px;}

.closebt{float: right;
    right: 13px;
    position: absolute;
	color:#fff;
	top: 10px;}
	
.closediv{float: right;
    position: relative;
    top: -23px;
    cursor: pointer;}	
#sub-listing{
	border-bottom:1px dotted grey;
	padding:5px;
}
.sub-list ul li a: hover{
  background:blue;
}
#sub-link{
	padding:5px 5px !important;
}
.sub-list{
    padding:0 0 10px 0;
    margin-bottom:2%;
}
<!------- Compare css end ------>
		</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
function firstAppear(){
$(function(){
$("body").addClass("cobra");
});
}
</script>
<script>
$(function(){
setTimeout(function(){
$("body").removeClass("cobra");
}, 1000);
});
</script>
 <script type="text/javascript">
  
  function show(id,name,image,target) {
	var flag=document.getElementById("compareid").value;
	//alert(id);
	  if(flag<5) {
		  
    document.getElementById(target).style.display = 'block';
	document.getElementById("comparebox"+flag).style.display='block';
	document.getElementById("compareimg"+flag).setAttribute("src", image);
	document.getElementById("comparetxt"+flag).innerHTML=name;
	document.getElementById("product"+flag).value= id;
	//document.getElementById("div"+)
	document.getElementById("compareid").value= ++flag;
	
	
	  }
	  else
	  {
		  alert("max achived");
	  }
}

function hide(target) {
    document.getElementById(target).style.display = 'none';
}
</script>
  <script>
  function hidecomp(id)
  {
	//  alert("hello i am hidecomp "+id);
	 if(document.getElementById(id).style.display == "block")
	 {  var flag1= document.getElementById("compareid").value;
 document.getElementById(id).style.display = "none";
 document.getElementById("compareid").value= --flag1;
 //documtent.getElementById("product"+flag).value=id;
 }
 else{ alert('inside else');
	 //document.getElementById(target).style.display='block';
 } 
  }
  </script>
 <link rel='stylesheet prefetch' href='range/filter.css'>
  <link rel="stylesheet" href="range/foo.css">
    </head>
    <body style="background:#f7f7f7;" onload="firstAppear()" >


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
				<div class="col-md-1" style="position : relative; top:-93px;">
						<!-- CATEGORY-MENU-LIST START -->
	                    <div class="left-category-menu hidden-sm hidden-xs">
	                        <div class="left-product-cat" style="position:absolute;z-index:999999;">
	                            <div class="category-heading">
	                                <a href="#" class="menuicon">
<div class="divmenu"></div>
<div class="divmenu"></div>
<div class="divmenu"></div><span style="color:#fff;">Shop</span>
</a>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- END CATEGORY-MENU-LIST -->
	                </div>
	                
		<!-- HEADER AREA END -->
<!-- Compare div start -->

<div id="mydiv" style="display:none;">
    <div id="mydiv-container">
        <div id="mydiv-content">

<div class="col-xs-12">
                                                   <form method="get" action="compare.php">
												   <input type="hidden" id="compareid" value='1'>
                                                   <div class="col-sm-12">
                                                        <div class="col-sm-10">
                                                            <div class="col-sm-3" id="comparebox1" style="display:none;">
															<img id="compareimg1" src="" class="compareimg"><span id="comparetxt1" class="comparetxt"><a href="#" ></a></span>
															<span style="margin-top:15px;" onClick="hidecomp('comparebox1');" class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span>
															<input type="hidden" id="product1" name="product1" value="0">
														<!--	<input type="hidden" id="div1" name="product1" value="1">	-->														
															</div>
															
															<div class="col-sm-3" id="comparebox2" style="display:none;">
															<img id="compareimg2" src="" class="compareimg"><span id="comparetxt2" class="comparetxt"><a href="#"></a></span>
															<span style="margin-top:15px;" onClick="hidecomp('comparebox2');" class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span>
															<input type="hidden" id="product2" name="product2" value="0">
														<!--	<input type="hidden" id="div2" name="product1" value="2"> -->
															</div>
															
															<div class="col-sm-3" id="comparebox3" style="display:none;">
															<img id="compareimg3" src="" class="compareimg"><span id="comparetxt3" class="comparetxt"><a href="#"></a></span>
															<span style="margin-top:15px;" onClick="hidecomp('comparebox3');" class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span>
															<input type="hidden" id="product3" name="product3" value="0">
													<!--		<input type="hidden" id="div3" name="product1" value="3"> -->
															</div>
															
															<div class="col-sm-3" id="comparebox4" style="display:none;">
															<img id="compareimg4" src="" class="compareimg"><span id="comparetxt4" class="comparetxt"><a href="#"></a></span>
															<span style="margin-top:15px;" onClick="hidecomp('comparebox4');" class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span>
															<input type="hidden" id="product4" name="product4" value="0">
														<!--	<input type="hidden" id="div4" name="product1" value="4"> -->
															</div>
															
                                                        </div>
                                                        <div class="col-sm-2">
                                                             
														
                                                        <div class="ssb">
														<button type="submit" name="submit" value="submit" class="btn btn-primary btn-feat tab-move1">compare</button> 
														</div>
														
														</div>
														
														
                                                    </div>
												</form>
                                                  
                                                </div>	
<a href="#" onclick="hide('mydiv')" class="closebt"><i class="fa fa-times" aria-hidden="true"></i></a>

        </div>
    </div>
</div>	
       <!-- Compare div end -->	
		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	            <div class="row">
				<?php include("include/menu2.php"); ?>
					<div class="col-md-12">
						<ul class="page-menu">
<?php
if(!isset($_GET['search']))
{
$doodle=$dbAccess->selectSingleStmt("select * from product_category where id = '".$_GET['product']."'");
$doodle1=$dbAccess->selectSingleStmt("select * from product_category where id = '".$doodle['parent_id']."'");
if($doodle1['parent_id'] > 0){
								$doodle2=$dbAccess->selectSingleStmt("select * from product_category where id = '".$doodle1['parent_id']."'");
								$bl2 =  "<li><a href='#'>".ucwords($doodle2['category_name'])."</a></li>";
								if($doodle2['parent_id'] > 0){
								$doodle3=$dbAccess->selectSingleStmt("select * from product_category where id = '".$doodle2['parent_id']."'");
								$bl1 =  "<li><a href='#'>".ucwords($doodle3['category_name'])."</a></li>";
							}
							}
?>
	<li><a href="index.php">Home</a></li>
	<?php 
	if($bl1 != '') echo $bl1;
	if($bl2 != '') echo $bl2;


							?>
							<li><a href="#"><?=ucwords($doodle1['category_name']);?></a></li>
							<li class="active"><a href="#"><?=ucwords($doodle['category_name']);?></a></li>
							
<?php
}
else{ ?>

	<li><a href="index.php">Home</a></li>
	
							<?php

$doodle2=$dbAccess->selectSingleStmt("SELECT COUNT(*) as c FROM product_tbl where (ptoduct_type='".$_GET['search']."' OR brand='".$_GET['search']."' OR title='".$_GET['search']."')");			
							
							?>							
		<li class="active">Showing <?php echo $doodle2['c'] ?> results for <a href="#">"<?php echo $_GET['search']?>"</a></li>
<?php	 echo $cat_product=$doodle1['category_name'];
	
}
?>
						
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3" id="filterpart">
						<div class="accordion_one">
							<?php
if($_GET['watme']=='ne'){
$subcat=$dbAccess->selectSingleStmt("select * from product_category where parent_id = '".$_GET['catid']."'");
}else{
if(isset($_GET['search'])){



$c=urldecode($_GET['search']);
$kut=$dbAccess->selectSingleStmt("select * from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%' || title like '%$c%')");
$ktaa = $kut['category_id'];
$cl = explode(",",$ktaa);
$first=$dbAccess->selectSingleStmt("select count(*) as t from product_category where parent_id = '$cl[3]'");
if($first['t'] > 0){
$subcat=$dbAccess->selectSingleStmt("select * from product_category where parent_id = '$cl[3]'");
}else{
$subcat=$dbAccess->selectSingleStmt("select * from product_category where parent_id = '$cl[2]'");

}
}
else{
$thiscnt=$dbAccess->selectSingleStmt("select count(product_id) as cnt from product_tbl where category_id LIKE  '%,".$doodle['id'].",%' AND status = 1 AND verify = '1' AND pincode LIKE '%,".$_SESSION['pin'].",%'");
							$subcat=$dbAccess->selectSingleStmt("select * from product_category where parent_id = '".$doodle['id']."'");
}
}
if(isset($_GET['search'])){

$thiscnt=$dbAccess->selectSingleStmt("select count(product_id) as cnt from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%' || title like '%$c%') AND status = 1 AND verify = '1' AND pincode LIKE '%,".$_SESSION['pin'].",%'");
}else{
$thiscnt=$dbAccess->selectSingleStmt("select count(product_id) as cnt from product_tbl where category_id LIKE  '%,".$doodle['id'].",%' AND status = 1 AND verify = '1' AND pincode LIKE '%,".$_SESSION['pin'].",%'");
    }
							if($subcat['id'] > 0){


							?>
							<div id="divone2" class="collapse in">
								<div class="col-md-12 sub-list" id=""><br>
<?php
if(isset($_GET['search'])){ ?>
<h3><?=ucwords($_GET['search']);?>(<?=$thiscnt['cnt']?>)</h3>
<?php
}else{
?>								<h3 class="title-group gfont-1"><?=ucwords($doodle['category_name']);?> 
(<?=$thiscnt['cnt']?>)</h3>
<?php } ?>
									<ul style="height:250px; overflow-y:scroll;">
									<?php
if($_GET['watme']=='ne'){
$subcat=$dbAccess->selectData("select * from product_category where parent_id = '".$_GET['catid']."'");
}else{
if(isset($_GET['search'])){
$c=$_GET['search'];
$kut=$dbAccess->selectSingleStmt("select * from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%' || title like '%$c%')");
$ktaa = $kut['category_id'];
$cl = explode(",",$ktaa);
$first=$dbAccess->selectSingleStmt("select count(*) as t from product_category where parent_id = '$cl[3]'");
if($first['t'] > 0){
$subcat=$dbAccess->selectData("select * from product_category where parent_id = '$cl[3]'");
}else{
$subcat=$dbAccess->selectData("select * from product_category where parent_id = '$cl[2]'");

}
}else{

									$subcat=$dbAccess->selectData("select * from product_category where parent_id = '".$doodle['id']."'");
}
}
									foreach($subcat as $sub){
										$pcnt=$dbAccess->selectSingleStmt("select count(product_id) as cnt from product_tbl where category_id LIKE  '%,".$sub['id'].",%' AND status = 1 AND verify = '1' AND pincode LIKE '%,".$_SESSION['pin'].",%'");
									?>
										<li class="arrow-plus" id="sub-listing">
											<a href="shop.php?product=<?=$sub['id'];?>&catid=<?=$sub['parent_id'];?>&fethid=<?=$doodle1['id'];?>&watme=ne&session=<?=rand(1001,10010); ?>" id="#sub-link">
												<?php echo ucwords($sub['category_name']) ." (".$pcnt['cnt'].")";?>
											</a>
										</li>
									<?php } ?>
										
	                                </ul>
								</div>

							</div>
							
							<hr>
							<?php } else{ ?>

<div id="divone2" class="collapse in">
								<div class="col-md-12 sub-list" id=""><br>
								<h3 class="title-group gfont-1"><?=ucwords($doodle['category_name']);?> (<?=$thiscnt['cnt']?>)</h3>
									<ul style="max-height:250px; overflow-y:scroll;">
									<?php
if($_GET['watme']=='ne'){
$subcat=$dbAccess->selectData("select * from product_category where parent_id = '".$_GET['catid']."'");
}else{
if(isset($_GET['search'])){
$c=$_GET['search'];
$kut=$dbAccess->selectSingleStmt("select * from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%' || title like '%$c%')");
$ktaa = $kut['category_id'];
$cl = explode(",",$ktaa);
$first=$dbAccess->selectSingleStmt("select count(*) as t from product_category where parent_id = '$cl[3]'");
if($first['t'] > 0){
$subcat=$dbAccess->selectData("select * from product_category where parent_id = '$cl[3]'");
}else{
$subcat=$dbAccess->selectData("select * from product_category where parent_id = '$cl[2]'");

}
}else{

									$subcat=$dbAccess->selectData("select * from product_category where parent_id = '".$_GET['fethid']."'");
}
}
									foreach($subcat as $sub){
										$pcnt=$dbAccess->selectSingleStmt("select count(product_id) as cnt from product_tbl where category_id LIKE  '%,".$sub['id'].",%' AND status = 1 AND verify = '1' AND pincode LIKE '%,".$_SESSION['pin'].",%'");
									?>
										<li class="arrow-plus" id="sub-listing">
											<a href="shop.php?product=<?=$sub['id'];?>&catid=<?=$doodle['id'];?>&fethid=<?=$doodle1['id'];?>&watme=ne&session=<?=rand(1001,10010); ?>" id="#sub-link">
												<?php echo ucwords($sub['category_name']) ." (".$pcnt['cnt'].")";?>
											</a>
										</li>
									<?php } ?>
	                                </ul>
								</div>

							</div>
							
							<hr>

<?php } ?>		
					
						</div>
						<div class="accordion_one">
						
							<div class="shop-filter">
							<div class="area-title">
								<h3 class="title-group gfont-1">Filters Products</h3>
							</div>
							<h4 class="shop-price-title">Price</h4>
							<form method="post" >
<label>
<b>MIN:</b>
</label>
<input id="prcrange" type="range" min="0" max="500" step="50" value="<?php if($_POST['min']==null){ echo 0; } else{ echo $_POST['min']; } ?>" onchange="printValue('prcrange','watchmenene')">
<label>
<b>MAX:</b>
</label>
<input id="rspees" type="range" min="500" max="1000" step="50" value="<?php if($_POST['max']==null){ echo 1000; } else{ echo $_POST['max']; } ?>" onchange="printValue('rspees','cholo')">

<input type="text" name="max" id="cholo" class="form-control" value="<?php if($_POST['max']==null){ echo 1000; } else{ echo $_POST['max']; } ?>" style="width:60px; margin: 12px 1px 1px 202px !important;height:29px;" />
<input type="text" name="min" id="watchmenene" class="form-control" value="<?php if($_POST['min']==null){ echo 500; } else{ echo $_POST['min']; } ?>" style="width:60px; margin: -34px 53px 9px 0px;height:29px;" />

<input type="submit" name="submit" value="Filter" class="btn112" />




<script>
function printValue(q,r){
var doc = document.getElementById(q).value;
var mac = document.getElementById(r).value = doc;

}
</script>

        
      </form>
						</div>
<hr>
						
						<?php
if(isset($_GET['pref'])){
												$getid = $_GET['catid'];	
												}else{
												$getid = $_GET['product'];
												}

if(isset($_GET['search'])){
$c=$_GET['search'];
$qurey=$dbAccess->selectData("select * from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%') group by brand ");

}else{

						$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%,$getid,%' group by brand ");
}
						?>
							
							<h4><a class="accordion-trigger" data-toggle="collapse" href="#divone">Brand</a></h4>

                                        <input type="search" name="search" class="form-control" id="input" class="brandsrch"  placeholder="Search By Brand" style="margin-top:7%;">
							<div id="divone" class="collapse in">
								<div class="filter-menu">
									<ul >
									<div class="scrollbar" id="style-3">
			  <div class="force-overflow">
			  <?php
			  foreach($qurey as $t){

//stark overflow
$arya = $_GET['prodfilter'];
$sansa = "'".$t['brand']."'";
$robb = 0;
for($ned=0;$ned<count($arya);$ned++){

	if($sansa == $arya[$ned]){
		$robb++;
	}
}

//stark overflow

if($robb%2==0){
$solve="";
}else{
$solve="checked";
}


if($t['brand']=='null' || $t['brand']==''){

}else{
			  ?>



<div class='fltr' >
<input type="checkbox" <?=$solve;?> value="<?=$t['brand'];?>" onClick="myinprod('<?=$t['brand'];?>');" name="inpro[]"/>
<strong class="name"><?=$t['brand'];?></strong>
</div>
						<?php } } ?>
									</div></div></ul>
								</div>

<script>
var input = document.getElementById('input');
input.onkeyup = function () {
    var filter = input.value.toUpperCase();
    var lis = document.getElementsByClassName('fltr');
    for (var i = 0; i < lis.length; i++) {
        var name = lis[i].getElementsByClassName('name')[0].innerHTML;
        if (name.toUpperCase().indexOf(filter) == 0) 
            lis[i].style.display = 'block';
        else
            lis[i].style.display = 'none';
    }
}
</script>

							</div><hr>
							
							
							<?php
if(isset($_GET['search'])){
$c=$_GET['search'];
$qurey=$dbAccess->selectData("select * from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%') group by ptoduct_type");
}else{
						$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%,$getid,%'  group by ptoduct_type");
}
						
						?>
							
							<h4><a class="accordion-trigger" data-toggle="collapse" href="#divone4">Type</a></h4>
							<div id="divone4" class="collapse in">
								<div class="filter-menu">
									<ul>
									<div class="scrollbar" id="style-3">
			  <div class="force-overflow">
			  <?php
			  foreach($qurey as $t){



//lennister 
$joffrey = $_GET['prodfilter'];
$cersei = "'".$t['ptoduct_type']."'";
$jamie = 0;
for($robert=0;$robert<count($joffrey);$robert++){

	if($cersei == $joffrey[$robert]){
		$jamie++;
	}
}

//lennister 

if($jamie%2==0){
$solve="";
}else{
$solve="checked";
}


if($t['ptoduct_type']=='null' || $t['ptoduct_type']==''){

}else{
			  ?>
										<li ><a href="javascript:void(0);"><div class="cchk"><input type="checkbox" value="<?=$t['ptoduct_type'];?>" <?=$solve;?> onClick="myinprod('<?=$t['ptoduct_type'];?>');" name="inpro[]"></div><?=$t['ptoduct_type'];?></a></li>
										<?php } } ?>
									</div></div></ul>
								</div>

							</div><hr>

							<h4><a class="accordion-trigger" data-toggle="collapse" href="#divone3">Discount</a></h4>

<div id="divone3" class="collapse in">
								<div class="filter-menu">
									<ul id="autocompletes1">
									<div class="scrollbar" id="style-3">
			  <div class="force-overflow">
			
										<li><a href="javascript:void(0);"><div class="cchk"><input type="checkbox" <?=$solve;?> value="10-20" onClick="myinprod('10-20');" name="dispro[]"></div>10%-20%</a></li>
										<li><a href="javascript:void(0);"><div class="cchk"><input type="checkbox" <?=$solve;?> value="10-20" onClick="myinprod('20-40');" name="dispro[]"></div>20%-40%</a></li>
										<li><a href="javascript:void(0);"><div class="cchk"><input type="checkbox" <?=$solve;?> value="10-20" onClick="myinprod('40-60');" name="dispro[]"></div>40%-60%</a></li>
										<li><a href="javascript:void(0);"><div class="cchk"><input type="checkbox" <?=$solve;?> value="10-20" onClick="myinprod('60-80');" name="dispro[]"></div>60%-80%</a></li>
										<li><a href="javascript:void(0);"><div class="cchk"><input type="checkbox" <?=$solve;?> value="10-20" onClick="myinprod('80-100');" name="dispro[]"></div>80%-100%</a></li>
									</div></div></ul>
								</div>

							</div><hr>
                            
                            
<?php

if(isset($_GET['search'])){
$c=$_GET['search'];
$qcount=$dbAccess->selectSingleStmt("select count(*) as isis from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%') And size != '' ");
}else{

$fine=$dbAccess->selectSingleStmt("select * from product_category where parent_id = '".$_GET['product']."' ");
$self=$fine['id'];
if($self==''){
$self = $getid;
}
$qcount = $dbAccess->selectSingleStmt("select count(*) as isis from product_tbl where (category_id LIKE '%,$getid,%' || category_id LIKE '%,$self,%') And size != ''");

}


if($qcount['isis'] > 0){
?>
<div id="divone" class="collapse in">
<h4><a class="accordion-trigger" data-toggle="collapse" href="#divone2">Size</a></h4>
								<div class="filter-menu">
									<ul id="autocompletes1">
									<div class="scrollbar" id="style-3">
			  <div class="force-overflow">
<?php
if(isset($_GET['search'])){
$c=$_GET['search'];
$qurey =$dbAccess->selectData("select * from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%') group by size");
}else{
$qurey = $dbAccess->selectData("select * from product_tbl where (category_id LIKE '%,$getid,%' || category_id LIKE '%,$self,%') group by size");
}
foreach($qurey as $ty){
if($ty['size'] != ''){
?>
			
										<li><a href="javascript:void(0);"><div class="cchk"><input type="checkbox" <?=$solve;?> value="10-20" onClick="myinprod('<?=$ty['size'];?>');" name="dispro[]"></div><?=$ty['size'];?></a></li>
<?php } } ?>
										
									</div></div></ul>
								</div>

							</div><hr>
<?php } else { } ?>
<?php

if(isset($_GET['search'])){
$c=$_GET['search'];
$qcount=$dbAccess->selectSingleStmt("select count(*) as isis from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%') And color != ''");
}else{

$fine=$dbAccess->selectSingleStmt("select * from product_category where parent_id = '".$_GET['product']."' ");
$self=$fine['id'];
if($self==''){
$self = $getid;
}
$qcount = $dbAccess->selectSingleStmt("select count(*) as isis from product_tbl where (category_id LIKE '%,$getid,%' || category_id LIKE '%,$self,%') And color != ''");

}

if($qcount['isis'] > 0){
?>
<div id="divone" class="collapse in">
<h4><a class="accordion-trigger" data-toggle="collapse" href="#divone2">Color</a></h4>
								<div class="filter-menu">
									<ul id="autocompletes1">
									<div class="scrollbar" id="style-3">
			  <div class="force-overflow">
<?php
if(isset($_GET['search'])){
$c=$_GET['search'];
//echo "select * from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%') And color != ''";
$qurey =$dbAccess->selectData("select * from product_tbl where (brand like '%$c%' || ptoduct_type like '%$c%' || title LIKE '%$c%') And color != ''");
}else{

$qurey = $dbAccess->selectData("select * from product_tbl where (category_id LIKE '%,$getid,%' || category_id LIKE '%,$self,%') group by color");
}
foreach($qurey as $ty){
if($ty['color'] != ''){
?>
			
										<li><a href="javascript:void(0);"><div class="cchk"><input type="checkbox" <?=$solve;?> value="10-20" onClick="myinprod('<?=$ty['color'];?>');" name="dispro[]"></div><?=$ty['color'];?></a></li>
<?php } } ?>
										
									</div></div></ul>
								</div>

							</div><hr>
<?php } else { } ?>
							<?php
							$qurey1 = $dbAccess->selectData("select * from product_filter_category where product_category_id = '".$_GET['catid']."' And subcategory_id = '".$_GET['product']."' group by filter_category_name");
							foreach($qurey1 as $ty){
				
							?>
							<h4><a class="accordion-trigger" data-toggle="collapse" href="#divone2"><?=$ty['filter_category_name'];?></a></h4>
							<div id="divone2" class="collapse in">
								<div class="filter-menu">
									<ul>
									<div class="scrollbar" id="style-3">
			  <div class="force-overflow">
			  <?php
			  $qurey2 = $dbAccess->selectData("select * from product_filter_value where filter_category_id = '".$ty['id']."' group by filter_value");
			  foreach($qurey2 as $t){
if (in_array("'".$t['id']."'", $_GET['filter'])){
$solve="checked";
}else{
$solve="";
}
	
			  ?>
										<li><a href="javascript:void(0);"><div class="cchk"><input type="checkbox" value="<?=$t['id'];?>" onClick="myfilter(this.value);" <?=$solve;?> name="check[]"></div><?=$t['filter_value'];?></a></li>
										<?php } ?>
									</div></div></ul>
								</div>

							</div><hr>	
							
							<?php } ?>						
							<!--ASAP-->
<script>
function myfilter(q){
window.location="<?=$_SERVER['REQUEST_URI'];?>&filter[]="+q;
}
</script>

<script>
function myinprod(q){
window.location="<?=$_SERVER['REQUEST_URI'];?>&prodfilter[]='"+q+"'";
}
</script>

						</div>
					</div>
					<div class="col-md-9 col-xs-12">
						<!-- START PRODUCT-BANNER -->
						
						
						<!-- END PRODUCT-BANNER -->
						<!-- START PRODUCT-AREA -->
						<div class="product-area">
							<div class="row">
								<div class="col-xs-12">
									<!-- Start Product-Menu -->
									<div class="product-menu" style="background:#fff;">
										<div class="product-title">
											<h3 class="title-group-3 gfont-1"><?=$doodle['category_name'];?>(<?=$thiscnt['cnt']?> )<span></span></h3>
										</div>
									</div>
									
									
									<!-- End Product-Menu -->
									<div class="clear"></div>
								</div>
							</div>
							<div class="row">
							<div class="col-xs-12 col-md-12">
							<!-- Start Product-Menu -->
							<div class="product-menu style-2">
								<ul role="tablist"><li><h4>Sort By :</h4> 
								    <span class="hi"><li role="presentation" class="active"><a href="#display-1-1" role="tab" data-toggle="tab" aria-expanded="true">Popularity</a></li>
								    <li role="presentation" class=""><a href="#display-1-2" onClick="sorting(1)" role="tab" data-toggle="tab" aria-expanded="false">Price Low to High</a></li>
								    <li role="presentation" class=""><a href="#display-1-3" onClick="sorting(2)" role="tab" data-toggle="tab" aria-expanded="false">Price High to Low</a></li>
<?php if(isset($_GET['disk'])=='true'){ ?>
<li role="presentation" class=""><a href="#display-1-3" onClick="sorting(3)" role="tab" data-toggle="tab" aria-expanded="false">Discount</a></li>
<?php }else{ ?>
<li role="presentation" class=""><a href="#display-1-3" onClick="sorting(5)" role="tab" data-toggle="tab" aria-expanded="false">Discount</a></li>
<?php } ?>
									<li role="presentation" class=""><a href="#display-1-3"  role="tab" onClick="sorting(4)" data-toggle="tab" aria-expanded="false">Fresh Arrivals </a></li><span>
								</ul>
								<script>
								function sorting(q){
									//window.location="<?=$_SERVER['REQUEST_URI'];?>&filter[]="+q;
									if(q==1){
										window.location="<?=$_SERVER['REQUEST_URI'];?>&sor[]=ASC";
									}
									if(q==2){
										window.location="<?=$_SERVER['REQUEST_URI'];?>&sor[]=DESC";
									}
									if(q==3){
										window.location="<?=$_SERVER['REQUEST_URI'];?>&disk=true";
									}
if(q==4){
										window.location="<?=$_SERVER['REQUEST_URI'];?>&sor[]=DESC";
									}
if(q==5){
										window.location="<?=$_SERVER['REQUEST_URI'];?>&disk=false";
									}
								}
								</script>
								<div class="product-filter">
										
										<div class="sort">
											<label>Sort By:</label>
											<select onchange="subtr(this.value)">
												<option value="#">Default</option>
												<option value="1">Name (A - Z)</option>
												<option value="2">Name (Z - A)</option>
												<option value="3">Price (Low > High)</option>
<option value="4">Price (High > Low)</option>
												
												
											</select>

<script>
function subtr(t){
if(t==1){
window.location="<?=$_SERVER['REQUEST_URI'];?>&nan[]=ASC";
}
if(t==2){
window.location="<?=$_SERVER['REQUEST_URI'];?>&nan[]=DESC";
}
if(t==3){
window.location="<?=$_SERVER['REQUEST_URI'];?>&sor[]=ASC";
}
if(t==4){
window.location="<?=$_SERVER['REQUEST_URI'];?>&sor[]=DESC";
}
}
</script>

										</div>
										
									</div>
							</div>
							
							<!-- End of product menu -->
						</div>
							
								<div class="col-xs-12 col-md-12">		
									<!-- Start Product -->
									<div class="product">
										<div class="tab-content">
											<!-- Product -->
											
											<!-- End Product -->
											<!-- Start Product-->
											<div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
												<div class="row">
												
												<?php
												$imgs = array();
												if(isset($_GET['pref'])){
												$getid = $_GET['catid'];	
												}else{
												$getid = $_GET['product'];
												}
$wax = count($_GET['sor']);
$limit = 50;
$hound=$_GET['sor'][$wax-1];

$la = count($_GET['nan'])-1;

//echo $_GET['nan'][$la];

if($_GET['nan'][$la]=='ASC'){
$coccoc="title";
$kukur_chand="ASC LIMIT $limit";
}else if($_GET['nan'][$la]=='DESC'){
$coccoc="title";
$kukur_chand="DESC LIMIT $limit";
}else{
$coccoc="landing_price";
if($hound!=null || $hound!=''){
$coccoc="landing_price";
$kukur_chand=$hound." LIMIT $limit";
}else{
$coccoc="landing_price";
$kukur_chand="DESC LIMIT $limit";
}

}





												
												$img = new DBQuery();
												$disc = new DBQuery();
												
												if(isset($_GET['search'])){
if(isset($_POST['max'])){
													$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And (title LIKE '%".$_GET['search']."%' || ptoduct_type LIKE '%".$_GET['search']."%' || brand LIKE '%".$_GET['search']."%') AND pincode LIKE '%,".$_SESSION['pin'].",%' AND landing_price BETWEEN $min AND $max order by  $coccoc $kukur_chand ");
}else{		
//echo "select * from product_tbl where status = '1' And verify = '1' And (title LIKE '%".$_GET['search']."%' || ptoduct_type LIKE '%".$_GET['search']."%' || brand LIKE '%".$_GET['search']."%')  AND pincode LIKE '%,".$_SESSION['pin'].",%' order by  $coccoc $kukur_chand ";									
$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And (title LIKE '%".$_GET['search']."%' || ptoduct_type LIKE '%".$_GET['search']."%' || brand LIKE '%".$_GET['search']."%')  AND pincode LIKE '%,".$_SESSION['pin'].",%' order by  $coccoc $kukur_chand ");
}
												}else{

if(!isset($bill)){

$fine=$dbAccess->selectSingleStmt("select * from product_category where parent_id = '".$_GET['product']."' ");
$self = $fine['id'];
if($self == ''){
$self = $getid;
}

//echo "select * from product_tbl where status = '1' And verify = '1' And (category_id LIKE '%$getid%' || category_id LIKE '%$self%') AND pincode LIKE '%,".$_SESSION['pin'].",%' order by  $coccoc $kukur_chand ";

if(isset($_POST['max'])){
$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And (category_id LIKE '%,$getid,%' || category_id LIKE '%,$self,%') AND pincode LIKE '%,".$_SESSION['pin'].",%' AND landing_price BETWEEN $min AND $max order by  $coccoc $kukur_chand ");
}else{
$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And (category_id LIKE '%,$getid,%' || category_id LIKE '%,$self,%') AND pincode LIKE '%,".$_SESSION['pin'].",%' order by  $coccoc $kukur_chand ");
}

}else{
if(isset($zq)){
$value=implode(',',$helper->loopEnd($_GET['prodfilter']));
if($value==null || $value==''){
if(isset($_POST['max'])){

$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And category_id LIKE '%,$getid,%' AND pincode LIKE '%,".$_SESSION['pin'].",%' AND landing_price BETWEEN $min AND $max order by  $coccoc $kukur_chand ");
}else{
$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And category_id LIKE '%,$getid,%' AND pincode LIKE '%,".$_SESSION['pin'].",%' order by landing_price $coccoc $kukur_chand ");
}
}else{
if(isset($_POST['max'])){
$cb=$dbAccess->selectSingleStmt("select count(*) as sn from product_tbl where status = '1' And verify = '1' And category_id LIKE '%,$getid,%' And brand IN(".$value.") And color IN(".$value.") And size IN(".$value.") AND ptoduct_type IN(".$value.") AND pincode LIKE '%,".$_SESSION['pin'].",%' AND landing_price BETWEEN $min AND $max order by  $coccoc $kukur_chand ");
}else{
$cb=$dbAccess->selectSingleStmt("select count(*) as sn from product_tbl where status = '1' And verify = '1' And category_id LIKE '%,$getid,%' And brand IN(".$value.") And color IN(".$value.") And size IN(".$value.") AND ptoduct_type IN(".$value.") AND pincode LIKE '%,".$_SESSION['pin'].",%' order by  $coccoc $kukur_chand ");
}
if($cb['sn'] > 0){
if(isset($_POST['max'])){
$qurey=$dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And category_id LIKE '%,$getid,%' And brand IN(".$value.") And color IN(".$value.") And size IN(".$value.") AND ptoduct_type IN(".$value.") AND pincode LIKE '%,".$_SESSION['pin'].",%' AND landing_price $coccoc BETWEEN $min AND $max order by $coccoc $kukur_chand ");
}else{
$qurey=$dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And category_id LIKE '%,$getid,%' And brand IN(".$value.") And color IN(".$value.") And size IN(".$value.") AND ptoduct_type IN(".$value.") AND pincode LIKE '%,".$_SESSION['pin'].",%' order by  $coccoc $kukur_chand ");
}
}
else{
if(isset($_POST['max'])){
$qurey=$dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And category_id LIKE '%,$getid,%' And brand IN(".$value.") OR color IN(".$value.") OR size IN(".$value.") OR ptoduct_type IN(".$value.") AND pincode LIKE '%,".$_SESSION['pin'].",%' AND landing_price BETWEEN $min AND $max order by  $coccoc $kukur_chand ");
}else{
$qurey=$dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And category_id LIKE '%,$getid,%' And brand IN(".$value.") OR color IN(".$value.") OR size IN(".$value.") OR ptoduct_type IN(".$value.") AND pincode LIKE '%,".$_SESSION['pin'].",%' order by  $coccoc $kukur_chand ");
}
}
}

}else{
$falseking=$dbAccess->selectData("select * from features where filter_value_id IN(".$value.") AND pincode LIKE '%,".$_SESSION['pin'].",%'  order by  $coccoc $kukur_chand ");
$aotp=array();
foreach($falseking as $rti){
$aotp[]=$rti['product_id'];
}
$value=implode(',',$aotp);
												$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And product_id IN(".$value.") And category_id LIKE '%$getid%' AND pincode LIKE '%,".$_SESSION['pin'].",%' order by  $coccoc $kukur_chand ");
}
}
}
$spon_cnt = 0;
// checking for spponser in this category
$check_spon = $dbAccess->selectSingleStmt("select count(product_id) as cnt from product_tbl WHERE sponser = '1' And status = '1' AND verify = '1' AND category_id LIKE '%,".$_GET['product'].",%' AND pincode LIKE '%,".$_SESSION['pin'].",%'");
												foreach($qurey as $nth){
																$ngh = $img->selectData("select * from product_img where product_id = '".$nth['product_id']."' ");
																foreach($ngh as $ftch){
															    $imgs[] = $ftch['image'];
												                }
															

if($nth['commission_type']=='percent'){
													$commission = ($nth['commission']*$nth['landing_price'])/100;
												}else{
													$commission = $nth['commission'];
												}

												$atm = $nth['mrp'];
												$amt = $nth['mrp']-($nth['landing_price']+$commission);
												$newatm =
$nth['landing_price']+$commission;



												
												
												//price
												
												 
												
												?>
												
													<!-- Start Single-Product -->
													<div class="col-lg-3">
														<div class="single-product">
															<!--<div class="label_new">
																<span class="new">new</span>
															</div>-->
<?php
if($amt!=null){
?>
															<div class="sale-off2">

<?php
$debug=$dbAccess->selectSingleStmt("select * from discount where product_id = '".$nth['product_id']."' ");
?>

<?php if($debug['discount'] > 0){ ?>
																<span class="sale-percent"><?=$debug['discount'];?> % </span>
<?php } ?>
															</div>
<?php } else{ } ?>
															<div class="product2-img">
<span class="hert" style="float:left;">
															<?php
															$ro=$img->selectSingleStmt("select * from point WHERE id = '".$nth['color_code']."' ");
															$col = "color:".$ro['point_color'].";";
															?>
															<i class="fa fa-heart" style="<?=$col;?>"></i>
															</span>															
													<a href="product-details.php?pid=<?=$nth['product_id'];?>&category=<?=$doodle1['category_name'];?>&subcategory=<?=$doodle['category_name'];?>&session=<?=rand(100,1000); ?>">
																
						<!--vendor/productImg/-->											<img class="primary-img" src="<?=$imgs[0];?>" >
																	<img class="secondary-img" src="<?=$imgs[1];?>">
																</a>
															</div>
															<div class="product-description">
																<h5><a href="#"><?=ucwords($nth['title']);?></a></h5>
																
																<div class="price-box">
																	<span class="price">Rs.<?=number_format($newatm,2);?></span>
<?php
if($atm==$newatm){

}else{
?>

																	<span class="old-price"><?= number_format($atm,2); ?></span>
<?php } ?>
																</div>
																
															</div>
															<div class="product-action">
																<div class="button-group">
																	<div class="product-button">
																		<a href="product-details.php?pid=<?=$nth['product_id'];?>&category=<?=$doodle1['category_name'];?>&subcategory=<?=$doodle['category_name'];?>&session=<?=rand(100,1000); ?>"><button><i class="fa fa-shopping-cart"></i>View Details</button></a>
																	</div>
																	<div class="product-button-2" id="btsi">
																	
																	<?php
									if(isset($_SESSION['myemail'])){
										
										$root = $dbAccess->countDtata("select * from wishlist where user_id = '".$_SESSION['myemail']."' And product_id = '".$nth['product_id']."'");
										if($root>0){ ?>
											<a href="javascript:void(0)" onclick="wishlist(<?=$nth['product_id'];?>)" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o" style="color: red;" id="hard<?=$nth['product_id'];?>"></i></a>
									<?php	}else{ ?>
											<a href="javascript:void(0)" onclick="wishlist(<?=$nth['product_id'];?>)" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o" id="hard<?=$nth['product_id'];?>"></i></a>
									<?php	}
										 ?>
									
									
									<?php
									}else{ ?>
									<a href="#" class="modal-view" data-toggle="modal" data-target="#productModal2"><i class="fa fa-heart-o"></i></a>
									
									<?php
									}
									?>
									
																	
														
																		<a href="javascript:void(0);" data-toggle="tooltip" title="Compare" onclick="show('<?=$nth['product_id']?>','<?=ucwords($nth['title']);?>','<?=$imgs[0];?>','mydiv')"><i class="fa fa-signal"></i></a>
																		 <a href="print.php?q=<?=$nth['product_id'];?>" data-featherlight="ajax"><i class="fa fa-search-plus"></i></a>
																	</div>
																</div>
															</div>												
														</div>
													</div>
													<!-- End Single-Product -->
													
													<?php
													unset($imgs);
													
													$spon_cnt++;
													if($spon_cnt % 20 == 0 && $check_spon['cnt'] > 0){
														// Adding sponsor
														?>
																								<div class="col-xs-12">
									<!-- Start Product-Menu -->
									<div class="product-menu">
										<div class="product-title" id="spnheading">
											<h3 class="title-group-3 gfont-1">Sponsor</h3>
										</div>
									</div>
									
									
									<!-- End Product-Menu -->
									<div class="clear"></div>
									
									
									<div class="header-area">
									
									<div class="col-md-12">
						<!-- START PRODUCT-BANNER -->
						
						<!-- END PRODUCT-BANNER -->
						<!-- START PRODUCT-AREA (1) -->
						<div class="product-area">
							
							<!-- End Product-Menu -->
							
							<!-- Start Product -->
							<div class="row">
								<div class="col-xs-12 col-md-12">
									<div class="product carosel-navigation">
										<div class="tab-content">
											<!-- Product = display-1-1 -->
											<div role="tabpanel" class="tab-pane fade in active" id="display-1-1">


												<div class="row">
													<div class="active-product-carosel">
														<!-- Start Single-Product -->
														<?php
														$spon_sql = "select * from product_tbl WHERE sponser = '1' And status = '1' AND verify = '1' AND category_id LIKE '%,".$_GET['product'].",%' AND pincode LIKE '%,".$_SESSION['pin'].",%' order by rand() LIMIT 0,4 ";
														$getch = $dbAccess->selectData($spon_sql);
														foreach($getch as $t){
														
														$ngh = $img->selectData("select * from product_img where product_id = '".$t['product_id']."' ");
																foreach($ngh as $ftch){
															    $imgs[] = $ftch['image'];
												                }
															

if($nth['commission_type']=='percent'){
													$commission = ($nth['commission']*$nth['landing_price'])/100;
												}else{
													$commission = $nth['commission'];
												}

												
												$atm = $t['mrp'];
												$amt = $t['mrp']-($t['landing_price']+$commission);
												$newatm = $t['landing_price']+$commission;
												
														?>
														
														<div class="proslidrsponsor" style="padding-left:15px;padding-right:15px;" >
															<div class="single-product" style="background:#fff;">

																
																<div class="product2-img">   
																
																	<a href="product-details.php?pid=<?=$nth['product_id'];?>&category=<?=$doodle1['category_name'];?>&subcategory=<?=$doodle['category_name'];?>&session=<?=rand(100,1000); ?>">
																	
																		<img class="primary-img" src="<?=$imgs[0];?>" alt="Product">
																		
																	</a>
																</div>
																<div class="product-description">
																	<h5><a href="#"><?=ucwords($t['title']);?></a></h5>

																	<div class="price-box">
																		<span class="price"><?=number_format($newatm,2);?></span>
																		<?php
if($atm==$newatm){

}else{
?>

																	<span class="old-price"><?= number_format($atm,2); ?></span>
<?php } ?>
																	</div>
																	
                                                              
																</div>
																<div class="product-action">
																<div class="button-group">
																	<div class="product-button">
																		<a href="product-details.php?pid=<?=$nth['product_id'];?>&category=<?=$doodle1['category_name'];?>&subcategory=<?=$doodle['category_name'];?>&session=<?=rand(100,1000); ?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
																	</div>
																	<div class="product-button-2" id="btsi">
																	
																	<?php
									if(isset($_SESSION['myemail'])){
										
										$root = $dbAccess->countDtata("select * from wishlist where user_id = '".$_SESSION['myemail']."' And product_id = '".$t['product_id']."'");
										if($root>0){ ?>
											<a href="javascript:void(0)" onclick="wishlist(<?=$t['product_id'];?>)" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o" style="color: red;" id="hard<?=$t['product_id'];?>"></i></a>
									<?php	}else{ ?>
											<a href="javascript:void(0)" onclick="wishlist(<?=$t['product_id'];?>)" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o" id="hard<?=$t['product_id'];?>"></i></a>
									<?php	}
										
									}else{ ?>
									<a href="#" class="modal-view" data-toggle="modal" data-target="#productModal2"><i class="fa fa-heart-o"></i></a>
									
									<?php
									}
									?>							
																		
																		<a href="javascript:void(0);" data-toggle="tooltip" title="Compare" onclick="show('<?=$nth['product_id']?>','<?=ucwords($nth['title']);?>','<?=$imgs[0];?>','mydiv')"><i class="fa fa-signal"></i></a>
 <a href="print.php?q=<?=$nth['product_id'];?>" data-featherlight="ajax"><i class="fa fa-search-plus"></i></a>
																	</div>
																</div>
															</div>
																										
															</div>
														</div>

<?php unset($imgs); } ?>
														<!-- End Sponsor-Product -->
													
														
														
													</div><hr style="border-bottom: 1px solid #26acce;border-top:none;">
												</div>
											</div>
										
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
	                                          </div>
								</div>
													<?php }
													 } 
													 ?>
												
												</div>
											</div>
											<!-- End Product = TV -->
										</div>
									</div>
									<!-- End Product -->
								</div>
							</div>
						</div>
						<!-- END PRODUCT-AREA -->
						
					</div>
					
				</div>
			</div>
			
			<!-- START SUBSCRIBE-AREA -->
			<div class="smallban">
<div class="col-md-12">
<center><a class="tag" href="#">
              		Total Items In This Category<span class="categoryCount color-white">(<?=$thiscnt['cnt'];?>)</span>
              		</a></center>
</div>
		
		<div class="section group" style="padding-left:22px">
	<div class="col span_1_of_5">
                        <img src ="img/secure.png" style="width:40px";>
                        <p><strong>100% security</strong><br>
                           When you buy something on ShoppingMoney on a secure browser: Your payment is secured by TLS, a higher grade of security than SSL.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/trust.png" style="width:40px;">
                        <p><strong>Trust</strong><br>
                           At ShoppingMoney, We Sell without selling out. We focus more on our core principles and customer loyalty than short term commissions and profits.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/quality.png"  style="width:40px;">
                        <p><strong>Quality you will love</strong><br>
                            We at ShoppingMoney believes in the Quality.Hasselfree delivery and A+ grade quality product is our business<br> mantra.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/return.png" style="width:40px;">
                        <p><strong>Easy Return Policy</strong><br>
                            We at Shoppingmoney belives in smooth process, Client's can return their products in one click.<br>give us a shout.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/service.png" style="width:40px;">
                        <p><strong>We care</strong><br>
                            We care what out customers think about our services, because We know, If we don't take care of our customers,Someone else will!! </p>
                    </div>
</div>
		  
		
		
		</div>
			<div style="clear:both;"></div>
				<?php include("include/tags.php"); ?>


            <!-- END SUBSCRIBE-AREA -->
        </section>
        <!-- END HOME-PAGE-CONTENT -->

<?php include("include/footer.php"); ?>



<!-----zoom popup------->
 <div class="modal fade" id="zoompopup" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header" style="border:none;padding:none;">
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body" style="padding:0px;">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
                                                              		<img src="img/product/quickview-photo.jpg">							
								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end----------------->
<script>
										function wishlist(str) {
											var c = "hard"+str;
											
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
    document.getElementById(c).style.color='red';	
    document.getElementById("txtHint").innerHTML = xhttp.responseText;
		
    }
  };
  xhttp.open("GET", "shop.php?q="+str, true);
  xhttp.send();
} 
									</script>

		<!-- jquery
		============================================ -->		
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="js/bootstrap.min.js"></script>
		<!-- wow JS
		============================================ -->		
        <script src="js/wow.min.js"></script>
		<!-- meanmenu JS
		============================================ -->		
        <script src="js/jquery.meanmenu.js"></script>
		<!-- owl.carousel JS
		============================================ -->		
        <script src="js/owl.carousel.min.js"></script>
		<!-- scrollUp JS
		============================================ -->		
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- countdon.min JS
		============================================ -->		
        <script src="js/countdon.min.js"></script>
        <!-- jquery-price-slider js
		============================================ --> 
        <script src="js/jquery-price-slider.js"></script>
        <!-- Nivo slider js
		============================================ --> 		
		<script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="js/main.js"></script>


    </body>


</html>




