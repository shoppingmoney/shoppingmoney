<?php
/*
 * Description of header_footer
 *
 * @author Buoyant
 */
include_once 'config.php';
class headerfooterModel extends config{
    //put your code here
    
    function header($sessval)
    {
        $sql = " firstimeregd where uemail = '$sessval'";
        $value = $this->fetchall($sql);
        foreach($value as $val)
        {
            $val->utitle." ".$val->ufirstname." ".$val->ulastname;   
            $status = $val->ustatus;
        }
        return $status;
    }
    
    
    function mob($sessval)
    {
        $sql = " firstimeregd where uemail = '$sessval'";
        $value = $this->fetchall($sql);
        foreach($value as $val)
        {
            echo $val->ucontact;
        }
    }
    
    function email($sessval)
    {
        $sql = " firstimeregd where uemail = '$sessval'";
        $value = $this->fetchall($sql);
        foreach($value as $val)
        {
            echo $val->uemail;
            
        }
        
    }
    
    function getid($sessval)
    {
        $sql = " firstimeregd where uemail = '$sessval'";
        return $val = $this->single($sql, "id");        
    }
    
    function getuserid($sessval){
         $sql = " firstimeregd where uemail = '$sessval'";
         $val = $this->single($sql, "id");
         $sqll = " userdetails where linkid='$val'";
         return $this->single($sqll, "userid");        
    }
    
   // function uid($sessval)
}
?>