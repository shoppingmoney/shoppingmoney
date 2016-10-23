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

.input-group .form-control,
.input-group-addon,
.input-group-btn {
    display: -webkit-inline-box;
}
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

		</style>
		  <style>
 .suggestionsBox90 {
	position: absolute;
	left: -218px;
	top:-13px;
        height:250px;
        overflow-y:scroll;
	margin: 26px 0px 0px 0px;
	width: 798px;
	padding:0px;
	background-color: #fff;
	border-top: 3px solid #ccc;
	color: #353535;
	z-index:99999;
margin: 46px 115px 31px 234px;
width: 798px;
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
	text-decoration:underline;
	color:#7B7B7B;
font-size:12px;
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
     <div class="input-group">

    <input type="text" name="searchfaq" id="search_faq" onkeyup="suggest_faq();" class="form-control">
    <span class="input-group-btn">
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
	            
				<div class="row">
				<div class="col-md-7" style=" padding-top:13px; padding-left: 0px;padding-right: 0px; margin-left:3%; background: #fff">
				            <div class="toch-review-title">
                                                <h2 style="padding:6px;background: aliceblue; font-size:20px;">Top Categories</h2>
                                             </div>
                                            <?php
											$getData = $dbAccess->selectData("SELECT * FROM faq_category ");
											foreach ($getData as $t) {
											?>
                                             
                                                <div class="col-md-6" id="category">
                                                   <div class="col-md-3">
                                                      <img class="faq_image" src="superadmin/ico/<?=$t['icon']?>">
                                                   </div>
                                                   <div class="col-md-9">
                                                        <div class="col-sm-12">
                                                         <a href="faqdetails.php?cid=<?php echo $t['id'];?>">   <h4><?=$t['category_name']?></h4> </a>
                                                        </div>
                                                        <div class="col-sm-12">
                                                             <p><?=$t['description']?></p>
                                                        </div>
                                                    </div>

                                                  
                                                </div>
                                                     <?php
											}
													 ?>                                       
                                             </div>
                                           
						
				
						
					
				
				
					<div class="col-md-4">
						<div class="rightpanel">
                                                    <h4><b>Top Queries</b></h4><hr style="border-top: 3px solid #E6E6E6;">
													
<ul id="querylisit">
 <?php
											$getData1 = $dbAccess->selectData("SELECT * FROM faq  where top_query='1' limit 7 ");
											foreach ($getData1 as $t1) {
												$path="faqdetails.php?id=".$t1['id']."&cname=".urlencode($t1['category']);
											?>
                                             
<li><a href="<?php echo $path;?>"><?=$t1['query']?></a></li>

											<?php } ?>
</ul>

<!-- <span><h6><a href="#"><b>View more</b> </a></h6></span> -->
					          
                                
                            
							
								
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
