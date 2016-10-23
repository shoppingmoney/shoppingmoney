<!--refer-->
         <div class="tab-pane fade active in" id="refer">
            <br>
            <p>Earn maximum referal income by refering in various social media, by making them do the shopping of minimum Rs.5000 & making them your business association. </p>
            
            <div class="row well padding text-center">
<span class="stpbx"><h2 class="stpline">Step-1</h2></span>
               <div class="col-xs-12">
                  <div class="media">
                  
                     <div class="media-body">

                        <h1>Refer and Earn</h1>
                        <h2 class="text-orange">Make maximum business associates</h2>
						<h3 class="text-center">Your Referral Link : - <span class="text-green"><?=$udetail->refralink;?></span></h3>
                     </div>
                  </div>
               </div>
            </div>
            <!--/.row-well-->
            <br>
            <div class="text-center" style="background: white;padding: 15px 0px;">
<span class="stpbx2"><h2 class="stpline">Step-2</h2></span>
			<img src="images/referal.jpg">
</div>
            
            <div class="row well">
<span class="stpbx"><h2 class="stpline">Step-3</h2></span>
               <div class="col-md-12 padding text-center">
                  <h3>Share your business on social media</h3>
                  <br>
                  <div class="row" style="margin-bottom: 18px;">
                     <div class="col-sm-4">
                        <!--<button class="btn btn-social btn-fb btn-block">Facebook</button>-->
                        <a class="btn btn-social btn-fb btn-block" href="#" target="_blank">Facebook</a>
                     </div>
                     <div class="col-sm-4">
                        <!--<button class="btn btn-social btn-gp btn-block">Google+</button>-->
                        <a class="btn btn-social btn-gp btn-block" href="#" target="_blank">Google+</a>
                     </div>
                     <div class="col-sm-4">
                        <!--<button class="btn btn-social btn-tw btn-block">Twitter</button>-->
                        <a class="btn btn-social btn-tw btn-block" href="#" target="_blank">Twitter</a>
                     </div></div>

<div class="row">
  <div class="col-sm-4">
                        <!--<button class="btn btn-social btn-ld btn-block">LinkedIn </button>-->
                        <a class="btn btn-social btn-ld btn-block" href="#" target="_blank">LinkedIn </a>
                     </div>
 <div class="col-sm-4">
                        <!--<button class="btn btn-social btn-vm btn-block">Instagram </button>-->
                        <a class="btn btn-social btn-vm btn-block" href="#" target="_blank">Instagram </a>
                     </div>
 <div class="col-sm-4">
                        <!--<button class="btn btn-social btn-pi btn-block">Pinterest </button>-->
                        <a class="btn btn-social btn-pi btn-block" href="#" target="_blank">Pinterest </a>
                     </div>
                     <div class="col-sm-4">
                        <a href="#" data-text="Try outshoppingmoney.in I tried & got FREE coupons + Rs.0 Cash Back on my online shoppin. Check out nw" data-href="http://tinyurl.com/z5mohzl" class="wa_btn wa_btn_l" style="display:none;width:232px;height:27px;border-radius:0;border:0;text-align:center;" >Whatsapp</a>
                     </div>
                  </div>
               </div>
            </div>
            
            <h2 class="text-center" style="background: white;padding: 15px 0px;"><span class="text-primary"></span> <span class="stpbx2"><h2 class="stpline">Step-4</h2></span>Email and share - <span class="text-green">Earn Rs.250</span>
<p class="text-center" style="font-size:13px;margin-top:8px;"><strong>E-mail</strong> your friend your personal referral link with our form. </p>
</h2>
            
            <div class="row well">
               <div class="col-md-12 padding text-center">
                  <form class="form-horizontal" role="form" id="referral-mail" method="post">
                     <div class="form-group">
                        <label for="friends-email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="friends-email" name="friends-email" placeholder="Friend's Email">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="textarea-refer" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-9">
                           <textarea class="form-control" id="textarea-refer" name="textarea-refer" rows="8">I love shoppingmoney.in as it give chance to earn money and enjoy shopping. You too

can enjoy just click the referral link to know more. <?=$udetail->refralink;?>
                           </textarea>
                           <span class="help-block text-left">You can edit this message to inform more about shoppingmoney.in to your friends.</span>
                           <input type="hidden" id="calling" name="calling" value="refferal">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                           <button type="button" onclick="sendMail1();" class="btn btn-primary btn-feat" id="sendrefer">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
			<!--
            <div class="row">
               <div class="col-md-12">
                  <h3 class="headline hl-blue">Referral Status</h3>
                  <div class="table-responsive">
                     <table class="table table-striped table-hover">
                        <thead>
                           <tr>
                              <th><span class="glyphicon glyphicon-calendar"></span> Date</th>
                              <th><span class="glyphicon glyphicon-shopping-cart"></span> Referral</th>
                              <th><span class="glyphicon glyphicon-info-sign"></span> Status</th>
                           </tr>
                        </thead>
                        <tbody id="referralHist">
                           <tr>
                              <td></td>
                              <td></td>
                              <td class='status_'></td>
                           </tr>
                        </tbody>
                     </table>
                     <ul class="pagination" id="rlpagination">
                     </ul>
                  </div>
               </div>
            </div>
            -->
         </div>
         <!--/#refer-->
		 <script>
		 function sendMail1()
     {     
	var request = checkAjax();
    var msg = $("#textarea-refer").val();
	var email = $("#friends-email").val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(email.trim() == "" || !emailReg.test(email)){
		alert("Pleaser enter a valid email");
	}else{
    var url = "ajaxpage/linkmail.php?email="+email+"&msg="+msg;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			//document.getElementById("lang").innerHTML = request.responseText;
			 alert("mail send");
	         $("#friends-email").val("");
		}
	}
	 }
}
		 </script>