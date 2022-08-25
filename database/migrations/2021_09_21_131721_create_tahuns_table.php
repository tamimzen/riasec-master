<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahuns', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('tahun');
            $table->timestamps();
        });

        # insert role value
        DB::table('tahuns')->insert(
            array(['tahun' => '16'],['tahun' => '17'],['tahun' => '18'],['tahun' => '19'],['tahun' => '20'],['tahun' => '21'],['tahun' => '22'],['tahun' => '23'],['tahun' => '24'])
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tahuns');
    }
}
