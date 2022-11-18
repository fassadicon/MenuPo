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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            
            // Basic Food Information
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('type')->default(0);
            
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            // Nutritional Data
            $table->double('servingSize', 10, 2)->nullable();
            $table->double('calcKcal', 10, 2)->nullable();
            $table->double('calcTotFat', 10, 2)->nullable();
            $table->double('calcSatFat', 10, 2)->nullable();
            $table->double('calcSugar', 10, 2)->nullable();
            $table->double('calcSodium', 10, 2)->nullable();
            $table->double('grade', 10, 2)->nullable();
            $table->string('image')->nullable();
            // Logs
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('philfct_id')->nullable();
            $table->foreign('philfct_id')->references('id')->on('philfcts');
            $table->foreignId('created_by')->constrained('admins');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
};
