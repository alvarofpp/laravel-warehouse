<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Perfil.
 *
 * @method static mixed driver(string|null $name = null)
 * @method static bool checar()
 * @method static integer|null id()
 * @method static string|null tipo()
 * @method static \App\Models\Perfil|null recuperar()
 * @method static \App\Models\Traits\Papel|null papel()
 * @method static \App\Models\Instituicao|null instituicao()
 */
class Perfil extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'perfil';
    }
}
