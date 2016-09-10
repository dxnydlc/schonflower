<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menu extends Model
{
    use SoftDeletes;
    protected $table = 'menu';
    protected $primaryKey = 'id';

    protected $fillable = ['fecha'];
    protected $dates = ['deleted_at'];
}
