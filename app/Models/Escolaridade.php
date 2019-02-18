<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\Escolaridade.
 *
 * @property int $id
 * @property string $descricao
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $usuarios
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Escolaridade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Escolaridade whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Escolaridade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Escolaridade whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 */
class Escolaridade extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $table = 'escolaridades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao',
    ];

    /**
     * Constantes.
     */
    const FUNDAMENTAL_INCOMPLETO = 1;
    const FUNDAMENTAL_COMPLETO = 2;
    const MEDIO_INCOMPLETO = 3;
    const MEDIO_COMPLETO = 4;
    const SUPERIOR_INCOMPLETO = 5;
    const SUPERIOR_COMPLETO = 6;
    const POS_INCOMPLETO = 7;
    const POS_COMPLETO = 8;
    const MESTRADO_INCOMPLETO = 9;
    const MESTRADO_COMPLETO = 10;
    const DOUTOR_INCOMPLETO = 11;
    const DOUTOR_COMPLETO = 12;

    const ROLE_LABELS = [
        self::FUNDAMENTAL_INCOMPLETO => 'Fundamental - Incompleto',
        self::FUNDAMENTAL_COMPLETO => 'Fundamental - Completo',
        self::MEDIO_INCOMPLETO => 'Médio - Incompleto',
        self::MEDIO_COMPLETO => 'Médio - Completo',
        self::SUPERIOR_INCOMPLETO => 'Superior - Incompleto',
        self::SUPERIOR_COMPLETO => 'Superior - Completo',
        self::POS_INCOMPLETO => 'Pós-graduação (Lato senso) - Incompleto',
        self::POS_COMPLETO => 'Pós-graduação (Lato senso) - Completo',
        self::MESTRADO_INCOMPLETO => 'Pós-graduação (Stricto sensu, nível mestrado) - Incompleto',
        self::MESTRADO_COMPLETO => 'Pós-graduação (Stricto sensu, nível mestrado) - Completo',
        self::DOUTOR_INCOMPLETO => 'Pós-graduação (Stricto sensu, nível doutor) - Incompleto',
        self::DOUTOR_COMPLETO => 'Pós-graduação (Stricto sensu, nível doutor) - Completo',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany(User::class, 'escolaridade_id', 'id');
    }
}
