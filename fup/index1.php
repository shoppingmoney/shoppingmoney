<?php
session_start();
ob_start();
//print_r($_SESSION);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) { // for registration	
@extract($_POST);
$chklink=0;
if($link != "0"){
include 'mlm/includes/config.php';
$conf = new config();
    $empref = $conf->single("employee WHERE emp_id='$link'",'id'); // Where link type employee or member
	if($empref > 0){
		$chklink = 8;
		//$conf->insertValue("employee_refrence", "emp_id,uid,date", "'$empref','$user_id',now()");
	}else{
	$chklink = $conf->single(" userdetails where userid='$link'", "linkid");
	}
	 if(empty($chklink) || $chklink == 0){
		  echo "<script>alert('Sorry, Invalid referral link');
		  window.location='index.php';
		  </script>";
		  die();
	 }
}
unset($_SESSION['refid']);
   
    include 'mlm/includes/register.php';
    //print_r($_POST);
    $lastid=registerme($column,$value,$email);//function to insert data for registration.
	if($empref > 0){
		// Inserting user id to employee list
	$conf->insertValue("employee_refrence", "emp_id,uid,date", "'$empref','$lastid',now()");
	}
}
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
?>
<!doctype html>
<html class="no-js" lang="">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="" content="">
        <title>Shoppingmoney.in</title>
        <meta name="description" content="">
        <meta name="viewport" content="">

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
        <!-- style CSS.contsmall
        ============================================ -->
        <link rel="stylesheet" href="css/style.css">
        <!-- responsive CSS
        ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">

        <link rel="stylesheet" type="text/css" href="css/set1.css" />
        <link href="css/component.css" media="screen, projection" rel="stylesheet" type="text/css">

        <style>

#story{background: #26acce;
    padding: 1px 6px;
    font-size: 19px;
    color: #fff;
border-radius: 3px;}

#story:hover{background: #159abc;
    padding: 1px 6px;
    font-size: 19px;
    color: #fff;
border-radius: 3px;}

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:750px;
  height:300px;
  display:none;
  z-index:9999;
  padding:20px;
  border-radius: 0px;
  text-align: center;
}
#boxes #dialog {
  width:750px; 
  height:300px;
  position:fixed;
