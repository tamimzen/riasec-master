<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LockDimensiAndTestOnPresentases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presentases', function (Blueprint $table) {
            $table->unique(['dimensi_id', 'test_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presentases', function (Blueprint $table) {
            $table->dropUnique('presentases_dimensi_id_test_id_unique');
        });
    }
}
