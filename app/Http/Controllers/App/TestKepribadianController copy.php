<?php

namespace App\Http\Controllers\App;

use Barryvdh\DomPDF\Facade as PDF;
use App\Traits\TestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{TestKepribadian, TipeKepribadian, DimensiPasangan, Presentase, Dimensi, Soal, Statistic, ProgramStudi};

class TestKepribadianController extends Controller
{
    use TestTrait;
    /**
     * Mulai sesi test baru
     * [ Menampilkan Response Soal Random ]
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function start(){
        # Buat ID Test baru & ambil Soal(dari Traits)
        return response()->json($this->createSoal() ,201);
    }

    /**
     * Mulai sesi test baru
     * [ Menampilkan view Soal ]
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function startTest()
    {
        # Direct response json to view, buat id_test baru & ambil data soal(dari Trait)
        $tests = $this->createSoal();
        $dimensis = Dimensi::select('id', DB::raw("0 as value"))->get()->toJson();

        return view('apps.soal', compact('tests', 'dimensis'));
    }

    /**
     * Selesai sesi
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function finish($id, Request $request){


        # mengecek sesi test, dengan merecord sesi finish pada test, berdasarkan id pengguna
        $test = $request->user()->currentTest()->first();
        # jika var test tidak ada maka, mengembalikan nilai error
        if (empty($test))
        return response()->json(['errors' => 'ID tes tidak ditemukan'], 419);

        
        # validasi inputan hasil persentase
        /**
         * disini digunakan untuk mengecek data yang dikirimkan ke server
         */
        $request->validate([
            'present' => 'array|size:'. Dimensi::count(), # total yang harus dikirim
            'present.*' => 'array|size:2',  # setiap isian harus ada 2 field
            'present.*.id' => 'integer|distinct|exists:App\Models\Dimensi,id',
            'present.*.value' => 'integer|min:0' # tidak lebih dari jumlah soal yang ada
        ]);


        
        
        return DB::transaction(function() use ($request, $test, $id) {

            # memanggil relasi program studi dari user yang sedang melakukan test
            $prodi = $request->user()->programstudi()->first();
    
            # Tahun Mahasiswa
            $tahun = (int) substr($request->user()->nim, 2, 2);
    
            $columnID = array_column($request->get('present'), 'id');
            $hasil = '';
            $insert = [];

            foreach(DimensiPasangan::with(['dimA', 'dimB'])->get() as $dimensi) {
    
                # mendapatkan hasil presentase masing-masing dimensi / 0
                $kiri = $request->get('present')[array_search($dimensi->dimensiA, $columnID)]['value'] ?? 0;
                $kanan = $request->get('present')[array_search($dimensi->dimensiB, $columnID)]['value'] ?? 0;
    
                # cari apakah sisi sebelah kiri lebih besar dari kanan atau sebaliknya
                $hasil .= $kiri > $kanan ? $dimensi->dimA->code : $dimensi->dimB->code;
    
                # validasi total wajib 100 persen
                $left = $this->parsePresentasi($kiri, $kanan);
                $right = $this->parsePresentasi($kanan, $kiri);
                
                # insert hasil presentase pada masing-masing dimensi
                $insert[] = ['dimensi_id' => $dimensi->dimensiA, 'test_id' => $id, 'totalpresent' => $left];
                $insert[] = ['dimensi_id' => $dimensi->dimensiB, 'test_id' => $id, 'totalpresent' => $right];
    
                # memanggil fungsi fillStatic untuk memasukan data dimensi pada prodi
                $this->fillStatistic($prodi, $dimensi->dimensiA, $left, $tahun);
                $this->fillStatistic($prodi, $dimensi->dimensiB, $right, $tahun);
            }
    
            # cari tipe kepribadian
            $tipe = TipeKepribadian::where('namatipe', $hasil)->first();
    
            # return $insert;
            # insert hasil Presentase dimensi
            $test->presentases()->createMany($insert);
            # selesaikan tes & output Tipe Keprtibadian
            $test->update([
                'finished_at' => now()->toDateTimeString(),
                'tipekep_id' => $tipe->id
            ]);
            # Tambahkan total test dalam prodi
            $prodi->update(['jumlah_tes' => ++$prodi->jumlah_tes]);

            return response()->json($tipe, 201);
        });
        

    }

    /**
     * [Fungsi Bersama] Parsing Persentase
     */
    private function parsePresentasi($validated, $other): int
    {
        return ($validated / ($validated + $other)) * 100;
    }


    /**
     * Function fillStatistic digunakan untuk mendapatkan rekapitulasi hasil test dari pengguna yang digabungkan dengan data pengguna lain dalam prodi yang sama
     * Dimana data yang direcord terdiri dari programstudi dan presentase yang didapatkan setiap dimensi 
     * Fungsi ini dibuat tersendiri untuk mencegah duplikasi pembuatan, dan membuat code lebih reliable
     */
    private function fillStatistic(ProgramStudi $prodi, int $dimensi, int $presentase, int $tahun): Statistic
    {
        $check = Statistic::where('program_studi_id', $prodi->id)
        ->where('tahun', $tahun)
        ->where('dimensi_id', $dimensi)->first();

        $used = $check ? 1 + $check->total_used : 1;

        return Statistic::updateOrCreate([
            'program_studi_id' => $prodi->id,
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

    /**
     * View Hasil Kepribadian
    */
    public function hasil($id){
        # mengirim collection pada view hasil
        return view('apps.hasil', [
            'hasil' => TestKepribadian::where('user_id', Auth::id())
            ->with(['tipe' => function($q) {
                return $q->with('ciriTipekeps', 'kelebihanTipekeps', 'kekuranganTipekeps', 'profesiTipekeps', 'partnerTipekeps.partner');
            }])->with('presentases')->findOrFail($id),
            'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get(),
            'id' => $id
        ]);
    }
        # nested data untuk mengambil value

    /**
     * Cetak Hasil menjadi PDF
     */ 
    public function printPDF($id)
    {   
        $pdf = PDF::loadView('export.print', [
            'hasil' => TestKepribadian::where('user_id', Auth::id())
            ->with('presentases', 'tipe')->findOrFail($id),
            'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get()
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('Test-Kerpibadian.pdf');
    }
}
