<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Waktu;

class WaktuController extends Controller
{
    /**
     * Tampilkan data waktu dan Pernyataan
    */
    public function index() {
        $pageActive = "Waktu";
        $pageName = "Daftar waktu & Jawaban";
        $waktu = Waktu::find(1); # get data waktu


        return view('admin.waktu.index', compact('pageName','waktu', 'pageActive'));
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
            'waktu'    => 'required|string'
        ]);

        $waktu = Waktu::find($id); # mencocokan id waktu yang akan diubah
        $waktu->waktu = $request->waktu;
        // dd($waktu);
        $waktu->update();

        
        return redirect()->back()->with('success','waktu berhasil di perbarui');
    }

  
}
