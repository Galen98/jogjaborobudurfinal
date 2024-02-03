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
        Schema::create('doku_cust', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('inv_id', 10)->unique();
            $table->integer('amount');
            $table->string('cust_name');
            $table->text('cust_phone');
            $table->string('cust_email');
            $table->string('cust_address');
            $table->date('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doku_cust');
    }
};
