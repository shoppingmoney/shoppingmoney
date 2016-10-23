<?php
session_start();
ob_start();
error_reporting(0);
if ($_SESSION['superEmail'] == null || !isset($_SESSION['superEmail'])) {
    header("location:login.php");
}
include 'class/Connection.php';
include 'class/DBQuery.php';
include 'class/Helpers.php';
$connection = new Connection();
$helper = new Helpers();
$dbAccess = new DBQuery();
include_once '../mlm/includes/config.php';
         $conf = new config();
		 //$firstinfo = $conf->fetchSingle("firstimeregd,userdetails WHERE firstimeregd.id=userdetails.linkid AND firstimeregd.id='{$_GET['uid']}'","firstimeregd.id,firstimeregd.ufirstname,firstimeregd.ulastname,firstimeregd.uemail,firstimeregd.ucontact,firstimeregd.ustatus,firstimeregd.refid,userdetails.userid,userdetails.city,userdetails.pstate,userdetails.pdistrict,userdetails.paddress,userdetails.occupation");
		 $firstinfo = $conf->fetchSingle("firstimeregd WHERE id='{$_GET['uid']}'");
		 $detail = $conf->fetchSingle("userdetails WHERE linkid='{$_GET['uid']}'");
		 $bank = $conf->fetchSingle("bankdetails WHERE uid='{$_GET['uid']}'");
		 $uid = $firstinfo->id;
		 $amountr = $conf->fetchSingle("account WHERE mode='Referral Income' AND uid='$uid'","sum(cr) as credit");
		 $creditr = $amountr->credit;
		 $amounts = $conf->fetchSingle("account WHERE mode='Shopping Income' AND uid='$uid'","sum(cr) as credit");
		 $credits = $amounts->credit;
		 $amounttp = $conf->fetchSingle("account WHERE mode='Top Up' AND uid='$uid'","sum(cr) as credit");
		 $credittp = $amounttp->credit;
		 $amountg = $conf->fetchSingle("account WHERE mode='Layer Completion Income' AND uid='$uid'","sum(cr) as credit");
		 $creditg = $amountg->credit;
		 $amountd = $conf->fetchSingle("account WHERE uid='$uid'","sum(dr) as debit");
		 $credit=$creditr+$credits+$creditg+$credittp;
		 $debit=$amountd->debit;
		 $point=$sum=$credit - $debit;
		 $tid = $conf->single("tree WHERE linkid='$uid'","id");
		 $tree_num = $conf->fetchSingle("tree WHERE refrenceid='$uid'","count(*) as cnt");
		  if($tree_num->cnt < 5){
		   $debit = 0;
		   $credit = 0;
		 }
		 // for determining layer
            $check = $conf->fetchall("tree where uplinerid='$tid'");
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
			// finding layer
			$layer = 0;
			if(!empty($arr1) || count($arr1) > 1){
				$layer++;
			}
			if(!empty($arr2) || count($arr2) > 1){
				$layer++;
			}
			if(!empty($arr3) || count($arr3) > 1){
				$layer++;
			}
			if(!empty($arr4) || count($arr4) > 1){
				$layer++;
			}
			if(!empty($arr5) || count($arr5) > 1){
				$layer++;
			}
			if(!empty($arr6) || count($arr6) > 1){
				$layer++;
			}
			if(!empty($arr7) || count($arr7) > 1){
				$layer++;
			}
			if(!empty($arr8) || count($arr8) > 1){
				$layer++;
			}
			if(!empty($arr9) || count($arr9) > 1){
				$layer++;
			}
			$merge = array_merge($arr1,$arr2,$arr3,$arr4,$arr5,$arr6,$arr7,$arr8,$arr9);
			$total_user = count($merge);
			// get completed layer
			$clayer = 0;
				if(count($arr1) >= 5){
				$clayer=1;
			}
			if(count($arr2) >= 25){
				$clayer=2;
			}
			if(count($arr3) >= 125){
				$clayer=3;
			}
			if(count($arr4) >= 625){
				$clayer=4;
			}
			if(count($arr5) >= 3125){
				$clayer=5;
			}
			if(count($arr6) >= 15625){
				$clayer=6;
			}
			if(count($arr7) >= 78125){
				$clayer=7;
			}
			if(count($arr8) >= 390625){
				$clayer=8;
			}
			if(count($arr9) >= 1953125){
				$clayer=9;
			}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Shoppingmoney</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