z-index:999999;
  padding:15px;
  background:-webkit-linear-gradient(#e1e1e1,#ffffff,#e1e1e1);
 background:linear-gradient(#e1e1e1,#ffffff,#e1e1e1);
 background:-moz-linear-gradient(#e1e1e1,#ffffff,#e1e1e1);
 background:-ms-linear-gradient(#e1e1e1,#ffffff,#e1e1e1);
  font-family: 'Segoe UI Light', sans-serif;
  font-size: 15pt;
}
.maintext{
	text-align: center;
  font-family: "Segoe UI", sans-serif;
  text-decoration: none;
}

#lorem{
	font-family: "Segoe UI", sans-serif;
border-top: 1px solid#e5e5e5;
	font-size: 15pt;
color:#000;
  text-align: center;
margin-top: 27px;
}
#popupfoot{
	font-family: "Segoe UI", sans-serif;
	font-size: 16pt;
  padding: 10px 20px;
}
#popupfoot a{
	text-decoration: none;
}
.agree:hover{
  background-color: #D1D1D1;
}
.popupoption:hover{
	background-color:#D1D1D1;
	color: green;
}
.popupoption2:hover{
	
	color: red;
}
















































            .textbtm{padding-top: 30px;color:#fff;}
            .bottombx{width:100%;height:96px;LINE-HEIGHT: 46PX;color:#26acce;margin-top:3px;border:1px solid #ccc;margin-left:0px;text-align:center;background-image:url('images/bottomban.jpg');}

            .contsmall {
                position:relative;
                float: left;margin-left: 3px;
            }
            .textbox:hover {
                opacity:1;
            }
            .text {
                padding-top: 60px;
                color:#26ACCE;
                padding-left:10px;
                padding-right:10px;
                cursor:pointer;
            }
            .textbox {
                width:214px;
                height:214px;
                position:absolute;
                top:0;
                left:0;
                opacity:0;

                background-color: rgba(0,0,0,0.8);
                text-align:center;
                color:#fff;
                -webkit-transition: all 0.7s ease;
                transition: all 0.7s ease;
            }

            .textbox1:hover {
                opacity:1;
            }

            .textbox1 {
                width:410px;
                height:214px;
                position:absolute;
                top:0;
                left:0;
                opacity:0;

                background-color: rgba(0,0,0,0.5);
                text-align:center;
                color:#fff;
                -webkit-transition: all 0.7s ease;
                transition: all 0.7s ease;
            }



            .dropdown-check-list {
                display: inline-block;
                position: absolute;
                top: 11px;
               left: 29px;
            }
            .dropdown-check-list .anchor {
                position: relative;
                 width: 192px;                               
                background:#fff;
                cursor: pointer;
                display: inline-block;
                   padding: 4px 44px 4px 9px;
                border: 1px solid #ccc;
            }
            .dropdown-check-list .anchor:after {
                position: absolute;
                content: "";
                border-left: 1px solid black;
                border-top: 1px solid black;
                padding: 3px;
                right: 22px;
                top: 34%;
                -moz-transform: rotate(-135deg);
                -ms-transform: rotate(-135deg);
                -o-transform: rotate(-135deg);
                -webkit-transform: rotate(-135deg);
                transform: rotate(-135deg);
            }
            .dropdown-check-list .anchor:active:after {
                right: 22px;
                top: 34%;
            }
            .dropdown-check-list ul.items {
                padding: 8px 31px;
                background: #FFFFFF;
                display: none;
                right: -1px;
                position: absolute;
                z-index:1;
                margin: 0;
                border: 1px solid #ccc;
                border-top: none;
            }
            .dropdown-check-list ul.items li {
                list-style: none;
            }
            .dropdown-check-list.visible .anchor {
                color: #0094ff;
            }
            .dropdown-check-list.visible .items {
                display: block;
            }
        </style>
    </head>
    <body>


        <!-- HEADER-AREA START -->
<?php include("include/header.php"); ?>
        <!-- HEADER AREA END -->
        <!-- Category slider area start -->
        <div class="category-slider-area">
            <div class="container">
                <div class="row">
<?php include("include/menu.php"); ?>
                    <?php include("include/slider.php"); ?>

                </div>
            </div>
        </div>
        <!-- Category slider area End -->	

        <!-- START PAGE-CONTENT -->
        <section class="page-content">
            <center>
                <div class="latestP" style="margin-top: 9px;">
                    LATEST PRODUCTS
                </div>

                <div class="col-lg-12">
					
					<?php $getData = $dbAccess->selectData("select * from  latest_probanner order by rand() limit 3");
								foreach($getData as $gt){
					?>

                    <div class="col-md-4">
                        <div class="pdf-thumb-box"> <a href="<?php echo $gt['link'] ?>">
                                <div class="pdf-thumb-box-overlay"><span class="fa-stack fa-lg">

                                        <!--<i class="fa fa-eye fa-stack-1x pdf-thumb-eye"></i>-->
                                    </span></div>
                                <img class="img-responsive" img src="superadmin/latestproBanner/<?php echo $gt['image']?>" alt="" >
                            </a>
                            <div class="col-lg-12" style="background:#E4E4E4;">
                                <h3><?php echo $gt['banner_name']?></h3>
                                <p><?php echo $gt['short_desc']?></p>
                                <p>Shop Start <?php echo $gt['start_price']?></p>
                            </div>

                        </div>
                        <div class="vertical-social-box"></div>
                    </div>
								<?php }?>

                 <!--   <div class="col-md-4">
                        <div class="pdf-thumb-box"> <a href="shop.html">
                                <div class="pdf-thumb-box-overlay"><span class="fa-stack fa-lg">

                                         <!--<i class="fa fa-eye fa-stack-1x pdf-thumb-eye"></i> ->
                                    </span></div>
                                <img class="img-responsive" img src="img/womn.png" alt="">
                            </a>
                            <div class="col-lg-12" style="background:#E4E4E4;">
                                <h3>Product</h3>
                                <p>Show Off</p>
                                <p>Shop Start Rs.599</p>
                            </div>

                        </div>
                        <div class="vertical-social-box"></div>
                    </div> -->

                <!--    <div class="col-md-4">
                        <div class="pdf-thumb-box"> <a href="shop.html">
                                <div class="pdf-thumb-box-overlay"><span class="fa-stack fa-lg">

                                         <!--<i class="fa fa-eye fa-stack-1x pdf-thumb-eye"></i> ->
                                    </span></div>
                                <img class="img-responsive" img src="img/books.png" alt="">
                            </a>
                            <div class="col-lg-12" style="background:#E4E4E4;;">
                                <h3>Product</h3>
                                <p>Show Off</p>
                                <p>Shop Start Rs.599</p>
                            </div>

                        </div>
                    </div> -->


                </div></center>

            <div class="container" id="rescont">


                <div class="row">

                    <div class="col-md-6">
                        <!-- START HOT-DEALS-AREA -->
                        <div class="hot-deals-area carosel-circle">

                            <div class="row">
                                                    <!--<input class="toggle-box" id="header1" type="checkbox" >
<label for="header1">CATEGORIES</label>
<div><a href="#">Category 1</a><br><a href="#">Category 2</a><br><a href="#">Category 3</a></div>-->

                                <!-- faisal start -->
                                <div class="cat1">
										<?php
										$submenu = new DBQuery();
										$submenuctr = $submenu -> selectData("select * from product_category where status = '1' And parent_id =3 limit 5");
										?>

                                    <ul class="navigation">
                                        <a class="main" href="#url">CATEGORIES &nbsp;&nbsp;<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
										<?php foreach($submenuctr as $second){ ?>
                                        <li class="n1"><a href="shop.php?product=<?=$second['id'];?>&catid=3"><?=$second['category_name'];?></a></li>
                                    <!--    <li class="n2"><a href="#">item #2</a></li> -->
                                    <!--    <li class="n3"><a href="#">item #3</a></li> -->
                                    <!--    <li class="n4"><a href="#">item #4</a></li> -->
                                    <!--    <li class="n5"><a href="#">item #5</a></li>  -->
										<?php } ?>
                                    </ul>
                                </div>

<!-- faisal end -->



                                <div class="active-hot-deals">
                                    <!-- Start Single-hot-deals -->
								<?php $getData = $dbAccess->selectData("select * from  cat_banner where catid=3 order by rand() limit 3 ");
								foreach($getData as $gt){
					?>
                                    <div class="col-xs-12" id="bantab1">



                                        <div class="single-hot-deals">

                                            <a href="<?php echo $gt['link'];?>">
                                                <img src="superadmin/images/<?php echo $gt['image'];?>" class="resbn">
                                            </a>
                                        </div>
                                    </div>
								<?php }?>
                                    <!-- End Single-hot-deals -->
                                    <!-- Start Single-hot-deals -->
                                <!--    <div class="col-xs-12" id="bantab2">
                                        <div class="single-hot-deals" >


                                            <a href="product.html">
                                                <img src="img/bannr1.jpg" class="resbn">
                                            </a>
                                        </div>
                                    </div> -->
                                    <!-- End Single-hot-deals -->
                                    <!-- Start Single-hot-deals -->
                              <!--      <div class="col-xs-12" id="bantab3">
                                        <div class="single-hot-deals" >


                                            <a href="product.html">
                                                <img src="img/bannr1.jpg" class="resbn">
                                            </a>
                                        </div>
                                    </div> -->
                                    <!-- End Single-hot-deals -->
                                </div>
                            </div>
                        </div>
                        <!-- END HOT-DEALS-AREA -->



                    </div>
                    <div class="col-md-6">
                        <!-- START PRODUCT-BANNER -->

                        <!-- END PRODUCT-BANNER -->
                        <!-- START PRODUCT-AREA (1) -->
                        <div class="product-area">
                            <div class="row" id="tabstrip">
                                <div class="col-xs-12 col-md-12" id="stripright">
                                    <!-- Start Product-Menu -->
                                    <div class="product-menu">
                                        <div class="product-title">
                                            <h3 class="title-group-2 gfont-1">FASHION</h3>
                                        </div>

                                        <ul role="tablist">
                                            <li role="presentation" class=" active"><a href="#display-1-1" role="tab" data-toggle="tab">Ethnic Wear</a></li>
                                            <li role="presentation"><a href="#display-1-2" role="tab" data-toggle="tab">Western Wear</a></li>
                                            <li role="presentation"><a href="#display-1-3"  role="tab" data-toggle="tab">Watches</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product-Menu -->
                            <div class="clear"></div>
                            <!-- Start Product -->
                            <div class="row">
                                <div class="col-xs-12 col-md-12" style=" margin-left: -6px;">
                                    <div class="product carosel-navigation">
                                        <div class="tab-content">
                                            <!-- Product = display-1-1 -->
                                            <div role="tabpanel" class="tab-pane fade in active" id="display-1-1">
                                                <div class="row">
                                                    <div class="active-product-carosel">
                                                        <!-- Start Single-Product -->
														 <!-- Faisal start --> 
                                                        
														<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%3,26%' limit 4");

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
														?>
                                                      <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                    <!--   <img class="primary-img" src="img/product/mediam/12.jpg" alt="Product"> -->
																<!--		 <img class="primary-img" src="<?=$imgs[0];?>" alt="Product">
																	<img class="secondary-img" src="<?=$imgs[1];?>" alt="Product"> -->
																		
																	 <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
																	<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product"> 
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#"><?php echo $nth['title'] ?></a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                        <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                    </div>

                                                                </div>
                                                                <div class="product-action">
                                                                    <div class="button-group">
                                                                        <div class="product-button">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                        </div>
                                                                        <div class="product-button-2">
                                                                         <!--   <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>  -->
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
                                                                            <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                            <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal"><i class="fa fa-search-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>												
                                                            </div>
                                                        </div>
														<?php }?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                   <!--     <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">

                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/012bg.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>

                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                   <!--     <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Trid Palm</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?90.00</span>
                                                                        <span class="old-price">?120.00</span>

                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                  <!--      <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                   
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <a href="product-details.php?pid=<?=$nth['product_id'];?>"><img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product"></a>

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="product-details.html">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>

                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                               <a href="product-details.php?pid=<?=$nth['product_id'];?>"> <button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                  <!--      <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Various Versions</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?99.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                    <!--    <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-1 -->
                                            <!-- Start Product = display-1-2 -->
                                            <div role="tabpanel" class="tab-pane fade" id="display-1-2">
                                                <div class="row">
                                                    <div class="active-product-carosel">
                                                        <!-- Start Single-Product -->
<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%3,27%' limit 4");

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
														?>
                                                        <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-55%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                 
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                    <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
																	<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product"> 
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#"><?php echo $nth['title'] ?></a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                        <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
															<?php }?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                  <!--      <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                    <!--    <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                    
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/1.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/1bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Various Versions</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?99.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                      <!--  <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/4.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                    <!--    <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Trid Palm</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?90.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                               <!--         <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-2 -->
                                            <!-- Start Product = di3play-1-1 -->
                                            <div role="tabpanel" class="tab-pane fade" id="display-1-3">
                                                <div class="row">
                                                    <div class="active-product-carosel">
                                                        <!-- Start Single-Product -->
														
                                                      	<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%3,28%' limit 4");

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
														?>
                                                        <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-55%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                      <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
																	<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product"> 

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#"><?php echo $nth['title'] ?></a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                        <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
														<?}?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                    <!--    <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                  <!--      <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                 
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/3.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Various Versions</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?90.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                              <!--          <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/4.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                   <!--     <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Trid Palm</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?99.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>
                                                                    <span class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </span>
                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                <!--        <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>
                                                                    <span class="rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </span>
                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-3 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product -->
                        </div>
                        <!-- END PRODUCT-AREA (1) -->







                    </div>

                </div>
                <hr style="width: 88%;top: 23px;margin: 0px auto;position: relative;">

                <!-- Trending Now Start-->

                <div class="brand-logo-area carosel-navigation">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12">
                                <!-- START PRODUCT-BANNER -->

                                <!-- END PRODUCT-BANNER -->
                                <!-- START PRODUCT-AREA (1) -->
                                <div class="product-area">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12" style="margin-top: 26px;">
                                            <!-- Start Product-Menu -->

                                            <center>
                                                <div class="latestP">
                                                    TRENDING NOW
                                                </div></center>



                                        </div>
                                    </div>
                                    <!-- End Product-Menu -->


                                    <a href="shop.html" class="viewlink">View All</a>


                                    <div class="clear"></div>
                                    <!-- Start Product -->
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="" style="background:#fff;margin-top: -29px;">

                                                <div class="tab-content">
                                                    <!-- Product = display-1-1 -->
                                                    <div role="tabpanel" class="tab-pane fade in active" id="display-1-1">
                                                        <div class="row">
                                                            <div class="active-product-carosel">
                                                                <!-- Start Single-Product -->
																
                                                                <?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl group by rand() limit 12");

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
														?>
                                                                <!-- Start Single-Product -->
                                                                <div class="recompro" >
                                                                    <div class="single-product">
                                                                        <div class="label_new">
                                                                            <span class="new">new</span>
                                                                        </div>
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-55%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="vendor/productImg/<?=$imgs[0];?>" alt="Product">
																	<img class="secondary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product"> 
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>"><?php echo $nth['title'] ?></a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                                    <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                                </div>
                                                                            </center>


                                                                        </div>

                                                                    </div>
                                                                </div>
														<?php } ?>
                                                                <!-- End Single-Product -->
                                                                <!-- Start Single-Product -->
                                                         <!--       <div class="recompro" style="margin-left: -153px;">
                                                                    <div class="single-product">
                                                                        <div class="label_new">

                                                                        </div>
                                                                        <div class="product-img">
                                                                           <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/12bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/12.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.html">Black Shrugs</a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <!-- End Single-Product -->
                                                                <!-- Start Single-Product -->
                                                         <!--       <div class="recompro" style="margin-left: -321px;">
                                                                    <div class="single-product">
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.html">T-Shirts</a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div>  -->
                                                                <!-- End Single-Product -->
                                                                <!-- Start Single-Product -->
                                                        <!--        <div class="recompro" style="margin-left: -489px;">
                                                                    <div class="single-product">
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.html">Printed Top</a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div>  -->
                                                                <!-- End Single-Product -->
                                                                <!-- Start Single-Product -->
                                                          <!--      <div class="recompro" style="margin-left: -657px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                           <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.html">Denim Jeans</a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div>  -->

                                                           <!--     <div class="recompro" style="margin-left: -825px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.html">Denim Jeans</a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div>  -->

                                                       <!--         <div class="recompro" style="margin-left: -993px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.html#">Denim Jeans</a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div>  -->

                                                     <!--           <div class="recompro" style="margin-left: -1161px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.html">Denim Jeans</a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div>  -->

                                                     <!--           <div class="recompro" style="margin-left: -1329px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.html">Denim Jeans</a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div>  -->
                                                                <!-- End Single-Product -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Product = display-1-1 -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product -->
                                </div>
                                <!-- END PRODUCT-AREA (1) -->







                            </div>

                        </div>
                    </div>
                </div>

                <!--Trending End-->



                <div class="row">


                    <div class="col-md-6">
                        <!-- START PRODUCT-BANNER -->

                        <!-- END PRODUCT-BANNER -->
                        <!-- START PRODUCT-AREA (1) -->
                        <div class="product-area">
                            <div class="row" id="tabstrripleft">
                                <div class="col-xs-12 col-md-12" id="tabstripp">
                                    <!-- Start Product-Menu -->
                                    <div class="product-menu">
                                        <div class="product-title">
                                            <h3 class="title-group-2 gfont-1">Electronic</h3>
                                        </div>

                                        <ul role="tablist">
                                            <li role="presentation" class=" active"><a href="#display-2-1" role="tab" data-toggle="tab">Laptop</a></li>
                                            <li role="presentation"><a href="#display-2-2" role="tab" data-toggle="tab">Mobile</a></li>
                                            <li role="presentation"><a href="#display-2-3"  role="tab" data-toggle="tab">Tv</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product-Menu -->
                            <div class="clear"></div>
                            <!-- Start Product -->
                            <div class="row">
                                <div class="col-xs-12 col-md-12" id="tabebox1">
                                    <div class="product carosel-navigation">
                                        <div class="tab-content">
                                            <!-- Product = display-1-1 -->
                                            <div role="tabpanel" class="tab-pane fade in active" id="display-2-1">
                                                <div class="row">
                                                    <div class="active-product-carosel">
                                                        <!-- Start Single-Product -->
														
