<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categoria extends Model
{
    use SoftDeletes;
    protected $table = 'categoria';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre'];
    protected $dates = ['deleted_at'];
}
