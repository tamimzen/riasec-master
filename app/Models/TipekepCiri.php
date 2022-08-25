<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipekepCiri extends Model
{
    use HasFactory;
    protected $fillable = ['tipekep_id','ciri_kepribadian'];

    /**
     * Relasi one to many
     * tipekepribadian > ciriciri
     */
    public function tipekepribadian()
    {
        return $this->belongsTo(TipeKepribadian::class, 'tipekep_id', 'id');
    }
}
