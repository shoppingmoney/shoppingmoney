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
?>
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S NO</th>
													<th>Order ID</th>
                                                    <th>Title</th>
													<th>Quantity</th>
                                                    <th>Landing Price</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
											$sender=$dbAccess->selectData("select * from checkout_ord where orderid='".$_GET['oid']."' And vendor_id = '".$_GET['vid']."' AND billing_type='".urldecode($_GET['btype'])."' AND status > 2 AND status <> 9");
											 $c = 1;
											foreach($sender as $ty){
												$ordid=$ty['orderid'];
            $catch = $dbAccess->selectSingleStmt("select * from product_tbl where product_id='".$ty['product_id']."'");
                                                    ?>
                                                    <tr>
                                                        <td><?= $c; ?></td>
														<td><?= $ty['orderid']; ?></td>
                                                        <td><?= $catch['title']; ?></td>
														<td><?= $ty['qty']; ?></td>
                                                        <td><?= $catch['landing_price']; ?></td>
														<td><?php echo $helper->dateFormate($ty['date']); ?></td>
														<!-- Date formate to use require formate of date -->
                                                    </tr>
                                                    <?php
                                                    $c++;
                                                
											}
                                                ?>
                                            </tbody>
                                        </table>