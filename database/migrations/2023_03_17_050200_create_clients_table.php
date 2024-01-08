<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('Id_cli');
            $table->string('Nom_cli');
            $table->string('Prenom_cli');
            $table->string('Tel_cli');
            $table->bigInteger('CIN_cli');
            $table->string('Lieux_travail');
            $table->dateTime('Date_achat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
