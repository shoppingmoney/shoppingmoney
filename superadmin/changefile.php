<?php
$id = $_GET['id'];
$ids = explode(",",$id);
$log_directory = 'excel_upload';
//$results_array = array();
$csv = 0;
if (is_dir($log_directory))
{
        if ($handle = opendir($log_directory))
        {
                //Notice the parentheses I added:
                while(($file = readdir($handle)) !== FALSE)
                {       $fl = explode('_',$file);
                        //$results_array[] = $fl[0];
						if(in_array($fl[0],$ids)){
							$csv = $file;
							break;
						}
                }
                closedir($handle);
        }
}

//Output findings
if($csv == 0){
	echo "<span style='color: red;'>You have selected wrong category ,try again.</span>";
}else{?>
	<a style='color: green;' href="<?=$log_directory?>/<?=$csv?>" download>Download your excel here : <?=$csv?> </a>
<?php }
?>