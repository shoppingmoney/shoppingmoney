<?php
session_start();
ob_start();
 

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
 
 if(isset($_GET['cname']))
 {
	 @extract($_GET);
$cat_name=urldecode($cname);
 }

 if(isset($_GET['cid']))
 {
	 @extract($_GET);
	 //echo "select * from faq_category where id='".$cid."'";
	 
	 $row=$dbAccess->selectSingleStmt("select * from faq_category where id='".$cid."'");
	 $cname=$row['category_name'];
	 
 }
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
	
	


.ingh{
height: 250px;
width: 170px;
margin-top: 9px;
}
.rightpanel ul li{
line-height:3em;
color: grey;
}
.rightpanel ul li a{
color:grey;
}

.rightpanel span{
padding:30px;
color: red;
}

#category{
padding: 40px 0 20px 0;
}

.rightpanel{
font-size:15px;
box-shadow:0 5px 8px 2px rgba(0, 0, 0, 0.1), 0 10px 16px 0 rgba(0, 0, 0, 0.19);

}

.fqhead{margin-top: -30px;}

.ssb{    margin-top: 50px;}

.vieww{}


.helplinee{ }


.container .box {
  display: block;
  width: 57%;
  content: "+";
  padding: 10px 10px;
    content: "+";
    border: 1px solid #26acce;
  margin: 20px;
}

.container .box .top:before {
  padding: 10px 16px;
    border: 1px solid #26acce;
    color: #ffffff;
    content: "+";
    margin-left: -11px;
    background: #26acce;
    cursor: pointer;
}





.container .box .bottom {
  padding: 12px 10px;
    background-color: #f7f7f7;
    color: #4c4c4c;
    margin-top: 11px;
  display: none;
}


		</style>
		
				  <style>
 .suggestionsBox90 {
	    position: absolute;
    left: -218px;
    top: 24px;
    height: 150px;
    overflow-y: scroll;
    margin: 26px 0px 0px 0px;
    width: 226px;
    padding: 0px;
    background-color: #fff;
    border-top: 3px solid #ccc;
    color: #353535;
    z-index: 99999;
    margin: 46px 115px 31px 234px;
    width: 780px;
    overflow-x: inherit;

}

.suggestionList90 ul li {
	list-style:none;
        color:#7B7B7B;
	margin: 0px;
	padding: 6px;
        text-align:left;
        font-size:12px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList90 ul li:hover {
	text-decoration:none;
	color:#fff;
font-size:12px;
background:#26acce ;
}

</style>
	

    </head>
    <body style="background:#f7f7f7;">


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
		<!-- HEADER AREA END -->
       <div class="fqhead">
		 
		 <div class="col-md-2"></div>
		 <div class="col-md-8" style="position: absolute; left: 17%;top: 300px;">
		 
	<div class="form-group">
<form method="get" action="faqdetails.php">
<h3 class="helplinee" style="color:#fff,margin-left: 35%;">HOW CAN WE ASSIST YOU ?</h3>
     <div class="input-group">

    <input type="text" name="searchfaq" id="search_faq" onkeyup="suggest_faq();" class="form-control">
    <span class="input-group-btn" style="right:-10px !important;">
	<input type="hidden" id="faq_cid" name="cid">
      <button class="btn btn-default" href="faqdetails.php?cid="  type="submit">Search</button>
    </span>
    </div>
	</form>
	<div class="suggestionsBox90" id="suggestions90" style="display: none;"> 

												<div class="suggestionList90" id="suggestionsList90"> &nbsp; </div>

		                    	</div>
     </div>
	 
		 </div>
		 <script>
								function suggest_faq() {

var inputString= document.getElementById("search_faq").value;

//alert(dist);
//alert("searchlocal.php?queryString="+inputString+"&qd="+dist);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
$(document).ready(function(){
  $('#search_faq').addClass('load');
});
document.getElementById("suggestions90").style.display='none';
    if (xhttp.readyState == 4 && xhttp.status == 200) {
//alert('yes');
                 
$(document).ready(function(){
 // $('#suggestions10').fadeIn();
		  // $('#suggestionsList10').html(xhttp.responseText);
		   $('#area_code').removeClass('load');
});
                    document.getElementById("suggestions90").style.display='block';
                    document.getElementById("suggestionsList90").innerHTML = xhttp.responseText;
                 

    }
 //else{
//alert('no');
		//document.getElementById("suggestions10").style.display='none';
	//}
  };
  xhttp.open("GET", "search_faq.php?queryString="+inputString, true);
  xhttp.send();
} 

