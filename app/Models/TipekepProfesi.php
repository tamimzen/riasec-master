<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipekepProfesi extends Model
{
    use HasFactory;
    protected $fillable = ['tipekep_id','profesi_tipe'];

    /**
     * Relasi one to many
     * tipekepribadian > profesi
     */
    public function tipekepribadian()
    {
        return $this->belongsTo(TipeKepribadian::class, 'tipekep_id', 'id');
    }
}
