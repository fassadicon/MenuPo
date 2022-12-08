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
        Schema::create('adminNotifs', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->string('title');
            $table->string('description');
            $table->integer('status');
            $table->timestamps();
        });
    }
    // Types of notifs
    // 1 = Orders 
    // 2 = Menu 
    // 3 = Archives

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_notifs');
    }
};
