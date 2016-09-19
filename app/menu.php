<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menu extends Model
{
    use SoftDeletes;
    protected $table = 'menus';
    protected $primaryKey = 'id';

    protected $fillable = ['id_producto','producto','id_categoria','categoria','fecha','precio','stock'];
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

    public function getFechaAttribute($valor)
    {
    	if( $valor != '' )
    	{
    		list($anio,$mes,$dia) = explode('-', $valor );
    		$fecha = $dia.'/'.$mes.'/'.$anio;
    		return $fecha;
    	}
    }

    public function setFechaAttribute($valor)
    {
        if( $valor != '' )
        {
            list($dia,$mes,$anio) = explode('/', $valor );
            $fecha = $anio.'-'.$mes.'-'.$dia;
            $this->attributes['fecha'] = $fecha;
        }
    }


}
