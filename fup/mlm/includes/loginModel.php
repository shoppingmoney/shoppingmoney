<?php
/**
 * Description of loginModel
 *
 * @author Buoyant
 */

include_once 'includes/config.php';



session_start();
class loginModel extends config{
    //put your code here
    function loginmein($user,$pass){
        
        $sql = " firstimeregd where (uemail = '$user' && upassword = '".sha1($pass)."') OR (ucontact = '$user' && upassword = '".sha1($pass)."')";
        $chk = $this->fetchall($sql); 
        if(count($chk)>0)
        {
            foreach($chk as $usr){
				if($usr->status == 1){
					$_SESSION['uname'] = $usr->ufirstname ." ".$usr->ulastname;
				$_SESSION['myemail'] = $usr->uemail;
				}else{
					echo "<script>alert('Your account is deactivated, Please contact admin');window.location = '../index.php';</script>";
					die();
				}
				
			}
			//$_SESSION['myemail'] = $user;
        }
        $pop = $_SESSION['myemail'];
        return $pop;        
    }
}
