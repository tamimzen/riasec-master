<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestKepribadiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_kepribadians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('tipekep_id')->nullable();
            $table->timestamps();
            $table->dateTime('finished_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_kepribadians');
    }
}
