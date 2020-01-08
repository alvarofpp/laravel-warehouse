<?php
/**
 * Created by PhpStorm.
 * User: alvarofpp
 * Date: 07/02/19
 * Time: 13:52
 */

namespace App\Widgets;


class CepWidget
{
    // URL que ele usará para realizar a consulta
    public $url;
    // Formato que se tem os dados
    public $format;

    // Formatos que o serviço retorna
    const FORMATO_JSON = 1;
    const FORMATO_JSONP = 2;
    const FORMATO_XML = 3;
    const FORMATO_PIPED = 4;
    const FORMATO_QUERTY = 5;

    // Labels para construção de URL
    const LABEL_FORMATOS = [
        self::FORMATO_JSON => 'json/',
        self::FORMATO_JSONP => 'json/?callback=callback_name',
        self::FORMATO_XML => 'xml/',
        self::FORMATO_PIPED => 'piped/',
        self::FORMATO_QUERTY => 'querty/',
    ];

    /**
     * Construtor
     * @param string|null $url
     * @param int $format
     */
    function __construct(string $url = null, int $format = self::FORMATO_JSON)
    {
        $this->url = is_null($url) ? 'viacep.com.br/ws/' : $url;
        $this->format = in_array($format, array_keys(self::LABEL_FORMATOS)) ? $format : self::FORMATO_JSON;
    }

    /**
     * Realiza a consulta
     * @param string $cep
     * @return bool|string|null
     */
    public function get(string $cep)
    {
        // Caso seja um CEP de tamanho inválido
        if (strlen($cep) != 8) {
            return null;
        }

        $ch = curl_init($this->urlAssemble($cep));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $endereco = curl_exec($ch);

        curl_close($ch);

        return $endereco;
    }

    /**
     * Monta a url de consulta
     * @param string $cep
     * @return string
     */
    private function urlAssemble(string $cep)
    {
        return $this->url . $cep . '/' . self::LABEL_FORMATOS[ $this->format ];
    }
}