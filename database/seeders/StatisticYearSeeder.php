<?php

namespace Database\Seeders;

use App\Models\{User, Statistic};
use Illuminate\Database\Seeder;

class StatisticYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Prosedur: Download Presentase, Test, User
     * Proses StatisticYearSeeder
     * Upload statistik, presentases, migration ke server
     * @return void
     */
    public function run()
    {
        Statistic::truncate();

        foreach(
            User::whereRelation('roles', 'roles.id', 3)
            ->with('tests.presentases')
            ->get() as $user
        ){

            $tahun = (int) substr($user->nim, 2, 2);

            foreach ($user->tests as $test) {
                foreach($test->presentases as $presentase){
                    $this->updater(
                        $user->programstudi_id,
                        $tahun,
                        $presentase->dimensi_id,
                        $presentase->totalpresent
                    );
                }
            }
        }
    }


    private function updater(int $prodi, int $tahun, int $dimensi, int $presentase){
        $check = Statistic::where('program_studi_id', $prodi)
        ->where('tahun', $tahun)
        ->where('dimensi_id', $dimensi)->first();

        $used = $check ? 1 + $check->total_used : 1;

        Statistic::updateOrCreate([
            'program_studi_id' => $prodi,
            'dimensi_id' => $dimensi,
            'tahun' => $tahun
        ], [
            'presentase' => $check ? (
                ($check->presentase * $check->total_used)
                + $presentase)
                / $used : $presentase,
            'total_used' => $used
        ]);
    }
}
