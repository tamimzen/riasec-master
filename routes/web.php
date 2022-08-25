<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\App\{TestKepribadianController, ArtikelTipeController};
use App\Http\Controllers\Auth\{UserAuthController, ProfileController, RecoveryController, ForgetPasswordController, AcountAuthController};
use App\Http\Controllers\Admin\{CiriTipeController, SoalController, PartnerTipeController, ProfesiTipeController,KelebihanTipeController, KekuranganTipeController, TipeKepribadianController, ProgramStudiController, WaktuController};

Route::get('/', function () {
    return view('welcome');
});

/*
    ===============================
			Middleware Guest
	===============================
*/
Route::middleware(['guest'])->group(function () {
    Route::get('login', [UserAuthController::class, 'login'])->name('formlogin');
    Route::get('register', [UserAuthController::class, 'register'])->name('formregister');
    Route::post('post-login', [UserAuthController::class, 'postLogin'])->name('auth.check');
    Route::post('post-register',[UserAuthController::class, 'postRegister'])->name('auth.create');
    // Lupa Password
    Route::get('forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
    Route::get('reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});
/*
    ===============================
        Session Verify Email
	===============================, 'is_verify_email'
*/
Route::get('dashboard', [UserAuthController::class, 'dashboard'])->middleware(['auth']); # opsi diganti pada get role user
Route::get('account/verify/{token}', [UserAuthController::class, 'verifyAccount'])->name('user.verify');
/*
    ===============================
			Middleware AUTH
	===============================
*/
Route::middleware(['auth'])->group(function () {

    # auth proses 
    Route::post('logout',[UserAuthController::class,'signOut'])->name('logout');
    Route::get('admin', [RoleController::class, 'roleAdmin'])->name('roleAdmin')->middleware('role:superadmin,admin');
    Route::get('cektahun', [RoleController::class, 'cektahun'])->name('cektahun')->middleware('role:superadmin,admin');
    Route::get('adminfilter', [RoleController::class, 'adminfilter'])->name('adminfilter')->middleware('role:superadmin,admin');
    Route::get('home', [RoleController::class, 'roleUser'])->name('roleUser')->middleware('role:user');
    
    // todo : profile
    Route::get('profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::get('edit-profile', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::post('setting-profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    
    // todo : change password
    Route::get('change-password',[RecoveryController::class,'changePassword'])->name('password.edit');
    Route::patch('password',[RecoveryController::class,'updatePassword'])->name('password.update');
    
    // todo : session test
    Route::get('test',[TestKepribadianController::class, 'startTest'])->name('startTest');
    Route::get('finish/{id}', [TestKepribadianController::class, 'finish'])->name('finishTest'); # simpan hasil tes dan prentase dimensi
    Route::POST('jawab', [TestKepribadianController::class, 'jawab'])->name('jawabTest'); # simpan hasil tes dan prentase dimensi
    Route::get('hasil/{id}', [TestKepribadianController::class, 'hasil'])->name('hasil');

/*
    ===============================
			Session User
	===============================
*/
    Route::group(['middleware' => 'role:user'], function() {

        Route::get('tipekepribadian', [ArtikelTipeController::class, 'artikel'])->name('tipekepribadian');
        Route::get('/artikel/{tipe:namatipe}', [ArtikelTipeController::class, 'readmore'])->name('artikel');
        // Route::get('/artikel/{tipe:slug}', [ArtikelTipeController::class, 'readmore'])->name('artikel');
        Route::view('/contact', 'apps.contact')->name('contact');
        # print hasil pdf
        Route::get('pdf/{id}', [TestKepribadianController::class,'printPDF'])->name('cetak');

    }); # role 'user'
    
/*
    ===============================
			Session Admin
	===============================
*/
    Route::group(['middleware' => 'role:superadmin,admin'], function() {
    
        // todo : Route Managemen Account
        Route::get('account',[AcountAuthController::class,'index'])->name('account.index'); # view Semua Pengguna
        Route::get('account/insert_user', [AcountAuthController::class,'createUser'])->name('account.createUser'); # view form create
        Route::get('account/insert_admin', [AcountAuthController::class,'createAdmin'])->name('account.createAdmin'); # view form create
        Route::post('account/user', [AcountAuthController::class,'storeUser'])->name('account.storeUser'); # tambah data baru Pengguna via admin
        Route::post('account/admin', [AcountAuthController::class,'storeAdmin'])->name('account.storeAdmin'); # tambah data baru Pengguna via admin
        Route::get('account/{id}/edit',[AcountAuthController::class,'edit'])->name('account.edit'); # view form edit
        Route::patch('account/{id}', [AcountAuthController::class, 'update'])->name('account.update'); # update data Pengguna via admin
        // Route::get('account/{id}',[AcountAuthController::class,'show'])->name('account.show'); # view show
        Route::get('account/{id}',[AcountAuthController::class,'destroy'])->name('account.destroy'); # delete data Pengguna via admin
        Route::post('account/import_excel_user',[AcountAuthController::class,'import_excel_user'])->name('account.import_excel_user'); # delete data Pengguna via admin
        Route::post('account/export_excel_user',[AcountAuthController::class,'export_excel_user'])->name('account.export_excel_user'); # delete data Pengguna via admin
        
        // todo : Route CRUD Tipekepribadian
        Route::resource('tipekep', TipeKepribadianController::class)->except(['show']);
            
        // todo : Route Tambahan Ciri Kepribadian
        Route::resource('ciritipe', CiriTipeController::class)->except(['show']);
        
        // todo : Route Tambahan Kelebihan Kepribadian
        Route::resource('kelebihantipe', KelebihanTipeController::class)->except(['show']);
        
        // todo : Route Tambahan Kekurangan Kepribadian
        Route::resource('kekurangantipe',KekuranganTipeController::class)->except(['show']);
            
        // todo : Route Tambahan Profesi Kepribadian
        Route::resource('profesitipe', ProfesiTipeController::class)->except(['show']);
        
        // todo : Route Tambahan Partner Kepribadian
        Route::resource('partnertipe', PartnerTipeController::class)->except(['show']);
        
        // todo : Route CRUD Program Studi
        Route::resource('programstudi', ProgramStudiController::class)->except(['show', 'destroy']);

        // todo : Route CRUD Soal & Jawaban
        Route::get('soal', [SoalController::class,'index'])->name('soal.index'); # view index
        Route::get('soal/insert', [SoalController::class, 'view'])->name('soal.create'); # view create form
        Route::post('soal/tambah', [SoalController::class, 'save'])->name('soal.tambah'); # view create form
        Route::get('soal/{id}/edit', [SoalController::class, 'viewedit'])->name('soal.edit'); # view edit form
        Route::get('soal/{id}/delete', [SoalController::class, 'destroy'])->name('soal.delete'); # view edit form
        Route::get('programstudi/{id}/delete', [ProgramStudiController::class, 'destroy'])->name('programstudi.delete'); # view edit form
        
        Route::resource('waktu', WaktuController::class)->except(['show']);



        // todo : get tipe kepribadian each prodi
        Route::get('tipeprodi/{angkatan?}', [RoleController::class, 'tipe'])->name('tipeprodi');
    
    }); #  'middleware' => 'role:admin'

}); # middleware auth
