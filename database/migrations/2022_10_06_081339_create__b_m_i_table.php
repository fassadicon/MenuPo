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
        Schema::create('bmis', function (Blueprint $table) {
            $table->id();
            $table->double('Q1Height', 10, 2)->nullable();
            $table->double('Q1Weight', 10, 2)->nullable();
            $table->double('Q1BMI', 10, 2)->nullable();
            $table->double('Q2Height', 10, 2)->nullable();
            $table->double('Q2Weight', 10, 2)->nullable();
            $table->double('Q2BMI', 10, 2)->nullable();
            $table->double('Q3Height', 10, 2)->nullable();
            $table->double('Q3Weight', 10, 2)->nullable();
            $table->double('Q3BMI', 10, 2)->nullable();
            $table->double('Q4Height', 10, 2)->nullable();
            $table->double('Q4Weight', 10, 2)->nullable();
            $table->double('Q4BMI', 10, 2)->nullable();
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
        Schema::dropIfExists('bmis');
    }
};
