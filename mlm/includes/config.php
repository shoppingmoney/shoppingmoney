<?php 
class config{

    Public $link = null;
        Private $Host = "localhost";
        Private $DBName = "shopmoney";
        Private $DBPass = "";
        Private $DBUser = "root";
    function __construct(){
        //$this->link = mysqli_connect("localhost","root","","shopping_demo") or die("Database connection error!!!");
            $this->link = mysqli_connect($this->Host,$this->DBUser,$this->DBPass,$this->DBName) or die("Database connection error!!!");
    }
        //Select all from table.
	function fetchall($table,$col='*')
	{				
		$sql = "select $col from $table";
		//echo $sql."<br/>";
		$result = mysqli_query($this->link,$sql);
		$arr = array();
		while($rs = mysqli_fetch_object($result))
		{
			//echo $sql;
			$arr[] = $rs;
		}
		return $arr;
	}

//object
	
	
	function objectcreate(){
		return $this->link;
	}
//object
       // For single value
	
	function fetchSingle($table,$col='*')
	{				
		$sql = "select $col from $table";
		//echo $sql;
		$result = mysqli_query($this->link,$sql);
		$rs = mysqli_fetch_object($result);
		
		return $rs;
	}
        
        //function for total joining at that level.
        function getotUser($table,$userid,$level)
        {
            $sql = "select count(*) as cnt from $table where refrenceid='$userid' and level='$level'";
            $result = mysqli_query($this->link, $sql);
            $rs = mysqli_fetch_object($result);
            return $rs->cnt;
        }
        
        //function for total joining from refrence.
        function joining($table,$userid)
        {
            $sql = "select count(*) as cnt from $table where refrenceid='$userid'";
            $result = mysqli_query($this->link, $sql);
            $rs = mysqli_fetch_object($result);
            return $rs->cnt;
        }
        
        
        function insertValue($table,$column,$value)
        {
            $sql = "insert into $table ($column) values($value)";
            $result = mysqli_query($this->link, $sql);
            $val = mysqli_insert_id($this->link);
            return $val;
        }
        
        
        function checkAvailablity($table)
        {
            $sql = "select count(*) as cnt from $table";
	    $result = mysqli_query($this->link,$sql);
            $rs = mysqli_fetch_object($result);
            return $rs->cnt;
        }
        
        function updateValue($table){
            $sql = "update $table";
            mysqli_query($this->link, $sql);
        }
    
        function updateQuery($table,$col,$val,$condition=null){
			$bcolarr = explode(",",$col);
            $bvalarr = explode("~,",$val);
            $num = count($bcolarr); $i=0;
            $sql = "update $table SET ";
            foreach($bcolarr as $col){
	        $num--;
	        $sql .= "$col = ".$bvalarr[$i];
	        if($num != 0){
		    $sql .= ", ";
	        }
	        $i++;
          }
         $sql .= " $condition";
	mysqli_query($this->link, $sql);
         //return $sql;   
		}
        
        //getting single value
        function single($table,$column)
        {
            $sql = "select $column from $table";
            //echo "<br/>". $sql;
	    $result = mysqli_query($this->link,$sql);
            $rs = mysqli_fetch_object($result);
            return $column;
        }
        
        function query($sql)
        {
//echo "<br/>". $sql;
            mysqli_query($this->link,$sql);
			return mysqli_affected_rows($this->link);
        }
function closeConnection(){
		   mysqli_close($this->link);
	   }

       

}

