<?php
session_start();
ob_start();
if (isset($_SESSION['userEmail']) == null || isset($_SESSION['userEmail']) == '') {
    header("location:../index.php");
}
include 'lib/Connection.php';
include 'lib/Fileupload.php';
include 'lib/DBQuery.php';
include 'lib/Helpers.php';
include 'lib/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
$secureId = $_SESSION['userEmail'];
$read = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
$vendorId = $read['unique_user_id'];
$getData = $dbAccess->selectSingleStmt("select * from   vendor_details where unique_user_id = '$secureId' ");
$num_of_product = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId'");
$num_of_vrify = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And verify = '1'");
$num_of_unvrify = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And verify = '0'");
?>

<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        
        <!-- Meta, title, CSS, favicons, etc. -->
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shopping Money! | Vendor </title>

        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
        <link href="css/icheck/flat/green.css" rel="stylesheet" />
        <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />
		
		 <link href="css/linechart.css" rel="stylesheet" type="text/css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/nprogress.js"></script>

        <!--[if lt IE 9]>
              <script src="../assets/js/ie8-responsive-file-warning.js"></script>
              <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->
			  
			  <style>
					.tile1{
						color:#0d99b1;
					}
					.tile2{
						color:#0f8e5a;
					}
					.tile3{
						color:#b57e1b;
					}
					.tile4{
						color:#710e0e;
					}
			  
			  </style>

    </head>


    <body class="nav-md">

        <div class="container body">


            <div class="main_container">

                <?php include("include/menu-nav.php"); ?>

                <!-- top navigation -->
                <?php include("include/top-nav.php"); ?>
                <!-- /top navigation -->


                <!-- page content -->
                <div class="right_col" role="main">

                    <div class="">
                        <div class="page-title">
                            


                        </div>
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Welcome to your Dashboard!</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Settings 1</a>
                                                    </li>
                                                    <li><a href="#">Settings 2</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="x_content">

                                        <div class="col-xs-12">

                                           

                                          <!---  <div id="mainb" style="height:350px;"></div>----->
										    <div class="row top_tiles">
            <a href="product_list.php?ptype=0" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats box-blue">
                <div class="icon"><i class="fa fa-sort-numeric-asc tile1" aria-hidden="true"></i>
                </div>
                <div class="count">
												    <span class="value text-success tile1"> <?= $num_of_product; ?> </span>
                                                  
                                                   
                                                </div> 

                <h3>Total Product</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            <a href="product_list.php?ptype=1" class="count"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxgreen">
                <div class="icon"><i class="fa fa-thumbs-o-up tile2" aria-hidden="true"></i>
                </div>
               <div class="count">
													<span class="value text-success tile2"> <?= $num_of_vrify; ?> </span>
                                                    
                                                    
                                                    </div>

                <h3>Approved Product</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            <a href="product_list.php?ptype=2" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxorange">
                <div class="icon"><i class="fa fa-clock-o tile3" aria-hidden="true"></i>
                </div>
                <div class="count">
													 <span class="value text-success tile3"> <?= $num_of_unvrify; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Product Pending</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
           <a href="product_list.php?ptype=2" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxred" >
                <div class="icon"><i class="fa fa-ban tile4" aria-hidden="true"></i>
                </div>
                <div class="count">
													 <span class="value text-success tile4"> <?= $num_of_unvrify; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Cancellation</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
			<a href="product_list.php?ptype=2" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxorange">
                <div class="icon"><i class="fa fa-hand-paper-o tile3" aria-hidden="true"></i>
                </div>
                <div class="count">
													 <span class="value text-success tile3"> <?= $num_of_unvrify; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Total Order</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
			 <a href="product_list.php?ptype=2" class="count"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxred">
                <div class="icon"><i class="fa fa-check-square-o tile4"></i>
                </div>
                <div class="count">
													 <span class="value text-success tile4"> <?= $num_of_unvrify; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Total Sales</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
			<a href="product_list.php?ptype=2" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxgreen">
                <div class="icon"><i class="fa fa-reply tile2" aria-hidden="true"></i>
                </div>
                <div class="count">
													 <span class="value text-success tile2"> <?= $num_of_unvrify; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Order Returned</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
			  <a href="product_list.php?ptype=2" class="count"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats box-blue">
                <div class="icon"><i class="fa fa-truck tile1" aria-hidden="true"></i>
                </div>
                <div class="count">
													 <span class="value text-success tile1"> <?= $num_of_unvrify; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Total Delivery</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
          </div>

                                        </div>

                                        <!-- start project-detail sidebar -->
                                      <!--  <div class="col-md-3 col-sm-3 col-xs-12">

                                            <section class="panel">

                                                <div class="x_title">
                                                    <h2>Welcome Back</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="panel-body">
                                                    <h3 class="green"><i class="fa fa-paint-brush"></i> <?= $getData['name']; ?></h3>

                                                    <br />

                                                    <div class="project_detail">

                                                        <p class="title">Client Company</p>
                                                        <p><?= $getData['comp_name']; ?></p>
                                                        <p class="title">Dealing Category</p>
                                                        <p><?= $getData['main_category']; ?></p>
                                                    </div>

                                                    <br />



                                                </div>

                                            </section>

                                        </div>-->
                                        <!-- end project-detail sidebar -->

                                    </div>
									
									
                                </div>
                            </div>
                        </div>
						
						
					<div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Sales/Transaction Summary <small>Weekly progress</small></h2>
                  <div class="filter">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="col-md-9 col-sm-12 col-xs-12">
                   
