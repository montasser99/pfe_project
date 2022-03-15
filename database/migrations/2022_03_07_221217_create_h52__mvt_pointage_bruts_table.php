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
        Schema::create('h52__mvt_pointage_bruts', function (Blueprint $table) {
            $table->increments("MvtPointageID");
            $table->string("Matricule",10)->nullable();
            $table->date("JourCptPnt")->nullable();
            $table->date("DateTimePnt")->nullable();
            $table->tinyInteger("OriginePnt")->nullable();
            $table->string("PntSourceID",15)->nullable();
            $table->string("ValiderPar",10)->nullable();
            $table->string("TypeJour",3)->nullable();
            $table->tinyInteger("TypeOperation")->nullable();
            $table->binary("OnPntAnnule")->nullable();
            $table->integer("AnnulePar")->nullable();
            $table->string("PntCreerPar",10)->nullable();
            $table->date("DateCreation")->nullable();
            $table->tinyInteger("MotifPntManuelH511")->nullable();
            $table->tinyInteger("Etat")->nullable();
            $table->integer("OnCloture")->nullable();
            $table->binary("DateCloture")->nullable();
            $table->string("CloturePar",10)->nullable();
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
        Schema::dropIfExists('h52__mvt_pointage_bruts');
    }
};
