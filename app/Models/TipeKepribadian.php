<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipeKepribadian extends Model
{
    use HasFactory;
    protected $fillable = [
        'namatipe',
        'deskripsi',
    ];

    // protected $fillable = [
    //     'namatipe',
    //     'slug',
    //     'keterangan_tipe',
    //     'julukan_tipe',
    //     'deskripsi_tipe',
    //     'arti_sukses',
    //     'saran_pengembangan',
    //     'kebahagiaan_tipe',
    //     'image_tipe'
    // ];

    # menambahkan metode pengakses baru untuk mendapatkan gambar
    public function getImageAttribute()
    {
        return $this->image_tipe;
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    // protected static function booted()
    // {
    //     static::creating(function ($namkep) {
    //         $namkep->slug = Str::slug($namkep->namatipe);
    //         // $namkep->saveQuietly();
    //     });

    //     static::updating(function ($namkep) {
    //         $namkep->slug = Str::slug($namkep->namatipe);
    //         $namkep->saveQuietly();
    //     });
    // }
    
    /**
     * Relasi one to many
     * tipekepribadian > ciri kepribadian
     */ 
    public function ciriTipekeps()
    {
        return $this->hasMany(TipekepCiri::class, 'tipekep_id');
    }
    /**
     * Relasi one to many
     * tipekepribadian > kelebihantipe
     */
    public function kelebihanTipekeps()
    {
        return $this->hasMany(TipekepKelebihan::class, 'tipekep_id');
    }
    /**
     * Relasi one to many
     * tipekepribadian > kekurangantipe
     */
    public function kekuranganTipekeps()
    {
        return $this->hasMany(TipekepKekurangan::class, 'tipekep_id');
    }
    /**
     * Relasi one to many
     * tipekepribadian > saranprofesi
     */
    public function profesiTipekeps()
    {
        return $this->hasMany(TipekepProfesi::class, 'tipekep_id');
    }
    /**
     * Relasi one to many
     * tipekepribadian > partneralami
     */
    public function partnerTipekeps()
    {
        return $this->hasMany(TipekepPartner::class, 'tipekep_id');
    }

    /**
     * Hubungkan dengan tes yang pernah dilakukan
    */
    public function tests()
    {
        return $this->hasMany(TestKepribadian::class, 'tipekep_id');
    }
}
