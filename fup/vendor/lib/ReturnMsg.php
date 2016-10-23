<?php

class ReturnMsg {

    public function successDb() {
        return "Success: Data successfully inserted in database";
    }

    public function errorDb() {
        return "Error: An error occurred during process please try again";
    }

    public function dublicateSkip() {
        return "Error: The email address you have entered is already registered ...";
    }

    public function logInsuccess() {
        return "Success: You have successfully registered with us please login to complete your further registration";
    }

    public function waitLogin() {
        return "Success: You have successfully submitted your documents please wait while we are authenticating your documents it can take several days to complete, you will recieve a confirmation mail when we confirmed your documents";
    }

    public function successRegister() {
        return "Success: You have successfully registered with us now you can access to your vendor panel";
    }

}
