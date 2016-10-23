ss<?php
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
$system_id=$helper->systemId();
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
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="css/style.css">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
		
		<link rel="stylesheet" type="text/css" href="css/styleslidr.css" />
		<script src="js/modernizr.custom.63321.js"></script>
	<style>

.category-menu-list {
    width: 100%;
    z-index: 1000;
   
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
    
    transition: all 0.3s ease 0s;
    visibility: hidden;
    width: 1000px;
    z-index: 999999999;
}




	.cat-left-drop-menu{
	margin-left:-17px !important;
			}
	
	.menuicon{float:left;width:80px;height:auto;margin: 10px 8px;}
	.divmenu {
    width: 32px;
    height: 3px;
    background-color: #fff;
    margin: 3px 0;
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

#iconmenu{
margin-left:57px;
}
.product_cat1{
width:187px;
height:342px;
}
.product_cat2{
height:258px !important;
width:187px;
}

		</style>	
		
    </head>
    <body style="background:#f7f7f7;">


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>



<div class="col-md-1" style="position : absolute; top:155px;">
						<!-- CATEGORY-MENU-LIST START -->
	                    <div class="left-category-menu hidden-sm hidden-xs">
	                        <div class="left-product-cat" style="position:absolute;z-index:999999;">
	                            <div class="category-heading">
	                                <a href="#" class="menuicon" >
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
		
		
	
		<!-- START PAGE-CONTENT -->
		<section class="page-content">
		<div class="header-area" style="background:#fff;margin-top: -29px;">
		<div class="container">
		<div class="row">
		<?php include("include/menu2.php"); ?>

<div class="col-md-12">
						<ul class="page-menu">
							<li><a href="index.php">Home</a></li>
<?php
$Doodlesing=$dbAccess->selectSingleStmt("select * from product_category where id= '".$_GET['product']."' ");
$getPname=$dbAccess->selectSingleStmt("select * from product_category where id='".$Doodlesing['parent_id']."'")
?>
							<li><a href="javascript:void(0)"><?=ucwords($getPname['category_name']);?>/<?=ucwords($Doodlesing['category_name']);?></a></li>
							
						</ul>
					</div>
		<div class="col-md-12">
		
		<div class="main">
				<div id="mi-slider" class="mi-slider">
				
<?php
$Doodle=$dbAccess->selectData("select * from slider where catid = '".$_GET['product']."' ");
foreach($Doodle as $t){
?>
					
					<ul>
						<li><a href="#"><img src="superadmin/slider/<?=$t['image'];?>" style="width:1150px; max-height:321px;" alt="<?=$t['name'];?>"></a></li>
					</ul>

<?php } ?>
					
					<nav>
				
<?php
foreach($Doodle as $t){
?>
						<a href="#" style="letter-spacing: 0px !important;"><?=$t['name'];?></a>

<?php } ?>
										</nav>

				</div>
			</div>
			
		</div>
		
		</div>
		</div></div>


		
		<div class="header-area" style="background:#fff;margin-top:36px;">
		<div class="container">
		<div class="row">
		<div class="col-md-12">
		<center class="sechead"><h3>Shop By Categories</h3></center>


<div class="col-md-12">
<center><a class="tag" href="#">
    <?php
    $idi = $_GET['product'];
    $coun=$dbAccess->countDtata("select * from product_tbl where category_id LIKE '%$idi%' ");
    ?>
              		View total items<span class="categoryCount color-white">(<?=$coun;?>)</span>
              		</a></center>
</div>



		
		<div class="mainpro">
            
            <?php
            $bigtbl=$dbAccess->selectData("select * from product_category where parent_id = '".$_GET['product']."' order by rand() limit 4");
            foreach($bigtbl as $trr){
            ?>
            
		<div class="productbox">
		<a href="shop.php?product=<?=$trr['id'];?>&catid=<?=$_GET['product'];?>" class="strip"><p><?php echo $trr['category_name'];?></p>
		<img src="superadmin/ico/<?php echo $trr['icon'];?>" class="product_cat1"></a>
		</div>
            <?php } ?>
	
		</div>

		
		</div>
		</div>
		
		</div><!-- End of container -->
		</div><!-- End of header-area2 -->
		

		
		<?php
