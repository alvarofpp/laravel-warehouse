<?php
/**
 * Created by PhpStorm.
 * User: alvarofpp
 * Date: 18/02/19
 * Time: 13:06
 */

namespace App\Widgets;


use Closure;

class CodigoWidget
{
    // Caracteres que podem serem usados no código do paciente
    public $alphaNumeric;
    // Tamanho do código que pretendo gerar
    public $size;
    // Condição de garantia que o código que gerado corretamente
    public $condition;

    // Tamanho padrão de código
    const DEFAULT_SIZE = 5;

    /**
     * Construtor
     * @param Closure $condition
     * @param int $size
     */
    function __construct(Closure $condition = null, int $size = self::DEFAULT_SIZE)
    {
        $upper = implode('', range('A', 'Z')); // ABCDEFGHIJKLMNOPQRSTUVWXYZ
        $lower = implode('', range('a', 'z')); // abcdefghijklmnopqrstuvwxyz
        $nums = implode('', range(0, 9)); // 0123456789

        $this->alphaNumeric = $upper.$lower.$nums;
        $this->size = $size;
        $this->condition = $condition;
    }

    /**
     * Gera o código desejado
     * @return string
     */
    public function generate()
    {
        // Guardar o valor gerado do código
        $codigo = '';
        // Limite do array de possibilidades de caracteres
        $limit = strlen($this->alphaNumeric) - 1;

        // Gera o novo código
        for ($i = 0; $i < $this->size; $i++) {
            $codigo .= $this->alphaNumeric[rand(0, $limit)];
        }

        // Caso exista condição, verifica se atende
        $condition = $this->condition;
        if ((! is_null($condition)) && (! $condition($codigo))) {
            $codigo = $this->generate();
        }

        return $codigo;
    }
}