<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%2,80%' limit 4");

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
														?>
                                                        <div class="proslidr">
                                                            <div class="single-product" style="background: #fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-55%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                       <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
																	<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product"> 

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#"><?php echo $nth['title'] ?></a></h5>

<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                        <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                    </div>

                                                                </div>
                                                                <div class="product-action">
                                                                    <div class="button-group">
                                                                        <div class="product-button">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                        </div>
                                                                        <div class="product-button-2">
                                                                            <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                            <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                            <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal"><i class="fa fa-search-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>												
                                                            </div>
                                                        </div>
														<?php } ?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                             <!--           <div class="proslidr">
                                                            <div class="single-product" style="background: #fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/cam.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                               <!--         <div class="proslidr">
                                                            <div class="single-product" style="background: #fff;">
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/lap.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Trid Palm</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?90.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                              <!--          <div class="proslidr">
                                                            <div class="single-product" style="background: #fff;">
                                                                <div class="product-img">
                                                                    
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/mob.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                <!--        <div class="proslidr">
                                                            <div class="single-product" style="background: #fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Various Versions</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?99.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                               <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                               <!--         <div class="proslidr">
                                                            <div class="single-product" style="background: #fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->




                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-1 -->
                                            <!-- Start Product = display-1-2 -->
                                            <div role="tabpanel" class="tab-pane fade" id="display-2-2">
                                                <div class="row">
                                                    <div class="active-product-carosel">
                                                        <!-- Start Single-Product -->
														<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%1,6%' limit 4");

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
														?>
                                                        <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-55%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                       <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#"><?php echo $nth['title'] ?></a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                        <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                               <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
														<?php } ?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                 <!--       <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                 <!--       <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/1.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/1bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Various Versions</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?99.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                  <!--      <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/4.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                <!--        <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Trid Palm</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?90.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                     <!--   <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-2 -->
                                            <!-- Start Product = di3play-1-1 -->
                                            <div role="tabpanel" class="tab-pane fade" id="display-2-3">
                                                <div class="row">
                                                    <div class="active-product-carosel">
                                                        <!-- Start Single-Product -->
														<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%2,16%' limit 4");

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
														?>
                                                        <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-55%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                      <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#"><?php echo $nth['title'] ?></a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
														<?php }?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                    <!--    <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>">	<button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                               <!--         <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/3.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Various Versions</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?90.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                               <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                <!--        <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/4.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                 <!--       <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Trid Palm</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?99.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                 <!--       <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                           
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-3 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product -->
                        </div>
                        <!-- END PRODUCT-AREA (1) -->







                    </div>




                    <div class="col-md-6">
                        <!-- START HOT-DEALS-AREA -->
                        <div class="hot-deals-area carosel-circle">

                            <div class="row">
                                                    <!--<input class="toggle-box1" id="header2" type="checkbox" >
