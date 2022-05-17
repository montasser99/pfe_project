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
        Schema::create('demande_conges', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('date_deb')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('adresse_conge')->nullable();
            $table->string('phone')->nullable();
            $table->string('NatureDeConge')->nullable();
            $table->string('interim')->nullable();
            $table->string('statu')->default('en cours..');
            $table->string('fonction')->nullable();
            $table->string('direction')->nullable();
            $table->BigInteger('personnel_id')->unsigned()->nullable();
            $table->string('file')->nullable();

            /** Pour ajouter clé etrangere avec table personels **/
            $table->index('personnel_id');
            $table->foreign('personnel_id')->references('PERS_MAT_95')->on('personnels')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('demande_conges');
    }
};
