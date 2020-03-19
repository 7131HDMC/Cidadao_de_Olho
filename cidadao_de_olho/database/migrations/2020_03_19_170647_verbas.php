<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Verbas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Verbas', function (Blueprint $table) {
            $table->integer('codDeputado');
            $table->integer('codTipoDespesa');
            $table->integer('codMes');

            $table->double('valor');
            $table->string('descTipoDespesa');
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
        Schema::dropIfExists('Verbas');
    }
}
