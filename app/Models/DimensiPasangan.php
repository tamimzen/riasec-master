<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimensiPasangan extends Model
{
    use HasFactory;
    protected $fillable = ['dimensiA', 'dimensiB', 'color'];
    /**
     * Join tabel Dimensi
     * one to one 
     */
    public function dimA()
    {
        return $this->hasOne(Dimensi::class, 'id', 'dimensiA');
    }

    public function dimB()
    {
        return $this->hasOne(Dimensi::class, 'id', 'dimensiB');
    }
}
