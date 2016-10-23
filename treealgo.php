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

function tree(id,name,refid)
{       //var username1 = document.form.search.value;
	var request = checkAjax();	
	var chk;
    var url = "mlm/includes/growtreealgo.php?id="+id+"&name="+name+"&refid="+refid;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	

	function callFun()
	{
		if(request.readyState == 4)
		{
			chk = request.responseText.trim();
			alert(chk);
			if(chk == 'inserted'){
				layer(refid);
			}
		}
	}
}
function layer(ref)
{       
	var request = checkAjax();	
    var url = "mlm/includes/layercomplectionalgo.php?id="+ref;
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
<button onclick="tree(14,'jaffar',8);">Click Me</button>