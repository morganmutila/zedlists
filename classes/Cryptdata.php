<?php

/**
 * vision 1.5
 * zedappdev inc
 *(c) 2014
 */
class Cryptdata
{

    public static function encryptIt($data)
    {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';

        $dataEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $data, MCRYPT_MODE_CBC, md5(md5($cryptKey))));

        return ($dataEncoded);
    }

    public static function decryptIt($data)
    {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
        $dataDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($data), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return ($dataDecoded);
    }
}

?>