<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class direccion_usuario extends Model
{
    use SoftDeletes;
    protected $table = 'direccion_usuario';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id_usuario','usuario','ubigeo','distrito','direccion','piso','interior','telefono','comentarios','token'
    ];
    protected $dates = ['deleted_at'];
}
