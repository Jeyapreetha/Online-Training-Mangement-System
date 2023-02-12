<?php
 
class Db
{
    private static $db;
     
    public static function init()
    {
        if (!self::$db)
        {
            self::$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (self::$db->connect_error) {
                die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
            }
        }
        return self::$db;
    }
}