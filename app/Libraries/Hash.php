<?php
namespace App\Libraries;

class Hash
{
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function verify($password, $db_hashed)
    {
        return password_verify($password, $db_hashed);
    }
}