<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{TipekepKelebihan, TipeKepribadian};
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KelebihanTipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageActive = "Kelebihan";
        $pageName = "Kelebihan Tipe Kepribadian";
        $kelebihantipe = TipekepKelebihan::with('tipekepribadian')->get(); # get value kelebihan $ relasi tipekepribadian
        return view('admin.tipekepribadian.kelebihan.index', compact('pageActive','pageName','kelebihantipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipekep = TipeKepribadian::all(); # get relasi tipekepribadian
        $pageActive = "Kelebihan Tipe Kepribadian";
        $pageName = "Tambah Kelebihan Tipe Kepribadian";
        return view('admin.tipekepribadian.kelebihan.create', compact('tipekep','pageName','pageActive'));
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
            'tipekep_id' => 'required',
            'kelebihan_tipe' => 'required|string'
        ]);

        TipekepKelebihan::create($request->only(['tipekep_id', 'kelebihan_tipe']));
        return redirect()->route('kelebihantipe.index')->with('success','Kelebihan Tipe Kepribadian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipekepKelebihan $kelebihantipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipekepKelebihan $kelebihantipe)
    {
        $pageActive = "Kelebihan Tipe Kepribadian";
        $pageName = "Ubah Kelebihan Tipe Kepribadian";

        $tipekep = TipeKepribadian::all(); # get relasi tipekepribadian
        
        # mengirim collection pada view kelebihan
        return view('admin.tipekepribadian.kelebihan.edit', compact('kelebihantipe','tipekep','pageName','pageActive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipekepKelebihan $kelebihantipe)
    {
        $request->validate([
            'tipekep_id' => 'required',
            'kelebihan_tipe' => 'required|string'
        ]);

        $kelebihantipe->update($request->only(['tipekep_id', 'kelebihan_tipe']));
        return redirect()->route('kelebihantipe.index')->with('success','Kelebihan Tipe berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipekepKelebihan $kelebihantipe)
    {
        $kelebihantipe->delete();
        return redirect()->route('kelebihantipe.index')->with('success','Kelebihan Tipe berhasil dihapus');
    }
}