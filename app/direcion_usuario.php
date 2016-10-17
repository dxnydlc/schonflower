<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class direcion_usuario extends Model
{
    
    use SoftDeletes;
    protected $table = 'direcion_usuario';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id_usuario','usuario','ubigeo','distrito','direccion','piso','interior','telefono','comentarios','token'
    ];
    protected $dates = ['deleted_at'];

}
