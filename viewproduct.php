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

if((!isset($_GET['filter'])) && (isset($_GET['prodfilter']))){
$zq=1;
$value=implode(',',$_GET['prodfilter']);
//echo "select * from product_tbl where brand IN(".$value.") OR product_type IN(".$value.")";
//die;
$iota=$dbAccess->selectData("select * from product_tbl where brand IN(".$value.") OR ptoduct_type IN(".$value.")");
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
$iota=$dbAccess->selectData("select * from product_tbl where brand IN(".$value1.") OR ptoduct_type IN(".$value1.")");
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
        <title>ShoppingMoney.in</title>
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
<link type="text/css" rel="stylesheet" href="../vendor/release/featherlight.min.css" />
<script src="../vendor/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../vendor/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
		
		
		<style>

.hert2{position: absolute;
    left: 200px;
    top: 10px;
    z-index: 1000;}

.category-menu-list {
    width: 100%;
    z-index: 1000;
    margin-top: -30px;
    height: 381px;
    overflow-y: scroll;
}
.discount{
top:140px;
}

.category-menu-list ul li .cat-left-drop-menu {
  background: hsl(0, 0%, 100%) none repeat scroll 0 0;
  border: 1px solid #eee;
  box-shadow: 0 0 5px -1px #666;
  left: 107%;
  opacity: 0;
  overflow: scroll;
  height: 300px;
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
    height: 300px;
    padding: 25px 20px 20px;
    position: absolute;
    text-align: left;
    top: -30px;
    transition: all 0.3s ease 0s;
    visibility: hidden;
    width: 1000px;
    z-index: 999999999;
}

.singleprod{
  margin-left:2%;
margin-right:1%;
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
#mydiv-content {
    width: 70%;
    position: fixed;
    z-index: 10;
    margin-left: 15%;
    top: 214px;
    padding: 25px 4px;
    background: -webkit-linear-gradient(gray,#474747);
	background: -ms-linear-gradient(gray,#474747);
	background: -moz-linear-gradient(gray,#474747);
	background: linear-gradient(gray,#474747);
	background: -o-linear-gradient(gray,#474747);
	
    border: 1px solid #d5d5d5;
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


<script type="text/javascript">
    function showhide()
     { alert('inside f');
        //   var div = document.getElementById("comparebox1");
		//   var div = document.getElementById("comparebox2");
		//   var div = document.getElementById("comparebox3");
		//   var div = document.getElementById("comparebox4");
  /*  if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     } 
	 if(document.getElementById(target).style.display != 'none';)
	 {  alert('inside if');
 document.getElementById(target).style.display = "none";}
 else{ alert('inside else');
	 document.getElementById(target).style.display='block';
 } */
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
  
 
    </head>
    <body style="background:#f7f7f7;" onload="firstAppear()" >


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
				<div class="col-md-1" style="position : absolute; top:149px;">
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
															<input type="hidden" id="div1" name="product1" value="1">															
															</div>
															
															<div class="col-sm-3" id="comparebox2" style="display:none;">
															<img id="compareimg2" src="" class="compareimg"><span id="comparetxt2" class="comparetxt"><a href="#"></a></span>
															<span style="margin-top:15px;" onClick="hidecomp('comparebox2');" class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span>
															<input type="hidden" id="product2" name="product2" value="0">
															<input type="hidden" id="div2" name="product1" value="2">
															</div>
															
															<div class="col-sm-3" id="comparebox3" style="display:none;">
															<img id="compareimg3" src="" class="compareimg"><span id="comparetxt3" class="comparetxt"><a href="#"></a></span>
															<span style="margin-top:15px;" onClick="hidecomp('comparebox3');" class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span>
															<input type="hidden" id="product3" name="product3" value="0">
															<input type="hidden" id="div3" name="product1" value="3">
															</div>
															
															<div class="col-sm-3" id="comparebox4" style="display:none;">
															<img id="compareimg4" src="" class="compareimg"><span id="comparetxt4" class="comparetxt"><a href="#"></a></span>
															<span style="margin-top:15px;" onClick="hidecomp('comparebox4');" class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span>
															<input type="hidden" id="product4" name="product4" value="0">
															<input type="hidden" id="div4" name="product1" value="4">
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
$doodle=$dbAccess->selectSingleStmt("select * from product_category where id = '".$_GET['product']."'");
$doodle1=$dbAccess->selectSingleStmt("select * from product_category where id = '".$doodle['parent_id']."'");
?>
							<li><a href="index.php">Home</a></li>
							<li><a href="#">New Launches </a></li>
							<!--<li class="active"><a href="#"><?=ucwords($doodle['category_name']);?></a></li>-->
						</ul>
					</div>
				</div>
				<div class="row">
				<div class="product-menu" style="text-align:center;width:28%;margin:0 auto;">
										<div class="product-title" style="float:none;">
										<?php 
										$a=date("Y/m/d");
										$a.=" ";
										$a.="00:00:00";
$doodle2=$dbAccess->selectSingleStmt("select COUNT(*) as o from  product_tbl where created_date Between '$a' AND now() ");
				
								?>
											<h3 class="title-group-3 gfont-1"style=" color:orange;font-weight:900;">New Launches (<?php echo $doodle2['o'] ?>) <span></span></h3>
										</div>
									</div>	
					<div class="col-md-12 col-xs-12">
						<!-- START PRODUCT-BANNER -->
						
						
						<!-- END PRODUCT-BANNER -->
						<!-- START PRODUCT-AREA -->
						<div class="product-area">
							<div class="row">
								
							</div>
							<div class="row">
							
							
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
												$getid = $_GET['product'];
												
												$img = new DBQuery();
												$disc = new DBQuery();
												
												if(isset($_GET['search'])){
													$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And title LIKE '%".$_GET['search']."%' ");
												}else{
													
												
if(!isset($bill)){
												$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And category_id LIKE '%$getid%'");
}else{
if(isset($zq)){
$value=implode(',',$_GET['prodfilter']);
//echo "select * from product_tbl where brand IN(".$value.") OR ptoduct_type IN(".$value.") And category_id LIKE '%$getid%'";
$qurey=$dbAccess->selectData("select * from product_tbl where category_id LIKE '%$getid%' And brand IN(".$value.") OR ptoduct_type IN(".$value.")");
}else{
$falseking=$dbAccess->selectData("select * from features where filter_value_id IN(".$value.")");
$aotp=array();
foreach($falseking as $rti){
$aotp[]=$rti['product_id'];
}
$value=implode(',',$aotp);
												$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' And product_id IN(".$value.") And category_id LIKE '%$getid%'");
}
}
}
												foreach($qurey as $nth){
																$ngh = $img->selectData("select * from product_img where product_id = '".$nth['product_id']."' ");
																foreach($ngh as $ftch){
															    $imgs[] = $ftch['image'];
												                }
															$dsk=$disc->selectSingleStmt("select * from discount where product_id = '".$nth['product_id']."' ");
															if($dsk['discount']==0 || $dsk['discount']==null){
															$amt = null;
															}else{
															$amt = $dsk['discount'];
															}
												if($dsk['discount_type']=='rupees'){
												$atm = $nth['mrp'];
												$newatm = $nth['mrp'] - $dsk['discount'];
												$ico = "Rs";
												}else if($dsk['discount_type']=='percent'){
												$atm = $nth['mrp'];
												$newatm = $nth['mrp'] - ($nth['mrp'] * $dsk['discount'])/100 ;
												$ico = "%";
												}else{
												$atm = "";
												$newatm = $nth['mrp'];
												$ico = null;
												}
												
												//price
												
												 
												
												?>
												
													<!-- Start Single-Product -->
													<div class="col-lg-2 singleprod">
														<div class="single-product">
															<!--<div class="label_new">
																<span class="new">new</span>
															</div>-->
<?php
if($amt!=null){
?>
															<div class="sale-off2">
																<span class="sale-percent discount"><?=$amt;?> <?= $ico; ?></span>
															</div>
<?php } else{ } ?>
															<div class="product2-img">

<span class="hert2" style="float:left;">
															<?php
															$ro=$img->selectSingleStmt("select * from point WHERE id = '".$nth['color_code']."' ");
															$col = "color:".$ro['point_color'].";";
															?>
															<i class="fa fa-heart" style="<?=$col;?>"></i>
															</span>															
																<a href="product-details.php?pid=<?=$nth['product_id'];?>">
																
						<!--vendor/productImg/-->											<img class="primary-img" src="<?=$imgs[0];?>" alt="Product">
																	<img class="secondary-img" src="<?=$imgs[1];?>" alt="Product">
																</a>
															</div>
															<div class="product-description">
																<h5><a href="#"><?=ucwords($nth['title']);?></a></h5>
																
																<div class="price-box">
																	<span class="price"><?=number_format($newatm,2);?></span>
																	<span class="old-price"><?= number_format($atm,2); ?></span>
																</div>
																
															</div>
															<div class="product-action">
																<div class="button-group">
																	<div class="product-button">
																		<a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
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
									
									<?php
									if(isset($_GET['q'])){
										
										$sum=$dbAccess->countDtata("select * from wishlist where user_id ='".$_SESSION['myemail']."' And product_id = '".$_GET['q']."' ");
										if($sum > 0){
											$dbAccess->updateData("delete from wishlist where user_id ='".$_SESSION['myemail']."' And product_id = '".$_GET['q']."'");
										}else{
$dbAccess->insertData("wishlist","user_id,product_id,status","'".$_SESSION['myemail']."','".$_GET['q']."','1'");
										}
										
										die();										
									}
									?>
									
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
																	
																		
	<a href="javascript:void(0);" data-toggle="tooltip" title="Compare" onclick="show('<?=$nth['product_id']?>','<?=ucwords($nth['title']);?>','<?=$imgs[0];?>','mydiv')"><i class="fa fa-signal"></i></a>
	<!--<a href="#" class="modal-view" data-toggle="modal" data-target="#productModal"><i class="fa fa-search-plus"></i></a>-->
 <a href="print.php?q=<?=$nth['product_id'];?>" data-featherlight="ajax"><i class="fa fa-search-plus"></i></a>
																	</div>
																</div>
															</div>												
														</div>
													</div>
													<!-- End Single-Product -->
													
													<?php
													unset($imgs);
													 } 
													 ?>
													
												</div>
												
												<!-- Start Pagination Area -->
												<div class="pagination-area">
													<div class="row">
														<div class="col-xs-5">
															<!--<div class="pagination">
																<ul>
																	<li class="active"><a href="#">1</a></li>
																	<li><a href="#">2</a></li>
																	<li><a href="#">></a></li>
																	<li><a href="#">>|</a></li>
																</ul>
															</div>-->
														</div>
														<div class="col-xs-7">
															<div class="product-result">    
															<!--<a href="#"><span class="showmor">Show 50 - 60 Items</span></a>-->
																<!--<span style="float:right;">Showing 1 to 16 of 19 (2 Pages)</span>-->
															</div>
														</div>
													</div>
												</div>
												<!-- End Pagination Area -->
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
<center>
<a class="tag" href="#">
    <?php
    $idi = $_GET['product'];
    $coun=$dbAccess->countDtata("select * from product_tbl where category_id LIKE '%$idi%' ");
    ?>
Total Items In This Category<span class="categoryCount color-white">(<?=$coun;?>)</span>
</a>
</center>
</div><br><br><br>
		
<div class="section group">
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

