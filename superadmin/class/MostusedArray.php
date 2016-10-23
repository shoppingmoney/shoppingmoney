<?php

class TestClass {

    public $keyVal;
    public $keyPlace = 0;

    //put your code here
    public function maxused_num($array) {
        $temp = array();
        $tempval = array();
        $r = 0;
        for ($i = 0; $i <= count($array) - 1; $i++) {
            $r = 0;
            for ($j = 0; $j <= count($array) - 1; $j++) {
                if ($array[$i] == $array[$j]) {
                    $r = $r + 1;
                }
            }
            $tempval[$i] = $r;
            $temp[$i] = $array[$i];
        }
        //fetch max value
        $max = 0;
        for ($i = 0; $i <= count($tempval) - 1; $i++) {
            if ($tempval[$i] > $max) {
                $max = $tempval[$i];
            }
        }
        //get value 
        for ($i = 0; $i <= count($tempval) - 1; $i++) {
            if ($tempval[$i] == $max) {
                $this->keyVal = $tempval[$i];
                $this->keyPlace = $i;
                break;
            }
        }

        // 1.place holder on array $this->keyPlace;
        // 2.number of reapeats $this->keyVal;
        return $array[$this->keyPlace];
    }

}

//$catch = new TestClass();
//$array = array(1, 1, 1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 3, 1, 2, 3, 1, 1, 2, 5, 7, 1, 9, 0, 11, 22, 1, 1, 22, 22, 35, 66, 1, 1, 1);
//echo $catch->maxused_num($array);