<div class="container">
  <!-- DONUT CHART BLOCK (LEFT-CONTAINER) --> 
  
 <!-- LINE CHART BLOCK (LEFT-CONTAINER) -->
                <div class="line-chart-block block">
     <div class="line-chart">
       <div class='grafico'>
       <ul class='eje-y'>
         <li data-ejeY='30'></li>
         <li data-ejeY='20'></li>
         <li data-ejeY='10'></li>
         <li data-ejeY='0'></li>
       </ul>
       <ul class='eje-x'>
         <li>Apr</li>
         <li>May</li>
         <li>Jun</li>
       </ul>
         <span data-valor='25'>
           <span data-valor='8'>
             <span data-valor='13'>
               <span data-valor='5'>   
                 <span data-valor='23'>   
                 <span data-valor='12'>
                     <span data-valor='15'>
                     </span></span></span></span></span></span></span>
       </div>
       
     </div>
                    <ul class="time-lenght horizontal-list">
                        <li><a class="time-lenght-btn" href="#14">Week</a></li>
                        <li><a class="time-lenght-btn" href="#15">Month</a></li>
                        <li><a class="time-lenght-btn" href="#16">Year</a></li>
                    </ul>
                    <ul class="month-data clear">
                        <li>
                            <p>APR<span class="scnd-font-color"> 2013</span></p>
                            <p><span class="entypo-plus increment"> </span>21<sup>%</sup></p>
                        </li>
                        <li>
                            <p>MAY<span class="scnd-font-color"> 2013</span></p>
                            <p><span class="entypo-plus increment"> </span>48<sup>%</sup></p>
                        </li>
                        <li>
                            <p>JUN<span class="scnd-font-color"> 2013</span></p>
                            <p><span class="entypo-plus increment"> </span>35<sup>%</sup></p>
                        </li>
                    </ul>
                </div>
                

  
  
            </div>

