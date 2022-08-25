<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany, HasOne};

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'slug',
        'email',
        'password',
        'nim',
        'programstudi_id',
        'profile_image',
        'is_email_verified',
        'phone',
        'tahun_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'token_key'
    ];
    # soft delete 
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     *  make slug
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($akuns) {
            $akuns->slug = Str::slug($akuns->name);
            // $akuns->saveQuietly();
        });

        static::updating(function ($akuns) {
            $akuns->slug = Str::slug($akuns->name);
            $akuns->saveQuietly();
        });
    }

    /**
     * craete token_key for user
     */
    // public function createApiToken()
    // {
    //     $token = Str::random(64);
    //     $this->token_key = $token;
    //     $this->save();
    //     return $token;
    // }

    /**
     * Relasi dengan tabel Role
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class,'role_users');
    }

    /**
     * proteksi halaman, dimana ketika membuka halaman yang tidak sesuai
     * role dari user maka akan dialihkan ke halaman lain
     * Check Roled User By Parameters
     * @param array $role
     * @return bool
     */
    public function hasRole(array $role): bool
    {
        return (bool) $this->roles()->whereIn('name', $role)->count();
    }

    /**
     * Relasi User dengan ProgramStudi
     *  one(ProgramStudi) to many(User)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programstudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    /**
     * Setting image profile
     * 
     * @return mixed
    */
    public function getImageAttribute()
    {
        return $this->profile_image;
    }

    /**
     * Relasi User dengan Tes
     *  one(user) to many(tes)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests(): HasMany
    {
        return $this->hasMany(TestKepribadian::class);
    }

    /**
     * Get the currentTest associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function currentTest(): HasOne
    {
        return $this->hasOne(TestKepribadian::class)->where('finished_at', null);
    }

    /**
     * Get the ResultIndex associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function resultIndex(): HasOne
    {
        return $this->hasOne(TestKepribadian::class)->orderBy('id', 'DESC');
        // ->whereNotNull('finished_at');
    }

    /**
     * Get all of the recapHasil for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recapHasil(): HasMany
    {
        return $this->hasMany(TestKepribadian::class, 'user_id', 'id');
    }

    /**
     * bismillah fungsi untuk kondisi pengguna
     */
    public function panggilSemua()
    {
        return $this->user_count() > 0 || (!is_null($this->dimensi_id) && !is_null($this->test_id)); 
    }


    /**
     * Get the tahun that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tahun(): BelongsTo
    {
        return $this->belongsTo(Tahun::class);
    }
}