<label for="header2">CATEGORIES</label>
<div><a href="#">Category 1</a><br><a href="#">Category 2</a><br><a href="#">Category 3</a></div>-->

                                <div class="cat2">


                                   <!-- faisal start -->
	<?php
										$submenu = new DBQuery();
										$submenuctr = $submenu -> selectData("select * from product_category where status = '1' And parent_id =2 limit 5");
										?>
                                    <ul class="navigation">
									
                                        <a class="main" href="#url">CATEGORIES &nbsp;&nbsp;<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
<?php foreach($submenuctr as $second){	?>                                      
									  <li class="n1"><a href="shop.php?product=<?=$second['id'];?>&catid=2"><?=$second['category_name'];?></a></li>
                                  <!--      <li class="n2"><a href="#">item #2</a></li> -->
                                   <!--     <li class="n3"><a href="#">item #3</a></li> -->
                                   <!--     <li class="n4"><a href="#">item #4</a></li> -->
                                   <!--     <li class="n5"><a href="#">item #5</a></li> -->
<?php }?>
                                    </ul
        <!-- faisal end -->
                                </div>
                                <div class="active-hot-deals">
                                    <!-- Start Single-hot-deals -->
											<?php $getData = $dbAccess->selectData("select * from  cat_banner where catid=2 order by rand() limit 3 ");
								foreach($getData as $gt){
					?>
                                    <div class="col-xs-12" id="sld1">
                                        <div class="single-hot-deals">
                                            <a href="<?php echo $gt['link'];?>">
                                                <img src="superadmin/images/<?php echo $gt['image'];?>" class="resbn">
                                            </a>
                                        </div>
                                    </div>
								<?php }?>
                                    <!-- End Single-hot-deals -->
                                    <!-- Start Single-hot-deals -->
                            <!--        <div class="col-xs-12" id="sld2">
                                        <div class="single-hot-deals">
                                            <a href="product.html">
                                                <img src="img/elec.jpg" class="resbn">
                                            </a>
                                        </div>
                                    </div> -->
                                    <!-- End Single-hot-deals -->
                                    <!-- Start Single-hot-deals -->
                                 <!--   <div class="col-xs-12" id="sld3">
                                        <div class="single-hot-deals">
                                            <a href="product.html">
                                                <img src="img/elec.jpg" class="resbn">
                                            </a>
                                        </div>
                                    </div> -->
                                    <!-- End Single-hot-deals -->
                                </div>
                            </div>
                        </div>
                        <!-- END HOT-DEALS-AREA -->



                    </div>
                </div>

                <hr style="width: 88%;top: -38px;margin: 28px auto;">

                <div class="brand-logo-area carosel-navigation">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12">
                                <!-- START PRODUCT-BANNER -->

                                <!-- END PRODUCT-BANNER -->
                                <!-- START PRODUCT-AREA (1) -->
                                <div class="product-area">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12" style="margin-top: -22px;">
                                            <!-- Start Product-Menu -->

                                            <center>
                                                <div class="latestP">
                                                    NEW LAUNCHES
                                                </div></center>



                                        </div>
                                    </div>
                                    <!-- End Product-Menu -->


                                    <a href="shop.html" class="viewlink">View All</a>


                                    <div class="clear"></div>
                                    <!-- Start Product -->
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="" style="background:#fff;margin-top: -29px;">

                                                <div class="tab-content">
                                                    <!-- Product = display-1-1 -->
                                                    <div role="tabpanel" class="tab-pane fade in active" id="display-1-1">
                                                        <div class="row">
                                                            <div class="active-product-carosel">
															<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl order by rand() limit 12");

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
														?>
                                                                <!-- Start Single-Product -->
                                                                <div class="recompro" style="margin-left: 15px;">
                                                                    <div class="single-product">
                                                                        <div class="label_new">
                                                                            <span class="new">new</span>
                                                                        </div>
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-55%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                               <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>"><?php echo $nth['title'] ?></a></h5>
                                                                                <div class="price-box">
                                                                                    <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                                    <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                                </div>
                                                                            </center>


                                                                        </div>

                                                                    </div>
                                                                </div>
														<?php } ?>
                                                                <!-- End Single-Product -->
                                                                <!-- Start Single-Product -->
                                                      <!--          <div class="recompro" style="margin-left: -153px;">
                                                                    <div class="single-product">
                                                                        <div class="label_new">

                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/12bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/12.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>">Black Shrugs</a></h5>

                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div>  -->
                                                                <!-- End Single-Product -->
                                                                <!-- Start Single-Product -->
                                                       <!--         <div class="recompro" style="margin-left: -321px;">
                                                                    <div class="single-product">
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>">T-Shirts</a></h5>

                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <!-- End Single-Product -->
                                                                <!-- Start Single-Product -->
                                                      <!--          <div class="recompro" style="margin-left: -489px;">
                                                                    <div class="single-product">
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>">Printed Top</a></h5>

                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <!-- End Single-Product -->
                                                                <!-- Start Single-Product -->
                                                       <!--         <div class="recompro" style="margin-left: -657px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                           <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>">Denim Jeans</a></h5>

                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div> -->

                                                        <!--        <div class="recompro" style="margin-left: -825px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>">Denim Jeans</a></h5>

                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div> -->

                                                       <!--         <div class="recompro" style="margin-left: -993px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>">Denim Jeans</a></h5>

                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div> -->

                                                       <!--         <div class="recompro" style="margin-left: -1161px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>">Denim Jeans</a></h5>

                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div> -->

                                                        <!--        <div class="recompro" style="margin-left: -1329px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-20%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>">Denim Jeans</a></h5>

                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div> -->


                                                                <!-- End Single-Product -->
                                                                <!-- Start Single-Product -->
                                                        <!--        <div class="col-xs-6" style="width:200px;margin-left:-150px;">
                                                                    <div class="single-product">
                                                                        <div class="sale-off">
                                                                            <span class="sale-percent">-25%</span>
                                                                        </div>
                                                                        <div class="product-img">
                                                                           <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                                <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                                <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                            <center><h5><a href="product-details.php?pid=<?=$nth['product_id'];?>">T-Shirts</a></h5>

                                                                                <div class="price-box">
                                                                                    <span class="price">?85.00</span>
                                                                                    <span class="old-price">?110.00</span>
                                                                                </div>
                                                                            </center>



                                                                        </div>
                                                                    </div>
                                                                </div>  -->
                                                                <!-- End Single-Product -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Product = display-1-1 -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product -->
                                </div>
                                <!-- END PRODUCT-AREA (1) -->







                            </div>

                        </div>
                    </div>
                </div>





                <div class="row">

                    <div class="col-md-6">
                        <!-- START HOT-DEALS-AREA -->
                        <div class="hot-deals-area carosel-circle">

                            <div class="row">
                                                    <!--<input class="toggle-box" id="header3" type="checkbox" >
