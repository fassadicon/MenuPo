<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Mockery\Generator\Method;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchases');
            $table->foreignId('food_id')->constrained('foods');
            $table->integer('quantity')->nullable();
            $table->double('amount', 10, 2)->nullable();
            $table->double('kcal', 10, 2)->nullable();
            $table->double('totFat', 10, 2)->nullable();
            $table->double('satFat', 10, 2)->nullable();
            $table->double('sugar', 10, 2)->nullable();
            $table->double('sodium', 10, 2)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
