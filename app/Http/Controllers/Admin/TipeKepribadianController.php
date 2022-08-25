<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TipeKepribadian;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTipekepRequest;

class TipeKepribadianController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageActive = "Tipe";
        $pageName = "Daftar Tipe Kepribadian";
        $tipekepribadian = TipeKepribadian::all(); # get value tipekepribadian

        return view('admin.tipekepribadian.index', compact('pageActive','pageName','tipekepribadian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageActive = "Tambah Tipe Baru";
        $pageName = "Tambah Tipe Kepribadian";
        return view('admin.tipekepribadian.create', compact('pageName', 'pageActive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namatipe' => 'required',
            'deskripsi' => 'required',
        ]);
        # create tipe kepribadian baru
        $tipekepribadian = new TipeKepribadian; 
        $tipekepribadian->namatipe = $request->namatipe;
        $tipekepribadian->deskripsi = $request->deskripsi;
        $tipekepribadian->warna = $request->warna;
        // $tipekepribadian->julukan_tipe = $request->julukan_tipe;
        // $tipekepribadian->deskripsi_tipe = $request->deskripsi_tipe;
        // $tipekepribadian->arti_sukses = $request->arti_sukses;
        // $tipekepribadian->saran_pengembangan = $request->saran_pengembangan;
        // $tipekepribadian->kebahagiaan_tipe = $request->kebahagiaan_tipe;
        
        // # save image
        // $image = $request->file('image_tipe');
        // # Buat nama gambar berdasarkan tipekepribadian dan tandai waktu saat ini
        // $name = Str::slug($request->input('namatipe')).'_'.time();
        // # Folder path
        // $folder = '/uploads/TipeKepribadian/';
        // # Buat jalur file tempat gambar akan disimpan [ jalur folder + nama file + ekstensi file]
        // $filePath = $folder . $name. '.' . $image->guessExtension();
        // # Unggah gambar
        // $this->uploadOne($image, $folder, 'public', $name);
        // # Setel jalur gambar profil pengguna di database ke filePath
        // $tipekepribadian->image_tipe = $filePath;

        # simpan data User pada Database
        // dd($tipekepribadian);
        $tipekepribadian->save();
        return redirect('tipekep')->with('success','Data Tipe Kepribadian berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  TipeKepribadian $tipekep
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeKepribadian $tipekep)
    {
        $pageActive = 'Edit Tipe Kepribadian';
        $pageName = 'Edit Tipe Kepribadian';
        return view('admin.tipekepribadian.edit', compact('tipekep','pageActive','pageName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  TipeKepribadian $tipekep
     * @return \Illuminate\Http\Response
     */
    // public function update(CreateTipekepRequest $request, TipeKepribadian $tipekep)
    public function update(Request $request, $id)
    {
        # generate tipekepribadian 
        $tipekep = TipeKepribadian::find($id);
        $tipekep->namatipe = $request->input('namatipe');
        $tipekep->deskripsi = $request->input('deskripsi');
        $tipekep->warna = $request->warna;
        // $tipekep->keterangan_tipe = $request->input('keterangan_tipe');
        // $tipekep->julukan_tipe = $request->input('julukan_tipe');
        // $tipekep->deskripsi_tipe = $request->input('deskripsi_tipe');
        // $tipekep->arti_sukses = $request->input('arti_sukses');
        // $tipekep->saran_pengembangan = $request->input('saran_pengembangan');
        // $tipekep->kebahagiaan_tipe = $request->input('kebahagiaan_tipe');
        
        # Periksa apakah gambar tipekepribadian telah diungah
        if ($request->has('image_tipe')) {
            # Dapatkan file gambar
            $image = $request->file('image_tipe');
            # Buat nama gambar berdasarkan nama tipekepribadian dan stempel waktu saat ini
            $name = Str::slug($request->input('namatipe')).'_'.time();
            # Menetapkan folder path
            $folder = '/uploads/TipeKepribadian/';
            # Buat jalur file tempat gambar akan disimpan[ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            # menghapus foto yang sudah ada dan menganti dengan yang baru
            if ($tipekep->image != null) {
                $this->deleteOne($tipekep->image);
            }
            # Unggah gambar + memperbarui gambar
            $this->uploadOne($image, $folder, 'public', $name);
            # Setel jalur gambar profil tipekepribadian di database ke filePath
            $tipekep->image_tipe = $filePath;
        }
        // simpan data User pada Database
        $tipekep->update();

        // dd($tipekep);
        // $tipekep->save();
        return redirect('tipekep')->with('success','Data Tipe Kepribadian berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  TipeKepribadian $tipekep
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeKepribadian $tipekep)
    {
        $tipekep->delete();
        return redirect()->route('tipekep.index')->with('success','Data Tipe Kepribadian berhasi dihapus');
    }
}
