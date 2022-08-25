<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimensi extends Model
{
    use HasFactory;
    protected $fillable = ['code','keterangan'];
    
    /**
     * Relasi tabel Pernyataan
     * one(dimensi) to many(pernyataan)
     */
    public function pernyataans()
    {
        return $this->hasMany(Pernyataan::class);
    }

    /**
     * Hasil dari tes (One to One)
     * @return
    */
    public function hasilTes()
    {
        return $this->hasOne(Presentase::class);
    }
}
