<?php
error_reporting(0);
//Array ( [point] => 774.4 [firstname] => Shahnawaz Alam [email] => alam@gmail.com [address_1] => jharoda [address_2] => surendera colony [mark] => near jharoda main bus stand [postcode] => 110084 [country] => IND [city] => DEL [submit] => Place Order );
session_start();
//print_r($_POST);
extract($_POST);
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
$ordId="SHOP".rand(1000,10000);
$address = $address_1." , ".address_2;
$userid=$dbAccess->selectSingleStmt("select * from firstimeregd where uemail = '".$_SESSION['myemail']."'");
$useid = $userid['id'];
$dbAccess->insertData("checkout","orderid,user_email,fname,address,city,pincode,country,phone,date,status,state,user_id,point,grandtotla,mode","'$ordId','$email','$firstname','$address','$city','$postcode','$country','$phone',now(),'0','$state','$useid','$point','$pays','$actionon'");

$Lastid = $dbAccess->LastId();

$totaamy = $dbAccess->selectSingleStmt("select sum(mrp) as coil from buynow where user_id = '".$_SESSION['myemail']."' ");
//$dbAccess->updateData("insert into account(uid,dr,cr,mode,date,status) values('$useid','".$totaamy['coil']."','0','Shopping','".date('Y-m-d')."','1') ");


$zopim=$dbAccess->selectData("select * from buynow where user_id = '".$_SESSION['myemail']."'");

$zbon=$dbAccess->selectSingleStmt("select * from product_tbl ");



foreach($zopim as $t){


$dnatitoo=$dbAccess->selectSingleStmt("select * from product_tbl where product_id = '".$t['product_id']."'");


$tnt=($dnatitoo['vat']*$t['mrp'])/100;

$dbAccess->insertData("checkout_ord","product_id,mrp,mrp_total,shipping,point,vat,billing_type,qty,orderid,checkout_id,user_id,vendor_id,date,status","'".$t['product_id']."','".$t['unit_prc']."','".$t['mrp']."','".$t['shipping']."','".$t['point']."','$tnt','".$dnatitoo['billing_type']."','".$t['qty']."','$ordId','$Lastid','$useid','".$zbon['vendor_id']."',now(),'0'");
}






$copycat=$dbAccess->selectSingleStmt("select * from register_vendor where unique_user_id = '".$zbon['vendor_id']."' ");

$fresh=$dbAccess->selectSingleStmt("select * from vendor_business_details where unique_user_id = '".$copycat['email']."' ");

$sendto = array($email,$copycat['email'],'alam.buoyant@gmail.com');

?>






