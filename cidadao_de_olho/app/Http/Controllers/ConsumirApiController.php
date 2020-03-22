<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deputado;
use App\Verbas;
use App\DeputadoVerbas;
use App\DivulgacaoParlamentar;
use App\VerbasDivulgacao;

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
                'idDeputado' => $deputado->id,
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

                foreach ($data->list as $despesa) 
                {
                    
                    #testa se o codTipoDespesa ja foi cadastrado
                    if(Verbas::where('codDespesa', $despesa->codTipoDespesa)->count() == 0){
                        $dt = [
                        'codDespesa' => $despesa->codTipoDespesa,
                        'descVerba' => $despesa->descTipoDespesa
                        ];
                        Verbas::create($dt);

                    }
                    #alimentando relacionamento n-n de deputados e verbas
                    $dt = [
                        'codDespesa' => $despesa->codTipoDespesa,
                        'idDeputado' => $despesa->idDeputado,
                        'valor' => $despesa->valor,
                        'mes' => $mes
                    ];
                    DeputadoVerbas::create($dt);

                    //Caso a verba for do tipo para divulgacao parlamentar ha a necessidade de percorrer o 'listaDetalheVerba' para alimentar o banco com as empresas que prestam esse tipo de despesa
                    if($despesa->codTipoDespesa == 36)
                    {

                        foreach ($despesa->listaDetalheVerba as $divulgacaoParlamentar) 
                        {
                            #testa se o cpfCnpj ja foi cadastrado
                            if(DivulgacaoParlamentar::where('cnpj', $divulgacaoParlamentar->cpfCnpj)->count()  == 0)
                            {
                                $dt = [
                                'cnpj' => $divulgacaoParlamentar->cpfCnpj,
                                'nomeEmpresa' =>  $divulgacaoParlamentar->nomeEmitente
                                ];
                                DivulgacaoParlamentar::create($dt);
                            }
                            #alimentando relacionamento n-n de verbas par divulgacao e empresas 
                            $dt = [
                            'codDespesa' => 36,
                            'idEmpresa' =>  $divulgacaoParlamentar->cpfCnpj,
                            'mes' => $mes
                            ];
                            VerbasDivulgacao::create($dt);
                        }
                    }

                }
            }
      
        }


      
    }
}
