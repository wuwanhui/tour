<?php
namespace App\Http\Common;
class ArrayUtil
{
    public function __construct()
    {
    }

    static function ArrayStringToInt(Array $array = null)
    {
        if ($array == null || count($array) == 0) {
            return $array;
        }
        $newArray = Array();

        foreach ($array as $item) {
            array_push($newArray, (int)trim($item));
        }
        return $newArray;
    }

}