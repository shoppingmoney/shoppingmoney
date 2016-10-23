<?php
include 'VendorQuery.php';
class ColorSize{
public $con; 
public $fields="";
public $values="";
private $tablename ="colorsize";

public function __construct($data){
	$dbms = new VDQuery();
	foreach ($data as $key => $value){
		$this->fields.="{$key},";
		$this->values.="'{$value}',";
	}
	$done = $dbms->insert($this->tablename, rtrim($this->fields, ","), rtrim($this->values, ","));
	echo ($done) ?"Succefully Inserted" : "Some error occured";

   }
}

/*
$testdata = array("product_id"=>12, "clorid"=>"green", "sizeid"=>12);
$tesobject = new ColorSize($testdata);

*/

?>