<?php

namespace App\Utility;

class Helper
{

    public static function sum($nums)
    {
        $result = 0;
        foreach ($nums as $key => $value) {
            $result += $value;
        }
        return $result;
    }    
    
    public static function getFullName($firstName,$lastName)
    {
        $result = $firstName.' '.$lastName;
        return $result;
    }
}
