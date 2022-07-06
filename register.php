<?php
require_once 'core/init.php';

$user = new User();

if ($user->isLoggedIn()) {

    Redirect::to('index.php');

}

$error_note = "";
$note = '';

        if (Input::get('phone_number')) {

           if (Input::get('phone_number')) {
                $validate = new Validate();
                $validation = $validate->check($_GET, array(
                    'password' => array(
                        'required' => true,
                        'min' => 6
                    ),
                    'password_again' => array(

                        'matches' => 'password'
                    ),
                    'first_name' => array(
                        'required' => true,
                        'min' => 4,
                        'max' => 50
                    ),
                    'last_name' => array(
                        'required' => true,
                        'min' => 4,
                        'max' => 50
                    ),
                    'gender' => array(
                        'required' => true
                    ),

                    'phone_number' => array(
                        'required' => true,
                        'min' => 8,
                        'number_only' => true,
                        'unique_phone' => 'users'

                    )
                ));
            }

            if ($validation->passed()) {

                $first_name = strtolower(preg_replace('#[^a-z0-9]#i', '', Input::get('first_name')));
                $last_name = strtolower(preg_replace('#[^a-z0-9]#i', '', Input::get('last_name')));
                $pstusername = $first_name;
                $pstusername .= $last_name;
                //start
                function getusername($username)
                {
                    $username = pro_username($username);
                    return $username;
                }

                function pro_username($username)
                {
                    $first_name = Input::get('first_name');
                    $last_name = Input::get('last_name');
                    $pstusername = $first_name;
                    $pstusername .= $last_name;
                    if (!empty ($username)) {
                        $user = DB::getInstance()->query("SELECT username FROM users WHERE username='$username' LIMIT 1");
                        if (!$user->count()) {

                            try {
                                if (!file_exists('user' . "/" . $username)) {
                                    mkdir('user' . "/" . $username, 0777, true);
                                }
                                $user = new User();
                                $salt = Hash::salt(32);
                                $phone_number = Input::get('phone_number');
                                $phone_number = Cryptdata::encryptIt($phone_number);

                               $user->create(array(
                                    'username' => trim(strtolower(preg_replace('#[^a-z0-9]#i', '', $username))),
                                    'password' => Hash::make(Input::get('password'), $salt),
                                    'first_name' => trim(strtolower(preg_replace('#[^a-z0-9]#i', '', Input::get('first_name')))),
                                    'last_name' => trim(strtolower(preg_replace('#[^a-z0-9]#i', '', Input::get('last_name')))),
                                    'gender' => strtolower(Input::get('gender')),
                                
                                    'salt' => $salt,
                                    'email' => trim(strtolower(Input::get('email'))),
                                    'phone_number' => $phone_number,
                                    'joined' => date('Y-m-d H:i:s'),
                                    'groupz' => 1
                                ));

                                  echo "ok";
                               
                            } catch (Exception $e) {
                                die($e->getMessage());
                            }

                        } else {

                            foreach ($user->results() as $dbre) {
                                $db_username = $dbre->username;
                            }

                            $namelength = strlen($pstusername);
                            $subuname = substr($db_username, $namelength);
                            $subuname += 1;
                            $newusername = $pstusername;
                            $newusername .= $subuname;
                            $newusername = getusername($newusername);
                            return $newusername;
                        }
                    }
                }

                getusername($pstusername);
                ///end

            } else {
                foreach ($validation->errors() as $error) {
                    $error_note .= "<span class='error'>" . ucwords(str_ireplace('_', ' ', $error)) . "</span>";
                }

            }
        } else {
            $error_note .= "<span class='error'> Email or Phone number is required</span>";
        }


    echo $error_note;
?>