function fill_faq(thisArea,thisid) {
              document.getElementById("search_faq").value = thisArea;
			   document.getElementById("faq_cid").value = thisid;
        
        $('#suggest_form').submit();
        setTimeout("$('#suggestions90').fadeOut();", 100);
    }

		
								</script>
		 <div class="col-md-2"></div>
		 
          <img src="img/faqhead.jpg" >
        </div>
   

		<!-- START PAGE-CONTENT -->
		<!-- START PAGE-CONTENT -->
		<section class="page-content" style="padding: 51px 0px;">
			<div class="container">
	            <div class="col-md-12">
						<ul class="page-menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="faq.php">Order Tracking</a></li>
							
						</ul>
					<!--	<h4 style="margin-left: 20px;color: #555555;">Order Tracking And Delivery</h4> -->
						<h4 style="margin-left: 20px;color: #555555;"><?php echo $cname;?></h4>
					</div>
				<div class="row">
				 
				<div class="col-md-7" style=" padding-top:13px; padding-left: 0px;padding-right: 0px; margin-left:3%; background: #fff">
				           
                                           
                                             
                                                <div class="col-md-12" id="category">
												
                                                   
                                                   <div class="container">
												   <?php
												   $getData = $dbAccess->selectData("SELECT * FROM faq  where category='".$cname."'");
											foreach ($getData as $t) {
												
												   ?>
  <div class="box">
    <div class="top">
      <?=$t['query']?>
    </div>
    <div class="bottom">
      <?=$t['result']?>
    </div>
  </div>
											<?php }?>
 <!-- <div class="box">
    <div class="top">
      Click me
    </div>
    <div class="bottom">
      #2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </div>
  </div>
  <div class="box">
    <div class="top">
      Click me
    </div>
    <div class="bottom">
      #3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </div>
  </div>
  
  <div class="box">
    <div class="top">
      Click me
    </div>
    <div class="bottom">
     #4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </div>
  </div>
  
  <div class="box">
    <div class="top">
      Click me
    </div>
    <div class="bottom">
      #5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </div>
  </div> -->
</div>
 </div>
    </div>
                                           
						
				
						
					
				
				
					<div class="col-md-4">
						<section class="page-content">
			
	            
				
				
				            <div class="toch-review-title">
                                                <h2 style="padding:6px;background: aliceblue; font-size:20px;">Top Categories</h2>
                                             </div>
                                            <?php
											$getData = $dbAccess->selectData("SELECT * FROM faq_category ");
											foreach ($getData as $t) {
											?>
                                             
                                                <div class="col-md-12" id="category"  style=" padding-top:13px; padding-left: 0px;padding-right: 0px; margin-left:3%; background: #fff">
                                                   <div class="col-md-3">
                                                      <img class="faq_image" src="superadmin/ico/<?=$t['icon']?>">
                                                   </div>
                                                   <div class="col-md-9">
                                                        <div class="col-sm-12">
                                                         <a href="faqdetails.php?cid=<?=$t['id']?>">   <h4><?=$t['category_name']?></h4> </a>
                                                        </div>
                                                        <div class="col-sm-12">
                                                             <p><?=$t['description']?></p>
                                                        </div>
                                                    </div>

                                                  
                                                </div>
                                                     <?php
											}
													 ?>                                       

                                           
						
				
						
					
				
				
					
					
		
			
			
		</section>              
					
					
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
		
		
		<script type="text/javascript">
$('.top').on('click', function() {
	$parent_box = $(this).closest('.box');
	$parent_box.siblings().find('.bottom').slideUp();
	$parent_box.find('.bottom').slideToggle(500, 'swing');
});
</script>	
    </body>


</html>
