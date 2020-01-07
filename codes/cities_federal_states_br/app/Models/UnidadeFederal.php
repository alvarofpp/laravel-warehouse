<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\UnidadeFederal.
 *
 * @property int $id
 * @property string $nome
 * @property string $sigla
 * @property-read mixed $codigo_ibge
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Municipio[] $municipios
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UnidadeFederal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UnidadeFederal whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UnidadeFederal whereSigla($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UnidadeFederal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UnidadeFederal whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UnidadeFederal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UnidadeFederal newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UnidadeFederal onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UnidadeFederal query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UnidadeFederal whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UnidadeFederal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UnidadeFederal withoutTrashed()
 */
class UnidadeFederal extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $table = 'unidades_federais';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'sigla', 'regiao',
    ];

    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * @return mixed
     */
    public function getCodigoIbgeAttribute()
    {
        return $this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'unidade_federal_id', 'id');
    }
}
