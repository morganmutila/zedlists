<?php
require_once 'core/init.php';
$user = new User();
if ($user->isLoggedIn()) {
    $uid = $user->data()->id;
    $tm = date("Y-m-d H:i:s");
    $query = DB::getInstance()->query("UPDATE users SET status='OFF', tm='$tm' WHERE id='$uid'");
}
$user->logout();

Redirect::to('index.php');