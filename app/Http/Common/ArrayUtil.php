<?php

class ArrayUtil
{


    public function ArrayStringToInt($array)
    {
        if ($array == null || count($array) == 0) {
            return $array;
        }
        $newArray = Array();

        foreach ($array as $item) {
            array_push($newArray, (int)$item);
        }

        return $newArray;
    }

}