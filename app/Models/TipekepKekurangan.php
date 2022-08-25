<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipekepKekurangan extends Model
{
    use HasFactory;
    protected $fillable = ['tipekep_id','kekurangan_tipe'];

    /**
     * Relasi one to many
     * tipekepribadian > kekurangan
     */
    public function tipekepribadian()
    {
        return $this->belongsTo(TipeKepribadian::class, 'tipekep_id', 'id');
    }
}
