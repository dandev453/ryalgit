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
          //customers on auth or on select pos (OPTIONS BY AUTH & CLIENTS LIST)
          Schema::table('sales', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onudelete('cascade')
                ->onupdate('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
