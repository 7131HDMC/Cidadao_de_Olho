<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerbasDivulgacao extends Model
{
    //
    protected $table = 'VerbasDivulgacao';
    protected $fillable = ['codDespesa','idEmpresa','mes'];
}
