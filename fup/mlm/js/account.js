$('.tab-move').click(function(){
	$( "ul#acTab li").removeClass('active');
	$( ".tab-content div").removeClass('active in');
	$( "ul#acTab li:nth-child(2)" ).addClass('active');
	$( "#activity" ).addClass('active in');
	$('html,body').animate({ scrollTop: $(".media-body").offset().top},'slow');
});

$('ul#acTab li').click(function(){
	$('ul#acTab li').removeClass('active');	
	$('.tab-content div').removeClass('active in');	
	sTab = $(this).children().attr("href");
	$(this).addClass('active');
	$(sTab).addClass('active in');
	$('#withdraw_password').hide();
});

$('.tab-move1').click(function(){
	$('html,body').animate({ scrollTop: $("#acTab").offset().top},'fast');
});

var pagnation = function( clickplace , number ){
	
	if($( '#'+clickplace+number ).hasClass( "active" ) == false){
	
		$( '#'+clickplace+number ).addClass('active');	
		
		var postingpn = $.post( '/ajax-calling/action/account/index.php',  {calling : clickplace , l : number});
		
		postingpn.done(function( data ) {
			
			if(data != 0){
				
				activitytab( clickplace , number );

				$( "#"+clickplace+"pagination" ).html(data); return true;
			}
		});
	}
}

var activitytab = function( clickplace , number ){
	
	switch($.trim(clickplace)){
		case 'rt':			
			callingid = 'recentTran';
			break;
		case 'mt':			
			callingid = 'missingTran';
			break;
		case 'ch':			
			callingid = 'clickHist';
			break;
		case 'rl':			
			callingid = 'referralHist';
			break;
	}

	var postingact = $.post( '/ajax-calling/action/account/'+callingid+'.php',  {calling : callingid , l : number});
	postingact.done(function( data ) {
		if(data){		
			$( "#"+callingid ).html(data); return true;
		}
	});
}

$(document).ready(function() {
	$('#referlinkcopy').click(function(){
		$(this).zclip({ path:'/assets/js/ZeroClipboard.swf', copy:function(){ return $('#reflink').html(); },afterCopy:function(){ /*alert("copied");*/    } });
	});

	$('#dob').calendar({
        triggerElement: '#dob'
    });

	$('#anniversary').calendar({
        triggerElement: '#anniversary'
    });

	
	$( "#datepicker12" ).calendar({
        triggerElement: '#datepicker12'
    });

	$( "#datepicker13" ).calendar({
        triggerElement: '#datepicker13'
    });
});

