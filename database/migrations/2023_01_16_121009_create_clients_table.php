<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ceoname');
            $table->string('email');
            $table->string('phone');
            $table->string('nip');
            $table->string('city');
            $table->string('zipcode');
            // $table->unsignedBigInteger('contact_person_id')->nullable();
            // $table->unsignedBigInteger('contract_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
