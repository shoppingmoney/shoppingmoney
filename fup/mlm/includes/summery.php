<?php
ob_start();
include_once 'includes/config.php';
$conf = new config();
?>
<html>
    <head>



    </head>
    <body>

        <div class="container" style="width: 100%;">     

            <div id="main_wrapper">
                <div class="page_content">
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12" style=" background-color: white;     padding: 43px;">
                                <div class="col-sm-12"style="border: 1px solid #ECF0F1;    border-radius: 4px; background-color:#ECF0F1;  padding: 23px;" >
                                <div class="" style=" padding:10px;" >
 <div class="col-sm-4">
<p>Account Holder:- <span>Kashif Ali </span></p>
 </div>
 <div class="col-sm-4">
<p>Account Holder Id:- <span>1234567891234567894 </span></p>
 </div>
 <div class="col-sm-4">
<p>Credit Amount:-<span>50000</span></p>
 </div>
 <div class="col-sm-4">
<p>Debit Amount:-<span>50000</span></p>
 </div>
 <div class="col-sm-4">
<p>Unclered Amount:-<span>50000</span></p>
 </div>
  <div class="col-sm-4">
<p>Total Amount:-<span>50000</span></p>
 </div>
                                </div>
</div>
 </div>
                            <div class="col-lg-12">

                                <div class="panel-heading" style="float: right;margin-right: 30px;">Account Summery</div>
                                
                                
                                
                                <div class="panel-body">
                                    <table id="dt_basic" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>S no.</th>
                                                <th>Narration</th>
                                                <th>Mode</th>                
                                                <th>Dr</th>               
                                                <th>Cr</th>
                                                <th>Date</th>                
                                                <th>Fun</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "account";
                                            $ct = 0;
                                            $data = $conf->fetchall($sql);
                                            foreach ($data as $rp) {
                                                $ct++;
                                                ?>

                                            <tr>
                                                <td><?php echo $ct; ?></td>	
                                                <td><?php echo $rp->narration; ?></td>								 
                                                <td><?php echo $rp->mode; ?></td>
                                                <td><?php echo $rp->dr; ?></td>
                                                <td><?php echo $rp->cr; ?></td>
                                                <td><?php echo $rp->date; ?></td>

                                                <td>
                                                    <!--<a href="?get=<?= $rp->id; ?>" title="Tree"><img src="images/network.png" width="25" height="25"/></a>
                                                    <a href="" title="Swap position"><img src="images/swapme.png" width="25" height="25"/></a>-->
                                                    <a href="" title="view Details"><img src="images/view.png" width="25" height="25"/></a>
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

    <?php //include 'includes/footer.php';?>

</body>



<script src="assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>

<!-- datatables functions -->
<script src="assets/js/apps/tisa_datatables.js"></script>


</html>
