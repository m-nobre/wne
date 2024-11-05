<?php

namespace App\Helpers\Core;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;



class Tools {
    public static function Log($message, $var = NULL) {
        Log::info($message);
        if ($var) {
            Log::info($var);
        }
    }

    public static function Key($lenght) {
        if ($lenght) {
            return Str::random($lenght);
        }
        
        return Str::random(rand(16, 64));
    }
}