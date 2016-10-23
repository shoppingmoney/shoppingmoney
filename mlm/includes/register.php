<?php

//include_once '../setup.php';
date_default_timezone_set('Asia/Calcutta'); 
include_once 'config.php';
error_reporting(0);
//print_r($_POST);
$column = "uemail,upassword,ufirstname,ulastname,udate,ucontact,utitle,ustatus,refid";
$value = "'$email','" . sha1($password) . "','" . ucfirst($name) . "','" . ucfirst($lastname) . "',now(),'$phone','$title','0','$chklink'";

function registerme($column, $value, $email, $update=0){
    $conf = new config();
    $chk = $conf->checkAvailablity("firstimeregd where uemail='$email'");
    if ($chk == 0 || empty($chk)) {
            $val = $conf->insertValue("firstimeregd", $column, $value);
            if($update>0)
            {
                //echo "done";
                 $conf->updateValue("firstimeregd set refid='$update' where id='$val'");
            }            
            echo "<script>alert('Your account is created, Please complete your KYC !!');</script>";
    } else {
        echo "<script>alert('This email is already registered!!');</script>";
    }
    return $val;
}

$dob = $dob_year . "-" . $dob_month . "-" . $dob_date;

$dob=date_format(date_create($dob),"Y/m/d");
    //pancard
    $pan=$_FILES['pancard']['name'];
    //$imgextndd = substr(strrchr($pan,'.'), 1);
    if($pan!='') {
        $savimgpan = time().$pan;
        $action2 = move_uploaded_file($_FILES['pancard']['tmp_name'],"upload/".$savimgpan);
    }
    //adharcard
    $adhar=$_FILES['adharcard']['name'];
    //$imgextndd = substr(strrchr($adhar,'.'), 1);
    if($adhar!='') {
        $savimgadhar = time().$adhar;
        $action3 = move_uploaded_file($_FILES['adharcard']['tmp_name'],"upload/".$savimgadhar);
    }
    //voterid
    $voter=$_FILES['votercard_img']['name'];
    //$imgextndd = substr(strrchr($voter,'.'), 1);
    if($voter!='') {
        $savimgvoter = time().$voter;
        $action2 = move_uploaded_file($_FILES['votercard_img']['tmp_name'],"upload/".$savimgvoter);
    }
	 //driving license
    $dl=$_FILES['drivilinglicense_img']['name'];
    //$imgextndd = substr(strrchr($voter,'.'), 1);
    if($dl!='') {
        $savimgdl = time().$dl;
        $action2 = move_uploaded_file($_FILES['drivilinglicense_img']['tmp_name'],"upload/".$savimgdl);
    }
	 //personal image
    $personalimg=$_FILES['pimage']['name'];
    //$imgextndd = substr(strrchr($voter,'.'), 1);
    if($personalimg!='') {
        $savimgpimage = time().$personalimg;
        $action2 = move_uploaded_file($_FILES['pimage']['tmp_name'],"upload/".$savimgpimage);
    }
   
$column_r = "dob,father_husband,mother,occupation,nomine_title,nomniee,relation_nominee,address,state,
        district,city,pin,paddress,pstate,pdistrict,pcity,ppin,pan,idproof,photo,cancel_chk,pancard,adharcard,voterid,voterid_img,status,drivinglicense,drivinglicense_img,personal_image";

$value_r = "'$dob','$fatherhusband','$mother','$occupation',
        '$nomnee_title','$nomineename','$relationwithnominee','$address','$state','$district',
        '$area','$pin','$paddress','$pstate','$pdistrict','$parea','$ppin','$pan_card','$aadhar_card','$savimgphoto','$savimgcheck','$savimgpan','$savimgadhar','$votercardno','$savimgvoter','0','$dl_no','$savimgdl','$savimgpimage'";


//creating userid for for registration.

$today = date("dmy");//getting current date.
//$code = $conf->single("state_district WHERE pin='$pin' || district = '$district'",'district_code');
//$pi = substr($pin, -2,2); 
$uid = "SM".$today;


//photo upload
 //echo "<script>alert('$uid');</script>";

function finalregistration($column_r, $value_r, $bcolmn, $uid, $user_id, $refid,$pin,$name) {
    $conf = new config();
	$code = $conf->single("state_district WHERE pin='$pin'",'district_code');
	if(empty($code) || $code == ''){
		echo "<script>alert('Sorry we are not serving in this area please contact support@shoppingmoney.in.');</script>";
		return 0;
	}
    $chk = $conf->insertValue('userdetails', $column_r, $value_r, $uid);
   $linkid = $user_id;
   $cntpin = $conf->single("userdetails WHERE pin='$pin'",'count(id)') + 1;
   $pi = substr($pin, -2,2); 
   $name = str_replace(" ","",$name);
    if ($chk > 0 || !empty($chk)) {
        //creating userid.
        $val = $uid.$code.$pi.$cntpin;
		$valref = $name.(10000+$linkid);
		$ref = "http://shoppingmoney.in/ref/".$valref;
        $ref = str_replace(" ", "", $ref);
        $table = "userdetails set linkid='$linkid', refralink='$ref',userid='$val' where id='$chk'";
        $conf->updateValue($table);

        $conf->updateValue("firstimeregd set ustatus='1', refid='$refid' where id=$linkid ");//update for complete kyc
        
        echo "<script>alert('Your KYC is Waiting For Verification From Admin.');</script>";
    }
    
    return $linkid;
}

function bankdetails($bcolmn, $bvalue) {
    $conf = new config();
    $conf->insertValue("bankdetails", $bcolmn, $bvalue);
	echo "<script>window.location='panel.php';</script>";
}
?>
