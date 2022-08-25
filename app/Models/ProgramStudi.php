<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{Model, SoftDeletes, Factories\HasFactory};

class ProgramStudi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['program_studi','slug','backgroundColor','borderColor','pointBorderColor', 'jumlah_tes'];
    
    # soft delete 
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($prodi) {
            $prodi->slug = Str::slug($prodi->program_studi);
            // $prodi->saveQuietly();
        });

        static::updating(function ($prodi) {
            $prodi->slug = Str::slug($prodi->program_studi);
            $prodi->saveQuietly();
        });
    }
    # menambahkan dilayar belakang untuk mencegah duplikasi

    /**
     * Relasi User dengan ProgramStudi
     *  one(programstudi) to many(user)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }


    /**
     * Relasi One To Many Program Studi Dengan Statistik
     */
    public function statistics()
    {
        return $this->hasMany(Statistic::class)->orderBy('dimensi_id');
    }
}
