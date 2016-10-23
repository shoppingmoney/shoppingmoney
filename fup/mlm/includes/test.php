<script>
// JavaScript Document

// This function is used to check the ajax in the browser

function checkAjax()
{
	var request = null;
	if(window.XMLHttpRequest)
	{
		request = new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		request = new ActiveXObject('Msxml2.XMLHTTP');
	}
	else if(window.ActiveXObject)
	{
		request = new ActiveXObject('Microsoft.XMLHTTP');
	}
	else
	{
		alert("Your browser not support AJAX");
	}
	return request;
}

function process(id)
{       //var username1 = document.form.search.value;
	var request = checkAjax();	
	
    var url = "growtreealgo.php?id="+id+"&name=shahnawaz";
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			//document.getElementById("lang").innerHTML = request.responseText;
			process1();
		}
	}
}
function process1()
{       //var username1 = document.form.search.value;
	var request = checkAjax();	
	
    var url = "layercomplectionalgo.php?id=8&name=shahnawaz";
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			//document.getElementById("lang").innerHTML = request.responseText;
			
		}
	}
}
</script>
<button onclick="process(13);">Click Me</button>