<?php
namespace App\Helpers;

class text {

    public static function excerpt(string $Description, int $limit = 15)
    {
        if (mb_strlen($Description) <= $limit) {
            return $Description;
        } 
        $lastSpace = mb_strpos($Description,' ',$limit);
        return mb_substr($Description, 0, $lastSpace) . '...';  
    }
}