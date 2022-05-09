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
        Schema::create('signataires', function (Blueprint $table) {
            $table->id();

            /**personnel id **/
            $table->BigInteger('personnel_id')->unsigned()->nullable();
            $table->index('personnel_id');
            $table->foreign('personnel_id')->references('PERS_MAT_95')->on('personnels')->onUpdate('cascade')->onDelete('cascade');

            /**signataire id referenece in table personnels**/
            $table->BigInteger('signataire_id')->unsigned()->nullable();
            $table->index('signataire_id');
            $table->foreign('signataire_id')->references('PERS_MAT_95')->on('personnels')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('order')->nullable();
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
        Schema::dropIfExists('signataires');
    }
};
