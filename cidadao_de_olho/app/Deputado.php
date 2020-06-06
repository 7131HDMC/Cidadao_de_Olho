<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DeputadoVerbas;
use Illuminate\Support\Facades\DB;


class Deputado extends Model
{
    protected $table = 'Deputado';
    protected $fillable = ['idDeputado','partido','nome'];
    protected $primaryKey = 'idDeputado';

    public function getTopDeputadosAnual()
    {

    	$top5 = DB::select(" SELECT Deputado.nome ,SUM(DeputadoVerbas.valor) AS gasto_anual FROM Deputado, DeputadoVerbas WHERE Deputado.idDeputado = DeputadoVerbas.idDeputado GROUP BY Deputado.nome ORDER BY  gasto_anual DESC LIMIT 5;");
    	$top5 = Deputado::hydrate($top5);
    	return $top5;
    }

    public function getByMonth($month)
    {
    	$top5 = DB::select("SELECT Deputado.nome, count(DeputadoVerbas.idDeputado) AS quantidade FROM Deputado, DeputadoVerbas WHERE Deputado.idDeputado = DeputadoVerbas.idDeputado and DeputadoVerbas.mes=".$month." GROUP BY Deputado.nome ORDER BY  quantidade DESC LIMIT 5;");
    	$top5 = Deputado::hydrate($top5);
    	return $top5;
    }

    public function getAll()
    {
    	$top5 = DB::select("SELECT Deputado.nome, count(DeputadoVerbas.idDeputado) AS quantidade FROM Deputado, DeputadoVerbas WHERE Deputado.idDeputado = DeputadoVerbas.idDeputado  GROUP BY Deputado.nome ORDER BY  quantidade DESC LIMIT 5;");
    	$top5 = Deputado::hydrate($top5);
    	return $top5;
    }
}
