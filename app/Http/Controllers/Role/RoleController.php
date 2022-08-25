<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, DB};
use Illuminate\Database\Eloquent\Builder;
use App\Models\{Dimensi,ProgramStudi,TipeKepribadian, TestKepribadian, User, Tahun};

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mengarahkan role user pada halaman khusus user
     */
    public function roleUser(){
        return view('apps.home');
    }

    /**
     * Mengarahkan role admin pada halaman khusus admin
     */
    public function roleAdmin(Request $request){


        $angkatan = User::select(DB::raw('users.tahun_id'))
        ->join('tahuns', 'tahuns.id', '=', 'users.tahun_id')
        ->orderBy('tahuns.id', 'desc')
        ->groupBy('tahun_id')->get();

        #get relasi tabel test
        $tipe = TipeKepribadian::withCount('tests')->get();
        $data = TestKepribadian::select(DB::raw('COUNT(test_kepribadians.tipekep_id) as totalss'))
                            ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                            ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                            ->groupBy('test_kepribadians.tipekep_id')
                            ->get()->pluck('totalss')->toJson();
       
        $pageName = "Rekap Hasil Test Kepribadian";
        # get data hasil test kepribadian
        // $totalPengujian = TestKepribadian::all()->count()
        $totalPengujian = TestKepribadian::select(DB::raw('tipe_kepribadians.namatipe'))
                                ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                                ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                                ->get()->count();
        /*  DB::table('program_studis')->selectRaw('SUM(jumlah_tes) as total_tes')->first() */;
        $programstudi = ProgramStudi::get();

        $angkatan_id = $request->angkatan_id ?? Tahun::orderBy('id', 'desc')->first(); 
        
        # get data hasil test kepribadian sesuai prodi
        foreach($programstudi as $p):
            // $p->data = TestKepribadian::
            $p->data = TestKepribadian::select(DB::raw('COUNT(test_kepribadians.tipekep_id) as totalss'))
                        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                        ->where('users.programstudi_id', $p->id)
                        // ->orderBy('test_kepribadians.id', 'desc')
                        // ->groupBy('test_kepribadians.user_id')
                        ->groupBy('test_kepribadians.tipekep_id')
                        ->orderBy('test_kepribadians.tipekep_id', 'asc')
                        ->get()->pluck('totalss')->toJson();
            $p->tipe = TestKepribadian::select(DB::raw('tipe_kepribadians.namatipe'))
                        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                        ->where('users.programstudi_id', $p->id)
                        ->groupBy('namatipe')
                        ->orderBy('test_kepribadians.tipekep_id', 'asc')
                        ->get()->pluck('namatipe');
            $p->warna = TestKepribadian::select(DB::raw('tipe_kepribadians.warna'))
                        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                        ->where('users.programstudi_id', $p->id)
                        ->groupBy('warna')
                        ->orderBy('test_kepribadians.tipekep_id', 'asc')
                        ->get()->pluck('warna');
            $p->total = TestKepribadian::select(DB::raw('tipe_kepribadians.namatipe'))
                        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                        ->where('users.programstudi_id', $p->id)
                        ->orderBy('test_kepribadians.tipekep_id', 'asc')
                        ->get()->count();
        endforeach;

        $warna = TipeKepribadian::orderBy('id', 'asc')->pluck('warna');

        return view('admin.beranda', [
            // 'selected' => User::select('nim')->whereRelation('roles', 'roles.id', 3)->get()
            // 'selected' => User::select('nim')->whereHas('roles', function (Builder $query){
            //     $query->where('roles.id', 3); })->get()
            // ->groupBy(function ($item, $key){ return substr($item->nim, 2,2); })
            // ->sortKeys()->map(function($item, $key){ return 'Angkatan '.$key; }),
            'angkatan' => $angkatan,
            'angkatan_id' => $angkatan_id,
            'dimensi' => Dimensi::orderBy('id')->get()->pluck('keterangan')->toJson(), # untuk mengambil data keterangan dimensi
            'tipe' => $tipe->pluck('namatipe')->toJson(), # untuk mengambil data nama tipekepribadian
            'dominasi' => $tipe->pluck('tests_count')->toJson(), # untuk statistik kecenderungan kepribadian
            'prodi' => $programstudi,
            'data' => $data,
            'warna' => $warna,
        ],compact('pageName','totalPengujian'));
    }

    public function cektahun (Request $request){
         if($request->angkatan_id){
            return response()->json(["status" => "redirect", "url" => "adminfilter?angkatan_id=" . $request->angkatan_id]);
        }

    }


    /**
     * Mengarahkan role admin pada halaman khusus admin
     */
    public function adminfilter(Request $request){


        if($request->angkatan_id == 'all'):
            return redirect('admin');
        endif;
        $angkatan = User::select(DB::raw('users.tahun_id'))
        ->join('tahuns', 'tahuns.id', '=', 'users.tahun_id')
        ->orderBy('tahuns.id', 'desc')
        ->groupBy('tahun_id')->get();

        #get data request pilihan angkatan
        $angkatan_id = $request->angkatan_id ?? Tahun::orderBy('id', 'desc')->first(); 

       
        $dominasi = TestKepribadian::select(DB::raw('COUNT(test_kepribadians.tipekep_id) as totalss'))
        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
        ->where('users.tahun_id', $angkatan_id)
        // ->orderBy('test_kepribadians.id', 'desc')
        // ->groupBy('test_kepribadians.user_id')
        ->groupBy('test_kepribadians.tipekep_id')
        ->get()->pluck('totalss')->toJson();

        

        #get relasi tabel test
        // $tipe = TipeKepribadian::withCount('tests')->get();
        $tipe = TestKepribadian::select(DB::raw('tipe_kepribadians.namatipe'))
                        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                        ->where('users.tahun_id', $angkatan_id)
                        ->groupBy('namatipe')
                        ->get();

        $pageName = "Rekap Hasil Test Kepribadian";
        # get data hasil test kepribadian
        // $totalPengujian = TestKepribadian::all()->count()
        $totalPengujian = TestKepribadian::select(DB::raw('tipe_kepribadians.namatipe'))
                                ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                                ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                                ->where('users.tahun_id', $angkatan_id)
                                ->get()->count();
        /*  DB::table('program_studis')->selectRaw('SUM(jumlah_tes) as total_tes')->first() */;
        $programstudi = ProgramStudi::get();

        $warna = TestKepribadian::select(DB::raw('tipe_kepribadians.warna'))
                            ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                            ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                            ->where('users.tahun_id', $angkatan_id)
                            ->groupBy('warna')
                            ->get()->pluck('warna');
        
        # get data hasil test kepribadian sesuai prodi
        foreach($programstudi as $p):
            // $p->data = TestKepribadian::
            $p->data = TestKepribadian::select(DB::raw('COUNT(test_kepribadians.tipekep_id) as totalss'))
                        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                        ->where('users.programstudi_id', $p->id)
                        ->where('users.tahun_id', $angkatan_id)
                        // ->orderBy('test_kepribadians.id', 'desc')
                        // ->groupBy('test_kepribadians.user_id')
                        ->groupBy('test_kepribadians.tipekep_id')
                        ->get()->pluck('totalss')->toJson();
            $p->tipe = TestKepribadian::select(DB::raw('tipe_kepribadians.namatipe'))
                        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                        ->where('users.programstudi_id', $p->id)
                        ->where('users.tahun_id', $angkatan_id)
                        ->groupBy('namatipe')
                        ->get()->pluck('namatipe');
            $p->warna = TestKepribadian::select(DB::raw('tipe_kepribadians.warna'))
                        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                        ->where('users.programstudi_id', $p->id)
                        ->where('users.tahun_id', $angkatan_id)
                        ->groupBy('warna')
                        ->get()->pluck('warna');
            $p->total = TestKepribadian::select(DB::raw('tipe_kepribadians.namatipe'))
                        ->join('users', 'users.id', '=', 'test_kepribadians.user_id')
                        ->join('tipe_kepribadians', 'tipe_kepribadians.id', '=', 'test_kepribadians.tipekep_id')
                        ->where('users.programstudi_id', $p->id)
                        ->where('users.tahun_id', $angkatan_id)
                        ->get()->count();
        endforeach;



          
        return view('admin.beranda', [
            // 'selected' => User::select('nim')->whereRelation('roles', 'roles.id', 3)->get()
            // 'selected' => User::select('nim')->whereHas('roles', function (Builder $query){
            //     $query->where('roles.id', 3); })->get()
            // ->groupBy(function ($item, $key){ return substr($item->nim, 2,2); })
            // ->sortKeys()->map(function($item, $key){ return 'Angkatan '.$key; }),
            'angkatan' => $angkatan,
            'angkatan_id' => $angkatan_id,
            'dimensi' => Dimensi::orderBy('id')->get()->pluck('keterangan')->toJson(), # untuk mengambil data keterangan dimensi
            'tipe' => $tipe->pluck('namatipe')->toJson(), # untuk mengambil data nama tipekepribadian
            // 'dominasi' => $tipe->pluck('tests_count')->toJson(), # untuk statistik kecenderungan kepribadian
            'prodi' => $programstudi,
            'dominasi' => $dominasi,
            'warna' => $warna,
        ],compact('pageName','totalPengujian'));
    }

    /** 
     * function untuk membentuk grafik pada setiap prodi, dengan menampilkan data dari hasil test yang dilakukan oleh pengguna
     * data yang ditampilkan meliputi nama prodi dan juga warna identitas dari program studi itu sendiri. 
     * Berdasarkan Angkatan
     */
    public function tipe(int $angkatan)
    {
        return response()->json([
            'prodi' =>  ProgramStudi::with(['statistics' => 
                function($query) use ($angkatan) { return $query->where('tahun', $angkatan); }])
                ->get()->map(function($item) use ($angkatan){
                    return(object)[
                        'id' => $item->id,
                        'tahun' =>  $angkatan,
                        'statistics' => $item->statistics->pluck('presentase'),
                        'jumlah_tes' => $item->statistics->isNotEmpty() ? $item->statistics->get(0)->total_used : 0,
                        'data_all' => $item
                    ];
                })
            ]);  
            
    }
}
