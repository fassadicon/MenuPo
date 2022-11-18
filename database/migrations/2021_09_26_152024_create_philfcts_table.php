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
        Schema::create('philfcts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('philfct_id');
            $table->double('kcal', 10, 2);
            $table->double('totFat', 10, 2);
            $table->double('satFat', 10, 2);
            $table->double('sugar', 10, 2);
            $table->double('sodium', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('philfcts');
    }
};
