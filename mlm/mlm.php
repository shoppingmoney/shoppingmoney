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
    <div class="container" style="width: 100%;">
      <!--content*sidebar-->
   
         <!--content-->
         <div class="col-sm-12">
<?php
                if($uid==1 || $uid==2 || $uid==8){
					$get = 1;
				}else{
					$get = $ref = $conf->single("tree WHERE linkid='".$uid."'","id");
				}
                
                //if(!empty($_GET['get']))
                if(filter_input(INPUT_GET,"get"))
                {
                    $get = $_GET['get'];
                }
				if($get != null || $get != ''){
?>		
<div class="tree" style="width: 100% !important;margin: 0px auto;">
    <ul>
        <li>

            <a class="tip_trigger" href="#">
                <?php
                $sql = "tree where id='$get' limit 1"; //first Node.
                $data = $conf->fetchall($sql);
                foreach ($data as $rp) {
                   $cl = $conf->single("firstimeregd WHERE id='".$rp->linkid."'","club");
				   echo $rp->name;
                    //echo $rp->name;
                ?>
                    <span class="tip" style="width: 600px;">
                        <div class="ibox">


                            <img src="images/photo.png" class="imcls" alt="" />
                            <div class="fieldbox">
                                <table width="100%" height="150">
                                    <form action="#" method="post">
                                        <tr><td width="40%"><b>Name :</b></td><td width="60%"><?=$rp->name; ?></td></tr>

                                        <tr><td width="40%"><b>Total Joining :</b></td><td width="60%"><?php echo $conf->joining("tree", $rp->linkid);?></td></tr>

                                        <!--<tr><td width="40%"><b>Level :</b></td><td><?=$rp->level; ?></td width="60%"></tr>-->

                                        <tr><td width="40%"><b>DOJ :</b></td><td width="60%">
                                                <?php 
                                                
                                                $date=date_create($rp->day);
                                                echo date_format($date,"d/m/Y");
                                                ?>
                                            </td></tr>

                                        <tr><td width="40%"><b>Club :</b></td><td width="60%"><?=$cl;?></td></tr>
                                    </form>
                                </table>
                            
                            </div>
                        </div>

                        
                    </span>
                    <?php
                }
                ?>


            </a>

            <ul>
                <li>
                    <!--<a href="#">1</a>-->
                    <ul>

                        <?php
						if($get == 1 || $get == 2 || $get == 3){
							$sql = "tree where uplinerid='1' OR uplinerid='2' OR uplinerid='3'";
						}else{
							 $sql = "tree where uplinerid='$get'";
						}
                       
                        $data = $conf->fetchall($sql);
                        foreach ($data as $rp) {
							$cl = $conf->single("firstimeregd WHERE id='".$rp->linkid."'","club");
                            ?>

                            <li>

                                <a class="tip_trigger" href="?get=<?php echo $rp->id;?>"><?php echo $rp->name; ?>
                                    <span class="tip" style="width: 600px;">
                                        <div class="ibox">


                                            <img src="images/photo.png" class="imcls" alt="" />
                                            
                                            <div class="fieldbox">
                                <table width="100%" height="150">
                                    <form action="#" method="post">
                                        <tr><td width="40%"><b>Name :</b></td><td width="60%"><?=$rp->name; ?></td></tr>

                                        <!--<tr><td width="40%"><b>Reference :</b></td><td width="60%"><?=$ref; ?></td></tr>-->

                                        <tr><td width="40%"><b>Total Joining :</b></td><td width="60%"><?php echo $conf->joining("tree", $rp->linkid);?></td></tr>
                                        <tr><td width="40%"><b>DOJ :</b></td><td width="60%">
                                                <?php 
                                                
                                                $date=date_create($rp->day);
                                                echo date_format($date,"d/m/Y");
                                                ?>
                                            </td></tr>

                                        <tr><td width="40%"><b>Club :</b></td><td width="60%"><?=$cl?></td></tr>
                                    </form>
                                </table>
                            
                            </div>
                                        </div>
                                        
                                    </span>
                                </a>
                                <ul>

                                    <?php
									echo "sandd";
									die();
                                    $sql = "tree where uplinerid='" . $rp->id . "'"; //first Node.
                                    $data = $conf->fetchall($sql);
									echo "sandd";
									die();
                                    foreach ($data as $rp) {
										$cl = $conf->single("firstimeregd WHERE id='".$rp->linkid."'","club");
                                        ?>
                                        <li>
                                            <a class="tip_trigger" href="?get=<?php echo $rp->id;?>"><?php echo $rp->name; ?>
                                                <span class="tip" style="width: 600px;">
                                                    <div class="ibox">


                                                        <img src="images/photo.png" class="imcls" alt="" />
                                                        <div class="fieldbox">
                                                            
                                                            <div class="fieldbox1">
                                <table width="100%" height="150">
                                    <form action="#" method="post">
                                        <tr><td width="40%"><b>Name :</b></td><td width="60%"><?=$rp->name; ?></td></tr>
                                        <tr><td width="40%"><b>Total Joining :</b></td><td width="60%"><?php echo $conf->joining("tree", $rp->id);?></td></tr>
<tr><td width="40%"><b>DOJ :</b></td><td width="60%">
                                                <?php 
                                                
                                                $date=date_create($rp->day);
                                                echo date_format($date,"d/m/Y");
                                                ?>
                                            </td></tr>

                                        <tr><td width="40%"><b>Club :</b></td><td width="60%"><?=$cl?></td></tr>
                                    </form>
                                </table>
                            
                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </span>
                                            </a>

                                        </li>
                                        <?php
                                    }
                                    ?>

                                </ul>
                            </li>
                            <?php
                        }
                        ?>




                    </ul>



            </ul>					
        </li>


    </ul>
</li>



</div>
				<?php }else{
					echo "Please complete your first shopping to start your tree";
				}?>
