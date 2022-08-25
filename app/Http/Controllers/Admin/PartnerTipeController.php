<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{TipekepPartner, TipeKepribadian};
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PartnerTipeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageActive = "Partner";
        $pageName = "Partner Alami Tipe Kepribadian";

        $partneralami = TipeKepribadian::with('partnerTipekeps.partner')->get();
        # get value partner & relasi partner
        return view('admin.tipekepribadian.partner.index', compact('pageActive','pageName','partneralami'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipekep = TipeKepribadian::all(); # get relasi tipekepribadian

        $pageActive = "Partner Alami Tipe Kepribadian";
        $pageName = "Tambah Partner Tipe";
        return view('admin.tipekepribadian.partner.create', compact('tipekep','pageActive','pageName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Cek relasi value array pada tipe kerpribadian, apakah berbeda dengan value yang ada pada partner(tipekep_id)
         * Dan setiap value dalam array bersifat unik, tidak berduplikat
         * nb : value pada partner tidak boleh sama dengan tipekepribadian
         */
        $request->validate([
            'tipekep_id' => 'required',
            'partner_tipe' => 'required|array|min:1|max:3',
            'partner_tipe.*' => 'required|exists:App\Models\TipeKepribadian,id|different:tipekep_id|distinct'
        ]);
        # menggunakan function autosave untuk response data pada database 
        return $this->autosave($request->tipekep_id, $request->partner_tipe, 'Partner Tipe berhasil ditambahkan');
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
     * @param  TipeKepribadian  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeKepribadian $partnertipe)
    {
        $pageActive = "Partner Alami Tipe Kepribadian";
        $pageName = "Ubah Partner Tipe";

        # tampilkan partner tipe berdasarkan tipekepribadian yang di pilih
        $tipekep = TipeKepribadian::where('id','!=', $partnertipe->id)->get();
        $tipe_selected = $partnertipe->partnerTipekeps()->get()->pluck('partner_tipe')->toJson();

        # mengirim collection pada view partner
        return view('admin.tipekepribadian.partner.edit', compact('partnertipe','pageName','pageActive','tipekep', 'tipe_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  TipeKepribadian  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipeKepribadian $partnertipe)
    {
        /**
         * Cek relasi value array pada tipe kerpribadian, apakah berbeda dengan value yang ada pada partner(tipekep_id)
         * Dan setiap value dalam array bersifat unik, tidak berduplikat
         * nb : value pada partner tidak boleh sama dengan tipekepribadian
         */
        $request->validate([
            'partner_tipe' => 'required|array|min:1|max:3',
            'partner_tipe.*' => 'required|exists:App\Models\TipeKepribadian,id|different:tipekep_id|distinct'
        ]);

        # menggunakan function autosave untuk response data pada database 
        return $this->autosave($partnertipe->id, $request->partner_tipe, 'Partner Tipe berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TipekepPartner  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeKepribadian $partnertipe)
    {
        $partnertipe->delete(); # hapus value partner pada tipekepribadian
        return redirect()->route('partnertipe.index')->with('success','Partner Tipe berhasil dihapus');
    }

    /**
     * @param  int $tipe
     * @param  array|null $partners
     * @param mixed $message
     * @return \Illuminate\Http\Response
     * 
     * create autosave, fungsi untuk store and update 
     * dimana digunakan untuk menyimpan dan menghapus data value yang ada pada partner
     * nb : jika data tipekep sebelumnya sudah ada maka akan dilakukan update(menghapus) value dengan menganti menggunakan value yang baru
     *      namun bila belum ada value pada tipekepribadian tersebut maka akan dimasukan data partner baru untuk tipekepribadian tersebut
     */
    private function autosave($tipe, array $partners, $message)
    {
        # hapus yang sudah ada sebelumnya
        TipekepPartner::whereNotIn('partner_tipe', $partners)
        ->where('tipekep_id', $tipe)->delete();
        
        # cek tipekepribadain(tipekep_id)
        foreach ($partners as $partner){
            TipekepPartner::updateOrCreate([
                'tipekep_id' => $tipe,
                'partner_tipe' => $partner
            ]);
        }
        return redirect()->route('partnertipe.index')->with('success', $message);
    }
}