<?php
$menu="user";
include "inc/left.php";
?>
        </div>
      </div>

      <!-- top navigation -->
      <?php include "inc/top.php"; ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Member Profile</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
               
                <div class="x_content">

                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img">

                      <!-- end of image cropping -->
                      <div id="crop-avatar">
                        <!-- Current avatar -->
						<?if($detail->personal_image!=''){?>
                        <img class="img-responsive avatar-view" src="upload/$detail->personal_image" alt="Avatar" title="Change the avatar">
						<?php }
						else {
						?>
						
						<img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
						<?}?>
                        <!-- Loading state -->
                        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                      </div>
                      <!-- end of image cropping -->

                    </div>
                    <h3><?php echo $firstinfo->uname." ".$firstinfo->lastname; ?></h3>

                    <ul class="list-unstyled user_data">
                      <li><i class="fa fa-map-marker user-profile-icon"></i> <?php
					  echo $detail->paddress.", ".$detail->city.", ".$detail->pdistrict.", ".$detail->pstate;
					  ?>
                      </li>

                      <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> <?= $detail->occupation; ?> 
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="mailto:<?=$firstinfo->uemail?>" target="_top"><?=$firstinfo->uemail?></a>
                      </li>
                    </ul>
                    <br />
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2><?=$firstinfo->ufirstname ." ".$firstinfo->ulastname;?></h2>
                      </div>
                     
                    </div>
                   

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Basic Information</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> MLM Information</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Wallet Detail</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <p class="lead">Basic Information</p>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
							<tr>
                                <th>Referral Id:</th>
                                <td><?=$detail->userid; ?></td>
                              </tr>
							  <tr>
                                <th>Referral Link:</th>
                                <td><?=$detail->refralink; ?></td>
                              </tr>
							<tr>
                                <th>Email:</th>
                                <td><?=$firstinfo->uemail; ?></td>
                              </tr>
                              <tr>
                                <th>Mobile:</th>
                                <td><?=$firstinfo->ucontact; ?></td>
                              </tr>
                              <tr>
                                <th>Address:</th>
                                <td><?php
					 echo $detail->paddress.", ".$detail->city.", ".$detail->pdistrict.", ".$detail->pstate;
					  ?></td>
                              </tr>
							  <tr>
                                <th colspan=2 style="text-align: center;">Bank Detail</th>
                              </tr>
							  <tr>
                                <th>Bank Name:</th>
                                <td><?=$bank->bankname;?></td>
                              </tr>
							  <tr>
                                <th>Account Type:</th>
                                <td><?=$bank->accounttype;?></td>
                              </tr>
							   <tr>
                                <th>Account Number:</th>
                                <td><?=$bank->accountnumber;?></td>
                              </tr>
							   <tr>
                                <th>Branch:</th>
                                <td><?=$bank->branchaddress;?></td>
                              </tr>
							  <tr>
                                <th>IFSC Code:</th>
                                <td><?=$bank->ifsc;?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                          <p class="lead">MLM Information</p>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
							<tr>
                                <th>Total Downliner:</th>
                                <td><strong><?=$total_user; ?></strong></td>
                              </tr>
                              <tr>
                                <th>Total Reference:</th>
                                <td><strong><?=$tree_num->cnt?></strong></td>
                              </tr>
                              <tr>
                                <th>Current Layer:</th>
                                <td><strong><?=$layer; ?></strong></td>
                              </tr>
                              <tr>
                                <th>Layer Completed:</th>
                                <td><strong><?=$clayer; ?></strong></td>
                              </tr>
							  <tr>
                                <th>Club:</th>
                                <td><strong><?=$firstinfo->club; ?></strong></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
						 <p class="lead">Total Earning</p>
						 <div class="table-responsive">
                          <table class="table">
                            <tbody>
							<tr>
                                <th>Total Point:</th>
                                <td><strong><?=number_format($point); ?></strong></td>
                              </tr>
							  <tr>
                                <th>Credit Amount:</th>
                                <td><strong><?php echo "Rs ".number_format($credit);?></strong></td>
                              </tr>
							   <tr>
                                <th> Top Up:</th>
                                <td><strong><?php echo "Rs ".number_format($credittp);?></strong></td>
                              </tr>
                              <tr>
                                <th> Referral Income:</th>
                                <td><strong><?php echo "Rs ".number_format($creditr);?></strong></td>
                              </tr>
							   <tr>
                                <th> Shopping Income:</th>
                                <td><strong><?php echo "Rs ".number_format($credits);?></strong></td>
                              </tr>
							   <tr>
                                <th>Gift:</th>
                                <td><strong><?php echo "Rs ".number_format($creditg);?></strong></td>
                              </tr>
                              <tr>
                                <th>Debit Amount:</th>
                                <td><strong><?php echo "Rs ".number_format($debit);?></strong></td>
                              </tr>
                              <tr>
                                <th>Total Balance:</th>
                                <td><strong><?php echo "Rs ".number_format($credit-$debit);?></strong></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_content">
                  <ul class="to_do">
				 
                    <li>
                      <a href="venderDownload.php?document= ?>">
                       ghfdh</a>
                    </li>
					<li>
                      <a href="venderDownload.php?document= ?>">
                       ghfdh</a>
                    </li>
                  </ul>
                </div>
            </div>-->
          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
    <?php
	 include "inc/footer.php";
	 ?>
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

  <!-- image cropping -->
  <script src="js/cropping/cropper.min.js"></script>
  <script src="js/cropping/main.js"></script>

  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

  <!-- chart js -->
  <script src="js/chartjs/chart.min.js"></script>

  <!-- moris js -->
  <script src="js/moris/raphael-min.js"></script>
  <script src="js/moris/morris.min.js"></script>

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>

  <script>
    $(function() {
      Morris.Bar({
        element: 'graph_bar',
        data: [
          { "period": "Jan", "Hours worked": 80 }, 
          { "period": "Feb", "Hours worked": 125 }, 
          { "period": "Mar", "Hours worked": 176 }, 
          { "period": "Apr", "Hours worked": 224 }, 
          { "period": "May", "Hours worked": 265 }, 
          { "period": "Jun", "Hours worked": 314 }, 
          { "period": "Jul", "Hours worked": 347 }, 
          { "period": "Aug", "Hours worked": 287 }, 
          { "period": "Sep", "Hours worked": 240 }, 
          { "period": "Oct", "Hours worked": 211 }
        ],
        xkey: 'period',
        hideHover: 'auto',
        barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
        ykeys: ['Hours worked', 'sorned'],
        labels: ['Hours worked', 'SORN'],
        xLabelAngle: 60,
        resize: true
      });

      $MENU_TOGGLE.on('click', function() {
        $(window).resize();
      });
    });
  </script>

  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

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
