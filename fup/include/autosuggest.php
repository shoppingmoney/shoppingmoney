<?php
   include'admin/config.php';
	
		if(isset($_POST['queryString'])) {
			$queryString = mysql_real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {

				$query = mysql_query("SELECT city,code FROM travel_city_code WHERE city LIKE '$queryString%' LIMIT 10");
				echo '<ul>';
					while ($result = mysql_fetch_object($query)) {
	         			echo '<li onClick="fill(\''.addslashes($result->city.' ('.$result->code).')\');">'.$result->city.' ('.$result->code.')</li>';
	         		}
				echo '</ul>';
					
				
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}
	
?>