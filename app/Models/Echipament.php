<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Echipament extends Model
{
    protected $table = 'echipamente_folosite';
    protected $primaryKey = 'nr_crt';

    public $timestamps = false;
}