<label for="header3">CATEGORIES</label>
<div><a href="#">Category 1</a><br><a href="#">Category 2</a><br><a href="#">Category 3</a></div>-->
                                <div class="cat1">


                                   
                                    <ul class="navigation">
									
                                        <a class="main" href="#url">CATEGORIES &nbsp;&nbsp;<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                       <?php 
									   $submenu = new DBQuery();
$submenuctr = $submenu -> selectData("select * from product_category where status = '1' And parent_id = 36");
									   foreach($submenuctr as $second){ ?> 
										<li class="n1"><a href="shop.php?product=<?=$second['id'];?>&catid=36"><?=$second['category_name'];?></a></li>
                                  <!--      <li class="n2"><a href="#">item #2</a></li> -->
                                  <!--      <li class="n3"><a href="#">item #3</a></li> -->
                                  <!--      <li class="n4"><a href="#">item #4</a></li> -->
                                  <!--      <li class="n5"><a href="#">item #5</a></li> -->
									   <?php } ?>
                                    </ul>
                                </div>
                                <div class="active-hot-deals">
                                    <!-- Start Single-hot-deals -->
                                   				<?php $getData = $dbAccess->selectData("select * from  cat_banner where catid=36 order by rand() limit 3 ");
								foreach($getData as $gt){
					?>
                                    <div class="col-xs-12" id="bantab1">
                                        <div class="single-hot-deals">
										
                                            <a href="<?php echo $gt['link'];?>">
                                                <img src="superadmin/images/<?php echo $gt['image'];?>" class="resbn">
                                            </a>

                                        </div>
                                    </div>
								<?php } ?>
                                    <!-- End Single-hot-deals -->
                                    <!-- Start Single-hot-deals -->
                                <!--    <div class="col-xs-12" id="bantab2">
                                        <div class="single-hot-deals">
                                            <a href="product.html">
                                                <img src="img/gros.jpg" class="resbn">
                                            </a>
                                        </div>
                                    </div> -->
                                    <!-- End Single-hot-deals -->
                                    <!-- Start Single-hot-deals -->
                                 <!--   <div class="col-xs-12" id="bantab3">
                                        <div class="single-hot-deals">
                                            <a href="product.html">
                                                <img src="img/gros.jpg" class="resbn">
                                            </a>
                                        </div>
                                    </div>  -->
                                    <!-- End Single-hot-deals -->
                                </div>
                            </div>
                        </div>
                        <!-- END HOT-DEALS-AREA -->



                    </div>
                    <div class="col-md-6">
                        <!-- START PRODUCT-BANNER -->

                        <!-- END PRODUCT-BANNER -->
                        <!-- START PRODUCT-AREA (1) -->
                        <div class="product-area">
                            <div class="row" id="tabstrip">
                                <div class="col-xs-12 col-md-12" id="stripright">
                                    <!-- Start Product-Menu -->
                                    <div class="product-menu">
                                        <div class="product-title">
                                            <h3 class="title-group-2 gfont-1">GROCERY</h3>
                                        </div>

                                        <ul role="tablist">
                                            <li role="presentation" class=" active"><a href="#display-3-1" role="tab" data-toggle="tab">Personals</a></li>
                                            <li role="presentation"><a href="#display-3-2" role="tab" data-toggle="tab">Grains</a></li>
                                            <li role="presentation"><a href="#display-3-3"  role="tab" data-toggle="tab">Beverages</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product-Menu -->
                            <div class="clear"></div>
                            <!-- Start Product -->
                            <div class="row">
                                <div class="col-xs-12 col-md-12" id="pdbox1">
                                    <div class="product carosel-navigation">
                                        <div class="tab-content">
                                            <!-- Product = display-1-1 -->
                                            <div role="tabpanel" class="tab-pane fade in active" id="display-3-1">
                                                <div class="row">
                                                    <div class="active-product-carosel">
                                                        <!-- Start Single-Product -->
														
