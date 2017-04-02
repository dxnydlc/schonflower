<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalle_orden extends Model
{
    use SoftDeletes;
    protected $table = 'detalle_orden';
    protected $primaryKey = 'id';

    protected $fillable = ['id_orden','id_menu','tipo_menu','id_plato','plato','lote','sku','cantidad','precio','total','token'];
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
