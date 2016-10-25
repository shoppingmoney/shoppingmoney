<?php
include '../class/Connection.php';
include '../class/Fileupload.php';
include '../class/DBQuery.php';
include '../class/Helpers.php';
include '../class/ReturnMsg.php';
include '../../heart.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();





if(isset($_GET['idz'])){
  $id= $_GET['idz'];

$heart= new HeartSystem();
$color=  $heart->_getHeart($id);

$Prod_tbl = $dbAccess->selectSingleStmt("select * from product_tbl where product_id = '" . $_GET['idz'] . "' ");
$Img = array();
$Prod_img = $dbAccess->selectData("select * from product_img where product_id = '" . $_GET['idz'] . "' ");
$img = "";
foreach ($Prod_img as $t) {
  if(!empty($t['image'])){
    $img.= '<img src='.$t['image'].' width="170px" height="200px">';
  }
}
$ship_tbl = $dbAccess->selectSingleStmt("select * from  shipping where product_id = '" . $_GET['idz'] . "'");
$disc_tbl = $dbAccess->selectSingleStmt("select * from  discount where product_id = '" . $_GET['idz'] . "'");



echo '<style type="text/css">
  .modal-dialog {
  width: 100%;
  height: 100%;
margin-right: 0;
padding-right: 0;
padding-left: 35px;
margin-left: 35px;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}
</style>
<div class="modal fade" id="ProductViewer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Product Editor</h4>
      </div>
      <div class="modal-body">
       <!--html code extracted from superadmin-->
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product Details</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content"> Name : '.$Prod_tbl['title'].'<br/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Images</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    '.$img.'
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Heart Configuration</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                   '.$color.'
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pin Code Description</small></h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">'.
                    $id.'
                </div>
            </div>
        </div>
    </div>
</div>
</div>
       <!-- End of EXtracted Code -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->';
}else{
  echo "No File found";
}
?>
