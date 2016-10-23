<?php


//error_reporting(0);

session_start();




include 'vendor/lib/Connection.php';

include 'vendor/lib/DBQuery.php';
include 'vendor/lib/Helpers.php';

$connection = new Connection();
$helper = new Helpers();

$dbAccess = new DBQuery();

$ordId="SMON".rand(1000,100000000);
extract($_POST);



$uber=$dbAccess->selectData("select * from cart where user_id = '".$_SESSION['myemail']."'");

$totaamy = $dbAccess->selectSingleStmt("select sum(mrp+(shipping*qty)) as coil from cart where user_id = '".$_SESSION['myemail']."' ");
$price = 0;
foreach ($_SESSION['cart'] as $key => $value) {

	$price+= $value['price'];
}
$newvat=0;
foreach($uber as $ye){
$local=$dbAccess->selectSingleStmt("select * from product_tbl where product_id = '".$ye['product_id']."' ");

$vat=($local['vat']*$ye['mrp'])/100;

$newvat = $newvat+($local['vat']*$ye['mrp'])/100;
$grandmoney =$price;

}

?>



<?php


require_once dirname( __FILE__ ) . '/payu.php';

/* Payments made easy. */

pay_page( array (	'key' => 'gtKFFx', 'txnid' => $ordId, 'amount' => $grandmoney,
			'firstname' => $firstname, email => $email, 'phone' => $phone,
			'productinfo' => 'Product Info', 'surl' => 'http://shoppingmoney.in/beta/success.php', 'furl' => 'http://shoppingmoney.in/beta/fail.php'), 'eCwWELxi' );

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









