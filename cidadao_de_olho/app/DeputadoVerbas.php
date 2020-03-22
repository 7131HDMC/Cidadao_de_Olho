<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeputadoVerbas extends Model
{
    //
    protected $table = 'DeputadoVerbas';
    protected $fillable = ['codDespesa','idDeputado', 'valor', 'mes'];
    public function gastoAnualDoDeputado($id){
    	$gasto_anual = DeputadoVerbas::select('idDeputado')->where('idDeputado',$id)->sum('valor');
    	return $gasto_anual;
    }
}
