<?php

class Helpers {

    var $Filepath = "badwords/badwords.txt";

    public function crypt($str) {
        try {
            return crypt($str, 'SH');
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

//random string generator
    public function randomStr() {
        try {
            $length = 10;
            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$^&*~`";
            $strlen = strlen($str);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $str[rand(0, $strlen - 1)];
            }
            return $randomString;
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

//base url handler
    public function urlHandler() {
        try {
            return $_SERVER['HTTP_HOST'];
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

//crypt url id    
    public function cryptUrlID($urlID) {
        try {
            return base64_encode($urlID);
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

//decrypt url id  
    public function decryptUrlId($urlID) {
        try {
            return base64_decode($urlID);
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

//cookie helper
    public function cookieHelper($name, $value) {
        try {
            return setcookie($name, $value, time() + (86400 * 30), "/");
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

//get cookie helper
    public function getcookieHelper($name) {
        try {
            if (!isset($_COOKIE[$name])) {
                return null;
            } else {
                return $_COOKIE[$name];
            }
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function keepPostSecure($str) {
        try {
            if ($str == null || $str == '') {
                return 0;
            }
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function KeepUrlVarSecure($str) {
        try {
            return utf8_decode(urlencode($str));
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function xtreamTrim($str) {
        try {
            $case = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
            $length = strlen($str);
            $concnate = null;
            for ($i = 0; $i < $length; $i++) {
                if (in_array($str[$i], $case)) {
                    $concnate .= $str[$i];
                } else {
//                    to avoid break and insert your own space insted of randoem fonts use this
//                    $concnate .= ' ';
                    break;
                }
            }
            return $concnate;
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    //not null array
    public function foreachLoop($array) {
        try {
            $count = 0;
            foreach ($array as $count) {
                $count++;
            }
            return $count;
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function Sensers($str) {
        try {
            $Path = $this->Filepath;
            $myfile = fopen("$Path", "r") or die("Unable to open file!");
            $words = fread($myfile, filesize("$Path"));
            $catch = explode(",", $words);
            if (in_array($str, $catch)) {
                return "Error Wrong word used by You";
            }
            fclose($myfile);
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function escapeStr($value) {
        try {
            $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
            $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");
            return str_replace($search, $replace, $value);

            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function validAte($str) {
        try {
            if ($str == null || $str == '') {
                return false;
            } else {
                return true;
            }
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    

    public function systemId() {
        try {
            return session_id();
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

public function loopEnd($arr){ 
$count = 0;
$temp = array();
for($i=0;$i<count($arr);$i++){
	for($j=0;$j<count($arr);$j++){
		if($arr[$i]==$arr[$j]){
			$count=$count+1;
		}
	}
	if($count%2 == 0){
		//skip here
	}else{
		$temp[$i]=$arr[$i];
	}
	//$temp[$i]=$count;
	unset($count);
}
return $temp;
}
//$arr = array('Apple','Android Phone','Apple','Apple','Apple');
//print_r(loopEnd($arr));


   public function LocationFinder() {
        try {
            $ip = $_SERVER['REMOTE_ADDR'];
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
            return $details->city;
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }
	// date formatting
		
		function dateFormate($dt){
			$d = explode("-",$dt);
			$result = $d[2]."-".$d[1]."-".$d[0];
			return $result;
		}

}

?>
