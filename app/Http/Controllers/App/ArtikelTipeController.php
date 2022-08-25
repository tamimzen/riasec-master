<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipeKepribadian;

class ArtikelTipeController extends Controller
{
    /**
     * Show Tipe Kepribadian All
    */
    public function artikel()
    {
        return view('apps.tipekepribadian', [
            'tipes' => TipeKepribadian::all()
        ]);
    }

    /**
     * Read Artikel, menampilkan artikel dari masing2 tipekepribadian 
     */
    public function readmore(TipeKepribadian $tipe)
    {
        return view('apps.artikel', [
            'readmore' => $tipe,
            'ciris' => $tipe->ciriTipekeps()->get(),
            'kelebihans' => $tipe->kelebihanTipekeps()->get(),
            'kekurangans' => $tipe->kekuranganTipekeps()->get(),
            'profesis' => $tipe->profesiTipekeps()->get(),
            'partners' => $tipe->partnerTipekeps()->with('partner')->get(),
        ]);
    }
}
