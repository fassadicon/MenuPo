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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('parents');
            // $table->unsignedBigInteger('parent_id')->nullable();
            // $table->foreign('parent_id')->references('id')->on('guardians');
            $table->integer('LRN')->nullable();
            $table->string('grade');
            $table->string('section');
            $table->string('adviser');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName')->nullable();
            $table->string('suffix')->nullable();
            $table->string('sex', 1);
            $table->date('birthDate')->nullable();
            $table->integer('status')->length(1);
            $table->foreignId('bmi_id')->constrained('bmis');
            $table->string('restriction')->nullable();
            $table->string('image')->nullable();
            $table->string('QR')->nullable();
            $table->string('fullName')->nullable();
            // Logs
            $table->timestamps(); 
            $table->softDeletes();
            // Rename to created_by 
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
        Schema::dropIfExists('students');
    }
};
