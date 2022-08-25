<?php

namespace App\Http\Controllers\App;

use Barryvdh\DomPDF\Facade as PDF;
use App\Traits\TestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{TestKepribadian, TipeKepribadian, DimensiPasangan, 
    Presentase, Dimensi, Soal, Jawab, Statistic, ProgramStudi, Waktu};

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
        $waktu = Waktu::find(1);
        $tests = $this->createSoal();
        return view('apps.soal', compact('tests', 'waktu'));
    }

    /**
     * Selesai sesi
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function finish($id, Request $request){     

        
        $jumlahsoal = Soal::all()->count();
    
        // $tes = TestKepribadian::where('user_id', Auth::id())->latest()->first();

        // $tes = Jawab::where('NIM', $id)
        //             ->orderBy('created_at', 'desc')
        //             ->take($jumlahsoal)
        //             ->get();


        // $kepribadian = $tes->select("teskep_id, COUNT(teskep_id) as jumlah")
        //                 ->groupBy('teskep_id')
        //                 ->orderBy('jumlah', 'desc')
        //                 ->get();

        // $test = TestKepribadian::where('user_id', Auth::user()->id)->latest()->first();
        $test = TestKepribadian::where('user_id', Auth::user()->id)->get()->count();

               
        $hasil = DB::table("jawabs")
	            ->select(DB::raw("teskep_id, COUNT(teskep_id) as jumlah"))
                        ->where('NIM', $id)
                        ->where('test_id', $test != null ? $test + 1 : '1')
                        ->where('teskep_id', 'not like', '%-%')
                        ->groupBy('teskep_id')
                        ->orderBy('jumlah', 'desc')
                        // ->latest('created_at', 'desc')
                        ->take($jumlahsoal)
                        // ->latest()
                        ->first();

                        
                        
        $update_karakter = new TestKepribadian();
        $update_karakter->user_id = Auth::user()->id;
        $update_karakter->tipekep_id = $hasil->teskep_id;
        $update_karakter->save();

        
        // $karakter_id = TipeKepribadian::where('namatipe', $hasil->teskep_id)->first();
        // $update_karakter = TestKepribadian::where('user_id', Auth::user()->id)->first();
        // $update_karakter->tipekep_id = $hasil->teskep_id;
        // $update_karakter->update();

        return redirect('hasil/'.$update_karakter->id);

    }

    public function jawab(Request $request){     
        
        $this->validate($request,[
            'soal_id' => 'required',
            'nim' => 'required',
            'jawaban' => 'required',
        ]);

        // $jawaban = TipeKepribadian::where('namatipe', 'like', '%'. $request->jawaban . '%')->first();
        $test = TestKepribadian::where('user_id', Auth::user()->id)->get()->count();


        $jawab = new Jawab();
        $jawab->nim = $request->nim;
        $jawab->soal_id = $request->soal_id;
        $jawab->teskep_id = $request->jawaban ;
        $jawab->test_id = $test != null ? $test + 1 : '1' ;
        $jawab->save();

        return response()->json(['message' => 'task was successful']);

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

        $test = TestKepribadian::where('user_id', Auth::user()->id)->latest()->first();
        $jumlahsoal = Soal::all()->count();
        $tipe = TipeKepribadian::all();

        $jawab = Jawab::where('NIM', Auth::user()->nim)->max('test_id');

        // ngitung
        $jawabanterakhir = Jawab::select(DB::raw('COUNT(jawabs.teskep_id) as totalss'), 'tipe_kepribadians.namatipe')
                            ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'jawabs.teskep_id')
                            ->where('jawabs.nim', Auth::user()->nim)
                            ->where('test_id', $jawab != null ? $jawab : '1')
                            ->latest('jawabs.created_at')
                            ->take($jumlahsoal)
                            ->groupBy('tipe_kepribadians.namatipe')
                            ->orderBy('totalss', 'desc')
                            ->get();

        $hasil_terakhir = $jawabanterakhir->sortByDesc('totalss')->take(3);


        foreach ($tipe as $t):
            $t->jumlah = Jawab::where('NIM', Auth::user()->nim)
                        ->where('teskep_id', $t->id)
                        ->where('test_id', $jawab != null ? $jawab : '1')
                        // ->where('jawaban', 'like', '%' . $t->namatipe . '%')
                        // ->orderBy('created_at', 'desc')
                        ->latest('jawabs.id')
                        ->take($jumlahsoal)
                        ->get()->count();
            // $t->presentase = intval(($t->jumlah/$jumlahsoal) * 100);
            $t->presentase = $t->jumlah;

        endforeach;


        return view('apps.hasil', [
            'hasil' => TestKepribadian::where('user_id', Auth::id())->where('id', $test->id)
            ->with(['tipe' => function($q) {
                return $q->with('ciriTipekeps', 'kelebihanTipekeps', 'kekuranganTipekeps', 'profesiTipekeps', 'partnerTipekeps.partner');
            }])->with('presentases')->findOrFail($id),
            'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get(),
            'id' => $id,
            'tipe' => $tipe,
            'hasil_terakhir' => $hasil_terakhir,
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
