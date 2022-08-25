<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipekepKelebihan extends Model
{
    use HasFactory;
    protected $fillable = ['tipekep_id','kelebihan_tipe'];

    /**
     * Relasi one to many
     * tipekepribadian > kelebihan
     */
    public function tipekepribadian()
    {
        return $this->belongsTo(TipeKepribadian::class, 'tipekep_id', 'id');
    }
}
