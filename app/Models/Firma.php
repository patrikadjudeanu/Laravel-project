<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    protected $table = 'firme_partenere';
    protected $primaryKey = 'cod';

    public $timestamps = false;

    protected $fillable = ['denumire', 'mail'];
}
