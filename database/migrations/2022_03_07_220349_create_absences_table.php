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
            $table->integer('ABS_NUMORD_93')->nullable();
            $table->integer('ABS_NAT_9')->nullable();
            $table->integer('ABS_CET_9')->nullable();
            $table->date('ABS_DATE_DEB')->nullable();
            $table->string('ABS_PERDEB_X',1)->nullable();
            $table->date('ABS_DATE_FIN')->nullable();
            $table->string('ABS_PERFIN_X',1)->nullable();
            $table->integer('ABS_NBRJOUR_93')->nullable();
            $table->integer('ABS_CUMULE_9')->nullable();
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
