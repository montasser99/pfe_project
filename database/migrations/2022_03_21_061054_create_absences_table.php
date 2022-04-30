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
        Schema::create('absences', function (Blueprint $table) {
            $table->bigIncrements('ABS_MAT_95');
            $table->bigInteger('ABS_NUMORD_93')->unsigned()->nullable();
            $table->bigInteger('ABS_NAT_9')->unsigned()->nullable();
            $table->integer('ABS_CET_9')->nullable();
            $table->date('ABS_DATE_DEB')->nullable();
            $table->string('ABS_PERDEB_X',1)->nullable();
            $table->date('ABS_DATE_FIN')->nullable();
            $table->string('ABS_PERFIN_X',1)->nullable();
            $table->integer('ABS_NBRJOUR_93')->nullable();
            $table->integer('ABS_CUMULE_9')->nullable();

            //** clé etrangeur avec table personnels **/
            $table->index('ABS_NUMORD_93');
            $table->foreign('ABS_NUMORD_93')->references('PERS_MAT_95')->on('personnels')->onUpdate('cascade')->onDelete('cascade');

            //** clé etrangeur avec table Nat_abs **/
            $table->index('ABS_NAT_9');
            $table->foreign('ABS_NAT_9')->references('CODE_ABS')->on('nat_abs')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('absences');
    }
};
