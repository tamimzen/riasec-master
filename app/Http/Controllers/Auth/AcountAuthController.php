<?php

namespace App\Http\Controllers\Auth;

use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, Hash, Session, Mail, DB};
use App\Http\Requests\{CreateAuthAdmin, UpdateAcountRequest};
use App\Models\{Role, User, ProgramStudi, UserVerify, Tahun, DimensiPasangan};
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class AcountAuthController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageActive = "Data Pengguna";
        $pageName = "Data Pengguna";
        $dataUser = User::with('programstudi','roles','tests','resultIndex.tipe','tahun')
        ->get()->map(function($item){
            return(object)[
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'roles' => $item->roles->implode('name',','),
                'image' =>$item->image,
                'nim' => $item->nim,
                'phone' => $item->phone,
                'programstudi' => $item->programstudi,
                'tipe' => $item->resultIndex,
                // 'tipekep' => TestKepribadian::find($item)->pluck('namatipe'),
                'tahun' => $item->tahun,
            ];
        });

        $angkatan = User::select(DB::raw('users.tahun_id'))
                    ->join('tahuns', 'tahuns.id', '=', 'users.tahun_id')
                    ->orderBy('tahuns.id', 'desc')
                    ->groupBy('tahun_id')->get();

        $prodi = User::select('program_studis.*','users.programstudi_id')
                    ->join('program_studis', 'program_studis.id', '=', 'users.programstudi_id')
                    ->orderBy('program_studis.id', 'desc')
                    ->groupBy('programstudi_id')->get();

        return view('admin.user.index',compact('pageActive','pageName','dataUser','angkatan','prodi'));
    }

    /**
     * import data from excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function import_excel_user(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder import di dalam folder public
		$file->move('import',$nama_file);
 
		// import data
		Excel::import(new UsersImport, public_path('/import/'.$nama_file));
        
        return redirect('account')->with('success', 'All good!');
    }

    public function export_excel_user(Request $request) 
    {
        $dataUser = User::where('id', '!=', 1)->where('programstudi_id', $request->prodi)->where('tahun_id', $request->tahun)->with('programstudi','roles','tests','resultIndex.tipe','tahun')
        ->get()->map(function($item){
            return(object)[
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'roles' => $item->roles->implode('name',','),
                'image' =>$item->image,
                'nim' => $item->nim,
                'phone' => $item->phone,
                'programstudi' => $item->programstudi,
                'tipe' => $item->resultIndex,
                // 'tipekep' => TestKepribadian::find($item)->pluck('namatipe'),
                'tahun' => $item->tahun,
            ];
        });

        $prodi = ProgramStudi::where('id', $request->prodi)->first();
        $tahun = Tahun::where('id', $request->tahun)->first();


        return Excel::download(new UsersExport($dataUser, $prodi->program_studi, $tahun->tahun), 'users.xlsx');
        // return Excel::download(new PenjualanExport($penjualan, $total), 'Penjualan.xlsx');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        return view('admin.user.createUser', [
            'programstudi' => ProgramStudi::all(),
            'angkatan' => Tahun::all(),
            'pageActive' => "Tambah Data Pengguna User"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function storeUser(CreateAuthAdmin $request)
    {
        # create account
        $check = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request['password'],
            // 'password' => bcrypt($request['password']),
            'nim' => $request->nim,
            'programstudi_id' => $request->programstudi_id,
            // 'phone' => $request->phone,
            'tahun_id' => $request->tahun_id,
            'is_email_verified' => '1',
        ]);
        # default role = user
        $check->roles()->attach(Role::where('name', 'user')->first());
        # opsi verifikasi email
        $token = Str::random(64); #create token

        UserVerify::create([
            'user_id' => $check->id,
            'token' => $token
        ]);

        # kirim email verifikasi pada pengguna
        // Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Verifikasi Akun Pada JPC Politeknik Negeri Banyuwangi');
        // });

        return redirect()->route('account.index')->with('success','pengguna baru berhasil ditambahkan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAdmin()
    {
        return view('admin.user.createAdmin', [
            'programstudi' => ProgramStudi::all(),
            'angkatan' => Tahun::all(),
            'pageActive' => "Tambah Data Pengguna Admin"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function storeAdmin(CreateAuthAdmin $request)
    {
        # create account
        $check = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request['password']),
            'nim' => $request->nim,
            'programstudi_id' => $request->programstudi_id,
            // 'phone' => $request->phone,
            'tahun_id' => $request->tahun_id,
            'is_email_verified' => '1',
        ]);
        # default role = admin
        $check->roles()->attach(Role::where('name', 'admin')->first());

        # opsi verifikasi email
        $token = Str::random(64); #create token

        UserVerify::create([
            'user_id' => $check->id,
            'token' => $token
        ]);

        # kirim email verifikasi pada pengguna
        // Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Verifikasi Akun Pada JPC Politeknik Negeri Banyuwangi');
        // });

        return redirect()->route('account.index')->with('success','Admin baru berhasil ditambahkan');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */

    // public function verifyAccount($token)
    // {
    //     $verifyUser = UserVerify::where('token', $token)->first();
    //     $message = 'Maaf email Anda tidak dapat di identifikasi.';

    //     if(!is_null($verifyUser) ){

    //         $user = $verifyUser->user;

    //         if(!$user->is_email_verified) {
    //             $verifyUser->user->is_email_verified = 1;
    //             $verifyUser->user->save();
    //             $message = "Email Anda telah diverifikasi. Anda sekarang dapat masuk.";
    //         } else {
    //             $message = "Email Anda sudah diverifikasi. Anda sekarang dapat masuk.";
    //         }
    //     }
    //     return redirect()->route('formlogin')->with('message', $message);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return view('admin.user.show',[
    //         'latest' => User::with(['resultIndex.tipe','resultIndex.presentases','recapHasil.tipe'])->find($id),
    //         'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get(),
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.edit',[
            'acount' => User::find($id),
            'programstudi' => ProgramStudi::all(), # get data programstudi 
            'angkatan' => Tahun::all(), # get data tahun angkatan   
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcountRequest $request, $id)
    {
        # mendapatkan user id
        $profile = User::findOrFail($request->id);
        # Tetapkan nama,nim,program,dll pengguna
        $profile->name = $request->input('name');
        $profile->username = $request->input('username');
        $profile->nim = $request->input('nim');
        $profile->programstudi_id = $request->input('programstudi_id');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->tahun_id = $request->input('tahun_id');
        
        # Periksa apakah gambar profil telah diunggah
        if ($request->has('profile_image')) {
            # Dapatkan file gambar
            $image = $request->file('profile_image');
            # Buat nama gambar berdasarkan nama pengguna dan stempel waktu saat ini
            $name = Str::slug($request->input('name')).'_'.time();
            # Menetapkan folder path
            $folder = '/uploads/images/';
            # Buat jalur file tempat gambar akan disimpan[ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            # menghapus foto yang sudah ada dan menganti dengan yang baru
            if ($profile->image != null) {
                $this->deleteOne($profile->image);
            }
            # Unggah gambar + memperbarui gambar
            $this->uploadOne($image, $folder, 'public', $name);
            # Setel jalur gambar profil pengguna di database ke filePath
            $profile->profile_image = $filePath;
        }
        // simpan data User pada Database
        $profile->save();
        return redirect()->back()->with(['success' => 'Profile berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acount = User::findOrFail($id);
        $acount->delete();
        return redirect()->route('account.index')->with('success','Data pengguna berhasil dihapus');
    }
}