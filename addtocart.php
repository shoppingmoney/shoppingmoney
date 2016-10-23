<?php

class AddtoCart{
	public $result;
	public $count;

	function __construct(){
		ob_start();
		session_start();
		if(isset($_GET["action"])){
			$fxn = $_GET["action"];
			$option = $_GET;
			$output = $this->$fxn($option);
			echo $output;
		}
	}

	public function productSearch($options){
		$allProducts = $_SESSION['cart'];
		foreach ($allProducts as $key=> $singleProduct) {		
			if(($singleProduct['product_id']==$options['product_id']) && ($singleProduct['size']== $options['size']) &&
				($singleProduct['color']==$options['color']) && ($singleProduct['weight']== $options['weight'])
				){
				$singleProduct['quantity']+=$options['quantity'];
			}else{
				return 0;
			}
			$_SESSION['cart'][$key]['quantity']=$singleProduct['quantity'];
			return 1;
		}
		  
	}
	public function addProduct($options){
		if(isset($_SESSION['cart'])){
			//$found = $this->productSearch($options);
			$i =count($_SESSION['cart']);
		}else{
			$i=0;
		}
		$found = $this->productSearch($options);
		if($found==0){
			foreach ($options as $key => $value) {
				if($key!="action"){
					$_SESSION["cart"][$i][$key]=$value;
				}
			}
		}
		
		$this->result =" Product Successfully added to Cart";
		return $this->result;
	}
	public function removeProduct($options){
		$allProducts = $_SESSION['cart'];
		foreach ($allProducts as $key=> $singleProduct) {		
			if(($singleProduct['product_id']==$options['product_id'])){
				unset($_SESSION['cart'][$key]);
			}
		}

		$this->result ="successfully Removed From Cart";
		return $this->result;
	}
	public function listAllProducts(){
		header('Content-Type: application/json');
		//$products = array($_SESSION['cart']);
		$product= (!empty($_SESSION['cart'])) ? $_SESSION['cart'] : 0;
		$json = json_encode($product, JSON_PRETTY_PRINT);
		print($json);
		//unset($_SESSION['cart']);	

	}

	public function itemCount(){
		$this->result = (isset($_SESSION['cart'])&&!empty(count($_SESSION['cart']))) ? count($_SESSION['cart']) : 0;
		return $this->result;
	}




}

$object = new AddtoCart();



?>