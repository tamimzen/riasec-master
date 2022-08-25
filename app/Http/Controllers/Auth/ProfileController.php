<?php

namespace App\Http\Controllers\Auth;

use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{User, ProgramStudi, DimensiPasangan, TestKepribadian,TipeKepribadian,Soal, Jawab, Tahun};

class ProfileController extends Controller
{
    use UploadTrait;

    /**
     * Sdisplay user data and also recap test results.
     */

    public function showProfile()
    {
        $jumlahsoal = Soal::all()->count();
        $tipe = TipeKepribadian::all();
        $tes = TestKepribadian::where('user_id', Auth::id())->latest()->first();

        if ($tes):
            $hasil = TipeKepribadian::find($tes->tipekep_id);
        else:
            $hasil = null;
        endif;

        // $test = TestKepribadian::where('user_id', Auth::user()->id)->latest()->first();
        $test = Jawab::where('NIM', Auth::user()->nim)->max('test_id');



        foreach ($tipe as $t):
            $t->jumlah = Jawab::where('NIM', Auth::user()->nim)
                        ->where('teskep_id', $t->id)
                        ->where('test_id', $test != null ? $test : '1')
                        // ->where('jawaban', 'like', '%' . $t->namatipe . '%')
                        // ->orderBy('created_at', 'desc')
                        ->latest('jawabs.created_at')
                        ->take($jumlahsoal)
                        ->get()->count();
            // $t->presentase = intval(($t->jumlah/$jumlahsoal) * 100);
            $t->presentase = $t->jumlah;

        endforeach;

            
        return view('accounts.profile.show',[
            // 'latest' => User::with(['resultIndex.tipe','resultIndex.presentases','recapHasil.tipe'])->find(Auth::id()),
            'latest' => TestKepribadian::select('test_kepribadians.*' , 'tipe_kepribadians.namatipe' ,'tipe_kepribadians.updated_at as tanggal')->join('tipe_kepribadians', 'tipe_kepribadians.id', '=','test_kepribadians.tipekep_id')->where('user_id', Auth::id())->take(3)->orderBy('test_kepribadians.updated_at', 'desc')->get(),
            'tipe' => $tipe,
            'hasil' => $hasil,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProfile(User $profile)
    {
        return view('accounts.profile.editprofile',[
            'profile' => Auth::user(),
            'programstudi' => ProgramStudi::all(),
            'angkatan' => Tahun::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(Request $request, User $profile)
    {
        # form validasi
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|string|max:250',
            'nim' => 'required|string|max:40',
            'programstudi_id' =>'required',
            'profile_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'phone' => 'min:10',
            'tahun_id' => 'required'
        ]);

        # Dapatkan pengguna saat ini
        $profile = User::findOrFail(auth()->user()->id);
        # Tetapkan nama,nim,program,dll pengguna
        $profile->name = $request->input('name');
        $profile->username = $request->input('username');
        $profile->slug = Str::slug($request->input('name'));
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
            if (auth()->user()->image != null) {
                $this->deleteOne(auth()->user()->image);
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
}
