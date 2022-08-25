<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdiConductedTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_studis', function (Blueprint $table) {
            $table->integer('jumlah_tes')->after('pointBorderColor')->default(0)->comment('Tes dilakukan oleh pengguna dalam prodi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_studis', function (Blueprint $table) {
            $table->dropColumn('jumlah_tes');
        });
    }
}
