<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deputado;
use App\Verbas;

class ConsumirApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consumir a API ws com os dados dos deputados em exercicio, entao alimentar o banco.
        $data = 'http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json';
        $data = json_decode(file_get_contents($data));
        $list_id = array();
        foreach($data as $deputados)//eliminar o objeto list
        {
            foreach($deputados as $deputado)//iterar na lista de deputados
            {
                $dt = [
                'id' => $deputado->id,
                'partido' => $deputado->partido,
                'nome' => $deputado->nome
                ];
                $list_id[] = $deputado->id;
                Deputado::create($dt);
            }
        }   
        ConsumirApiController::verbas_idenizatorias($list_id);
    }

     public function verbas_idenizatorias($list_id)
    {
        
        foreach($list_id as $id){
            for($mes = 1; $mes <=12; $mes++)
            {
                $data = "http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/".$id."/2019/".$mes."?formato=json";

                $data = json_decode(file_get_contents($data));     

                foreach ($data->list as $despesa) {
                    $dt = [
                    'codDeputado' => $despesa->idDeputado,
                    'codTipoDespesa' => $despesa->codTipoDespesa,
                    'codMes' => $mes,
                    'valor' => $despesa->valor,
                    'descTipoDespesa' => $despesa->descTipoDespesa
                    ];
                    Verbas::create($dt);
        
                }
            }
      
        }


      
    }
}
