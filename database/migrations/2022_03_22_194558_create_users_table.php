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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('email_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('password');
            $table->rememberToken();

            /**Pour ajouter role par defaut user **/
            $table->string('role')->default('user');

            /** Pour ajouter clé etrangere avec table personnels **/
            $table->BigInteger('personnel_id')->unsigned()->unique()->nullable();
            $table->index('personnel_id');
            $table->foreign('personnel_id')->references('PERS_MAT_95')->on('personnels')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
};
