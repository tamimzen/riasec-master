<?php

namespace App\Http\Controllers\Admin;

use App\Models\{TipekepCiri, TipeKepribadian};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CiriTipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageActive = "Ciri";
        $pageName = "Ciri-ciri Tipe Kepribadian";
        $ciritipe = TipekepCiri::with('tipekepribadian')->get(); # get value ciri & relasi tipekerpibadian
        return view('admin.tipekepribadian.ciriciri.index', compact('pageActive','pageName','ciritipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipekep = TipeKepribadian::all(); # get relasi tipekepribadian
        $pageActive = "Ciri-ciri Kepribadian";
        $pageName = "Tambah Ciri-ciri Kepribadian";
        return view('admin.tipekepribadian.ciriciri.create', compact('tipekep','pageName','pageActive'));
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
            'ciri_kepribadian' => 'required|string'
        ]);

        TipekepCiri::create($request->only(['tipekep_id', 'ciri_kepribadian']));
        return redirect()->route('ciritipe.index')->with('success','Ciri Kepribadian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipekepCiri $ciriciri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipekepCiri $ciritipe)
    {
        $pageActive = "Ciri-ciri Kepribadian";
        $pageName = "Ubah Ciri-ciri Kepribadian";

        $tipekep = TipeKepribadian::all(); # get relasi tipekepribadian
        
        # mengirim collection pada view ciriciri
        return view('admin.tipekepribadian.ciriciri.edit', compact('ciritipe','tipekep','pageName','pageActive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipekepCiri $ciritipe)
    {
        $request->validate([
            'tipekep_id' => 'required',
            'ciri_kepribadian' => 'required|string'
        ]);

        $ciritipe->update($request->only(['tipekep_id', 'ciri_kepribadian']));

        return redirect()->route('ciritipe.index')->with('success','Ciri Kepribadian berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipekepCiri $ciritipe)
    {
        $ciritipe->delete();
        return redirect()->route('ciritipe.index')->with('success','Ciri Kepribadian berhasi dihapus');
    }
}
