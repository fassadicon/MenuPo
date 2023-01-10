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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName')->nullable();
            $table->string('suffix')->nullable();
            $table->string('sex', 1)->nullable();
            $table->string('address')->nullable();
            $table->date('birthDate');
            $table->integer('status')->length(1);
            $table->string('image')->nullable();
            $table->string('fullName')->nullable();
            // Logs
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('created_by')->constrained('admins');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
};
