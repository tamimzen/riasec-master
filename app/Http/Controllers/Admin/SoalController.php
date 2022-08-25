<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{DimensiPasangan,Pernyataan, Soal, TipeKepribadian};
use App\Models\Waktu;

class SoalController extends Controller
{
    /**
     * Tampilkan data Soal dan Pernyataan
    */
    public function index() {
        $pageActive = "Soal";
        $pageName = "Daftar Soal";
        $daftarsoal = Soal::all(); # get data soal
        $waktu = Waktu::find(1); # get data soal

        foreach ($daftarsoal as $soal):
            $soal->kategori = TipeKepribadian::find($soal->kategori);
        endforeach;

        return view('admin.soal.index', compact('pageName','daftarsoal', 'pageActive', 'waktu'));
    }

    /**
     * Tampilkan form tambah Soal dan Pernyataan
    */
    public function view() 
    {
        $pageName = "Tambah Soal & Jawaban";
        $tipe_kep = TipeKepribadian::all();
        return view('admin.soal.create', [
            'tipe_kepribadian' => $tipe_kep
        ],compact('pageName'));
    }

    /**
     * @param int $id
     * @param mixed $statement
     * @return mixed
     *  function insert digunakan untuk memasukan value baru pada table pernyataan 
     *  dimana fungsi ini berfungsi untuk multiple table antara table soal dan pernyataan
    */
    // public static function insert(int $id, $statement) 
    // {
    //     return Pernyataan::create([
    //         'pernyataan' => $statement,
    //         'dimensi_id' => $id
    //     ])->id;
    // }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
    */
    public function save(Request $request) 
    {
        # validasi dimensi, apakah dimensi tersebut tersedia pada tabel sebelumnya
        $request->validate([
            'tipe'       => 'required',
            'soal'    => 'required'
        ]);

        
        $soal = new Soal;
        $soal->soal = $request->soal;
        $soal->kategori = $request->tipe;
        $soal->save();
        # menambahkan pada tabel soal dengan berdasarkan pasangan dimensi yang dipilih
        // Soal::create([
        //     'soal'        => $request->soal,
        //     'kategori' => $request->tipe
        // ]);

        return redirect('soal')->with('success','Soal berhasil di perbarui');
    }

    /**
     * Tampilkan form tambah Soal dan Pernyataan
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    */
    public function viewedit($id)
    {
        $pageName = "Edit Soal Baru";
        # get soal dengan relasi pernyataan didalamnya
        $daftarsoal = Soal::find($id); 

        # membaca dimensi_id pada masing2 pernyataan untuk melihat pasangan dimensinya

        $tipe_kep = TipeKepribadian::all();
      
        /**
         * var pasDimSelect digunakan untuk menampilkan dimensi_id yang terbaca dari pernyataan yang akan diedit
         * yang ditampilkan berupa pasangan dimensi pada form edit
         */
     
        /**
         * mengirim collection pada view soal
         * dan juga mengenalkan atribut pada table pasangan dimensi
         */
        return view('admin.soal.edit', [
            'daftarsoal' => $daftarsoal,
            'tipe_kep' => $tipe_kep
        ],compact('daftarsoal','tipe_kep','pageName', 'id'));
    }

    /**
     * @param int $id
     * @param mixed $statement
     * @return mixed
     * function edit digunakan untuk mengubah value pada pernyataan berdasarkan id pada pernyataan tersebut
     * yang dimana didapatkan dari fungsi update dari soal
    */
    public static function edit(int $id, $statement, int $dimensi_id) 
    {
        return Pernyataan::find($id)->update([
            'pernyataan' => $statement, # self::edit untuk mengetahui value yang dubah dari setiap pernyataan
            'dimensi_id' => $dimensi_id # untuk mengetahui id dimensi dari proses select pasangan dimensi
        ]);
    }

    /**
     * Form Ubah Pernyataan
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
    */
    public function update(Request $request, $id)
    {
        # validasi dimensi, apakah dimensi tersebut tersedia pada tabel sebelumnya
        $request->validate([
            'tipe'       => 'required',
            'soal'    => 'required|string'
        ]);

        $soal = Soal::find($id); # mencocokan id soal yang akan diubah
        $soal->soal = $request->soal;
        $soal->kategori = $request->tipe;
        // dd($soal);
        $soal->update();

        
        return redirect('soal')->with('success','Soal berhasil di perbarui');
    }

    /**
     * Hapus Soal
     *
     * @param App\Models\Soal $id
     */
    public function destroy(Soal $id)
    {
        # menghapus data soal dan juga pernyataan yang ada didalamnya 
        $id->delete();
        return redirect('soal')->with('success','Soal berhasil di hapus');
    }
}
