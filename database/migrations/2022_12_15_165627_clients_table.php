<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * $table->id();
            $table->string('registro_fiscal');
            $table->string('telefono');
            $table->string('name');
            $table->string('direccion');
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('website');
            $table->string('phone');
            $table->string('registro_fiscal');
            $table->string('fullname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone_contact');
            $table->string('adddress');
            $table->string('postal_code');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
