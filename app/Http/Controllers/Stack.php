<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Stack extends Controller
{
    public function __construct()
    {
        $this->array = [];
    }

    public function push($element = ''){
        if(empty($element)){
            return '請傳入要加入的參數';
        }
        array_push($this->array, $element);
        return $element;
    }

    public function pop($element = ''){
        if(empty($element)){
            return '請傳入要移除的參數';
        }
        if(in_array($element, $this->array)){
            array_diff($this->array, [$element]);
        }
        return $element;
    }

    public function size(){
        return count($this->array);
    }
}
