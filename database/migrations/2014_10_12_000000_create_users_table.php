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
            $table->string('email')->unique();
            $table->string('recoveryEmail')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('role')->default('0');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // $table->unsignedBigInteger('created_by');
            // $table->foreign('created_by')->references('id')->on('admins');
            // $table->unsignedBigInteger('updated_by')->nullable();
            // $table->foreign('updated_by')->references('id')->on('admins');
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
