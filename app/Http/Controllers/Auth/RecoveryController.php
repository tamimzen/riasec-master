<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RecoveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('accounts.password.editpassword');
    }

    public function updatePassword(Request $request)
    {
        request()->validate([
            'old_password' => ['required', 'min:8'],
            'password' => ['required','min:8','string','confirmed']
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if ($old_password == $currentPassword) {
            // if (Hash::check($old_password,$currentPassword)) {
            auth()->user()->update([
                // 'password' => bcrypt(request('password'))
                'password' => request('password')
            ]);
            return redirect()->intended('/profile')->with(['success' => 'Password telah berhasil diperbarui']);
        }else{
            return back()->with(['fail' => 'Pastikan Anda mengisi kata sandi Anda']); 
        }
    }

}
