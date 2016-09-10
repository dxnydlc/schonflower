<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empresa extends Model
{
    use SoftDeletes;
    protected $table = 'empresa';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre','ruc'];
    protected $dates = ['deleted_at'];
}
