<?php
/**
 * Created by PhpStorm.
 * User: alvarofpp
 * Date: 15/02/19
 * Time: 11:49
 */

namespace App\Helpers;


class HashHelper
{
    /**
     * Remove os caracteres que não são desejaveis ao código hash
     * @param $data
     * @return string o novo hash
     */
    public static function removeChars($data)
    {
        return preg_replace("/[\/\.]/", "", $data);
    }
}