$('#sendrefer').click(function(){
	
	$('.bg-green').remove();
	$('.bg-red').remove();

	sEmail = $('#friends-email').val();	
	if(sEmail.length < 1 ){ $( '<p class="bg-red padding">Please enter valid friend\'s email ids.</p>' ).insertBefore( "#referral-mail" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }
	
	sText = $('#textarea-refer').val();	
	if(sText.length < 1 ){ $( '<p class="bg-red padding">Please enter referr message with your referral link.</p>' ).insertBefore( "#referral-mail" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }
	
	var postingref = $.post( '/ajax-calling/action/account/referral_friends_email.php',   $( "#referral-mail" ).serialize());
	postingref.done(function( data ) {
		if(data == 1){

			$('#friends-email').val(""); $('#textarea-refer').val("");
			$( '<p class="bg-green padding">Referral mail send to your friends successfully.</p>' ).insertBefore( "#referral-mail" ).delay(5000).queue(function(next){ $('.bg-green').fadeOut('slow').remove(); }); return true;
		}else{

			$( '<p class="bg-red padding">'+data+'</p>' ).insertBefore( "#referral-mail" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}
	});
});

$('#support_question').click(function(){
	
	$('#support_missing').removeClass('active');
	$('#missing-box').hide();
	$('#cat_que_ans').hide();
	$('#cat_que').hide();
	$(this).addClass('active');
	
	var postingsq = $.post('/ajax-calling/action/account/support_question.php',  { calling : this.id });
	postingsq.done(function( data ) {
		if($.trim(data).length > 1){
			$('#have_category').html(data);
			$('#question-box').show();
			
		}
	});
});

$('#have_category').change(function(){
	
	$('#cat_que_ans').hide();
	$('#cat_que').hide();

	var postingcsq = $.post('/ajax-calling/action/account/support_question_query.php',  { calling : this.id , vals : $('#have_category').val() });
	postingcsq.done(function( data ) {
		if($.trim(data).length > 1){

			$('#have_question').html(data);
			$('#cat_que').show();
		}
	});
});

$('#have_question').change(function(){		
	
	v = $('#have_question').val();
	if($.trim(v).length > 1){
		var postingcsq = $.post('/ajax-calling/action/account/support_question_query_answer.php',  { calling : this.id , vals : v });
		postingcsq.done(function( data ) {
			if($.trim(data).length > 1){

				$('#have_question_answer').html(data);
				$('#cat_que_ans').show();
			}
		});
	}else{
		$('#cat_que_ans').hide();
	}
});

$('#support_missing').click(function(){
	
	$('#support_question').removeClass('active');	
	$('#question-box').hide();
	$('#missing-box').show();
	$(this).addClass('active');
	
	
	var postingsm = $.post('/ajax-calling/action/account/support_missing.php',  { calling : this.id });	
	postingsm.done(function( data ){
		if($.trim(data).length > 1){
			$('#missing_retailer').html(data);
			$('#missing-box').show();
			
		}
	});
});

$('#missing_retailer').change(function(){
	
	$('.bg-red').remove();

	rid = $(this).val();
	
	if($.trim(rid).length > 0){
		var postingsmc = $.post('/ajax-calling/action/account/support_missing_clicks.php',  { calling : this.id , vals : rid });
		postingsmc.done(function( data ) {	
			if(data == 0){
				
				$('#missing_click_ids').html('<p><b>Retailer not accept missing. So we have not processed your missing for this retailer.</b></p>');
				$('#missing_retmsg').show();
				$('#order_id').hide();
				$('#order_amount').hide();
				$('#order_item').hide();
				$('#order_attach').hide();
				$('#voucher_codeused').hide();
				$('#order_offer').hide();
				$('#submits').hide();
			}else{
				$('#missing_click_ids').html(data);
				$('#missing_retmsg').show();
				$('#order_id').show();
				$('#order_amount').show();
				$('#order_item').show();
				$('#order_attach').show();				
				$('#order_offer').show();
				$('#submits').show();
			}	
		});
	}else{
		$('#missing_retmsg').hide();
		$('#order_id').hide();
		$('#order_amount').hide();
		$('#order_item').hide();
		$('#order_attach').hide();
		$('#voucher_codeused').hide();
		$('#order_offer').hide();
		$('#submits').hide();
	}
});

$( "#missing-box" ).submit(function( event ) {
	
	$('.bg-green').remove();
	$('.bg-red').remove();
	
	event.preventDefault();

	sRetailer  = $('#missing_retailer').val();		
	if($.trim(sRetailer).length < 1 ){  $( '<p class="bg-red padding">Please select missing retailer.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }

	sClickId  = $('#missing_click').val();		
	if($.trim(sClickId).length < 1 ){  $( '<p class="bg-red padding">Please select missing click id and date time.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }

	sOrderId  = $('#missing_order_Id').val();		
	if($.trim(sOrderId).length < 1 ){  $( '<p class="bg-red padding">Please Enter Order ID.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }

	sMisingAmunt  = $('#missing_amount').val();		
	if($.trim(sMisingAmunt).length < 1 ){  $( '<p class="bg-red padding">Please Enter Order Amount.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }
	
	if($.isNumeric(sMisingAmunt) == false){ $( '<p class="bg-red padding">Please Enter Order Amount.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }

	sMissingOrderItem  = $('#missing_order_item').val();		
	if($.trim(sMissingOrderItem).length < 1 ){  $( '<p class="bg-red padding">Please Enter Product Name.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }
	
	var fd = new FormData();

	fd.append( "attach", $("#attach")[0].files[0]);
	fd.append( "missing_retailer", $("#missing_retailer").val());
	fd.append( "missing_click", $("#missing_click").val());	
	fd.append( "missing_order_Id", $("#missing_order_Id").val());	
	fd.append( "missing_amount", $("#missing_amount").val());	
	fd.append( "missing_order_item", $("#missing_order_item").val());	
	fd.append( "missing_offer", $("#missing_offer").val());	
	fd.append( "voucher_codeus", $("#voucher_codeus").val());	
	fd.append( "calling", "missing_claim");	
		
	$.ajax({
			url: '/ajax-calling/action/account/support_missing_submit.php',
			cache: false,
            processData: false,				
            contentType: false,
           	type: 'post',
			data: fd,
			success: function(json) {	
				
				if(json == 1){					
					$( '<p class="bg-green padding">Your missing transaction accepted.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return true;
					$("#missing-box").hide();
				}else if(json == 2){
					$( '<p class="bg-red padding">This transaction is already tracked.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
				}else if(json == 3){
					$( '<p class="bg-red padding">This missing transaction is already claimed by you previously.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
				}else if(json == 4){
					$( '<p class="bg-red padding">Please upload jpg , jpeg , png , doc , docx , pdf only.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
				}else{
					$( '<p class="bg-red padding">Currently we not accept your missing request.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
				}					
			}		
		});

	/*var postingpopmissing = $.post( '/ajax-calling/action/account/support_missing_submit.php',  $( "#missing-box" ).serialize());
	postingpopmissing.done(function( data ) {
		
		if(data == 1){					
			$( '<p class="bg-green padding">Your missing transaction accepted.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return true;
			$("#missing-box").hide();
		}else if(data == 2){
			$( '<p class="bg-red padding">This transaction is already tracked.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}else if(data == 3){
			$( '<p class="bg-red padding">This missing transaction is already claimed by you previously.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}else{
			$( '<p class="bg-red padding">Currently we not accept your missing request.</p>' ).insertBefore( "#missing-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}
	});*/
});

$('#basic-details').click(function(){
	$('.bg-green').remove();
	$('.bg-red').remove();

	$(this).addClass('active-step');	
	$("#full-profile-details").removeClass('active-step');

	$('#change_password').hide();
	$( "#profile_third" ).hide();	
	$( "#profile_first" ).show();
	$( "#profile_second" ).show();
});

$('#full-profile-details').click(function(){
	$('.bg-green').remove();
	$('.bg-red').remove();	

	$(this).addClass('active-step');
    $("#basic-details").removeClass('active-step');
	
	$('#change_password').hide();
	$( "#profile_first" ).hide();
	$( "#profile_second" ).hide();
	$( "#profile_third" ).show();
});

$( "#profile_first" ).submit(function( event ) {
	
	$('.bg-green').remove();
	$('.bg-red').remove();
	
	event.preventDefault();

	sUserid = $( "#username" ).val();
	if($.trim(sUserid).length < 1){
		$( '<p class="bg-red padding">Please set your user name.</p>' ).insertBefore( "#profile_first" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }

	var postingsetusername = $.post( '/ajax-calling/action/account/usernamecheck.php',  $( "#profile_first" ).serialize());
	postingsetusername.done(function( data ) {
		
		if(data == 1){
			$( '<p class="bg-green padding">Your user name set successfully.</p>' ).insertBefore( "#profile_first" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); });
			$('#username').prop('readonly', true);
			$('#setusername').hide();
			return true; 
		}else if(data == 2){
			$( '<p class="bg-red padding">User name already exist.</p>' ).insertBefore( "#profile_first" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}else{
			$( '<p class="bg-red padding">Please set your user name without space or use . (dot) or _ (underscore).</p>' ).insertBefore( "#profile_first" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; 
		}
	});
});

$('#profile_second').submit(function( event ){

	$('.bg-green').remove();
	$('.bg-red').remove();
	
	event.preventDefault();

	sDob = $('#dob').val();
	if($.trim(sDob).length < 1){
		$( '<p class="bg-red padding">Please select your date of birth.</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}

	sAdd = $('#ad1').val();
	if($.trim(sAdd).length < 1){
		$( '<p class="bg-red padding">Please enter address.</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}

	sCity = $('#city').val();
	if($.trim(sCity).length < 1){
		$( '<p class="bg-red padding">Please enter your city.</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}

	sState = $('#state').val();
	if($.trim(sState).length < 1){
		$( '<p class="bg-red padding">Please select your state.</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}

	sPin = $('#pin').val();
	if($.trim(sPin).length != 6){
		$( '<p class="bg-red padding">Please enter your 6 digit area pin code.</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}

	if(isNaN(sPin)){
		$( '<p class="bg-red padding">Please enter your 6 digit area pin code.</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}

	sMobile = $('#mobile').val();
	if($.trim(sMobile).length != 10 ){
		$( '<p class="bg-red padding">Please enter your primary 10 digit phone no.</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}
	if(isNaN(sMobile)){
		$( '<p class="bg-red padding">Please enter your primary 10 digit phone no.</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}
	
	var postingsetpd1 = $.post( '/ajax-calling/action/account/profilesecond.php',  $( "#profile_second" ).serialize());
	postingsetpd1.done(function( data ){
		if(data == 1){
			$( '<p class="bg-green padding">Your basic details updated.</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); });			
			return true; 
		}else{
			$( '<p class="bg-red padding">'+data+'</p>' ).insertBefore( "#profile_second" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}
	});
});

$('#profile_third').submit(function( event ){

	$('.bg-green').remove();
	$('.bg-red').remove();
	
	event.preventDefault();
	
	var postingsetpd2 = $.post( '/ajax-calling/action/account/profilelast.php',  $( "#profile_third" ).serialize());
	postingsetpd2.done(function( data ){
		if(data == 1){
			$( '<p class="bg-green padding">Your profile details updated.</p>' ).insertBefore( "#profile_third" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); });			
			return true; 
		}else{
			$( '<p class="bg-red padding">Currently we not proccessed your request please try after some time.</p>' ).insertBefore( "#profile_third" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}
	});

});

$('#profile-changep').click(function(){
	$('.bg-green').remove();
	$('.bg-red').remove();
	$("#hide_profile").show();
	$('#changep-profile').removeClass('active');
	$(this).addClass('active');
	$('#change_password').hide();
	$('#withdraw_password').hide();
	$('#profile_first').show();
	$('#profile_second').show();	
	$('#profile_third').show();	
});

$('#changep-profile').click(function(){
	$('.bg-green').remove();
	$('.bg-red').remove();

	$('#profile-changep').removeClass('active');
	$(this).addClass('active');
	$("#hide_profile").hide();
	$('#profile_first').hide();
	$('#profile_second').hide();
	$('#profile_third').hide();
	$('#withdraw_password').hide();
	$('#change_password').show();
});

$('#change_password').submit(function( event ){

	$('.bg-green').remove();
	$('.bg-red').remove();
	
	event.preventDefault();

	sNewp = $('#newp').val();
	password_status = checkStrength(sNewp);
	if(password_status != 1 ){ $( '<p class="bg-red padding">'+password_status+'<br>Password more than 6 character.<br>Use at least one A-Z, one a-z, one 0-9 and one special symbol.</p>' ).insertBefore( "#change_password" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }
	
	sCnewp = $('#cnewp').val();
	if(sCnewp != sNewp ){ $( '<p class="bg-red padding">Confirm password miss match.</p>' ).insertBefore( "#change_password" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }
	
	var postingcpwd = $.post( '/ajax-calling/action/account/changepwd.php',  $( "#change_password" ).serialize());
	postingcpwd.done(function( data ){
		if(data == 1){	
			$( '<p class="bg-green padding">Your password change succesfully.</p>' ).insertBefore( "#change_password" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); });			
			return true; 
		}else{
			$( '<p class="bg-red padding">Your old and new password are same.</p>' ).insertBefore( "#change_password" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}
	});
});

$('.panel-footer').click(function (){
	$('#overview').removeClass('active in');
	$('#activity').removeClass('active in');
	$('#wallet').removeClass('active in');
	$('#refer').removeClass('active in');
	$('#support').removeClass('active in');
	$('#profile').removeClass('active in')
	/*$('#withdraw_password').hide();*/
	$('#withdraw_password').show();	
});

$('#withdraw_password').submit(function( event ){

	$('.bg-green').remove();
	$('.bg-red').remove();
	
	event.preventDefault();
	
	sEtp = $('#everytimepass').val();
	if($.trim(sEtp).length < 1 ){ $( '<p class="bg-red padding">Please enter correct password.</p>' ).insertBefore( "#withdraw_password" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false; }
	
	var postingctpwd = $.post( '/ajax-calling/action/transactions/tpwd.php',  $( "#withdraw_password" ).serialize());
	postingctpwd.done(function( data ){
		if(data == 1){	
			location.href = "/withdraw";	
			return true; 
		}else{
			$( '<p class="bg-red padding">Please enter correct password.</p>' ).insertBefore( "#withdraw_password" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}
	});
});

$('#apply').click(function(){
	var start   = new Date($('#datepicker12').val());
	var end		= new Date($('#datepicker13').val());
	var days	= (end - start)/1000/60/60/24;

	if(days >= 0){
		var postingdsu = $.post( '/ajax-calling/action/account/detailedsumm.php', {start : $('#datepicker12').val() , end : $('#datepicker13').val() });
		postingdsu.done(function( data ){
			if(data == 0){	
				$( '<p class="bg-red padding">No. transaction in your gopaisa account.</p>' ).insertBefore( "#detailedsum" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
			}else{
				/*$('#detailedsummary1').show();
				$('#detailedsummary').show();*/
				$('#detailedsummary').html(data);
				return true; 
			}
		});
	}else{
		alert("Please select date range correct.");
	}	
});

$( "#pacTab" ).change(function () {
	location.href = "/account/"+this.value;
});

$('#stillunsolved').click(function(){
	$('.bg-red').remove();
	hc = $('#have_category').val();
	hq = $('#have_question').val();
	if(hc > 0 && hq > 0){
		$('#question-box').hide();
		$('#anothersupport').show();
	}else{
		$( '<p class="bg-red padding">Please first search your answer in the given options.</p>' ).insertBefore( "#question-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}
});


$( "#anothersupport" ).submit(function( event ) {
	
	$('#msgsub').hide();

	$.ajax({
		url: "/ajax-calling/action/account/extrasupport.php", // Url to which the request is send
		type: "POST",             // Type of request to be send, called as method
		data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false,       // The content type used when sending data to the server.
		cache: false,             // To unable request pages to be cached
		processData:false,        // To send DOMDocument or non processed data file it is set to false
		success: function(data)   // A function to be called if request succeeds
		{	
			$('#anothersupport')[0].reset();
			if(data == 1){
				$('#msgsub').hide();
				$( '<p class="bg-green padding">Thank you for your contact.</p>' ).insertBefore( "#question-box" ).delay(3000).queue(function(next){ $('.bg-green').fadeOut('slow').remove(); }); 
				$('#anothersupport').hide();return true;
			}else{
				$( '<p class="bg-red padding">'+data+'.</p>' ).insertBefore( "#question-box" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); 
				$('#anothersupport').hide();return false;
			}			
		}
		
		
	});return false;
	
});


var showtickets = function(sTicketId){
	$('.bg-green').remove();
	$('.bg-red').remove();
		
	var postinticid = $.post( '/ajax-calling/action/account/showticketid.php',  { sTicid : sTicketId });
	postinticid.done(function( data ){
		if(data == 0){	
			$( '<p class="bg-red padding">Sorry, currently we have not fetch details of this ticket.</p>' ).insertBefore( "#suptic" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}else{
			$( "#suptic" ).html(data);
		}
	});
};

var supportclose = function(){
		
		$('.bg-green').remove();
		$('.bg-red').remove();

		var postinticid = $.post( '/ajax-calling/action/account/showtickets.php');
		postinticid.done(function( data ){
			if(data == 0){
				location.href="/login";
			}else{			
				$( "#suptic" ).html(data);
			}
		});
};

var msgsubmitresponse = function(msgid){

	$('.bg-green').remove();
	$('.bg-red').remove();

	supporttext = $.trim($('#support-text').val());

	if(supporttext.length > 4){

		var postintigmsgsol = $.post( '/ajax-calling/action/account/showticketsconti.php', { msgid : msgid , supporttext : supporttext});

		postintigmsgsol.done(function( data ){
			
			if(data == 0){				
				$( '<p class="bg-red padding">Please write after some time.</p>' ).insertBefore( "#suptic" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return true;
			}else if(data == 2){
				$( '<p class="bg-red padding">Please write your support.</p>' ).insertBefore( "#suptic" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
			}else{
				showtickets(data);
				return true;
			}
		});
	}else{
		$( '<p class="bg-red padding">Please write your support.</p>' ).insertBefore( "#suptic" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}
};

var msgsubmitsolved = function(msgid){
	
	$('.bg-green').remove();
	$('.bg-red').remove();

	supporttext = $.trim($('#support-text').val());

	var postintigmsgidsol = $.post( '/ajax-calling/action/account/showticketsclose.php', { msgid : msgid , supporttext : supporttext});
	postintigmsgidsol.done(function( data ){
		if(data == 1){
			$('#submitsupportsmsg').hide();
			$( '<p class="bg-green padding">We are very happy to help you.</p>' ).insertBefore( "#suptic" ).delay(3000).queue(function(next){ $('.bg-green').fadeOut('slow').remove(); }); return true;
		}else{			
			$( '<p class="bg-red padding">Sorry currently we are not close your ticket.</p>' ).insertBefore( "#suptic" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return true;
		}
	});
};

$('#sendverimail').click(function(){

	var postintigver = $.post( '/ajax-calling/action/account/veriemail.php');
	postintigver.done(function( data ){
		if(data == 1){
			$('#sendverimail').hide();
			$( '<p class="bg-green padding">Please check your email.</p>' ).insertAfter( "#email" ).delay(7000).queue(function(next){ $('.bg-green').fadeOut('slow').remove(); }); return true;
		}else if(data == 2){
			location.href = "/login";
			return false;
		}
	});
});


/*$('.status_declined').click(function(){ */
var decmsg = function(obj){
	id = obj.id;	
	dval = $('#s'+id).attr('data-value');
	$( ".hiw-popupmes" ).remove();
	var postintigdc = $.post( '/ajax-calling/action/account/decresion.php', { wesory : id });
	postintigdc.done(function( data ){
		$('#s'+id).attr('data-value','1');
		$('<div class="hiw-popupmes white-well">'+data+'</div>').insertAfter('#s'+id);	
	});/**/
}

var decmsgh= function(obj){
	id = obj.id;	
	$('#s'+id).attr('data-value','0');
	$( ".hiw-popupmes" ).remove();/**/	
}

	var letsworkasdealinputer = function(){	
	$('.bg-green').remove();
	$('.bg-red').remove();
	$('.bg-orange').remove();
	sMobile = $('#mobile').val();
	if($.trim(sMobile).length != 10 ){
		$( '<p class="bg-red padding">Please enter your primary 10 digit phone no.</p>' ).insertBefore( "#dealinputer" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}
	if(isNaN(sMobile)){
		$( '<p class="bg-red padding">Please enter your primary 10 digit phone no.</p>' ).insertBefore( "#dealinputer" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
	}

	var postintigid = $.post( '/ajax-calling/action/account/dealinputers.php', { sMobile : sMobile });
	postintigid.done(function( data ){
		if(data == 1){
			$( '<p class="bg-orange padding">Your request accepted. Please wait our Team response you.</p>' ).insertBefore( "#dealinputer" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}else if(data == 2){
			$( '<p class="bg-orange padding">Your request already processing. Please wait our Team response you.</p>' ).insertBefore( "#dealinputer" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;
		}else{
			$( '<p class="bg-red padding">Please login for work with us.</p>' ).insertBefore( "#dealinputer" ).delay(3000).queue(function(next){ $('.bg-red').fadeOut('slow').remove(); }); return false;	
		}
		
	});
}

$('#missing_offer').click(function(){
    if (this.checked) {
        $('#voucher_codeused').show();
		$("#voucher_codeus").focus();
    }else{
		$('#voucher_codeused').hide();
	}
}) 
