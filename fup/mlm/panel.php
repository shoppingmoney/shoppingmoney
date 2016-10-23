<?php 
extract($_REQUEST);
//error_reporting(0);
ob_start();
session_start();
//include_once 'includes/headerfooterModel.php';
//$mod = new headerfooterModel();
?>
<!DOCTYPE html>
<!-- SEO HEAD CALLING -->
<head>
   <!--Stylesheets-->
   <link href="assets/css/style-new.css" rel="stylesheet" media="screen">
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
   <!-- easing -->
   <!-- bootstrap js plugins -->
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
   
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
	 <link href="assets/css/style-new.css" rel="stylesheet" media="screen">
   
   
   
   <!-- top dropdown navigation -->
   <!--Font list: Open Sans (Normal, Bold, Italics) , Bree Serif (Normal)  <link href=https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700|Bree+Serif' rel='stylesheet' type='text/css'> -->  <!--<script src="https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script> 
      <script>   WebFont.load({  google: {  families: ['Open Sans', 'Bree Serif']  }    });  </script>--> <!-- Dynamic Font Loading -->
   <script type="text/javascript">  WebFontConfig = { google: { families: [ 'Bree+Serif::latin', 'Open+Sans:400italic,700italic,400,700:latin' ] }   };  (function() {   var wf = document.createElement('script');   wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';   wf.type = 'text/javascript';    wf.async = 'true';    var s = document.getElementsByTagName('script')[0];  s.parentNode.insertBefore(wf, s);  })(); </script>  
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->  <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>   <![endif]--> <script>(function() { var _fbq = window._fbq || (window._fbq = []); if (!_fbq.loaded) { var fbds = document.createElement('script'); fbds.async = true; fbds.src = '//connect.facebook.net/en_US/fbds.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(fbds, s); _fbq.loaded = true; } _fbq.push(['addPixelId', '526261447476436']); })(); window._fbq = window._fbq || []; 	window._fbq.push(['track', 'PixelInitialized', {}]); </script> 

   <script type="text/javascript" src="js/myjs.js"></script>
	 	<link rel="stylesheet" href="assets/lib/DataTables/media/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">
		<link rel="stylesheet" href="assets/lib/DataTables/extensions/Scroller/css/dataTables.scroller.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	 
   

   
</head>
<body>
   <!-- BODY HEADER CALLING -->
   <!--Header-->
   <?php include 'includes/header.php';?>
  <!--/.Header-->
   <!--/.fluid-container-->
   
      <!--content*sidebar-->
  <div class="container" id="count">
      <?php include 'broker.php';?>
      <!--/.main-row-->
</div>
   
   <!--/.Container--><!-- BODY FOOTER CALLING --><!--footer-->
   <?php include 'includes/footer.php';?>
   <!-- JS FILES CALLING --><!--Javascripts--><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="assets/js/jquery.min.js"></script>
      <!-- easing -->

      <!-- bootstrap js plugins -->
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <!-- top dropdown navigation -->
    
      <!-- common functions -->
      <script src="assets/js/tisa_common.js"></script>
      <!-- style switcher -->
      <script src="assets/js/tisa_style_switcher.js"></script>
      <!-- page specific plugins -->
      <!-- parsley.js validation -->
      <script src="assets/lib/Parsley.js/dist/parsley.min.js"></script>
      <!--  datepicker -->
    
      <!-- multiselect, tagging -->
      <script src="assets/lib/select2/select2.min.js"></script>
      <!-- wysiwg editor -->
      <script src="assets/lib/ckeditor/ckeditor.js"></script>
      <script src="assets/lib/ckeditor/adapters/jquery.js"></script>
      <!-- form validation functions -->
      <script src="assets/js/apps/tisa_validation.js"></script>
   <script>
      echo.init({
        offset: 100,
        throttle: 250,
        unload: false,
        callback: function (element, op) {
          console.log(element, 'has been', op + 'ed')
        }
      });
   </script>
   
   <script src="assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script src="assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
		<script src="assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
		
		<!-- datatables functions -->
		<script src="assets/js/apps/tisa_datatables.js"></script>
 <script src="js/account.js"></script>
   
</body>
</html>
