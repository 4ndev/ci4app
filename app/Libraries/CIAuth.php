<?php
namespace App\Libraries;

class CIAuth
{
    public static function setCIAuth($result)
    {
        $session = session();
        $array = ['logged_in' => true];
        $userdata = $result;
        $session->set($array);
        $session->set('userdata', $userdata);
    }

    public static function id()
    {
        $session = session();
        if($session->has('logged_in')){
            return $session->get('userdata')['id'];
        } else {
            return false;
        }
    }

    public static function check()
    {
        $session = session();
        return $session->has('logged_in');
    }

    public static function forget()
    {
        $session = session();
        $session->remove('logged_in');
        $session->remove('userdata');
    }

    public static function user()
    {
        $session = session();
        if($session->has('logged_in')){
            return $session->get('userdata');
        } else {
            return false;
        }
    }
}