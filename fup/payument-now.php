<?php


//error_reporting(0);

session_start();
ob_start();



include 'vendor/lib/Connection.php';

include 'vendor/lib/DBQuery.php';
include 'vendor/lib/Helpers.php';

$connection = new Connection();
$helper = new Helpers();

$dbAccess = new DBQuery();

$ordId="SHOP".rand(1000,10000);
extract($_POST);



$uber=$dbAccess->selectData("select * from buynow where user_id = '".$_SESSION['myemail']."'");

$totaamy = $dbAccess->selectSingleStmt("select sum(mrp+(shipping*qty)) as coil from buynow where user_id = '".$_SESSION['myemail']."' ");
$newvat=0;
foreach($uber as $ye){
$local=$dbAccess->selectSingleStmt("select * from product_tbl where product_id = '".$ye['product_id']."' ");

$vat=($local['vat']*$ye['mrp'])/100;

$newvat = $newvat+($local['vat']*$ye['mrp'])/100;
$grandmoney = $totaamy['coil']+$newvat;

}

?>



<?php


require_once dirname( __FILE__ ) . '/payu.php';

/* Payments made easy. */

pay_page( array (	'key' => 'gtKFFx', 'txnid' => $ordId, 'amount' => $grandmoney,
			'firstname' => $firstname, email => $email, 'phone' => $phone,
			'productinfo' => 'Product Info', 'surl' => 'http://shoppingmoney.in/beta/success-now.php', 'furl' => 'http://shoppingmoney.in/beta/fail.php'), 'eCwWELxi' );

/* And we are done. */
			


function payment_success() {
	/* Payment success logic goes here. */

	echo "Payment Success" . "<pre>" . print_r( $_POST, true ) . "</pre>";

}

function payment_failure() {
	/* Payment failure logic goes here. */

	echo "Payment Failure" . "<pre>" . print_r( $_POST, true ) . "</pre>";

}


?>









