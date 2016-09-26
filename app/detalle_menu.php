<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalle_menu extends Model
{
    use SoftDeletes;
    protected $table = 'detalle_menus';
    protected $primaryKey = 'id';

    protected $fillable = ['id_menu','id_producto','producto','precio','fecha','stock','id_categoria','categoria','token','sku'];
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
