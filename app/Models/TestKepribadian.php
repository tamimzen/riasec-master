<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestKepribadian extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'tipekep_id', 'finished_at'],
    
    $hidden = ['updated_at', 'deleted_at'];
    
    //* soft delete */ 
    protected $dates = ['deleted_at'];
    
    /**
     * Relasi User dengan Tes
     * one(user) to many (tes)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi Test dengan Tipe Kepribadian 
    */
    public function tipe()
    {
        return $this->belongsTo(TipeKepribadian::class, 'tipekep_id');
    }

    /**
     * Relasi dengan presentase
    */
    public function presentases()
    {
        return $this->hasMany(Presentase::class, 'test_id');
    }
}
