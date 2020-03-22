<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VerbasDivulgacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('VerbasDivulgacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('codDespesa');
            $table->bigInteger('idEmpresa');
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