<style>
 a{color:#bef2ff;}
 </style>

 <?php
 
$body .= '<div id=":1ap" class="a3s" style="overflow: hidden;"><u></u>         

<div style="width:100%;min-height:100%;margin:10px auto;padding:0;background-color:#ffffff;font-family:Arial,Tahoma,Verdana,sans-serif;font-weight:299px;font-size:13px;text-align:center" bgcolor="#ffffff">   
<table style="max-width:100%" cellpadding="0" cellspacing="0" width="100%"> <tbody>
<tr> 

<td style="background-color:#F1F1F1;padding:0;margin:0" align="left" height="30" bgcolor="#027cd5" valign="middle"> <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href=""> <img class="CToWUd" src="http://shoppingmoney.in/img/invoicebanner.png" alt="" style="width: 169px;height:34px;padding:10px;display: block;border:none" height="30" border="0"> </a> 
</td> 
 
<td style="background-color:#F1F1F1;font-size: 10px;width: 205px;padding: 13px;font-weight:600;" bgcolor="#027cd5">
Contact us: +91-9871392292 || infoshoppingmoney.in<br>
23 Ankur Apartment<BR>
IP Extension Patparganj Delhi - 501401
</td> 

<td style="background-color:#F1F1F1;font-size: 10px;font-weight:600;" bgcolor="#027cd5">
Tax Invoice # F0FR3DELHI_MEDCHAL_0000-0000

</td>
</tr> </tbody>
</table> 


  
<table style="max-width:100%;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6;padding-top: 16px;" cellpadding="0" cellspacing="0" width="100%"> <tbody>
<tr>
<td style="line-height: 21px;"> 
<ul >
<li style="list-style-type:none;font-size: 11px;"><b>Order ID:</b> '.$ordId.'</li>
<li style="list-style-type:none;font-size: 11px;"><b>Order Date:</b> '.date('Y-m-d').'</li>
<li style="list-style-type:none;font-size: 11px;"><b>Invoice Date:</b> '.date('Y-m-d').'</li>
<li style="list-style-type:none;font-size: 11px;"><b>VAT/TIN:</b> '.$fresh['vat_number'].'</li>
<li style="list-style-type:none;font-size: 11px;"><b>CST #:</b> '.$fresh['cstnumber'].'</li>
</ul>
</td>

<td> 
<ul>

<li style="list-style-type:none;font-size: 11px;"><b>Billing Address</b></li>
<li style="list-style-type:none;font-size: 11px;">'.$_POST['firstname'].'<br>

'.$_POST['address_1'].'<br/>
'.$_POST['address_2'].'<br/>

'.$_POST['mark'].'<br>


'.$_POST['postcode'].', '.$_POST['city'].'<br>

Phone: '.$_POST['phone'].'</li>

</ul>
</td>

<td> 
<ul>

<li style="list-style-type:none;font-size: 11px;"><b>Billing Address</b></li>
<li style="list-style-type:none;font-size: 11px;">'.$_POST['firstname'].'<br>

'.$_POST['address_1'].'<br/>
'.$_POST['address_2'].'<br/>

'.$_POST['mark'].'<br>


'.$_POST['postcode'].', '.$_POST['city'].'<br>

Phone: '.$_POST['phone'].'</li>

</ul>

</td>

<td>
<p style="font-size:8.5px;width:58px;">*Keep this invoice and

manufacturer box for

warranty purposes.</p>
</td>

</tr>

</table> 
<table style="max-width:100%;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6" cellpadding="0" cellspacing="0" width="100%"> <tbody> 
<tr> 
<td style="background-color:#ffffff;display:block;margin:0 auto;clear:both;padding:20px 20px 0 20px" align="left" bgcolor="" valign="top"> 
<table style="margin:0" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody>

<tr> 
<td colspan="4" align="left" valign="top"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody>
<tr> 

<td style="border-bottom:solid 2px #565656;width:90%" align="left" valign="middle">&nbsp;
</td> 
</tr> 
<tr> 
<td align="left" valign="middle">&nbsp;
</td> 
</tr> </tbody> 
</table> 
</td> 
</tr> </tbody>
</table> 
</td> 
</tr> </tbody> 
</table> 

<table width="100%" border="1" style="border-collapse: collapse;font-size:11px;">

<tr style="font-weight:600;">
<td>Product</td>
<td>Title</td>
<td>Qty</td>
<td>Price</td>
<td>Shipping Chargs</td>
<td>Total</td>


</tr><tbody> ';

$uber=$dbAccess->selectData("select * from buynow where user_id = '".$_SESSION['myemail']."'");

$totaamy = $dbAccess->selectSingleStmt("select sum(mrp+(shipping*qty)) as coil from buynow where user_id = '".$_SESSION['myemail']."' ");
$newvat=0;
foreach($uber as $ye){
$local=$dbAccess->selectSingleStmt("select * from product_tbl where product_id = '".$ye['product_id']."' ");
$vat=($local['vat']*$ye['mrp'])/100;
$y2j=($ye['shipping']*$ye['qty'])+$ye['mrp']+$vat;
$shipping_cha=$ye['shipping']*$ye['qty'];
$newvat = $newvat+($local['vat']*$ye['mrp'])/100;
$grandmoney = $totaamy['coil']+$newvat;
?>

<?php
$body .= '<tr>
 
<td>'.$local['ptoduct_type'].'<br>
SKU: '.$local['product_num'].'<br>

WID: '.$local['vendor_id'].'</td>
<td>
'.$local['title'].'
</td>
<td>'.$ye['qty'].'</td>
<td>'.$ye['unit_prc'].'</td>
<td>'.$shipping_cha.'</td>
<td>'.$y2j.'</td>
</tr>';
?>
<?php
 } 

$body .= '<tr>
<td></td>
<td style="text-align:right;font-weight:600;padding-right:20px;">Grand Total</td>
<td></td>
<td></td>
<td></td>


<td>'.$grandmoney.'</td>
</tr>
<th colspan="6" style="font-size:9px;"><p>This is a computer generated invoice. No signature required.</p></th>
</tbody>
</table>   


<div style="clear:both; height:250px;border-left: 1px solid #e6e6e6;border-right: 1px solid #e6e6e6;width:100%;position:relative;"></div>



<table style="max-width:100%;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6;border-bottom:1px solid #e6e6e6;" cellpadding="0" cellspacing="0" width="100%"> <tbody>
<th>

<span style="position:relative;right:20px;float:right;bottom:0px;font-size:15px;font-weight:500;color:#2f2f2f;"><img src="http://shoppingmoney.in/img/Invoiceicon.png" style="height:33px;padding:10px;display: block;border:none">Thanks You!<br><i style="font-size:8.5px;">for shopping with us.</i></span>
</th>

<tr> 
<td style="background-color:#ffffff;color:#565656;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;padding:20px 20px 0 20px" align="left" bgcolor="#ffffff" valign="top"> 

<p style="line-height:22px;padding:0 0 20px 0;margin:0;color:#565656;border-bottom:#e6e6e6 solid 1px;font-size:9px"> 
 <strong style="font-size:12px;">Returns Policy:</strong> At Shoppingmoney we try to deliver perfectly each and every time. But in the off-chance that you need to return the item, please do so with the  <strong style="font-size:12px;">original Brand box/price tag, original packing and invoice</strong>without which it will be really difficult for us to act on your request. Please help us in helping you. Terms and conditions apply.</p> 
<p style="font-size:9px">The goods sold as part of this shipment are intended for end user consumption / retail sale and not for re-sale.
<br>Regd. office: 23 Ankur Apartment
IP Extension Patparganj Delhi 
110092</p>
 </td> 
</tr>

</tbody>
</table> 
<table style="max-width:700px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6" cellpadding="0" cellspacing="0" width="100%"> <tbody> 
<tr> 
<td style="background-color:#ffffff;color:#565656;display:block;font-weight:300;margin:0;padding:0;clear:both" align="left" bgcolor="#ffffff" valign="top"> 

</td> 
</tr> </tbody> 
</table> 
 
 
  
 
 <img class="CToWUd" style="width:1px;min-height:1px" src="" alt="" height="2" width="2">
</div>
</div>';

echo $body;



$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Shoppingmoney.in<info@shoppingmoney.in>' . "\r\n";
date_default_timezone_set("Asia/Kolkata");
$date=date("d:m:Y h:i:sa");
$cnter=1;
foreach($sendto as $mujhebhi){

if($cnter==1){
$subject = 'Shoppingmoney order confirmation details';
}else{
$subject = 'You have new orders from Shoppingmoney.in';
}
mail($mujhebhi, $subject, $body, $headers);
$cnter++;
}

$msg1 = urlencode("We have received your order $ordId amounting to Rs.$grandmoney  and it is being processed, thanks for your order"); // otp sending code put here
$ID = 'argecom';
$Pwd = 'argecom';
$PhNo = $phone; 
 
$Text = $msg1;

$url="http://sms.proactivesms.in/sendsms.jsp?user=$ID&password=$Pwd&mobiles=$PhNo&sms=$Text&senderid =sender";
//echo $url;
//$ret = file($url);
//echo $ret[9];
//curl url
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
//curl url

$dbAccess->updateData("delete from buynow where user_id = '".$_SESSION['myemail']."'");
echo  "<script>alert('purchased successfully');</script>";
echo  "<script>window.location='index.php';</script>";
//header("location:index.php");
?>