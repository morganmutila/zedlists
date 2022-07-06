<?php
//here is the session start function build in php, to allow users to login

// Turn off all error reporting
error_reporting(0);

date_default_timezone_set("Africa/Lusaka");
session_start();
// crate a config file
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'zedlists'
    ),//this will connect to mysql database array, "mysql settings"
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => '604800'// expiry in a week converted into second
    ),//this config will remember user in a cookie file
    'session' => array(// session and token
        'session_name' => 'user',
        'token_name' => 'token'
    ),
);
// auto loading of class, using spl "standard php library"
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});
require_once 'functions/sanitize.php';
//remebering the user cookie
if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    //hash checking
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if ($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}