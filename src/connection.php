<?php
namespace App;

use \PDO;

class Connection {

    public static function getPDO (): PDO
    {
        return new PDO(
            'mysql:host=127.0.0.1;dbname=restaurant;charset=utf8',
            'restaurant',
            'ax8r9dhacham123', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    
}