<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipeKepribadiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_kepribadians', function (Blueprint $table) {
            $table->id();
            $table->string('namatipe',70);
            $table->string('deskripsi',70);
            $table->string('bidang',70);
            $table->string('image_tipe')->nullable();
            $table->string('warna')->nullable();
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
        Schema::dropIfExists('tipe_kepribadians');
    }
}
