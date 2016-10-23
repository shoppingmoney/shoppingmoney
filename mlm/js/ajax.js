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

