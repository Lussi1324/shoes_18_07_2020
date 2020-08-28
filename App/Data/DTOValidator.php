<?php

namespace App\Data;


class DTOValidator
{
    /**
     * @param $min
     * @param $max
     * @param $value
     * @param $type
     * @param $fieldName
     * @throws \Exception
     */
    public static function validate($min, $max, $value, $type, $fieldName=null)
    {

        if ($type === "text" && $fieldName !== "Price") {
            if (mb_strlen($value) < $min || mb_strlen($value) > $max) {
                throw new \Exception("The given {$fieldName} must be between $min and $max characters!");
            }
        } else if($fieldName === "Price") {
                if($value < 0){

                    throw new \Exception("{$fieldName} must be positive number!");
                }
            }
        }


}