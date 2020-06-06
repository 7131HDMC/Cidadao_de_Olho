<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Deputado;
use App\DivulgacaoParlamentar;
class CidadaoDeOlhoController extends Controller
{
    /**
     *  Funcao retorna um arquivo json com os 5 deputados que mais gastaram durante o ano de 2019(os dados que alimentam o banco sao deste)
     *
     * @return \Illuminate\Http\Response
     */
    public function top5_gasto_anual()
    {
        $Deputado = new Deputado();
        $deputados = $Deputado->getTopDeputadosAnual();
        
       return response()->json($deputados);

    }

     /**
     *  Funcao retorna um arquivo json com os 5 deputados que mais pediram verbas idenizatoria durante o mes informado pelo  parametro 'mes'     
     *
     * @return \Illuminate\Http\Response
     */
    public function top5_solicitantes_mes($month)
    {
        $Deputado = new Deputado();
        if($month > 0 and  $month < 13){
            $deputados = $Deputado->getByMonth($month);
        }else if($month == 'all'){
            $deputados = $Deputado->getAll();
        }

       return response()->json($deputados);

    }
    
     /**
     *  Funcao retorna um arquivo json com os meios de divulgacao masi usado pelos deputados    
     *
     * @return \Illuminate\Http\Response
     */
    public function redes()
    {
        $Empresas = new DivulgacaoParlamentar();
        $redes = $Empresas->getRedes();
        return response()->json($redes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
