<?php

class Token
{
    public static function generate()
    {
        return Session::put(Config::get('session/token_name'), md5(uniqid()));
    }

    //check if the token exists or not
    public static function check($token)
    {//<- pass in the token in the parameter
        $tokenName = Config::get('session/token_name');

        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);//delete tokenName
            return true;
        }
        return false;
    }
}