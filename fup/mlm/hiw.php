<?php
session_start();
include_once 'includes/config.php';
$conf = new config();

if(!empty($_GET['page'])){
    $show = $_GET['page'];
    header("location:panel.php?page=$show");
    
    
}
$firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
$uid = $firstinfo->id;
?>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
	 <link href="assets/css/style-new.css" rel="stylesheet" media="screen">
  
     <script type="text/javascript" src="js/myjs.js"></script>
	 	<link rel="stylesheet" href="assets/lib/DataTables/media/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">
		<link rel="stylesheet" href="assets/lib/DataTables/extensions/Scroller/css/dataTables.scroller.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	 

</head>
<body>
<?php include 'includes/header.php';?>
<!--<div class="tree" style="width: 5074px !important;">-->
   
      <!--content*sidebar-->
 <section class="page-content" style="margin-top: -23px;">
<img src="images/1.gif"><br>
<img src="images/2.gif"><br>
<img src="images/3.gif"><br>
<img src="images/4.gif"><br>
<img src="images/5.gif">
</section>

   
  
         <!--content-->
        





 <?php include 'includes/footer.php';?>

</body>
     
  <script src="js/vendor/jquery-1.11.3.min.js"></script>
      <!-- bootstrap JS
         ============================================ -->		
      <script src="js/bootstrap.min.js"></script>    	
    
  <script src="assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script src="assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
		<script src="assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
		
		<!-- datatables functions -->
		<script src="assets/js/apps/tisa_datatables.js"></script>
		

</html>
