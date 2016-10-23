<?php
session_start();
ob_start();
include 'vendor/lib/Connection.php';
include 'vendor/lib/Fileupload.php';
include 'vendor/lib/DBQuery.php';
include 'vendor/lib/Helpers.php';
include 'vendor/lib/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
$te=$_GET['f'];
$ts=$_GET['s'];
$url="http://shoppingmoney.in/beta/ok.php?s=$te&m=$ts";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
?>
<input type="hidden" name="s" id="s" value="HI"/>
<input type="text" name="m" id="m" value=""/>
<a href="javascript:void(0)" onClick="loadDoc()">CLICK ON ME</a>
<script>
function loadDoc() {

var f = document.getElementById("s").vlaue;
var s = document.getElementById("m").vlaue;
alert("http://shoppingmoney.in/beta/test.php?f="+f+"&s="+s);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("demo").innerHTML = xhttp.responseText;
     $('#show').load(document.URL + ' #show');
    }
  };
  xhttp.open("GET", "http://shoppingmoney.in/beta/test.php?f=hi&s=go", true);
  xhttp.send();
} 
</script>
<div id="show">
<?php
$fool=$dbAccess->selectData("select * from vert");
foreach($fool as $toot){
echo $toot['msg']."<br/>";
}
?>
</div>