<?php

use Illuminate\Database\Seeder;
use App\Deputado;
use App\Verbas;
use App\DeputadoVerbas;
use App\DivulgacaoParlamentar;
use App\VerbasDivulgacao;
class DeputadosVigentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->putDeputados();
    }

    /**
     * Read API  from ALMG to take deputados and populate the database
     * 
     * 
     */
    private function putDeputados()
    {
    	$data = 'http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json';
        $data = json_decode(file_get_contents($data));
        $listOfDeputados = array();
        foreach($data as $deputados)//eliminar o objeto list
        {
            foreach($deputados as $deputado)//iterar na lista de deputados
            {
                $dt = [
                'idDeputado' => $deputado->id,
                'partido' => $deputado->partido,
                'nome' => $deputado->nome
                ];
                $listOfDeputados[] = $deputado->id;
                Deputado::create($dt);
            }
        }   

        $this->putVerbasIdenizatorias($listOfDeputados);
    }

    

    /**
	*
	*/
	private function putVerbasIdenizatorias($listOfDeputados)
	{
		$despesaCounter = 0;
        foreach($listOfDeputados as $id)
        {
            for($mes = 1; $mes <=12; $mes++)
            {
                $data = "http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/".$id."/2019/".$mes."?formato=json";
                $data = json_decode(file_get_contents($data));     
                
                //if(!$data->list->isEmpty())
	            //{	
	                foreach ($data->list as $despesa) 
	                {   
	                   $this->putVerbas($despesa, $despesaCounter);
	                 
	                   $this->putDeputadoverbas($despesa, $mes);

	                    //Caso a verba for do tipo para divulgacao parlamentar ha a necessidade de percorrer o 'listaDetalheVerba' para alimentar o banco com as empresas que prestam esse tipo de despesa
	                    if($despesa->codTipoDespesa == 36)
	                    {
	                        //if(!$despesa->listaDetalheVerba->isEmpty())
		                    //{
		                        foreach ($despesa->listaDetalheVerba as $divulgacaoParlamentar){
		                            $this->putDivulgacaoParlamentar($divulgacaoParlamentar);
                                    $this->putVerbasDivulgacao($divulgacaoParlamentar, $mes);
		                        }
		                    //} 
	                    }

	                }
	            //}
            }
      
        }
	} 

	/**
	* 	
	*
	*/
	private function putVerbas($despesa,$counter)
	{
		$MAX_DESPESA = 10;
		 #testa se o codTipoDespesa ja foi cadastrado
		if($counter <= $MAX_DESPESA)
		{
	        if( Verbas::where('codDespesa', $despesa->codTipoDespesa )->exists() )
	        {
	            $dt = [
	            'codDespesa' => $despesa->codTipoDespesa,
	            'descVerba' => $despesa->descTipoDespesa
	            ];
	            Verbas::create($dt);
	            $counter++;
	        }
		}
	}


	/**
	*
	*
	*/
	private function putDeputadoverbas($despesa, $mes)
	{
		 #alimentando relacionamento n-n de deputados e verbas
        $dt = [
            'codDespesa' => $despesa->codTipoDespesa,
            'idDeputado' => $despesa->idDeputado,
            'valor' => $despesa->valor,
            'mes' => $mes
        ];
        DeputadoVerbas::create($dt);

	}

	/**
	*
	*
	*/
	private function putVerbasDivulgacao($divulgacaoParlamentar, $mes)	
	{

		#alimentando relacionamento n-n de verbas par divulgacao e empresas 
        $dt = [
        'codDespesa' => 36,
        'idEmpresa' =>  $divulgacaoParlamentar->cpfCnpj,
        'mes' => $mes
        ];
        VerbasDivulgacao::create($dt);

	}

	/**
	*
	*
	*/
	private function putDivulgacaoParlamentar($divulgacaoParlamentar)
	{
		#testa se o cpfCnpj ja foi cadastrado
        if(!DivulgacaoParlamentar::where('cnpj', $divulgacaoParlamentar->cpfCnpj)->exists() )
        {
            $dt = [
            'cnpj' => $divulgacaoParlamentar->cpfCnpj,
            'nomeEmpresa' =>  $divulgacaoParlamentar->nomeEmitente
            ];
            DivulgacaoParlamentar::create($dt);
        }
	}

}