$cctroops=$_GET['product'];
$buoyant=$dbAccess->selectSingleStmt("select MAX(landing_price) as rupya , MIN(landing_price) as paisa from product_tbl where category_id LIKE '%$cctroops%'");
$oddace=$buoyant['rupya'];
$shopping=$buoyant['paisa'];
?>
		
		<div class="header-area" style="background:#fff;margin-top:36px;">
		<div class="container">
		<div class="row">
		<div class="col-md-12">
		
		<center class="sechead"><h3>Shop By Price</h3></center>
		
		<div class="pricepro">
		
		     <div class="pricebox">
            <a href="shop.php?catid=<?=$_GET['product'];?>&prc=<?=ceil($shopping);?>&pref=prc" class="pre"><p>&nbsp;Rs.<?=ceil($oddace/4);?></p></a>
		</div>
		
		     <div class="pricebox">
		          <a href="shop.php?catid=<?=$_GET['product'];?>&prc=<?=ceil($oddace/3);?>&pref=prc" class="pre"><p>&nbsp;Rs.<?=ceil($oddace/3);?></p></a>
		</div>
		
		     <div class="pricebox">
		 <a href="shop.php?catid=<?=$_GET['product'];?>&prc=<?=ceil($oddace/2);?>&pref=prc" class="pre"><p>Rs.<?=ceil($oddace/2);?></p></a>
		</div>
		 
		      <div class="pricebox">
	 <a href="shop.php?catid=<?=$_GET['product'];?>&prc=<?=ceil($oddace);?>&pref=prc" class="pre"><p>Rs.<?=ceil($oddace);?></p></a>
		</div>
		
		</div>

		
		</div>
		</div>
		
		</div><!-- End of container -->
		</div><!-- End of header-area2 -->
		<?php
              $img = new DBQuery();
            $ids = array();
            $pickcat=$dbAccess->selectSingleStmt("select * from viewsub_category where pcat = '".$_GET['product']."' And status = '1'");
            
            ?>
            
		
		<?php if($pickcat['id']!=0) {?>
		<div class="header-area" style="background:#fff;margin-top:36px;">
		<div class="container">
		
		<div class="row">
		<div class="col-md-12">
            <?php
            $pickcat1=$dbAccess->selectSingleStmt("select * from product_category where parent_id = '".$pickcat['pcat']."' And id='".$pickcat['subcatid1']."' And status = '1' ");
		//	echo "select * from product_category where parent_id = '".$pickcat['pcat']."' And id='".$pickcat['subcatid1']."' And status = '1' ";
            ?>
		<center class="sechead"><h3><?=$pickcat1['category_name'];?></h3></center>
	
		<div class="mainpro">
            <?php
            $sid = $_GET['product'];
            $bigtbl1=$dbAccess->selectData("select * from product_tbl where category_id LIKE '%".$pickcat['subcatid1']."%' order by RAND() limit 0,4 ");
        
		 foreach($bigtbl1 as $tyu){
                $foo = $img->selectSingleStmt("select * from product_img where product_id = '".$tyu['product_id']."'");
            ?>
            <div class="productbox">
		<a href="product-details.php?pid=<?=$tyu['product_id'];?>">
		<img src="<?=$foo['image'];?>" style="height:258px !important;"/>
		</a>
<div class="price-box" style="padding: 10px 3px 1px;   text-align: -webkit-center;">
<p><b><?=$tyu['title'];?></b></p>
</div>
		</div>
            <?php } ?>	
		</div>

		
		</div>
		</div>
		
		</div><!-- End of container -->
		</div><!-- End of header-area2 -->
		
		
		<div class="header-area" style="background:#fff;margin-top:36px;">
		<div class="container">
		<div class="row">
		<div class="col-md-12">
            <?php
           $pickcat2=$dbAccess->selectSingleStmt("select * from product_category where parent_id = '".$pickcat['pcat']."' And id='".$pickcat['subcatid2']."' And status = '1' ");
            ?>
		<center class="sechead"><h3><?=$pickcat2['category_name'];?></h3></center>
	
		<div class="mainpro">
            <?php
            $sid = $_GET['product'];
            $bigtbl1=$dbAccess->selectData("select * from product_tbl where category_id LIKE '%".$pickcat['subcatid2']."%' order by RAND() limit 0,4 ");
        
		 foreach($bigtbl1 as $tyu){
                $foo = $img->selectSingleStmt("select * from product_img where product_id = '".$tyu['product_id']."'");
            ?>
            <div class="productbox">
		<a href="product-details.php?pid=<?=$tyu['product_id'];?>">
		<img src="<?=$foo['image'];?>" style="height:258px !important;" />
		</a>
<div class="price-box" style="padding: 10px 3px 1px;   text-align: -webkit-center;">
<p><b><?=$tyu['title'];?></b></p>
</div>
		</div>
            <?php } ?>	
		</div>

		
		</div>
		</div>
		
		</div><!-- End of container -->
		</div><!-- End of header-area2 -->
		
		<?php } ?>
		
		<div class="header-area" style="background:#fff;margin-top:36px;">
		<div class="container">
		<div class="row">
		<div class="col-md-12">
		<center class="sechead"><h3>Latest Products</h3></center>
		<div class="mainpro" style="margin-right: 93px;">
            
            <?php
            $img = new DBQuery();
            $sid = $_GET['product'];
            $bigtbl=$dbAccess->selectData("select * from product_tbl where category_id LIKE '%$sid%' order by RAND() limit 0,4 ");
            foreach($bigtbl as $trr){
               $foo = $img->selectSingleStmt("select * from product_img where product_id = '".$trr['product_id']."'");
            ?>
            
		<div class="productboxtrend" style="margin-right:38px;">
		  <a href="product-details.php?pid=<?=$trr['product_id'];?>">
		<img src="<?=$foo['image'];?>" class="product_cat2"/>
		</a>
		</div>
		
            <?php } ?>
		     
		
		 
		
		</div>

		
		</div>
		</div>
		
		</div><!-- End of container -->
		</div>
		
		
					<div style="clear:both;"></div>
			
			
		<div class="smallban">

		
		<br><br><br><div class="section group">
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
		
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.catslider.js"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();

			});
		</script>
    </body>


</html>
