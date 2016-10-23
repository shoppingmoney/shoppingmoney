<?php

class Fileupload {

    public $handler;
    public $validation;

    public function execute($fileName, $fileDir, $round) {
        try {
            $flag = false;
            $this->handler = $_FILES[$fileName]['name'][$round];
            $this->validation = getimagesize($_FILES[$fileName]['tmp_name'][$round]);

            //print_r($this->validation);

            if ($this->validation['mime'] == 'image/jpeg' || $this->validation['mime'] == 'image/png' || $this->validation['mime'] == 'image/jpg' || $this->validation['mime'] == 'image/gif') {
                //image type validate allowed type are jpg,jpeg,gif,png only
                $flag = true;
            } else {
                $flag = false;
            }
//            if ($this->validation[0] <= 760 && $this->validation[0] >= 250) {
//                //image width validate
//                $flag = true;
//            } else {
//                $flag = false;
//            }
//            if ($this->validation[1] <= 871 && $this->validation[1] >= 200) {
//                //image height validate
//                $flag = true;
//            } else {
//                $flag = false;
//            }

            if ($flag == true) {
                move_uploaded_file($_FILES[$fileName]['tmp_name'][$round], $fileDir . $this->handler);
                return $this->handler;
            } else {
                return false;
            }
            throw new Exception();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

}
?>


