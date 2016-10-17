<?php

namespace shonflower;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','apellidos','telefono','tipo','token'
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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

    public function getTipoAttribute($valor)
    {
        if( $valor != '' )
        {
            switch ($valor) {
                case 'admin':
                    return 'Administrador';
                    break;
                default:
                    return 'Usuario';
                    break;
            }
        }
    }

    public function setPasswordAttribute($valor)
    {
        if( !empty($valor) ){
           $this->attributes['password'] = \Hash::make( $valor);
        }
    }

}
