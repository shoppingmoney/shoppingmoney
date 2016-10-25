<?php

/**
* @author Meraj Ahmad Siddiqui
*/
include 'vendor/VendorQuery.php';
class HeartSystem
{
	
	public $_heart_color;
	private $_landing_price;
	private $_display_price;
	private $_tax;
	private $_connection;
	private $_delivery_charge;
	public function __construct(){
			$this->_connection = new VDQuery();
		}
 	public function product_details($product_id){
 			$product_details = $this->_connection->read('product_tbl', "product_id=$product_id");
			//Her upload the commission type and commsion value to database table
			$this->_delivery_charge= $this->_connection->read('shipping', "product_id=$product_id")['shipping_charge'];
			$commission= ($product_details['commission_type']=='percent') ?
				($product_details['landing_price']*$product_details['commission'])/100 : $product_details['landing_price']*$product_details['commission'];
			$this->_display_price = $product_details['landing_price'] + $commission;
			$this->_landing_price= $product_details['landing_price'];
			$this->_tax= $product_details['tax'];
 	}
	public function _autoHeart($product_id){
			$this->product_details($product_id);
				$sell =  $this->_display_price+($this->_tax*$this->_display_price/100);
				$buy  = $this->_landing_price+($this->_tax*$this->_landing_price/100)+$this->_delivery_charge;
				$profit = ($sell-$buy);
				$profit_percent  = ($profit*100)/$buy;
				if($profit_percent>=40){
					$heart_id= 6;
				}else if($profit_percent < 40 && $profit_percent >=25){
					$heart_id = 2;
				}else if($profit_percent < 25 && $profit_percent >=20){
					$heart_id = 4;
				}else if($profit_percent < 20 && $profit_percent >=15){
					$heart_id = 5;
				}else if($profit_percent < 15 && $profit_percent >=12){
					$heart_id = 3;
				}else if($profit_percent < 12 && $profit < 200){
					$heart_id = 1;
				}else if($profit_percent < 12 && $profit > 200){
					$heart_id = 7;
				}
				$this->_heart_color= $heart_id;
				$insert_heart = $this->_connection->update('product_tbl','color_code',$this->_heart_color,"product_id={$product_id}");
				$output = ($insert_heart!="false") ? "1" : "0";
				if($output==1){
					$color = $this->_connection->read('point', "id={$heart_id}")['point_color'];
					return $color;
				}
		}
		public function _getHeart($id){
				$heart_id = $this->_connection->read('product_tbl', "product_id={$id}")['color_code'];
				if($heart_id==0){
					$color =$this->_autoHeart($id);
				}else{
					$color = $this->_connection->read('point', "id={$heart_id}")['point_color'];
				}
				return $color;
		}

	public function _manualHeart($product_id, $color_code){
		$this->color_code = $color_code;
		$insert_heart = $this->_connection->update('product_tbl','color_code', $this->_heart_color, "product_id={$product_id}" );
		$output = ($insert_heart!="false") ? "Updated Sucessfully" : "You got some problem";
		return $output;
	}

}




?>