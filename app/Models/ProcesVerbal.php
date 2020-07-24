<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcesVerbal extends Model
{
    protected $table = 'proces_verbal';
    protected $primaryKey = 'serie_pi';

    public $timestamps = false;
}
