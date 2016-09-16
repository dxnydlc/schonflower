<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipo_menu extends Model
{
    use SoftDeletes;
    protected $table = 'tipo_menu';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre'];
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
