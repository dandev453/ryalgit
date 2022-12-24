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
        Schema::create('supliers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('website', 255);
            $table->string('phone', 255);
            $table->string('registro_fiscal', 255);
            $table->string('fullname', 255);
            $table->string('lastname', 255);
            $table->string('email', 255);
            $table->string('phone_contact', 255);
            $table->string('address', 255);
            $table->string('postal_code', 255);
            $table->string('country', 255);
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
        Schema::dropIfExists('supliers');
    }
};
