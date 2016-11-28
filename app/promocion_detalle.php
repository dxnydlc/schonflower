<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class promocion_detalle extends Model
{
    use SoftDeletes;
    protected $table = 'promocion_detalles';
    protected $primaryKey = 'id';

    protected $fillable = ['id_promo','condicion_1','condicion_2','precio','token','mascara'];
    protected $dates 	= ['deleted_at'];

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
