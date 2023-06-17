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
        Schema::create('tambahlocation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('wisata_id');
            $table->bigInteger('tambahprovince_id');
            $table->string('namaregion', 255);
            $table->string('slugregion', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tambahlocation');
    }
};
