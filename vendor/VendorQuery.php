<?php

Class VDQuery {
 private $_connection;
 private $_host = "localhost";
 private $_username = "root";
 private $_password = "";
 private $_database = "shopmoney";
 public  $result;


function __construct(){
	 $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
	 // Error handling
    if(mysqli_connect_error()) {
        trigger_error("Failed to conencto to MySQLI: " . mysql_connect_error(), E_USER_ERROR);
    }
    return $this->_connection;
}

public  function read($tableName,$condition=""){
  if(!empty($condition))
  {
  	$query = " SELECT * FROM {$tableName} WHERE {$condition}";
  }else{
  	$query = " SELECT * FROM {$tableName} ";
  }

  $executed = $this->_connection->query($query);

  $this->result = ($executed) ?mysqli_fetch_array($executed) : "false"; return $this->result;

}

public  function insert($tableName, $fieldName, $Values){
  $query = " INSERT INTO {$tableName} ( {$fieldName} ) VALUES( $Values )";
  $executed = $this->_connection->query($query);
  $this->result = ($executed) ? "meraj" : $query;
  return $this->result;
}

public  function update($tableName, $fieldName, $Values, $condition){
  $query = " UPDATE  {$tableName} ( {$fieldName} ) SET  VALUES( $Values ) WHERE {$condition}";
  $executed = $this->_connection->query($query);
  $this->result = ($executed) ?mysqli_fetch_array($executed) : "false";
  return $this->result;
}

public  function delete($tableName, $condition){
  $query = " DELETE {$tableName} WHERE {$condition}";
  $executed = $this->_connection->query($query);
  $this->result = ($executed) ?mysqli_fetch_array($executed): "false";
  return $this->result;
}



public function lastId($tableName){
    $query = "Count( SELECT *  {$tableName} )";
  $executed = $this->_connection->query($query);
}
}

?>