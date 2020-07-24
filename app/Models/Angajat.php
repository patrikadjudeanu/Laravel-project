<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angajat extends Model
{
    protected $table = 'angajat';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
