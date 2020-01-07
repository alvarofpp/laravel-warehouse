<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\Municipio.
 *
 * @property int $id
 * @property int $unidade_federal_id
 * @property string $nome
 * @property-read mixed $codigo_ibge
 * @property-read \App\Models\UnidadeFederal $uf
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio whereUnidadeFederalId($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read mixed $municipio_formatado
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read string $ajax_name
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Municipio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Municipio withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Municipio withoutTrashed()
 */
class Municipio extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $table = 'municipios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unidade_federal_id', 'nome',
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
     * @return string
     */
    public function getMunicipioFormatadoAttribute()
    {
        return $this->attributes['nome'].' ('.($this->uf->sigla).')';
    }

    /**
     * @return string
     */
    public function getAjaxNameAttribute()
    {
        return $this->attributes['nome'].' - '.($this->uf->sigla);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uf()
    {
        return $this->belongsTo(UnidadeFederal::class, 'unidade_federal_id', 'id');
    }
}
