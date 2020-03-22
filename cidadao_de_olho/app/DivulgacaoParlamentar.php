<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivulgacaoParlamentar extends Model
{
    //
    protected $table = 'EmpresaDivulgacao';
    protected $fillable = ['cnpj','nomeEmpresa'];
    protected $primaryKey = 'cnpj';

  
}
