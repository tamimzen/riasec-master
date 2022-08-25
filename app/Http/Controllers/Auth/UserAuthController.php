<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAcountRequest;
use App\Models\{Role, User, ProgramStudi, UserVerify, Tahun};
use Illuminate\Support\Facades\{Auth, Hash, Session, Mail, DB};

class UserAuthController extends Controller
{
    # mengarahkan pada form login
    public function login()
    {
        return view('auth.login');
    }

    # mengarahkan pada form register
    public function register()
    {
        return view('auth.register',[ 
            'programstudi' => ProgramStudi::all(),
            'angkatan' => Tahun::all()
        ]);
    }

    
    # register new user with verfikasi email
    public function postRegister(CreateAcountRequest $request)
    {
        # create account
        $check = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request['password']),
            'nim' => $request->nim,
            'programstudi_id' => $request->programstudi_id,
            'phone' => $request->phone,
            'tahun_id' => $request->tahun_id,
        ]);
        # default role = user
        $check->roles()->attach(Role::where('name', 'user')->first());

        // # opsi verifikasi email
        // $token = Str::random(64); #create token
        
        // UserVerify::create([
        //     'user_id' => $check->id,
        //     'token' => $token
        // ]);

        // # kirim email verifikasi pada pengguna
        // Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Verifikasi Akun Pada JPC Politeknik Negeri Banyuwangi');
        // });

        return redirect()->intended('/login')->with('success','Anda telah berhasil terdaftar');
    }

    # auth check user akun login
    public function postLogin(Request $request)
    {
        # validasi email, password
        $request->validate([
            'email' => 'required',
            'password' => 'required|alphaNum|min:6',
        ]);

        $email = $request->get('email');
        $password = $request->get('password');

        $auth = User::where('username', $request->email)
                    ->where('password', $request->password)
                    ->first();

        # login menggunakan email atau username
        $login_type = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        # cek auth pengguna dengan melihat Role milik pengguna masing-masing
        if ($auth) {

            // if (Auth::attempt([$login_type => $email, 'password' => $password])) {

            Auth::login($auth);

            $user = Auth::user(); // User model

            return redirect()->intended('dashboard')
                ->with('success','Selamat Datang di Job Placement Center Poliwangi'); // Pilihan: user, superadmin, admin
        }
        return back()->with('fail', 'Silakan cek kembali Email/Username dan Password anda');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){

            $user = Auth::user(); // User model
            
            return redirect($user->roles()->first()->name == 'user' ? 'home' : 'admin');
        }
        return redirect("login")->with('fail','Ups! Anda tidak memiliki akses');
    }

    # User SignOut
    public function signOut() 
    {
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        $message = 'Maaf email Anda tidak dapat di identifikasi.';

        if(!is_null($verifyUser) ){

            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Email Anda telah diverifikasi. Anda sekarang dapat masuk.";
            } else {
                $message = "Email Anda sudah diverifikasi. Anda sekarang dapat masuk.";
            }
        }
        return redirect()->route('formlogin')->with('message', $message);
    }
}
