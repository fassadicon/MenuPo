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
        Schema::create('foodlogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id')->constrained('foods');
            $table->string('description')->nullable();
            $table->double('start', 10, 2)->nullable();
            $table->double('add', 10, 2)->nullable();
            $table->double('sold', 10, 2)->nullable();
            $table->double('end', 10, 2)->nullable();
            $table->timestamps();
            $table->foreignId('created_by')->constrained('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodlogs');
    }
};
