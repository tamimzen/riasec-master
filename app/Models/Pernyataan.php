<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pernyataan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['pernyataan','dimensi_id'];
    # soft delete 
    protected $dates = ['deleted_at'];
    /**
     * Relasi tabel Dimensi
     * one(dimensi) to many(pernyataan)
     */
    public function dimensi()
    {
        return $this->belongsTo(Dimensi::class);
    }
}
