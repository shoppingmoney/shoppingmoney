	<link rel="stylesheet" href="lib/echart.css">
	<link rel="stylesheet" type="text/css" href="lib/main.css"/>         
<?php
		 include_once 'includes/config.php';
         $conf = new config();
		 $firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
		 $uid = $firstinfo->id;
		 // Request for cash redeem
		 if(isset($_POST["redeem"])){
			 $redeem = trim($_POST["redeem"]);
			 $amt =  trim($_POST["totalRedeem"]);
			 if($redeem < $amt && is_numeric($redeem)){
		     $column = "uid,amount,date,status";
             $value = "'$uid','$redeem',now(),'0'";
             $conf->insertValue("redeem", $column, $value);
			 echo "<script>alert('Your request is in process');window.location='panel.php';</script>";
			 }
		 }
		 // Ckecking number of member in tree by id reference
		 $tree_num = $conf->fetchSingle("tree WHERE refrenceid='$uid'","count(*) as cnt");
		 $amount = $conf->fetchSingle("account WHERE uid='$uid'","sum(dr) as debit, sum(cr) as credit");
		 $debit = $amount->debit;
		 $credit = $amount->credit;
		 $point=$bal=$credit - $debit;
		 if($tree_num->cnt < 5){
		 $debit = 0;
		 $credit = 0;
		 }
		 ?>
<!--overview-->
<div class="tab-pane fade active in" id="overview">
	<br>
		<p>Hey <strong class="text-primary">
				<?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname; ?></strong>, This section describes information associated with the matrix of your business in different

segments.
		</p>
		<br>
			<div class="row" style="background-image: url(img/shopvector1.jpg);border: 1px solid #e7e7e7;">
<div class="col-md-12">
<center><h2 style="color:#000;">Heading-1</h2></center>
<div class="x_panel">
               
                <div class="x_content">

                  <div id="mainb" style="height:350px;"></div>

                </div>
              </div>
</div>

				<div class="col-md-12">
<hr size="1" />
				<div class="col-md-7" style="float:none;margin:0px auto;">
                                 <center><h2 style="color:#000;">Heading-2</h2></center>
                                   <div id="pie"></div>
<script src="lib/d3.min.js"></script>
<script src="lib/d3pie.js"></script>

<script>
	var pie = new d3pie("pie", {
		header: {
			title: {
				text: "",
				fontSize: 25
                                
			}
		},
		data: {
			content: [
				{ label: "JavaScript", value: 264131 },
				{ label: "HTML", value: 218812 },
				{ label: "PHP", value: 157618}
			]
		}
	});
</script>





						</div><hr size="1" /></div>
<div class="col-md-12">
<center><h2 style="color:#000;">Heading-3</h2></center>
<div class="x_panel">
               
                <div class="x_content">

                  <div id="mainc" style="height:350px;"></div>

                </div>
              </div>
</div>
						
						</div>
						
						
					</div>
					<!--/#overview-->

					
					
					
					
					<script src="echart/echarts-all.js"></script>
  <script src="echart/green.js"></script>
 <script>
    var myChart9 = echarts.init(document.getElementById('mainb'), theme);
    myChart9.setOption({
      title: {
        text: 'Graph title',
        subtext: 'Graph Sub-text'
      },
      //theme : theme,
      tooltip: {
        trigger: 'axis'
      },
      legend: {
        data: ['sales', 'purchases']
      },
      toolbox: {
        show: false
      },
      calculable: false,
      xAxis: [{
        type: 'category',
        data: ['1?', '2?', '3?', '4?', '5?', '6?', '7?', '8?', '9?', '10?', '11?', '12?']
      }],
      yAxis: [{
        type: 'value'
      }],
      series: [{
        name: 'sales',
        type: 'bar',
        data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
        markPoint: {
          data: [{
            type: 'max',
            name: '???'
          }, {
            type: 'min',
            name: '???'
          }]
        },
        markLine: {
          data: [{
            type: 'average',
            name: '???'
          }]
        }
      }, {
        name: 'purchases',
        type: 'bar',
        data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
        markPoint: {
          data: [{
            name: 'sales',
            value: 182.2,
            xAxis: 7,
            yAxis: 183,
            symbolSize: 18
          }, {
            name: 'purchases',
            value: 2.3,
            xAxis: 11,
            yAxis: 3
          }]
        },
        markLine: {
          data: [{
            type: 'average',
            name: '???'
          }]
        }
      }]
    });


    
    
  </script>
  <script>
    var myChart9 = echarts.init(document.getElementById('mainc'), theme);
    myChart9.setOption({
      title: {
        text: 'Graph title',
        subtext: 'Graph Sub-text'
      },
      //theme : theme,
      tooltip: {
        trigger: 'axis'
      },
      legend: {
        data: ['sales', 'purchases']
      },
      toolbox: {
        show: false
      },
      calculable: false,
      xAxis: [{
        type: 'category',
        data: ['1?', '2?', '3?', '4?', '5?', '6?', '7?', '8?', '9?', '10?', '11?', '12?']
      }],
      yAxis: [{
        type: 'value'
      }],
      series: [{
        name: 'sales',
        type: 'bar',
        data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
        markPoint: {
          data: [{
            type: 'max',
            name: '???'
          }, {
            type: 'min',
            name: '???'
          }]
        },
        markLine: {
          data: [{
            type: 'average',
            name: '???'
          }]
        }
      }, {
        name: 'purchases',
        type: 'bar',
        data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
        markPoint: {
          data: [{
            name: 'sales',
            value: 182.2,
            xAxis: 7,
            yAxis: 183,
            symbolSize: 18
          }, {
            name: 'purchases',
            value: 2.3,
            xAxis: 11,
            yAxis: 3
          }]
        },
        markLine: {
          data: [{
            type: 'average',
            name: '???'
          }]
        }
      }]
    });


    
    
  </script>
					
					