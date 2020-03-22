<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeputadoVerbas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('DeputadoVerbas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('codDespesa');
            $table->bigInteger('idDeputado');
            $table->double('valor');
            $table->integer('mes');

            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
