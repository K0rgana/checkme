<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('fk_users_id')->nullable();
            $table->foreign('fk_users_id')->references('id')->on('users');

            $table->dateTime('data_checkup');
            $table->float('peso');
            $table->float('altura');
            $table->string('art_pressao');
            $table->integer('glicose');
            $table->float('colesterol_ldl');
            $table->float('colesterol_hdl');
            $table->string('observacoes');

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
        Schema::dropIfExists('checkups');
    }
}
