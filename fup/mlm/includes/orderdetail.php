         <?php
		 include_once 'includes/config.php';
         $conf = new config();
		 $firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
		 $uid = $firstinfo->id;
		 $amount = $conf->fetchSingle("account WHERE uid='$uid'","sum(dr) as debit, sum(cr) as credit");
		 $debit = $amount->debit;
		 $credit = $amount->credit;
		 ?>
		 <!--overview-->
         <div class="tab-pane fade active in" id="order">
            <br>
            <p>Hey <strong class="text-primary"><?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname; ?></strong>, you can find below a list of your recent transactions including the current cashback
               status, as well the total confirmed cashback and the amount paid out to you so far.
            </p>
            <br>
            <div class="row" style="background:#fff;">        
               <div class="col-md-12" style="background:#fff;">
                  <h3 class="headline hl-orange">My Order</h3>

	  
				 
				  
				  <div class="main">
<div class="col-md-12" id="updtl">
<div class="col-md-10"><span>Order ID: 1234567890 (1 Item)</span><br>
<span class="dti">Placed on 30 Dec, 2016</span></div>
<div class="col-md-2"><button class="detl">Detail</button></div>
</div>
                  <div class="list-group">
			
                   <div class="col-md-12" id="cendtl">	  
                     <div class="col-md-2">
                        
                        <img src="img/xoloera4kpdp-1cb73.png">
                     </div>
			
<div class="col-md-7">
<span class="prd"><p>XOLO Era 4K (8GB)</p> </span>
</div>	

<div class="col-md-3" id="ird">
<span class="badge1"><span class="ordrt">Order Total:</span> &nbsp; <span style="font-size: 15px;font-weight:600;">Rs.8500</span></span>
</div>	

<div class="col-md-12" style="background:#fff;">
<div class="col-md-10">
Status: Delivered Successfully!
</div>



<div class="col-md-2">
<button class="trackbtn">Track</button>
</div>
</div> 
</div>	</div>					 
                    
					 
                  </div>
               </div>
              

            </div>
            
         </div>
         <!--/#overview-->
<style>
.prd{font-size: 14px;
    color: #232323;
    font-weight: 600;}

.ordrt{font-size:12px;color:#989898;font-weight:600}

.trackbtn{background: none;
    border: 1px solid #137eb2;
    color: #137eb2;
    border-radius: 2px;
    padding: 5px;
    text-align: center;
    width: 90px;
    margin-left: 20px;
    cursor: pointer;
    font-size: 15px;
    margin-bottom: 20px;}

.detl{background:#349acc;
     padding:5px 12px;
     color:#fff;
     text-transform: uppercase;
     border-radius:3px;
    margin-top: 5px;
    width: 116px;
}

#updtl{border:1px solid #f3f3f3;padding:5px 2px;background: ghostwhite;margin-top: 30px;}

#cendtl{border:1px solid #f3f3f3;padding-top: 12px;}
.dti{font-size:11px;}
#ird{border:none;border-left: 1px solid #f1f1f1;height:93px;}
</style>