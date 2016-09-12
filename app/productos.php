<?php

namespace shonflower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productos extends Model
{
    use SoftDeletes;
    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre','id_categoria','nombre_categoria','nombre','sku','lote','description'];
    protected $dates = ['deleted_at'];
}
