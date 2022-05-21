<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
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

        Schema::create('cconges', function (Blueprint $table) {
            $end= Date::now()->lastOfYear();
            $table->bigInteger('CCONG_MAT_95')->unsigned()->nullable();
            $table->bigInteger('CCONG_NAT_9')->unsigned()->nullable();
            $table->float('CCONG_SOLDE_9')->nullable();
            $table->timestamp('CCONG_DATE_DEB')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('CCONG_DATE_FIN')->default($end);

            /** Pour ajouter clé etrangere avec table nature conge **/
            $table->index('CCONG_NAT_9');
            $table->foreign('CCONG_NAT_9')->references('CODE')->on('nature_conges')->onUpdate('cascade')->onDelete('cascade');

            /** pour ajouter cle etrangere avec table personnels  **/
            $table->index('CCONG_MAT_95');
            $table->foreign('CCONG_MAT_95')->references('PERS_MAT_95')->on('personnels')->onUpdate('cascade')->onDelete('cascade');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cconges');
    }
};
