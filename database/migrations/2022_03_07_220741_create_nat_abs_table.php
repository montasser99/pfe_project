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
        Schema::create('nat_abs', function (Blueprint $table) {
            $table->bigIncrements('CODE_ABS');
            $table->string('LIBELLE_ABS',50)->nullable();
            $table->string('TYPE_ABS',10)->nullable();
            $table->integer('TYPE_ABS_PR')->nullable();
            $table->integer('TYPE_ABS_13')->nullable();
            $table->integer('TYPE_ABS_PROD')->nullable();
            $table->integer('TYPE_ABS_CNR')->nullable();
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
        Schema::dropIfExists('nat_abs');
    }
};
