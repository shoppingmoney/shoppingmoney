<?php

class Fileupload {

    public $handler;
    public $validation;
    public $n_width = 227;
    public $n_height = 261;

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

                if ($this->validation['mime'] == "image/jpeg") {
                    $im = imagecreatefromjpeg($fileDir . $this->handler);
                    $width = imagesx($im);
                    $height = imagesy($im);
                    $this->n_height = ($this->n_width / $width) * $height;
                    $newimage = imagecreatetruecolor($this->n_width, $this->n_height);
                    imagecopyresized($newimage, $im, 0, 0, 0, 0, $this->n_width, $this->n_height, $width, $height);
                    imagejpeg($newimage, $fileDir . "thumb/" . $this->handler);
                    chmod($fileDir . "thumb/" . $this->handler, 0777);
                }
                if ($this->validation['mime'] == "image/png") {
                    $im = imagecreatefrompng($fileDir . $this->handler);
                    $width = imagesx($im);
                    $height = imagesy($im);
                    $this->n_height = ($this->n_width / $width) * $height;
                    $newimage = imagecreatetruecolor($this->n_width, $this->n_height);
                    imagecopyresized($newimage, $im, 0, 0, 0, 0, $this->n_width, $this->n_height, $width, $height);
                    imagepng($newimage, $fileDir . "thumb/" . $this->handler);
                    chmod($fileDir . "thumb/" . $this->handler, 0777);
                }

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


