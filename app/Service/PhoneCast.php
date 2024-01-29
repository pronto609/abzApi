<?php

namespace App\Service;

class PhoneCast
{
    public static function cast($phone)
    {
        return preg_replace('#[+\s_)(-]+#', '', $phone);
    }
}
