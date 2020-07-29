<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcesVerbal extends Model
{
    protected $table = 'proces_verbal';
    protected $primaryKey = 'serie_pi';

    public $timestamps = false;

    protected $fillable = ['repr_beneficiar', 'beneficiar', 'problema', 'operatiuni', 'concluzie', 'ora_inceput',
                           'ora_sfarsit', 'locatie_interventie', 'editat', 'data_editat',
                           'semnat', 'data_semnat', 'ip_semnat'];
}
