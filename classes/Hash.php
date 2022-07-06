<?php

class Hash
{
    public static function make($string, $salt = '')
    {
        return hash('sha256', $string . $salt);
    }

    public static function salt($length)
    {
        $chars = "abc434defghijk07lmnopqr125stuvwxyzABCDEFGHIJKLMN45OPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    public static function unique()
    {
        return self::make(uniqid());
    }
}
