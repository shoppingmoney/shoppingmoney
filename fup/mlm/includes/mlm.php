<?php
include 'includes/config.php';
$conf = new config();
?>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrapPagination.js"></script>
     <script type="text/javascript" src="js/myjs.js"></script>

</head>
<!--<div class="tree" style="width: 5074px !important;">-->
<div class="tree" style="width: 88% !important;margin: 0px auto;">
    <ul>
        <li>

            <a class="tip_trigger" href="#">
                <?php
                $get = "101";
                //if(!empty($_GET['get']))
                if(filter_input(INPUT_GET,"get"))
                {
                    $get = $_GET['get'];
                }
                echo $sql = "tree where id='$get' limit 1"; //first Node.
                $data = $conf->fetchall($sql);
                foreach ($data as $rp) {
                    //echo $rp['id']; 
                    echo $rp->id;
                    //$id = $rp->id;
                ?>
uiyghfyghfdusvuighfif disfvghdyusfvgivi vudsyivgfu dsyivgvgvgvgi 
                    <span class="tip" style="width: 600px;">
                        <div class="ibox">


                            <img src="images/photo.png" class="imcls" alt="" />
                            <div class="fieldbox">
                                <table width="100%" height="150">
                                    <form action="#" method="post">
                                        <tr><td width="40%"><b>ID :</b></td><td width="60%"><?=$rp->id; ?></td></tr>

                                        <tr><td width="40%"><b>Name :</b></td><td width="60%"><?=$rp->name; ?></td></tr>

                                        <tr><td width="40%"><b>Reference :</b></td><td width="60%"><?=$rp->referenceid; ?></td></tr>

                                        <tr><td width="40%"><b>Total Joining :</b></td><td width="60%"><?php echo $conf->joining("tree", $rp->linkid);?></td></tr>

                                        <tr><td width="40%"><b>Level :</b></td><td><?=$rp->level; ?></td width="60%"></tr>

                                        <tr><td width="40%"><b>DOJ :</b></td><td width="60%">
                                                <?php 
                                                
                                                $date=date_create($rp->day);
                                                echo date_format($date,"d/m/Y");
                                                ?>
                                            </td></tr>

                                        <tr><td width="40%"><b>Club :</b></td><td width="60%">3</td></tr>
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
                        $sql = "tree where uplinerid='$get'"; //first Node.
                        $data = $conf->fetchall($sql);
                        foreach ($data as $rp) {
                            ?>

                            <li>

                                <a class="tip_trigger" href="?get=<?php echo $rp->id;?>"><?php echo $rp->id . "(Level:" . $rp->level . ")"; ?>
                                    <span class="tip" style="width: 600px;">
                                        <div class="ibox">


                                            <img src="images/photo.png" class="imcls" alt="" />
                                            
                                            <div class="fieldbox">
                                <table width="100%" height="150">
                                    <form action="#" method="post">
                                        <tr><td width="40%"><b>ID :</b></td><td width="60%"><?=$rp->id; ?></td></tr>

                                        <tr><td width="40%"><b>Name :</b></td><td width="60%"><?=$rp->name; ?></td></tr>

                                        <tr><td width="40%"><b>Reference :</b></td><td width="60%"><?=$rp->refrenceid; ?></td></tr>

                                        <tr><td width="40%"><b>Total Joining :</b></td><td width="60%"><?php echo $conf->joining("tree", $rp->linkid);?></td></tr>

                                        <tr><td width="40%"><b>Level :</b></td><td><?=$rp->level; ?></td width="60%"></tr>

                                        <tr><td width="40%"><b>DOJ :</b></td><td width="60%">
                                                <?php 
                                                
                                                $date=date_create($rp->day);
                                                echo date_format($date,"d/m/Y");
                                                ?>
                                            </td></tr>

                                        <tr><td width="40%"><b>Club :</b></td><td width="60%">3</td></tr>
                                    </form>
                                </table>
                            
                            </div>
                                        </div>
                                        
                                    </span>
                                </a>
                                <ul>

                                    <?php
                                    $sql = "tree where uplinerid='" . $rp->id . "'"; //first Node.
                                    $data = $conf->fetchall($sql);
                                    foreach ($data as $rp) {
                                        ?>
                                        <li>
                                            <a class="tip_trigger" href="?get=<?php echo $rp->id;?>"><?php echo $rp->id . "." . $rp->level; ?>
                                                <span class="tip" style="width: 600px;">
                                                    <div class="ibox">


                                                        <img src="images/photo.png" class="imcls" alt="" />
                                                        <div class="fieldbox">
                                                            
                                                            <div class="fieldbox1">
                                <table width="100%" height="150">
                                    <form action="#" method="post">
                                        <tr><td width="40%"><b>ID :</b></td><td width="60%"><?=$rp->id; ?></td></tr>

                                        <tr><td width="40%"><b>Name :</b></td><td width="60%"><?=$rp->name; ?></td></tr>

                                        <tr><td width="40%"><b>Reference :</b></td><td width="60%"><?=$rp->refrenceid; ?></td></tr>

                                        <tr><td width="40%"><b>Total Joining :</b></td><td width="60%"><?php echo $conf->joining("tree", $rp->linkid);?></td></tr>

                                        <tr><td width="40%"><b>Level :</b></td><td><?=$rp->level; ?></td width="60%"></tr>

                                        <tr><td width="40%"><b>DOJ :</b></td><td width="60%">
                                                <?php 
                                                
                                                $date=date_create($rp->day);
                                                echo date_format($date,"d/m/Y");
                                                ?>
                                            </td></tr>

                                        <tr><td width="40%"><b>Club :</b></td><td width="60%">3</td></tr>
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

<br>

<div class="container" style="margin:10px;margin-top: 173px !important;">

    <table cellpadding="0" cellspacing="0" border="0"
           class="table table-striped table-bordered" id="datatable">
        <thead>
            <tr style="background: rgb(66, 139, 202);color: white;">
                <th>S no.</th>
                <th>User id</th>
                <th>User Name</th>
                <th>Parent</th>
                <th>Reference</th>               
                <th>Lel(1)</th>
                <th>Lel(2)</th>
                <th>Lel(3)</th>
                <th>Lel(4)</th>
                <th>Lel(5)</th>
                <th>Lel(6)</th>
                <th>Lel(7)</th>
                <th>Lel(8)</th>
                <th>Lel(9)</th>
                <th>Fun</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "tree"; //first Node.
            $ct = 0;
            $data = $conf->fetchall($sql);
            foreach ($data as $rp) {
                $ct++;
            ?>
                <tr>
                    <td><?php echo $ct; ?></td>
                    <td><?php echo $rp->id; ?></td>
                    <td><?php echo $rp->name; ?></td>
                    <td><?php echo $rp->uplinerid; ?></td>
                    <td><?php echo $rp->refrenceid; ?></td>
                    <td><?php echo $conf->getotUser($sql,$rp->id,$rp->level+1);?></td>
                    <td><?php echo $conf->getotUser($sql,$rp->id,$rp->level+2);?></td>
                    <td><?php echo $conf->getotUser($sql,$rp->id,$rp->level+3);?></td>
                    <td><?php echo $conf->getotUser($sql,$rp->id,$rp->level+4);?></td>
                    <td><?php echo $conf->getotUser($sql,$rp->id,$rp->level+5);?></td>
                    <td><?php echo $conf->getotUser($sql,$rp->id,$rp->level+6);?></td>
                    <td><?php echo $conf->getotUser($sql,$rp->id,$rp->level+7);?></td>
                    <td><?php echo $conf->getotUser($sql,$rp->id,$rp->level+8);?></td>
                    <td><?php echo $conf->getotUser($sql,$rp->id,$rp->level+9);?></td>
                    <td>
                        <a href="?get=<?=$rp->id;?>" title="Tree"><img src="images/network.png" width="25" height="25"/></a>
                        <a href="" title="Swap position"><img src="images/swapme.png" width="25" height="25"/></a>
                        <a href="" title="view Details"><img src="images/view.png" width="25" height="25"/></a>
                    </td>
                </tr>
                <?php
                    }
                ?>

        </tbody>
    </table>
</div>
<div class="swapp"></div>