</div>
<div id="main_wrapper">
			<div class="page_content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							
								
								<div class="panel-body">
									<table id="dt_basic" class="table table-striped">
										<thead>
											<tr>
												<th>S no.</th>
                <th>User Name</th>
                <!--<th>Reference</th>-->               
                <th>Lel(1)</th>
                <th>Lel(2)</th>
                <th>Lel(3)</th>
                <th>Lel(4)</th>
                <th>Lel(5)</th>
                <th>Lel(6)</th>
                <th>Lel(7)</th>
                <th>Lel(8)</th>
                <th>Lel(9)</th>
              <!--  <th>Fun</th> -->
											</tr>
											
										</thead>
										<tbody>
										<?php
            $sql = "tree where id='$get'"; //first Node.
            $ct = 0;
            $rp = $conf->fetchSingle($sql);
			$ref = $conf->single("firstimeregd WHERE id='".$rp->refrenceid."'","ufirstname");
				
				// counting number of member at layer
				     $arr1=array();
            $check = $conf->fetchall("tree where uplinerid='$get'");
            foreach($check as $chk)
            {
                $arr1[]=$chk->id;
            }
         //total memeber of layer 2  
		 //echo count($arr1)."<br/>";
            $arr2=array();
            for($i=0;$i < count($arr1);$i++)
            {
			  
                $check = $conf->fetchall("tree where uplinerid='".$arr1[$i]."'");
                foreach($check as $chk)
                {
                 $arr2[]=$chk->id;
                }
            }
          //total member of layer 3  
            $arr3=array();
            for($i=0;$i < count($arr2);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr2[$i]."'");
                foreach($check as $chk)
                {
                   $arr3[]=$chk->id;
                }
            }
            
            //total member of layer 4  
            $arr4=array();
            for($i=0;$i < count($arr3); $i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr3[$i]."'");
                foreach($check as $chk)
                {
                    $arr4[]=$chk->id;
                }
            }
            
            //total member of layer 5  
            $arr5=array();
            for($i=0;$i<count($arr4);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr4[$i]."'");
                foreach($check as $chk)
                {
                    $arr5[]=$chk->id;
                }
            }
            //total member of layer 6  
            $arr6=array();
            for($i=0;$i<count($arr5);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr5[$i]."'");
                foreach($check as $chk)
                {
                    $arr6[]=$chk->id;
                }
            }
            //layer 7
            $arr7=array();
            for($i=0;$i<count($arr6);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr6[$i]."'");
                foreach($check as $chk)
                {
                    $arr7[]=$chk->id;
                }
            }
            
            //layer 8
            $arr8=array();
            for($i=0;$i<count($arr7);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr7[$i]."'");
                foreach($check as $chk)
                {
                    $arr8[]=$chk->id;
                }
            }
            
            //layer 9
            $arr9=array();
            for($i=0;$i<count($arr8);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr8[$i]."'");
                foreach($check as $chk)
                {
                    $arr9[]=$chk->id;
                }
            }
				
                $ct++;
            ?>
										
										<tr>
											 <td><?php echo $ct; ?></td>
                    <td><?php echo $rp->name; ?></td>
                    <!--<td><?php echo $ref;?></td>-->
                    <td><?php echo count($arr1);?></td>
                    <td><?php echo count($arr2);?></td>
                    <td><?php echo count($arr3);?></td>
                    <td><?php echo count($arr4);?></td>
                    <td><?php echo count($arr5);?></td>
                    <td><?php echo count($arr6);?></td>
                    <td><?php echo count($arr7);?></td>
                    <td><?php echo count($arr8);?></td>
                    <td><?php echo count($arr9);?></td>
                   <!-- <td>
                        <a href="?get=<?=$rp->id;?>" title="Tree"><img src="images/network.png" width="25" height="25"/></a>
                        <a href="" title="Swap position"><img src="images/swapme.png" width="25" height="25"/></a>
                        <a href="" title="view Details"><img src="images/view.png" width="25" height="25"/></a>
                    </td>-->
					</tr>
					
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
