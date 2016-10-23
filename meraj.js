function  validate_form(){
		var flag=0;
			  var fields = ["name","lastname","phone", "email", "password"]
			  var i, l = fields.length;
			  var fieldname;
			  for (i = 0; i < l; i++) {
			    fieldname = fields[i];
			    if (document.forms["regfrm"][fieldname].value === "") {
			      //alert(fieldname + " can not be empty");
				  flag=1;
				  document.getElementById(fieldname).style.borderColor="red";
				  $('#er'+fieldname).fadeIn(1000);
			    }
			    else{
					$('#er'+fieldname).fadeOut(1000);
				var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			    if(!re.test($("#email").val())){$("#eremail").fadeIn(1000);flag=1;}
				if($("#phone").val().length != 10){$("#erphone").fadeIn(1000); flag=1;}
				document.getElementById(fieldname).style.borderColor="#ccc";
				}
			  } 

}