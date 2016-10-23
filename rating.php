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
		
		
		<style>


		.product-area {
    margin-top: 0px;
}
		.single-product{border: 1px solid #ddd;}
		
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
    top: 7px;
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
  color: #0094ff;
}
.dropdown-check-list.visible .items {
  display: block;
}

.ingh{
height: 250px;
width: 170px;
margin-top: 9px;
}

		</style>
		
		 <style>

            @font-face {
                font-family:signpainter-housescript;
                src:url('../fonts/signpainter-housescript.ttf');
            }
            .rating {
                overflow: hidden;
                display: inline-block;
            }
            .rating-input {
                float: right;
                width: 16px;
                height: 16px;
                padding: 0;
                margin: 0 0 0 -16px;
                opacity: 0;
            }
            .rating-star {
                display: block;
                width: 16px;

                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
            .rating-star:hover {
                background-position: 0 0;
            }
            .rating-star {
                position: relative;
                float: right;
                display: block;
                width: 16px;
                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
            .rating-star:hover,
            .rating-star:hover ~ .rating-star {
                background-position: 0 0;
            }
            .rating-star:hover,
            .rating-star:hover ~ .rating-star,
            .rating-input:checked ~ .rating-star {
                background-position: 0 0;
            }
            .rating:hover .rating-star:hover,
            .rating:hover .rating-star:hover ~ .rating-star,
            .rating-input:checked ~ .rating-star {
                background-position: 0 0;
            }
            .rating-star,
            .rating:hover .rating-star {
                position: relative;
                float: right;
                display: block;
                width: 16px;
                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
        </style>
    </head>
    <body style="background:#f7f7f7;">


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
		<!-- HEADER AREA END -->
		<!-- START PAGE-CONTENT -->
		<!-- START PAGE-CONTENT -->
		<section class="page-content" style="background: #fff;padding: 51px 0px;">
			<div class="container">
	            
				<div class="row">
				<div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">
				<div class="toch-review-title">
                                                <h2 style="padding:6px;background: aliceblue;">Write a review</h2>
                                             </div>
                                             <?php
//moneyval,proqu
                                             if(isset($_POST['submit'])){
											 	$dbAccess->insertData("vendor_rate","vendor_id,name,email,comment,rate,valuemoney,productqulality,status","'".$_GET['merchantid']."','".$_POST['name']."','".$_POST['email']."','".$_POST['comment']."','".$_POST['rating']."','".$_POST['moneyval']."','".$_POST['proqu']."','1'");
											 	echo "<script>alert('Thanks for your rating');</script>";
											 }
                                             ?>
                                             <form method="post">                                             <div class="review-message">
                                                <div class="col-xs-12">
                                                   <p><sup>*</sup>Your Name <br>
                                                      <input type="text" name="name" required="" readonly="" value="<?php echo $_SESSION['uname'];?>" class="form-control">
                                                   </p>
                                                   <p><sup>*</sup>Your Email <br>
                                                      <input type="text" name="email" required="" readonly="" value="<?php echo $_SESSION['myemail'];?>" class="form-control">
                                                   </p>
                                                   <p><sup>*</sup>Your Review <br>
                                                      <textarea name="comment" required="" class="form-control"></textarea>
                                                   </p>
                                                </div>
                                                <div class="help-block">
                                                   
                                                </div>


                                                <div class="get-rating">
<span style="font-family:calibri; font-size:14px;">Overall Rating <span><br>
                                                         <span class="rating">
                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-5" name="rating" value="5">
                                                    <label for="rating-input-1-5" class="rating-star"></label>
                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-4" name="rating" value="4">
                                                    <label for="rating-input-1-4" class="rating-star"></label>

                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-3" name="rating" value="3">
                                                    <label for="rating-input-1-3" class="rating-star"></label>
                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-2" name="rating" value="2">
                                                    <label for="rating-input-1-2" class="rating-star"></label>
                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-1" name="rating" value="1">
                                                    <label for="rating-input-1-1" class="rating-star"></label>
                                                
                                                </span>
                                                </div>


 <style>

            @font-face {
                font-family:signpainter-housescript;
                src:url('../fonts/signpainter-housescript.ttf');
            }
            .rating1 {
                overflow: hidden;
                display: inline-block;
            }
            .rating-input1 {
                float: right;
                width: 16px;
                height: 16px;
                padding: 0;
                margin: 0 0 0 -16px;
                opacity: 0;
            }
            .rating-star1 {
                display: block;
                width: 16px;

                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
            .rating-star1:hover {
                background-position: 0 0;
            }
            .rating-star1 {
                position: relative;
                float: right;
                display: block;
                width: 16px;
                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
            .rating-star1:hover,
            .rating-star1:hover ~ .rating-star1 {
                background-position: 0 0;
            }
            .rating-star1:hover,
            .rating-star1:hover ~ .rating-star1,
            .rating-input1:checked ~ .rating-star1 {
                background-position: 0 0;
            }
            .rating1:hover .rating-star1:hover,
            .rating1:hover .rating-star1:hover ~ .rating-star1,
            .rating-input1:checked ~ .rating-star1 {
                background-position: 0 0;
            }
            .rating-star1,
            .rating1:hover .rating-star1 {
                position: relative;
                float: right;
                display: block;
                width: 16px;
                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
        </style>





                                                <div class="get-rating">
<span style="font-family:calibri; font-size:14px;">Product Quality <span><br>
                                                         <span class="rating1">
                                                    <input type="radio" class="rating-input1"
                                                           id="rating-input1-1-5" name="proqu" value="5">
                                                    <label for="rating-input1-1-5" class="rating-star1"></label>
                                                    <input type="radio" class="rating-input1"
                                                           id="rating-input1-1-4" name="proqu" value="4">
                                                    <label for="rating-input1-1-4" class="rating-star1"></label>

                                                    <input type="radio" class="rating-input1"
                                                           id="rating-input1-1-3" name="proqu" value="3">
                                                    <label for="rating-input1-1-3" class="rating-star1"></label>
                                                    <input type="radio" class="rating-input1"
                                                           id="rating-input1-1-2" name="proqu" value="2">
                                                    <label for="rating-input1-1-2" class="rating-star1"></label>
                                                    <input type="radio" class="rating-input1"
                                                           id="rating-input1-1-1" name="proqu" value="1">
                                                    <label for="rating-input1-1-1" class="rating-star1"></label>
                                                
                                                </span>
                                                </div>



 <style>

            @font-face {
                font-family:signpainter-housescript;
                src:url('../fonts/signpainter-housescript.ttf');
            }
            .rating2 {
                overflow: hidden;
                display: inline-block;
            }
            .rating-input2 {
                float: right;
                width: 16px;
                height: 16px;
                padding: 0;
                margin: 0 0 0 -16px;
                opacity: 0;
            }
            .rating-star2 {
                display: block;
                width: 16px;

                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
            .rating-star2:hover {
                background-position: 0 0;
            }
            .rating-star2 {
                position: relative;
                float: right;
                display: block;
                width: 16px;
                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
            .rating-star2:hover,
            .rating-star2:hover ~ .rating-star1 {
                background-position: 0 0;
            }
            .rating-star2:hover,
            .rating-star2:hover ~ .rating-star2,
            .rating-input2:checked ~ .rating-star2 {
                background-position: 0 0;
            }
            .rating2:hover .rating-star2:hover,
            .rating2:hover .rating-star2:hover ~ .rating-star2,
            .rating-input2:checked ~ .rating-star2 {
                background-position: 0 0;
            }
            .rating-star2,
            .rating1:hover .rating-star2 {
                position: relative;
                float: right;
                display: block;
                width: 16px;
                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
        </style>





                                                <div class="get-rating">
<span style="font-family:calibri; font-size:14px;">Value For Money<span><br>
                                                         <span class="rating2">
                                                    <input type="radio" class="rating-input2"
                                                           id="rating-input2-1-5" name="moneyval" value="5">
                                                    <label for="rating-input2-1-5" class="rating-star2"></label>
                                                    <input type="radio" class="rating-input2"
                                                           id="rating-input2-1-4" name="moneyval" value="4">
                                                    <label for="rating-input2-1-4" class="rating-star2"></label>

                                                    <input type="radio" class="rating-input2"
                                                           id="rating-input2-1-3" name="moneyval" value="3">
                                                    <label for="rating-input2-1-3" class="rating-star2"></label>
                                                    <input type="radio" class="rating-input2"
                                                           id="rating-input2-1-2" name="moneyval" value="2">
                                                    <label for="rating-input2-1-2" class="rating-star2"></label>
                                                    <input type="radio" class="rating-input2"
                                                           id="rating-input2-1-1" name="moneyval" value="1">
                                                    <label for="rating-input2-1-1" class="rating-star2"></label>
                                                
                                                </span>
                                                </div>




                                                <div class="buttons clearfix">
                                                   <button name="submit" class="btn btn-primary pull-right">Continue</button>
                                                </div>
                                             </div>
                                             </form>
						
				<div class="toch-reviews" style="margin-top:70px;">
                                             <div class="toch-table">
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                   <?php
                                                   $fetch=$dbAccess->selectData("select * from vendor_rate where status = '1' And vendor_id = '".$_GET['merchantid']."'");
                                                   foreach($fetch as $yt){
												   	
                                                   ?>
                                                      <tr>
                                                         <td><strong><?=$yt['name'];?></strong></td>                                                       
                                                      </tr>
                                                      <tr>
                                                         <td colspan="2">
                                                           <?php
                                                  for($i=1;$i<=5;$i++){
                                                  	if($i > $yt['rate']){
														echo "<i class='fa fa-star' style='color:gray;'></i>";	
													}else{
														echo "<i class='fa fa-star' style='color:#f9af51;'></i>";													
													}                                               								  	
												  }
												  
                                                  ?>
                                                             <br/>
                                                           <?=$yt['comment'];?>
                                                          
                                                           
                                                         </td>
                                                      </tr>
                                                      <?php } ?>
                                                   </tbody>
                                                </table>
												
											
												
                                             </div>
                                             
                                          </div>
						
					</div>
				
				<?php
						  
						   $vendor = $dbAccess->selectSingleStmt("select * from register_vendor where status = '1' And id = '".$_GET['merchantid']."' ");
						   ?>
					<div class="col-md-3">
						<div class="rightpanel">
                            <center> <h4><b>Seller information</b></h4></center><hr style="border-top: 3px solid #E6E6E6;">
							<h6><b>Sold By:</b> <a href="#"><?=$vendor['name'];?> </a></h6>
							
							<h1>
							 <?php
							 $newcount = $dbAccess->countDtata("select * from  	vendor_rate where status = '1' And vendor_id = '".$_GET['merchantid']."' ");
                              	$qurey = $dbAccess->selectData("select * from  	vendor_rate where status = '1' And vendor_id = '".$_GET['merchantid']."' ");
                              	$total = 0;
                              	$oth = 0;
                              	foreach($qurey as $u){
									$total = $total+$u['rate'];
									$oth++;
								}
								$fin = $total/$oth;
								
								$posttive = ($total*100)/($oth*5);
                              ?>
                                 <span class="rating">
                                <?php
                                                  for($i=1;$i<=5;$i++){
                                                  	if($i > $fin){
														echo "<i class='fa fa-star' style='color:gray;'></i>";	
													}else{
														echo "<i class='fa fa-star' style='color:#f9af51;'></i>";													
													}                                               								  	
												  }
												  
                                                  ?>
                                
                                 </span>
                                
                              </h1>
							 <div class="" style="width:100%;">
                             <div>
							  <h1><?=$posttive;?>%</h1>
							  <p>Positive Reviews</p>
							  </div>

							<div style="float:right; margin-top: -30%;">
							  <h1><?=$newcount;?></h1>
							  <p>Total Rating</p>
							</div>
							  </div>
								
                         
					
					
			</div>
			
			
		</section>
		<!-- END PAGE-CONTENT -->

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
