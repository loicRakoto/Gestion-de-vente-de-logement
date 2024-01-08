<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cites', function (Blueprint $table) {
            $table->id('Num_cite');
            $table->foreignId('Num_agence');
            $table->string('Nom_cite');
            $table->string('Lieux');
            $table->string('Quartier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cites', function (Blueprint $table) {
            $table->dropForeign('Num_agence');
        });

        Schema::dropIfExists('cites');
    }
}
