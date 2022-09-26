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
            $table->string('name', 50);
            $table->string('description', 100)->nullable();
            $table->string('type', 20)->default('others');
            $table->string('image')->nullable();
            $table->decimal('price', $precision = 10, $scale = 2)->default('0.00');
            $table->integer('stock')->default('0');
            $table->integer('menuStatus')->default('0');

            // Nutritional Data
            $table->double('servingSize', 10, 2)->default('0.00');;
            $table->double('calcKcal', 10, 2)->nullable();
            $table->double('calcTotFat', 10, 2)->nullable();
            $table->double('calcSatFat', 10, 2)->nullable();
            $table->double('calcSugar', 10, 2)->nullable();
            $table->double('grade', 10, 2)->nullable();
            
            // Logs
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            // onDelete('cascade') -> will delete the listings of that user
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
