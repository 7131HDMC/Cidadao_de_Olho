<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DivulgacaoParlamentar extends Model
{
    //
    protected $table = 'EmpresaDivulgacao';
    protected $fillable = ['cnpj','nomeEmpresa'];
    protected $primaryKey = 'cnpj';

    public function getRedes()
    {
    	$top5 = DB::select("SELECT nomeEmpresa, COUNT(VerbasDivulgacao.idEmpresa) uso_para_divulgar FROM EmpresaDivulgacao, VerbasDivulgacao WHERE VerbasDivulgacao.idEmpresa=EmpresaDivulgacao.cnpj and EmpresaDivulgacao.nomeEmpresa LIKE '%online%' GROUP BY nomeEmpresa ORDER BY  uso_para_divulgar DESC LIMIT 5 ;");
    	return $top5;
    }
}