<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%36,81%' limit 4");

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
														?>
                                                        <div class="proslidr">
														
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-55%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                       <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#"><?php echo $nth['title'] ?></a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                        <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                    </div>

                                                                </div>
                                                                <div class="product-action">
                                                                    <div class="button-group">
                                                                        <div class="product-button">
                                                                            <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                        </div>
                                                                        <div class="product-button-2">
                                                                            <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                            <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                            <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal"><i class="fa fa-search-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>												
                                                            </div>
                                                        </div>
															<?php } ?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                  <!--      <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/sp.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                              <!--          <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/jc.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Trid Palm</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?90.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                 <!--       <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                    
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/qe.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                <!--        <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Various Versions</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?99.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                 <!--       <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">

                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-1 -->
                                            <!-- Start Product = display-1-2 -->
                                            <div role="tabpanel" class="tab-pane fade" id="display-3-2">
                                                <div class="row">
                                                    <div class="active-product-carosel">
													
<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%36,82%' limit 4");

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
														?>
														
				
                                                        <!-- Start Single-Product -->
                                                        <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-55%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                  
                                                                  <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                    <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#"><?php echo $nth['title'] ?></a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                        <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
															<?php } ?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                  <!--      <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="product-img">
                                                                 
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                <!--        <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/1.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/1bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Various Versions</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?99.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                <!--        <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/4.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>

                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                   <!--     <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Trid Palm</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?90.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                              <!--          <div class="proslidr">
                                                            <div class="single-product" style="background:#fff;">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">

                                                                    
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-2 -->
                                            <!-- Start Product = di3play-1-1 -->
                                            <div role="tabpanel" class="tab-pane fade" id="display-3-3">
                                                <div class="row">
                                                    <div class="active-product-carosel">
													
