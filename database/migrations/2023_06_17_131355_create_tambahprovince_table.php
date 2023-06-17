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
        Schema::create('tambahprovince', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('wisata_id');
            $table->string('namaprovince', 255);
            $table->string('slugprovince', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tambahprovince');
    }
};
