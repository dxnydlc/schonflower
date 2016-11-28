<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class promocion extends Model
{
    use SoftDeletes;
    protected $table = 'promocion';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre','tipo','token'];
    protected $dates = ['deleted_at'];

    public function getCreatedAtAttribute($valor)
    {
        if( $valor != '' )
        {
        	list($fecha,$hora) = explode(' ', $valor );
            list($anio,$mes,$dia) = explode('-', $fecha );
            $fecha_out = $dia.'/'.$mes.'/'.$anio;
            return $fecha_out.' '.$hora;
        }
    }
}
