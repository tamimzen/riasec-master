<?php

namespace Database\Seeders;

use App\Models\Programstudi;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
            [
                'backgroundColor' => "rgba(232, 252, 126,0.5)",
                'borderColor' => "rgba(255, 255, 0, 1)",
                'pointBorderColor' => "rgba(255, 118, 1, 1)"
            ],
            [
                'backgroundColor' => "rgba(75, 192, 192, 0.3)",
                'borderColor' => "rgba(66, 151, 160, 1)",
                'pointBorderColor' => "rgba(2, 16, 108, 1)"
            ],
            [
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "rgba(144, 0, 8, 1)"
            ],            [
                'backgroundColor' => "rgba(75, 192, 192, 0.4)",
                'borderColor' => "rgba(6, 139, 228, 1)",
                'pointBorderColor' => "rgba(13, 36, 76, 1)"
            ],            [
                'backgroundColor' => "rgba(232, 252, 126,0.4)",
                'borderColor' => "rgba(248, 202, 10, 1)",
                'pointBorderColor' => "rgba(120, 104, 7, 1)"
            ],            [
                'backgroundColor' => "rgba(205, 161, 66, 0.3)",
                'borderColor' => "rgba(102, 62, 5, 1)",
                'pointBorderColor' => "rgba(235, 141, 7, 1)"
            ],            [
                'backgroundColor' => "rgba(75, 192, 192, 0.2)",
                'borderColor' => "rgba(12, 177, 2, 1)",
                'pointBorderColor' => "rgba(2, 73, 12, 1)"
            ],
        ] as $key => $val){
            Programstudi::find((1 + $key))->update($val);
        }
    }
}
