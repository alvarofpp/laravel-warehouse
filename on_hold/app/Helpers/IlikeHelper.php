<?php
/**
 * Created by PhpStorm.
 * User: alvarofpp
 * Date: 17/10/18
 * Time: 13:08
 */

namespace App\Helpers;


use Illuminate\Database\Eloquent\Builder;

/**
 * Essa classe foi criada com o intuito de automatizar as consultas WHERE com ILIKE via Ajax que envolve
 * busca em campos especificos, indicados pela string de busca.
 * Class IlikeHelper
 * @package App\Helpers
 */
class IlikeHelper
{
    /*
     * Caracter de identificação de busca.
     */
    const SEARCH_CHAR = ':';

    /**
     * Trata os valores recebidos para realizar corretamente a consulta do ILIKE
     * @param $class
     * @param string $field
     * @param string $search
     * @return Builder
     */
    public static function ilike($class, string $field, string $search) : Builder
    {
        // Pega a primeira ocorrência de $field em $search
        if (strpos($search, self::SEARCH_CHAR) === false) {
            return $class::where($field, 'ILIKE', "%$search%");
        }

        return $class::where(function ($query) use ($field, $search) {
            // Posição inicial do valor que queremos procurar
            $pos = strpos($search, self::SEARCH_CHAR) + 1;

            // Retorna o valor, sem a indicação de busca
            $searchValue = substr($search, $pos);

            // Monta a query
            $query->where($field, 'ILIKE', "%$searchValue%");
        });
    }
}