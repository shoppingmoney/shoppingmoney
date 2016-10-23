<?php
  $conn = mysqli_connect("localhost","root","","shopping_demo");
  $query = mysqli_query($conn,"select * from product_category"); 
  $rows = mysqli_num_rows($query);
  $category_ids=array();
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
				   $nota[]=$category_id;
				}
			
		  }
		            //echo "IDS with allready specification <br/>";
					//echo "Product Catogary Id".$allready['0'].''."Spacification tabale name".$allready['1']."</br>";
		echo "<h1 style='color:green'>IDS with allready specification </h1><br/>";
		//var_dump($allready);
		//print_r($allready);
		
		$i = count($allready);
		for($k=0;$k<$i;$k++)
		   {
			   //echo $allready[$k]."<br>";
			   //die;
			   $query =mysqli_query($conn,"select * from product_category where id = '".$allready[$k]."'");
			   $fetch = mysqli_fetch_assoc($query);
			   echo "<pre>".$fetch['category_name'].' '."Spacification table ==>  specification_".$fetch['id']."</pre>";
		   }
		   
		//print_r($allready);
		
		//echo $allready['id'];
		echo"<br><br>";
		
		echo "<h1 style='color:red'>IDS with no specification </h1><br/>";
		//var_dump($nota);
		
		$a = count($nota);
		for($b=0;$b<$a;$b++)
		   {
			   //echo $allready[$k]."<br>";
			   //die;
			   $query =mysqli_query($conn,"select * from product_category where id = '".$nota[$b]."'");
			   $fetch = mysqli_fetch_assoc($query);
			   echo "<pre>".$fetch['category_name'].' '."Spacification table ==>  specification_".$fetch['id']."</pre>";
		   }
		//$qr=mysqli_query($conn, "select * from specification_598juh");
		//var_dump($qr);
		
		/*
		$abc= mysqli_query($conn,"describe specification_795");
		$st = "";
		foreach($abc as $a){print_r($a);}
		//var_dump($st);
		*/
		

?>