<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl where category_id LIKE '%36,83%' limit 4");

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
														?>
                                                        <!-- Start Single-Product -->
                                                        <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-55%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                      <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#"><?php echo $nth['title'] ?></a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                        <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
														<?php } ?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                               <!--         <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="product-img">
                                                                  
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                               <!--         <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                  
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/3.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Various Versions</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?90.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                <!--        <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                 
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/4.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?105.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                  <!--      <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Trid Palm</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?99.00</span>
                                                                        <span class="old-price">?120.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                <!--        <div class="proslidr">
                                                            <div class="single-product">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
                                                                    <h5><a href="#">Established Fact</a></h5>
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <div class="price-box">
                                                                        <span class="price">?85.00</span>
                                                                        <span class="old-price">?110.00</span>
                                                                    </div>

                                                                    <div class="product-action">
                                                                        <div class="button-group">
                                                                            <div class="product-button">
                                                                                <a href="product-details.php?pid=<?=$nth['product_id'];?>"><button><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                                                            </div>
                                                                            <div class="product-button-2">
                                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                                                <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
                                                                                <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-3 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product -->
                        </div>
                        <!-- END PRODUCT-AREA (1) -->







                    </div>
                </div>

                <hr style="width: 88%;top: -38px;margin: 23px auto;">

                <div class="row">

                    <div class="col-md-12">
                        <!-- START PRODUCT-BANNER -->

                        <!-- END PRODUCT-BANNER -->
                        <!-- START PRODUCT-AREA (1) -->
                        <div class="product-area">
                            <div class="row">
                                <div class="col-xs-12 col-md-12" style="margin-top: -20px;">
                                    <!-- Start Product-Menu -->

                                    <center>
                                        <div class="latestP">
                                            RECOMMENDED PRODUCTS
                                        </div></center>



                                </div>
                            </div>
                            <!-- End Product-Menu -->


                            <a href="shop.html" class="viewlink">View All</a>


                            <div class="clear"></div>
                            <!-- Start Product -->
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="product carosel-navigation" style="background:#fff;margin-top:-31px;">

                                        <div class="tab-content">
                                            <!-- Product = display-1-1 -->
                                            <div role="tabpanel" class="tab-pane fade in active" id="display-1-1" >
                                                <div class="row">
                                                    <div class="active-product-carosel">

<?php
														
												$imgs = array();
											
												
												$img = new DBQuery();
												$disc = new DBQuery();
														$dbAccess = new DBQuery();
														$qurey = $dbAccess->selectData("select * from product_tbl  limit 12");

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
														?>
														
                                                        <!-- Start Single-Product -->
                                                        <div class="recompro" style="margin-left: 15px;">
                                                            <div class="single-product">
                                                                <div class="label_new">
                                                                    <span class="new">new</span>
                                                                </div>
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-55%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">                                                                    
                                                                        <img class="primary-img" src="vendor/productImg/<?=$imgs[1];?>" alt="Product">
<img class="secondary-img" src="vendor/productImg/<?=$imgs[2];?>" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <center><h5><a href="#"><?php echo $nth['title'] ?></a></h5>
                                                                        <div class="price-box">
                                                                            <span class="price"><?php echo "Rs.".$newatm?></span>
                                                                            <span class="old-price"><?php echo "Rs.".$atm?></span>
                                                                        </div>
                                                                    </center>


                                                                </div>

                                                            </div>
                                                        </div>
														<?php } ?>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                 <!--       <div class="recompro" style="margin-left: -153px;">
                                                            <div class="single-product">
                                                                <div class="label_new">

                                                                </div>
                                                                <div class="product-img">
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/12bg.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/12.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <center><h5><a href="#">Nestle</a></h5>
                                                                        <div class="price-box">
                                                                            <span class="price">?85.00</span>
                                                                            <span class="old-price">?110.00</span>
                                                                        </div>
                                                                    </center>



                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
														
                                                  <!--      <div class="recompro" style="margin-left: -321px;">
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <center><h5><a href="#">Watch</a></h5>
                                                                        <div class="price-box">
                                                                            <span class="price">?85.00</span>
                                                                            <span class="old-price">?110.00</span>
                                                                        </div>
                                                                    </center>



                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                               <!--         <div class="recompro" style="margin-left: -489px;">
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <center><h5><a href="#">Super Scan</a></h5>
                                                                        <div class="price-box">
                                                                            <span class="price">?85.00</span>
                                                                            <span class="old-price">?110.00</span>
                                                                        </div>
                                                                    </center>



                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                  <!--      <div class="recompro" style="margin-left: -657px;">
                                                            <div class="single-product">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-20%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/5.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/3bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <center><h5><a href="#">Water Purify</a></h5>
                                                                        <div class="price-box">
                                                                            <span class="price">?85.00</span>
                                                                            <span class="old-price">?110.00</span>
                                                                        </div>
                                                                    </center>



                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                        <!-- Start Single-Product -->
                                                   <!--     <div class="recompro" style="margin-left: -825px;">
                                                            <div class="single-product">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                   <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <center><h5><a href="#">Towels</a></h5>
                                                                        <div class="price-box">
                                                                            <span class="price">?85.00</span>
                                                                            <span class="old-price">?110.00</span>
                                                                        </div>
                                                                    </center>



                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="recompro" style="margin-left: -993px;">
                                                            <div class="single-product">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <center><h5><a href="#">Towels</a></h5>
                                                                        <div class="price-box">
                                                                            <span class="price">?85.00</span>
                                                                            <span class="old-price">?110.00</span>
                                                                        </div>
                                                                    </center>



                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="recompro" style="margin-left: -1161px;">
                                                            <div class="single-product">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <center><h5><a href="#">Towels</a></h5>
                                                                        <div class="price-box">
                                                                            <span class="price">?85.00</span>
                                                                            <span class="old-price">?110.00</span>
                                                                        </div>
                                                                    </center>



                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="recompro" style="margin-left: -1329px;">
                                                            <div class="single-product">
                                                                <div class="sale-off">
                                                                    <span class="sale-percent">-25%</span>
                                                                </div>
                                                                <div class="product-img">
                                                                    <a href="product-details.php?pid=<?=$nth['product_id'];?>">
                                                                        <img class="primary-img" src="img/product/mediam/6.jpg" alt="Product">
                                                                        <img class="secondary-img" src="img/product/mediam/4bg.jpg" alt="Product">
                                                                    </a>
                                                                </div>
                                                                <div class="product-description">
