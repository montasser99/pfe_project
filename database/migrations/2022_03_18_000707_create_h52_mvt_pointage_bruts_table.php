<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h52_mvt_pointage_bruts', function (Blueprint $table) {

            $table->bigIncrements("MvtPointageID");
            $table->BigInteger("Matricule")->unsigned()->nullable();
            $table->dateTime("pointageEntMatin")->nullable();
            $table->dateTime("pointageSorMatin")->nullable();
            $table->dateTime("pointageEntMidi")->nullable();
            $table->dateTime("pointageSorMidi")->nullable();

            /** Pour ajouter clé étrangere avec table personnels **/
            $table->index('Matricule');
            $table->foreign('Matricule')->references('PERS_MAT_95')->on('personnels')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('h52_mvt_pointage_bruts');
    }
};
