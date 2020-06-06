<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeputadoVerbas extends Model
{
    //
    protected $table = 'DeputadoVerbas';
    protected $fillable = ['codDespesa','idDeputado', 'valor', 'mes'];
    
}
