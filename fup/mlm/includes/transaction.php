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
    <div class="container" style="width: 100%;">
      <!--content*sidebar-->
   
         <!--content-->
<div id="main_wrapper">
			<div class="page_content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							
								<div class="panel-heading" style="float: right;margin-right: 30px;">Transaction List</div>
								<div class="panel-body" id="dvData">
									<table id='dt_basic' class='table table-striped' style='font-size: 12px;color: #4b6e9d;'>
										<thead>
											<tr>
												<th>S no.</th>
                <th>Date</th>
                <th>Mode</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Status</th>
											</tr>
											
										</thead>
										<tbody>
										<?php
            $sql = "account WHERE uid='$uid' order by id desc"; //first Node.
            $ct = 0;
            $data = $conf->fetchall($sql);
            foreach ($data as $rp) {
				$date = $helper->dateFormate($rp->date);
                $ct++;
            ?>
										
										<tr>
											 <td><?php echo $ct; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $rp->mode; ?></td>
                    <td><?php echo $rp->dr; ?></td>
                    
                    <td><?php echo $rp->cr;?></td>
                    <td>
                       ok
                    </td>
					</tr>
										
			<?php } ?>
			</tbody>
									</table>
								</div>
							
						</div>
					</div>
				</div>
			</div>		
		</div>

</div>
</div>

 
  <script src="assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script src="assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
		<script src="assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
		
		<!-- datatables functions -->
		<script src="assets/js/apps/tisa_datatables.js"></script>
		
<style>
.dataTables_info {font-size:19px;}
</style>
