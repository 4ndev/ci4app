<?php
namespace App\Libraries;

class Hash
{
    public static function make($password)
    {
        $options = ['cost' => 11];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public static function check($password, $db_hashed)
    {
        return password_verify($password, $db_hashed);
    }
}