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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('location');
            $table->string('time');
            $table->string('status');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('system_user_id')->nullable();
            // $table->foreignId('client_id')->nullable()->constrained();
            // $table->foreignId('system_user_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
