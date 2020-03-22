<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Deputado;
class CidadaoDeOlhoController extends Controller
{
    /**
     *  Funcao retorna um arquivo json com os 5 deputados que mais gastaram durante o ano de 2019(os dados que alimentam o banco sao deste)
     *
     * @return \Illuminate\Http\Response
     */
    public function top5_gasto_anual()
    {
  
        $top5 = DB::select("SELECT Deputado.nome, SUM(DeputadoVerbas.valor) AS gasto_anual FROM Deputado, DeputadoVerbas WHERE Deputado.idDeputado = DeputadoVerbas.idDeputado  GROUP BY Deputado.nome ORDER BY  gasto_anual DESC LIMIT 5;");
        
       return response()->json(Deputado::hydrate($top5));

    }

     /**
     *  Funcao retorna um arquivo json com os 5 deputados que mais pediram verbas idenizatoria durante o mes informado pelo  parametro 'mes'     
     *
     * @return \Illuminate\Http\Response
     */
    public function top5_solicitantes_mes(Request $request)
    {
        if($request->mes > 0 and  $request->mes < 13)
        {
            $top5 = DB::select("SELECT Deputado.nome, count(DeputadoVerbas.idDeputado) AS quantidade FROM Deputado, DeputadoVerbas WHERE Deputado.idDeputado = DeputadoVerbas.idDeputado and DeputadoVerbas.mes=".$request->mes." GROUP BY Deputado.nome ORDER BY  quantidade DESC LIMIT 5;");
        }
       return response()->json(Deputado::hydrate($top5));

    }
    
    public function redes()
    {
  
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
