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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('parents');
            $table->foreignId('student_id')->constrained('students');
            $table->double('totalKcal', 10, 2)->nullable();
            $table->double('totalTotFat', 10, 2)->nullable();
            $table->double('totalSatFat', 10, 2)->nullable();
            $table->double('totalSugar', 10, 2)->nullable();
            $table->double('totalSodium', 10, 2)->nullable();
            $table->double('totalAmount', 10, 2)->nullable();
            $table->foreignId('payment_id')->constrained('payments');
            $table->integer('paymentStatus')->length(1)->default(0);
            $table->integer('claimStatus')->default(0);
            $table->integer('type')->length(1);
            // Logs
            $table->timestamps();
            $table->foreignId('served_by')->constrained('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
};
