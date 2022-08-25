<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data superadmin, admin, pengguna default
        DB::table('waktus')->insert(array(
            [
                'waktu' => '10',
        ],
          ));

       
    }
}
