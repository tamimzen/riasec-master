<?php

namespace Database\Seeders;

use App\Models\DimensiPasangan;
use Illuminate\Database\Seeder;

class DimensiPasanganColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([ 'secondary', 'success', 'warning', 'info' ] as $key => $val){
            DimensiPasangan::find((1 + $key))->update(['color' => $val]);
        }
    }
}
