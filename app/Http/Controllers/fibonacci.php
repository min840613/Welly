<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fibonacci extends Controller
{
    public function fibonacci($position = 0){

        if ($position <= 0) {
            return 0;
        }
        if ($position < 3) {
            return 1;
        }

        $a = 0;
        $b = 1;

        for ($i = 2; $i <= $position; $i++) {
            $b = $a + $b;
            $a = $b - $a;
        }

        return $b;

    }
}