<div class="tiles">
<div class="demo-container" style="height:280px; display:none;">
                      <div id="placeholder33x" class="demo-placeholder" style="padding: 0px; position: relative;"><canvas class="flot-base" width="750" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 750px; height: 280px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 50px; text-align: center;">30/08/16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 120px; text-align: center;">01/09/16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 190px; text-align: center;">03/09/16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 260px; text-align: center;">05/09/16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 330px; text-align: center;">07/09/16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 401px; text-align: center;">09/09/16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 471px; text-align: center;">11/09/16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 541px; text-align: center;">13/09/16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 611px; text-align: center;">15/09/16</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 62px; top: 264px; left: 681px; text-align: center;">17/09/16</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 246px; left: 12px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 205px; left: 6px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 164px; left: 6px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 123px; left: 6px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 82px; left: 6px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 41px; left: 0px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 0px; text-align: right;">120</div></div></div><canvas class="flot-overlay" width="750" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 750px; height: 280px;"></canvas><div class="legend"><div style="position: absolute; width: 74px; height: 16px; top: 17px; right: 21px; opacity: 0.85; background-color: rgb(255, 255, 255);"> </div><table style="position:absolute;top:17px;right:21px;;font-size:smaller;color:#3f3f3f"><tbody><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(150,202,89);overflow:hidden"></div></div></td><td class="legendLabel">Email Sent&nbsp;&nbsp;</td></tr></tbody></table></div></div>
                    </div>
					<div class="tiles">
                      <div class="col-md-4 tile">
                        <span>Total Sessions</span>
                        <h2>231,809</h2>
                        <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
                      </div>
                      <div class="col-md-4 tile">
                        <span>Total Revenue</span>
                        <h2>$231,809</h2>
					<span class="sparkline22 graph" style="height: 160px;"><canvas width="200" height="40" style="display: inline-block; width: 200px; height: 40px; vertical-align: top;"></canvas></span>
                      </div>
                      <div class="col-md-4 tile">
                        <span>Total Sessions</span>
                        <h2>231,809</h2>
                        <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
                      </div>
                    </div>
                      <!-----<div class="col-md-4 tile">
                        <span>Active Products</span>
                        <h2>231,809</h2>
                        <span class="sparkline11 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                      </div>
                      <div class="col-md-4 tile">
                        <span>Inactive Products</span>
                        <h2>$231,809</h2>
                        <span class="sparkline22 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                      </div>
                      <div class="col-md-4 tile">
                        <span>Payments</span>
                        <h2>231,809</h2>
                        <span class="sparkline11 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                      </div>----->
                    </div>

                  </div>

                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div>
                      <div class="x_title">
                        <h2>New Orders</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a>
                              </li>
                              <li><a href="#">Settings 2</a>
                              </li>
                            </ul>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <ul class="list-unstyled top_profiles scroll-view">
                        <li class="media event">
                          
                          <div class="media-body">
                            <a class="title" href="#">Ms. Mary Jane</a>
                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                            <p> <small>12 Sales Today</small>
                            </p>
                          </div>
                        </li>
                        <li class="media event">
                          
                          <div class="media-body">
                            <a class="title" href="#">Ms. Mary Jane</a>
                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                            <p> <small>12 Sales Today</small>
                            </p>
                          </div>
                        </li>
                        <li class="media event">
                          
                          <div class="media-body">
                            <a class="title" href="#">Ms. Mary Jane</a>
                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                            <p> <small>12 Sales Today</small>
                            </p>
                          </div>
                        </li>
                        <li class="media event">
                         
                          <div class="media-body">
                            <a class="title" href="#">Ms. Mary Jane</a>
                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                            <p> <small>12 Sales Today</small>
                            </p>
                          </div>
                        </li>
                        <li class="media event">
                          
                          <div class="media-body">
                            <a class="title" href="#">Ms. Mary Jane</a>
                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                            <p> <small>12 Sales Today</small>
                            </p>
                          </div>
                        </li>
						 <li class="media event">
                          
                          <div class="media-body">
                            <a class="title" href="#">Ms. Mary Jane</a>
                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                            <p> <small>12 Sales Today</small>
                            </p>
                          </div>
                        </li>
						<li class="media event">
                         
                          <div class="media-body">
                            <a class="title" href="#">Ms. Mary Jane</a>
                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                            <p> <small>12 Sales Today</small>
                            </p>
                          </div>
                        </li>
						
                      </ul>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>	
                  <div class="clearfix"></div>
                </div>
              
              </div>
            </div>
          </div>	
						
		<div class="row">
            <div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Promotional Banners </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item One Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Two Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Two Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Two Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Three Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Payments Pending </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item One Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Two Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Two Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Two Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Three Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Order Returned </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item One Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Two Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Two Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Two Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                  <article class="media event">
                    <a class="pull-left date">
                      <p class="month">April</p>
                      <p class="day">23</p>
                    </a>
                    <div class="media-body">
                      <a class="title" href="#">Item Three Title</a>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>				
						
						
						
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Shopping Money <a href="#">vendor</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>


        <script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>
		
		 <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

        <!-- echart -->
        <script src="js/echart/echarts-all.js"></script>
        <script src="js/echart/green.js"></script>
        <!-- pace -->
       
		
		 
  <!-- chart js -->
  <script src="js/chartjs/chart.min.js"></script>
  <!-- sparkline -->
  <script src="js/sparkline/jquery.sparkline.min.js"></script>
  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
 <script src="js/pace/pace.min.js"></script>

        <script>
            var myChart9 = echarts.init(document.getElementById('mainb'), theme);
            myChart9.setOption({
                title: {
                    x: 'center',
                    y: 'top',
                    padding: [0, 0, 20, 0],
                    text: 'Project Perfomance :: Revenue vs Input vs Time Spent',
                    textStyle: {
                        fontSize: 15,
                        fontWeight: 'normal'
                    }
                },
                tooltip: {
                    trigger: 'axis'
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataView: {
                            show: true,
                            readOnly: false
                        },
                        restore: {
                            show: true
                        },
                        saveAsImage: {
                            show: true
                        }
                    }
                },
                calculable: true,
                legend: {
                    data: ['Revenue', 'Cash Input', 'Time Spent'],
                    y: 'bottom'
                },
                xAxis: [{
                        type: 'category',
                        data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    }],
                yAxis: [{
                        type: 'value',
                        name: 'Amount',
                        axisLabel: {
                            formatter: '{value} ml'
                        }
                    }, {
                        type: 'value',
                        name: 'Hours',
                        axisLabel: {
                            formatter: '{value} ¡ÆC'
                        }
                    }],
                series: [{
                        name: 'Revenue',
                        type: 'bar',
                        data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
                    }, {
                        name: 'Cash Input',
                        type: 'bar',
                        data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
                    }, {
                        name: 'Time Spent',
                        type: 'line',
                        yAxisIndex: 1,
                        data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
                    }]
            });
        </script>
		
		
		
		
		 <script type="text/javascript">
    //define chart clolors ( you maybe add more colors if you want or flot will add it automatic )
    var chartColours = ['#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];

    //generate random number for charts
    randNum = function() {
      return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
    }

    $(function() {
      var d1 = [];
      //var d2 = [];

      //here we generate data for chart
      for (var i = 0; i < 30; i++) {
        d1.push([new Date(Date.today().add(i).days()).getTime(), randNum() + i + i + 10]);
        //    d2.push([new Date(Date.today().add(i).days()).getTime(), randNum()]);
      }

      var chartMinDate = d1[0][0]; //first day
      var chartMaxDate = d1[20][0]; //last day

      var tickSize = [1, "day"];
      var tformat = "%d/%m/%y";

      //graph options
      var options = {
        grid: {
          show: true,
          aboveData: true,
          color: "#3f3f3f",
          labelMargin: 10,
          axisMargin: 0,
          borderWidth: 0,
          borderColor: null,
          minBorderMargin: 5,
          clickable: true,
          hoverable: true,
          autoHighlight: true,
          mouseActiveRadius: 100
        },
        series: {
          lines: {
            show: true,
            fill: true,
            lineWidth: 2,
            steps: false
          },
          points: {
            show: true,
            radius: 4.5,
            symbol: "circle",
            lineWidth: 3.0
          }
        },
        legend: {
          position: "ne",
          margin: [0, -25],
          noColumns: 0,
          labelBoxBorderColor: null,
          labelFormatter: function(label, series) {
            // just add some space to labes
            return label + '&nbsp;&nbsp;';
          },
          width: 40,
          height: 1
        },
        colors: chartColours,
        shadowSize: 0,
        tooltip: true, //activate tooltip
        tooltipOpts: {
          content: "%s: %y.0",
          xDateFormat: "%d/%m",
          shifts: {
            x: -30,
            y: -50
          },
          defaultTheme: false
        },
        yaxis: {
          min: 0
        },
        xaxis: {
          mode: "time",
          minTickSize: tickSize,
          timeformat: tformat,
          min: chartMinDate,
          max: chartMaxDate
        }
      };
      var plot = $.plot($("#placeholder33x"), [{
        label: "Email Sent",
        data: d1,
        lines: {
          fillColor: "rgba(150, 202, 89, 0.12)"
        }, //#96CA59 rgba(150, 202, 89, 0.42)
        points: {
          fillColor: "#fff"
        }
      }], options);
    });
  </script>
  <!-- /flot -->
  <!--  -->
  <script>
    $('document').ready(function() {
      $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
        type: 'bar',
        height: '125',
        barWidth: 13,
        colorMap: {
          '7': '#a1a1a1'
        },
        barSpacing: 2,
        barColor: '#26B99A'
      });

      $(".sparkline11").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3], {
        type: 'bar',
        height: '40',
        barWidth: 8,
        colorMap: {
          '7': '#a1a1a1'
        },
        barSpacing: 2,
        barColor: '#26B99A'
      });

      $(".sparkline22").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {
        type: 'line',
        height: '40',
        width: '200',
        lineColor: '#26B99A',
        fillColor: '#ffffff',
        lineWidth: 3,
        spotColor: '#34495E',
        minSpotColor: '#34495E'
      });
    });
  </script>
  
  <!-- Doughnut Chart -->
  <script>
    $('document').ready(function() {
      var canvasDoughnut,
          options = {
            legend: false,
            responsive: false
          };

      new Chart(document.getElementById("canvas1i"), {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
          labels: [
            "Symbian",
            "Blackberry",
            "Other",
            "Android",
            "IOS"
          ],
          datasets: [{
            data: [15, 20, 30, 10, 30],
            backgroundColor: [
              "#BDC3C7",
              "#9B59B6",
              "#E74C3C",
              "#26B99A",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#CFD4D8",
              "#B370CF",
              "#E95E4F",
              "#36CAAB",
              "#49A9EA"
            ]

          }]
        },
        options: options
      });

      new Chart(document.getElementById("canvas1i2"), {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
          labels: [
            "Symbian",
            "Blackberry",
            "Other",
            "Android",
            "IOS"
          ],
          datasets: [{
            data: [15, 20, 30, 10, 30],
            backgroundColor: [
              "#BDC3C7",
              "#9B59B6",
              "#E74C3C",
              "#26B99A",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#CFD4D8",
              "#B370CF",
              "#E95E4F",
              "#36CAAB",
              "#49A9EA"
            ]

          }]
        },
        options: options
      });

      new Chart(document.getElementById("canvas1i3"), {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
          labels: [
            "Symbian",
            "Blackberry",
            "Other",
            "Android",
            "IOS"
          ],
          datasets: [{
            data: [15, 20, 30, 10, 30],
            backgroundColor: [
              "#BDC3C7",
              "#9B59B6",
              "#E74C3C",
              "#26B99A",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#CFD4D8",
              "#B370CF",
              "#E95E4F",
              "#36CAAB",
              "#49A9EA"
            ]

          }]
        },
        options: options
      });
    });
  </script>
  <!-- /Doughnut Chart -->
		
		 <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      };

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
  <!-- /datepicker -->
    </body>

</html>