<span class="hert" style="float:left;"><i class="fa fa-heart"></i></span>
                                                                    <center><h5><a href="#">Towels</a></h5>
                                                                        <div class="price-box">
                                                                            <span class="price">?85.00</span>
                                                                            <span class="old-price">?110.00</span>
                                                                        </div>
                                                                    </center>



                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single-Product -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product = display-1-1 -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product -->
                        </div>
                        <!-- END PRODUCT-AREA (1) -->







                    </div>

                </div>

            </div>












            <!--<div class="col-lg-12" style="margin-top:70px;">
            
            <img src="img/wall.jpg">
            
            </div>-->

            <div class="container" style="background:#fff;margin-top:20px;">
                <div class="row">		
                    <div class="bidcont">


                        <div class="vidbox"><iframe width="457" height="270" src="https://www.youtube.com/embed/TUxHf0Fsg0A" frameborder="0" allowfullscreen></iframe>
                            <div class="vidtxt">
                                <h4>Product</h4>
                                <p>Text</p>
                            </div>
                        </div>
                        <div class="bidtxt"><img src="img/bid.jpg"></div>
                        <div class="bidimg"><img src="img/bidimg.jpg"></div>

                    </div>		 


                    <div style="clear:both;"></div>
                    <div class="container">
                        <!-- Top Navigation -->


                        <div class="content">
                            <center><div class="home-title-testimonials">

                                    <h2 class="asseen">There’s more to see on <span>Shoppingmoney.</span></h2>
                                    <h4 class="costtext">Come take a look at what else is  <a href="" class="footer_testimonial" id="story">here!</a></h4>
                                </div>
                            </center>

                            <div class="container">


                                <div class="am-container" id="am-container">
                                    <div class="contsmall">
                                        <a href="#"><img src="images/a8.jpg"></img></a>
                                        <div class="textbox1">			
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis leo nec justo fermentum egestas.</p></div>
                                        <div class="bottombx">
                                            <p class="textbtm">Your Text Here</p>
                                        </div>
                                    </div>

                                    <div class="contsmall">
                                        <a href="#"><img src="images/a1.jpg"></img></a>
                                        <div class="textbox">			
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis leo nec justo fermentum egestas.</p></div>
                                        <div class="bottombx">
                                            <p class="textbtm">Your Text Here</p>
                                        </div>
                                    </div>


                                    <div class="contsmall">
                                        <a href="#"><img src="images/a3.jpg"></img></a>
                                        <div class="textbox">			
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis leo nec justo fermentum egestas.</p></div>
                                        <div class="bottombx">
                                            <p class="textbtm">Your Text Here</p>
                                        </div>
                                    </div>

                                    <div class="contsmall">
                                        <a href="#"><img src="images/a4.jpg"></img></a>
                                        <div class="textbox">			
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis leo nec justo fermentum egestas.</p></div>
                                        <div class="bottombx">
                                            <p class="textbtm">Your Text Here</p>
                                        </div>
                                    </div>

                                    <div class="contsmall">
                                        <a href="#"><img src="images/a2.jpg"></img></a>
                                        <div class="textbox">			
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis leo nec justo fermentum egestas.</p></div>
                                        <div class="bottombx">
                                            <p class="textbtm">Your Text Here</p>
                                        </div>
                                    </div>


                                </div>

                            </div>



                        </div></div><!-- /container --></div></div>



            <div style="clear:both;"></div>




            <div class="smallban">

                <div class="section group">
                    <div class="col span_1_of_5">
                        <img src ="img/24x7.png" style="width:40px";>
                        <p><strong>100% security</strong><br>
                           When you buy something on ShoppingMoney on a secure browser: Your payment is secured by TLS, a higher grade of security than SSL. <br>click here</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/trust.png" style="width:40px;">
                        <p><strong>Trust</strong><br>
                           At ShoppingMoney, We Sell without selling out. We focus more on our core principles and customer loyalty than short term commissions and profits.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/love.png"  style="width:40px;">
                        <p><strong>Quality you will love</strong><br>
                            We at ShoppingMoney believes in the Quality.Hasselfree delivery and A+ grade quality product is our business mantra.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/policy.png" style="width:50px;">
                        <p><strong>Easy Return Policy</strong><br>
                            We at Shoppingmoney belives in smooth process, Client's can return their products in one click.<br>give us a shout.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/care.jpg" style="width:40px;">
                        <p><strong>We care</strong><br>
                            We care what out customers think about our services, because We know, If we don't take care of our customers,Someone else will!! <br>give us a shout.</p>
                    </div>
                </div>



            </div>
            <div style="clear:both;"></div>

<?php include("include/tags.php"); ?>


            <!-- END SUBSCRIBE-AREA -->
        </section>
        <!-- END HOME-PAGE-CONTENT -->

<?php include("include/footer.php");
  unset($_SESSION['refid']);
  unset($_SESSION['empref']);
 ?>




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
<script src="main2.js"></script>		
        <script src="js/main.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.montage.min.js"></script>
        <script type="text/javascript">
            $(function () {
                /* 
                 * just for this demo:
                 */
                $('#showcode').toggle(
                        function () {
                            $(this).addClass('up').removeClass('down').next().slideDown();
                        },
                        function () {
                            $(this).addClass('down').removeClass('up').next().slideUp();
                        }
                );
                $('#panel').toggle(
                        function () {
                            $(this).addClass('show').removeClass('hide');
                            $('#overlay').stop().animate({left: -$('#overlay').width() + 20 + 'px'}, 300);
                        },
                        function () {
                            $(this).addClass('hide').removeClass('show');
                            $('#overlay').stop().animate({left: '0px'}, 300);
                        }
                );

                // initialize the plugin
                var $container = $('#am-container'),
                        $imgs = $container.find('img').hide(),
                        totalImgs = $imgs.length,
                        cnt = 0;

                $imgs.each(function (i) {
                    var $img = $(this);
                    $('<img/>').load(function () {
                        ++cnt;
                        if (cnt === totalImgs) {
                        $imgs.show();
                                $container.montage({
                                minsize	: true,
                                        margin 	: 2
                                });
                                /* 
                                 * just for this demo:
                                 */
                                $('#overlay').fadeIn(500);
                                var imgarr = new Array();
                                forfa fa - sort - desc(var i = 1; i <= 73;
                                ++i
                                        ) {
                        imgarr.push(i);
                        }
                        $('#loadmore').show().bind('click', function() {
                        var len = imgarr.length; .bottombx

                                for (var i = 0, newimgs = ''; i < 15; ++i) {
                            var pos = Math.floor(Math.random() * len),
                                    src = imgarr[pos];
                            newimgs += '<a href="#"><img src="images/' + src + '.jpg"/></a>';
                        }

                        var $newimages = $(newimgs);
                        $newimages.imagesLoaded(function () {
                            $container.append($newimages).montage('add', $newimages);
                        });
                    });
                    }
                }).attr('src', $img.attr('src'));
                });
            });
        </script>

    </body>

</html>