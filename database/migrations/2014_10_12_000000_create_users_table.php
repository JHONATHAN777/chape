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
            
            $table->engine = "InnoDB";
            $table->id();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('status');
            $table->string('password');
            $table->string('role');
            $table->string('document_type');
            $table->string('document_number');
            $table->string('profile_picture');
            $table->rememberToken();
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
