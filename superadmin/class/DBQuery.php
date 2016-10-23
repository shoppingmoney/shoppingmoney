<?php

class DBQuery extends Connection {

    private $sql;
	
function updateQuery($table,$col,$val,$condition=null){
			$bcolarr = explode(",",$col);
            $bvalarr = explode("~,",$val);
            $num = count($bcolarr); $i=0;
            $sql = "UPDATE $table SET ";
            foreach($bcolarr as $col){
	        $num--;
	        $sql .= "$col = ".$bvalarr[$i];
	        if($num != 0){
		    $sql .= ", ";
	        }
	        $i++;
          }
          $sql .= " $condition";
		 try {
            $this->sql = $sql;
            return $this->conn->exec($this->sql);
        } catch (Exception $ex) {
            
        }
		}
    

//    1.insert simple value in table
    public function insertData($tableNmae, $fieldName, $valueName) {
        try {
            $this->sql = "insert into $tableNmae($fieldName) values($valueName)";
            return $this->conn->exec($this->sql);
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

//    2. count data from table
    public function countDtata($statement) {
        try {
            $this->sql = $statement;
            $this->conn->query($this->sql);
            $number = 0;
            foreach ($this->conn->query($this->sql) as $row) {
                $number++;
            }
            return $number;
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

//   3. get last inserted id
    public function LastId() {
        try {
            return $this->conn->lastInsertId();
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

//   4.  close connection
    public function closeConnection() {
        try {
            $this->conn = null;
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

//   5. select statement
    public function selectData($statement) {
        try {
            $this->sql = $statement;
            $q = $this->conn->query($this->sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $result = array();
            while ($r = $q->fetch()) {
                $result[] = $r;
            }
            return $result;
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

    //   5. select statement
    public function selectSingleStmt($statement) {
        try {
            $this->sql = $statement;
            $q = $this->conn->query($this->sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $r = $q->fetch();
            return $r;
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

//    5. update statement
    public function updateData($statement) {
        try {
            $this->sql = $statement;
            return $this->conn->exec($this->sql);
        } catch (Exception $ex) {
            
        }
    }
function tableExists($table) {

    // Try a select statement against the table
    try {
        $result = $this->conn->query("SELECT 1 FROM $table LIMIT 1");
    } catch (Exception $e) {
        // We got an exception == table not found
        return FALSE;
    }

    // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
    return $result !== FALSE;
}

// date formatting
		
		function dateFormate($dt){
			$d = explode("-",$dt);
			$result = $d[2]."-".$d[1]."-".$d[0];
			return $result;
		}
	
	// Fetching option list
	function categoryOption($pid,$category){
		 $optstr="";
                           
						   if($pid !=0){
							   $catopt=array();
							   $rec = $this->selectSingleStmt("select * from product_category where id = $pid AND status = '1'");
							   $catopt[0]=$rec['category_name'];
							   if($rec['parent_id'] != 0){
								  $rec = $this->selectSingleStmt("select * from product_category where id = {$rec['parent_id']} AND status = '1'");
                                  $catopt[1]=$rec['category_name'];
								  if($rec['parent_id'] != 0){
								  $rec = $this->selectSingleStmt("select * from product_category where id = {$rec['parent_id']} AND status = '1'");
                                  $catopt[2]=$rec['category_name'];
								  if($rec['parent_id'] != 0){
								  $rec = $this->selectSingleStmt("select * from product_category where id = {$rec['parent_id']} AND status = '1'");
                                  $catopt[3]=$rec['category_name'];							  
							      }
							      }
								  }
						     $revcat=array_reverse($catopt);
								foreach($revcat as $ct){
									$optstr .= $ct." -> ";
								}
								$optstr .= $category;
								 return "$optstr";
						   }else{
						   return "$category";
						   }
						   
	}

}

?>
