<?php

require_once 'core/init.php';

$user = new User();

$error_note = '';

$http_re = '';

if ($user->isLoggedIn()) {

    Redirect::to('index.php');

}

if (Input::get("token")) {
    $validate = new Validate();

    $validation = $validate->check($_POST, array(

        'username' => array('required' => true),

        'password' => array('required' => true)


    ));


    if ($validation->passed()) {

        //log user in

        $user = new User();

        if (is_numeric(Input::get('username'))) {

            $username = Input::get('username');

            $username = Cryptdata::encryptIt($username);

        } else {

            $username = Input::get('username');

        }

        $remember = (Input::get('remember') === 'on') ? true : false;

        $login = $user->login($username, Input::get('password'), $remember);


        if ($login) {

            if ($url = Input::get('http_re')) {
                Redirect::to("$url");
            }

            Redirect::to('index.php');

        } else {

            $error_note .= '<span class="error">Sorry, logging in failed, username or password is incorrect</span>';

        }

    } else {

        foreach ($validation->errors() as $error) {

            $error_note .= "<div class='#'>$error</div>";

        }

    }
}
require_once 'html_com.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <link rel="shortcut icon" href="images/music.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="The free zambia Music download, The free zambia Music download" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="css/jquery.mobile.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/jquery.mobile.js"></script>
</head>
<body>
    <div data-role="page" id="home" class="ui-page-theme-a bg" data-title="Login">

<!-- The Header -->
    <?php require_once 'header.php';?>

    <div class="ui-body ui-body-a">

    <!--Display login messages if any-->
        <?php if($error_note !== ''){echo "<div class='msg_panel ui-corner-all'>$error_note</div>";} ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" autocomplete="off" data-ajax="false" class="p-t ui-open-sans">

            <label for="username">Email or Phone number</label>
            <input type="text" name="username" required id="username" />

            <label for="password">Password</label>
            <input type="password" name="password" required id="password" />

            <label><input type="checkbox" name="remember" data-mini="true"/><span class="">Keep me logged in</span></label>
            <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>"/>
            <input type="hidden" name="http_re" id="http_re" value="<?php echo $http_re; ?>"/>
            <input type="submit" value="Login" class="ui-shadow" />
                <br>
            <div class="text-center ui-mini">
                <a href="register.php">Sign Up</a>
            </div>
                <br>
            <div class="text-center ui-mini">
                <a href="#">Forgot password</a>
            </div>
        </form>
    </div>    

<!-- The Footer -->
    <?php require_once 'footer.php'; ?>
</div>
</body>
</html>