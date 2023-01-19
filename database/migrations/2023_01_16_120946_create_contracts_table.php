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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('transactionID');
            $table->decimal('commision');
            $table->decimal('price');
            $table->decimal('netamount');
            $table->string('status');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('system_user_id')->nullable();
            // $table->foreignId('client_id')->references('id')->on('clients');
            // $table->foreignId('system_user_id')->references('id')->on('system_user');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
