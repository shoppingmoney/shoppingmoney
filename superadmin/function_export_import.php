<?php
	include 'db.php';
		/*****Export Excel table  Start*****/
			if(isset($_POST['search']) )
			{
				 if(!empty($_POST['cat_name'])){
					$cat_name = mysqli_real_escape_string($conn,$_POST['cat_name']);
					  $query = mysqli_query($conn,"select * from product_category where category_name='".$cat_name."'");
					 
					 if($fetch = mysqli_num_rows($query))
					 {
						 
					 
					 
					 foreach($query as $cat){
		      $category_ids[]=$cat['id'];
	           }
	
	
			 $allready = array();
			 
			$nota = array();
			
			foreach($category_ids as $category_id)
			{
				$table = "specification_".$category_id ;
				$qr=mysqli_query($conn, "SELECT `id` FROM ".$table);
				
				if($qr){
					$result = mysqli_num_rows($qr);
					
						$allready[]=$category_id;
						
					//echo "IDS with allready specification <br/>";
					//print_r($allready);
					
				  
				}
				
				else
				{
					echo "<script>
							  alert('This product Specification Not Availavle');
							  window.location.href='csvuploader_san.php';
							 </script>";
				}
				
			  }
			            //echo "IDS with allready specification <br/>";
						//echo "Product Catogary Id".$allready['0'].''."Spacification tabale name".$allready['1']."</br>";
			//echo "<h1 style='color:green'>IDS with allready specification </h1><br/>";
			//var_dump($allready);
			//print_r($allready);
			
			$i = count($allready);
			for($k=0;$k<$i;$k++)
			   {
				   //echo $allready[$k]."<br>";
				   //die;
				   $query =mysqli_query($conn,"select * from product_category where id = '".$allready[$k]."'");
				   $fetch = mysqli_fetch_assoc($query);
				    $table =  "specification_".$fetch['id'];
				  
				  		//include 'db.php';
		//$table = $_POST['cat_name']; 
		$filename = "users_export"; 
		$sql = "Select * from $table";
		$result = mysqli_query($conn,$sql) or die("Couldn't execute query:<br>" . mysqli_error(). "<br>" . mysqli_errno()); 
		$file_ending = "xls";
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=$filename.xls");
		header("Pragma: no-cache"); 
		header("Expires: 0");
		$sep = "\t"; 
		$names = mysqli_fetch_fields($result) ;
		foreach($names as $name){
		    print ($name->name . $sep);
		    }
		print("\n");
	/*	while($row = mysqli_fetch_row($result)) {
		    $schema_insert = "";
		    for($j=0; $j<mysqli_num_fields($result);$j++) {
		        if(!isset($row[$j]))
		            $schema_insert .= "NULL".$sep;
		        elseif ($row[$j] != "")
		            $schema_insert .= "$row[$j]".$sep;
		        else
		            $schema_insert .= "".$sep;
		    }
			
		    $schema_insert = str_replace($sep."$", "", $schema_insert);
		    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
		    $schema_insert .= "\t";
		    print(trim($schema_insert));
		    print "\n";
		}
			*/	
			   }
					 } else
				{
					echo "<script>
							  alert('This product category  Not Availavle');
							  window.location.href='csvuploader_san.php';
							 </script>";
				}
					
				 }	//
				else
				{
					echo "<script>
							  alert('please select cat_name');
							  window.location.href='csvuploader_san.php';
							 </script>";
				}
			   }
			//die();	
		
			
				
			
			
			
			/*****Export Excel table End*****/
		
		/*****Import Excel table  Start*****/
		if(isset($_POST['upload_excel']) )
		   {
			   if(isset($_FILES["csv"])) 
			   {
				   //echo "jai shre ram ";
				   
	
	
	
	/************************ YOUR DATABASE CONNECTION START HERE   ****************************/
	
	define ("DB_HOST", "localhost"); // set database host
	define ("DB_USER", "root"); // set database user
	define ("DB_PASS",""); // set database password
	define ("DB_NAME","shopping_demo"); // set database name
	
	$link = mysqli_connect("localhost", "root", "","shopping_demo") or die("Couldn't make connection.");
	
	//$db = mysqli_select_db(DB_NAME, $link) or die("Couldn't select database");
	
	$databasetable = "	specification_10";
	
	/************************ YOUR DATABASE CONNECTION END HERE  ****************************/
	
	
	set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes_san/');
	include 'PHPExcel/IOFactory.php';
	//include 'upload.php';
	
	
	
	//if there was an error uploading the file
	if ($_FILES["csv"]["error"] > 0) {
	echo "Please select file" . $_FILES["csv"]["error"] . "<br />";
	}
	else {
	if (file_exists('storagename/'.$_FILES["csv"]["name"])) {
	 unlink('storage_excel/'.$_FILES["csv"]["name"]);
	//die();
	}
	$storagename = $_FILES["csv"]["name"];
	//die();
	$uploadedStatus = move_uploaded_file($_FILES["csv"]["tmp_name"], "storage_excel/". $storagename);
	 $inputFileName = 'storage_excel/'.$storagename;
	
	// This is the file path to be uploaded.
	//$inputFileName = 'discussdesk.xlsx'; 
	
	try {
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	} catch(Exception $e) 
	          {
		die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	           }
	
	
	$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	//print_r($allDataInSheet);
	//die();
	$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
	
	
	for($i=2;$i<=$arrayCount;$i++)
	{
	  $product_id = trim($allDataInSheet[$i]["B"]);
	  $bluetooth_bluetooth_version = trim($allDataInSheet[$i]["C"]);
	  $general_details_of_headset_type_of_headset = trim($allDataInSheet[$i]["D"]);
	  $mobile_tablets_accessories_warranty_warranty_type = trim($allDataInSheet[$i]["E"]);
	  $mobile_tablets_accessories_warranty_warranty_duration = trim($allDataInSheet[$i]["F"]);
	  $warranty_details_duration = trim($allDataInSheet[$i]["G"]);
	  $general_details_of_headset_wired_wireless = trim($allDataInSheet[$i]["H"]);
	  $power_and_battery_stand_by_time = trim($allDataInSheet[$i]["I"]);
	  $warranty_details_warranty_available = trim($allDataInSheet[$i]["J"]);
	  $connectivity_headphone_jack = trim($allDataInSheet[$i]["K"]);
	  $earphone_headset_sound_features_frequency = trim($allDataInSheet[$i]["L"]);
	  $earphone_headset_sound_features_headphone_driver_units = trim($allDataInSheet[$i]["M"]);
	  $connectivity_connector_plating = trim($allDataInSheet[$i]["N"]);
	  $controls_other_control_features = trim($allDataInSheet[$i]["O"]);
	  $sound_features_other_sound_features = trim($allDataInSheet[$i]["P"]);
	  $microphone_features_microphone_type = trim($allDataInSheet[$i]["Q"]);
	  $additional_features_other_features = trim($allDataInSheet[$i]["R"]);
	  $warranty_details_warranty_details = trim($allDataInSheet[$i]["S"]);
	  $what_is_in_the_box_sales_package = trim($allDataInSheet[$i]["T"]);
	  $connectivity_usb_support_multi_select = trim($allDataInSheet[$i]["U"]);
	  $warranty_details_warranty_service_type = trim($allDataInSheet[$i]["V"]);
	  $what_is_in_the_box_items_in_the_box_multi_select = trim($allDataInSheet[$i]["W"]);
	  $general_details_of_headset_suitable_for = trim($allDataInSheet[$i]["X"]);
	  $connectivity_cord_type = trim($allDataInSheet[$i]["Y"]);
	  $earphone_headset_sound_features_sensitivity = trim($allDataInSheet[$i]["Z"]);
	  $key_feature_series = trim($allDataInSheet[$i]["AA"]);
	  $general_details_of_headset_headset_design = trim($allDataInSheet[$i]["AB"]);
	  $wireless_wireless_type = trim($allDataInSheet[$i]["AC"]);
	  $key_feature_model_name = trim($allDataInSheet[$i]["AD"]);
	  $key_feature_lifestyle = trim($allDataInSheet[$i]["AE"]);
	  $key_feature_model_id = trim($allDataInSheet[$i]["AF"]);
	  $key_feature_part_number = trim($allDataInSheet[$i]["AG"]);
	  $dimensions_wholesale_dimension_l_b_h_ = trim($allDataInSheet[$i]["AH"]);
	  $controls_call_controls = trim($allDataInSheet[$i]["AI"]);
	  $controls_music_controls_multi_select = trim($allDataInSheet[$i]["AJ"]);
	  $earphone_headset_sound_features_impedance = trim($allDataInSheet[$i]["AK"]);
	  $key_feature_brand = trim($allDataInSheet[$i]["AL"]);
	  $sound_features_maximum_power_input = trim($allDataInSheet[$i]["AM"]);
	  $microphone_features_microphone_frequency = trim($allDataInSheet[$i]["AN"]);
	  $power_and_battery_charging_time = trim($allDataInSheet[$i]["AO"]);
	  $controls_switch_between_call_and_music_multi_select = trim($allDataInSheet[$i]["AP"]);
	  $power_and_battery_talk_time = trim($allDataInSheet[$i]["AQ"]);
	  $additional_features_energy_saving = trim($allDataInSheet[$i]["AR"]);
	  $date = trim($allDataInSheet[$i]["AS"]);
	  //$date = trim($allDataInSheet[$i]["AQ"]);
	  //$user_email_id = trim($allDataInSheet[$i]["AR"]);
	
	 
	 
	 
	//die();
	
	
	$query = "SELECT * FROM specification_10 WHERE product_id = '".$product_id."' ";
	$sql = mysqli_query($link,$query);
	$recResult = mysqli_fetch_array($sql);
	$existName = $recResult["name"];
	
	//var_dump($existName);
	//die;
	
	if($existName=="") 
	  {
		//echo"jai shri ram";
	$insertTable= mysqli_query($link,"INSERT INTO `specification_10`(`id`, `product_id`, `bluetooth_bluetooth_version`,
	 `general_details_of_headset_type_of_headset`, `mobile_tablets_accessories_warranty_warranty_type`, 
	 `mobile_tablets_accessories_warranty_warranty_duration`, `warranty_details_duration`, 
	 `general_details_of_headset_wired_wireless`, `power_and_battery_stand_by_time`, 
	 `warranty_details_warranty_available`, `connectivity_headphone_jack`, `earphone_headset_sound_features_frequency`, 
	 `earphone_headset_sound_features_headphone_driver_units`, `connectivity_connector_plating`, 
	 `controls_other_control_features`, `sound_features_other_sound_features`, `microphone_features_microphone_type`,
	 `additional_features_other_features`, `warranty_details_warranty_details`, `what_is_in_the_box_sales_package`,
	 `connectivity_usb_support_multi_select`, `warranty_details_warranty_service_type`,
	 `what_is_in_the_box_items_in_the_box_multi_select`, `general_details_of_headset_suitable_for`, 
	 `connectivity_cord_type`, `earphone_headset_sound_features_sensitivity`, `key_feature_series`,
	 `general_details_of_headset_headset_design`, `wireless_wireless_type`, `key_feature_model_name`,
	 `key_feature_lifestyle`, `key_feature_model_id`, `key_feature_part_number`, `dimensions_wholesale_dimension_l_b_h_`,
	 `controls_call_controls`, `controls_music_controls_multi_select`, `earphone_headset_sound_features_impedance`,
	 `key_feature_brand`, `sound_features_maximum_power_input`, `microphone_features_microphone_frequency`,
	 `power_and_battery_charging_time`, `controls_switch_between_call_and_music_multi_select`, `power_and_battery_talk_time`,
	 `additional_features_energy_saving`, `date`) VALUES ('','$product_id','$bluetooth_bluetooth_version',
	 '$general_details_of_headset_type_of_headset','$mobile_tablets_accessories_warranty_warranty_type',
	 '$mobile_tablets_accessories_warranty_warranty_duration','$warranty_details_duration','$general_details_of_headset_wired_wireless',
	 '$power_and_battery_stand_by_time','$warranty_details_warranty_available','$connectivity_headphone_jack',
	 '$earphone_headset_sound_features_frequency','$earphone_headset_sound_features_headphone_driver_units',
	 '$connectivity_connector_plating','$controls_other_control_features',
	 '$sound_features_other_sound_features','$microphone_features_microphone_type','$additional_features_other_features',
	 '$warranty_details_warranty_details','$general_details_of_headset_wired_wireless','$warranty_details_warranty_details',
	 '$what_is_in_the_box_sales_package','$what_is_in_the_box_items_in_the_box_multi_select',
	 '$general_details_of_headset_suitable_for','$connectivity_cord_type',
	 '$earphone_headset_sound_features_sensitivity','$key_feature_series','$general_details_of_headset_headset_design',
	 '$wireless_wireless_type','$key_feature_model_name ','$key_feature_lifestyle','$key_feature_model_id',
	 '$key_feature_part_number','$dimensions_wholesale_dimension_l_b_h_ ','$controls_call_controls',
	 '$controls_music_controls_multi_select','$earphone_headset_sound_features_impedance','$key_feature_brand',
	 '$sound_features_maximum_power_input','$microphone_features_microphone_frequency ','$power_and_battery_charging_time',
	 '$controls_switch_between_call_and_music_multi_select','$power_and_battery_talk_time','$additional_features_energy_saving'
	 ,'$date')");
	if($insertTable)
	{
		echo "<script>
	                  alert('Record has been added.');
	                  window.location.href='index.php';
	                 </script>";
	}
	else
	{
	    echo "<script>
	                  alert('Record has been Failed.');
	                  window.location.href='index.php';
	                 </script>";	
	}
	
	//echo $msg = 'Record has been added. <div style="Padding:20px 0 0 0;"><a href="">Go Back to tutorial</a></div>';
	
	      }
	else {
	//echo $msg = 'Record already exist. <div style="Padding:20px 0 0 0;"><a href="">Go Back to tutorial</a></div>';
	echo "<script>
	                  alert('Record already exist.');
	                  window.location.href='index.php';
	                 </script>";
	}	  
	
	
	}
	
	}
	
	
	
	//echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>".$msg."</div>";
			   }
		   }
		   
	?>