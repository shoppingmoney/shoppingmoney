<?php
ob_start();
session_start();
include_once 'includes/config.php';
$conf = new config();
$uid = $conf->single("firstimeregd WHERE uemail = '".$_SESSION['myemail']."'","id");
/*
if(!empty($_GET['page'])){
    $show = $_GET['page'];
    header("location:index.php?page=$show");
}*/
?>
<section class="page-content" style="margin-top: -23px;">
	
					<img src="img/4.jpg">
	
		</section>


 
  <script src="assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script src="assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
		<script src="assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
		
		<!-- datatables functions -->
		<script src="assets/js/apps/tisa_datatables.js"></script>
		
<style>
.dataTables_info {font-size:19px;}
</style>
