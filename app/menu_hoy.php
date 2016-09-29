<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menu_hoy extends Model
{
    use SoftDeletes;
    protected $table = 'menu_hoy';
    protected $primaryKey = 'id';

    protected $fillable = ['id_combo','combo','precio','fecha','token','lote','comentarios'];
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

    public function setFechaAttribute($valor)
    {
        if( $valor != '' )
        {
            list($dia,$mes,$anio) = explode('/', $valor );
            $fecha = $anio.'-'.$mes.'-'.$dia;
            $this->attributes['fecha'] = $fecha;
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


}
