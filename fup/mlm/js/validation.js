/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
	$("form.register").change(function() {
		$.post("includes/validation.php", $("form.register").serialize(), function( data ) {
			/*if( data.username == "inuse" )
				$("p#username_error").slideDown();
			else
				$("p#username_error").hide();
                        
			if( data.password == "missmatch" )
				$("p#password_error").slideDown();
			else
				$("p#password_error").hide();
                                */
			if( data.email == "notvalid" )
				$("p#email_error").slideDown();
			else
				$("p#email_error").hide();
		}, "json");
	});
});



