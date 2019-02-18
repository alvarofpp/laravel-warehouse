<?php
/**
 * Created by PhpStorm.
 * User: alvarofpp
 * Date: 18/10/18
 * Time: 11:45
 */

namespace App\Helpers;


class MaskHelper
{
    /**
     * Remove os caracteres que não são digitos
     * @param $data
     * @param $fields
     * @return mixed Retorna o array com os valores tratados
     */
    public static function onlyDigits($data, $fields)
    {
        foreach ($data as $key => $value) {
            if (in_array($key, $fields) && !empty($value)) {
                $data[$key] = preg_replace("/[^0-9]/", "", $value);
            }
        }

        return $data;
    }
}