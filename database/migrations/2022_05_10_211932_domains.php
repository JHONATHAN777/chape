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
        Schema::create('domains', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('status');
            $table->float('price');
            $table->unsignedBigInteger('user_id');
            $table->string('registred_date');
            $table->string('expiration_date');
            $table->string('ns1');
            $table->string('ns2');
            $table->string('ns3');
            $table->string('ns4');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
    }
};
