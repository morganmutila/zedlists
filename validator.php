<?php
//this file used to validate data on sing up page
require_once 'core/init.php';
$user = new User ();


//email check
if (Input::get('action') == 'ec') {
    $email = Input::get('email');

    if (!empty ($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            die ();
        }
        $user = DB::getInstance()->query("SELECT email FROM users WHERE email='$email' LIMIT 1");
        if (!$user->count()) {
            echo 'ok';
        } else {
            echo 'taken';
        }
    }
}
// phone_number check
if (Input::get('action') == 'pn') {
    $phone_number = Input::get('pn');

    if (!is_numeric($phone_number) && !empty ($phone_number)) {
        echo " is not a number";
        die ();
    }
    if (!empty ($phone_number)) {
        $phone_number = Cryptdata::encryptIt($phone_number);

        $user = DB::getInstance()->query("SELECT phone_number FROM users WHERE phone_number='$phone_number' LIMIT 1");
        if (!$user->count()) {
            echo 'ok';
        } else {
            echo 'taken';
        }
    }
}