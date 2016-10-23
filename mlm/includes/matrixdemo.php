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
<div class="css_bar_graph">
			
			<!-- y_axis labels -->
			<ul class="y_axis">
				<li>100%</li><li>80%</li><li>60%</li><li>40%</li><li>20%</li><li>0%</li>
			</ul>
			
			<!-- x_axis labels -->
			<ul class="x_axis">
				<li>Steel</li><li>Copper</li><li>Metal</li><li>Iron</li><li>Wood</li>
			</ul>
			
			<!-- graph -->
			<div class="graph">
				<!-- grid -->
				<ul class="grid">
					<li><!-- 100 --></li>
					<li><!-- 80 --></li>
					<li><!-- 60 --></li>
					<li><!-- 40 --></li>
					<li><!-- 20 --></li>
					<li class="bottom"><!-- 0 --></li>
				</ul>
				
				<!-- bars -->
				<!-- 250px = 100% -->
				<ul>
					<li class="bar nr_1 blue" style="height: 125px;"><div class="top"></div><div class="bottom"></div><span>50%</span></li>
					<li class="bar nr_2 green" style="height: 225px;"><div class="top"></div><div class="bottom"></div><span>90%</span></li>
					<li class="bar nr_3 orange" style="height: 75px;"><div class="top"></div><div class="bottom"></div><span>30%</span></li>
					<li class="bar nr_4 purple" style="height: 100px;"><div class="top"></div><div class="bottom"></div><span>40%</span></li>
					<li class="bar nr_5 red" style="height: 150px;"><div class="top"></div><div class="bottom"></div><span>60%</span></li>
				</ul>	
			</div>
			
			<!-- graph label -->
			<div class="label"><span>Graph: </span>Gain (in percent)</div>
		
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
<div class="css_bar_graph">
			
			<!-- y_axis labels -->
			<ul class="y_axis">
				<li>100%</li><li>80%</li><li>60%</li><li>40%</li><li>20%</li><li>0%</li>
			</ul>
			
			<!-- x_axis labels -->
			<ul class="x_axis">
				<li>Steel</li><li>Copper</li><li>Metal</li><li>Iron</li><li>Wood</li>
			</ul>
			
			<!-- graph -->
			<div class="graph">
				<!-- grid -->
				<ul class="grid">
					<li><!-- 100 --></li>
					<li><!-- 80 --></li>
					<li><!-- 60 --></li>
					<li><!-- 40 --></li>
					<li><!-- 20 --></li>
					<li class="bottom"><!-- 0 --></li>
				</ul>
				
				<!-- bars -->
				<!-- 250px = 100% -->
				<ul>
					<li class="bar nr_1 blue" style="height: 60px;"><div class="top"></div><div class="bottom"></div><span>50%</span></li>
					<li class="bar nr_2 green" style="height: 125px;"><div class="top"></div><div class="bottom"></div><span>90%</span></li>
					<li class="bar nr_3 orange" style="height: 200px;"><div class="top"></div><div class="bottom"></div><span>30%</span></li>
					<li class="bar nr_4 purple" style="height: 80px;"><div class="top"></div><div class="bottom"></div><span>40%</span></li>
					<li class="bar nr_5 red" style="height: 40px;"><div class="top"></div><div class="bottom"></div><span>60%</span></li>
				</ul>	
			</div>
			
			<!-- graph label -->
			<div class="label"><span>Graph: </span>Gain (in percent)</div>
		
		</div>
</div>
						
						</div>
						
						
					</div>
					<!--/#overview-->

					
					