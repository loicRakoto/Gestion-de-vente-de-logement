<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logements', function (Blueprint $table) {
            $table->id('Num_logement');
            $table->foreignId('Id_cli')->default(0);
            $table->foreignId('Num_cite');
            $table->string('Libelle_logement');
            $table->integer('Nombre_piece');
            $table->integer('Superficie');
            $table->string('Type_vente');
            $table->string('Prix_logement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logements', function (Blueprint $table) {
            $table->dropForeign(['Id_cli', 'Num_cite']);
        });

        Schema::dropIfExists('logements');
    }
}
