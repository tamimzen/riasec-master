<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    /**
     * Fillable Items
     *
     * @var array
     */
    protected $fillable = ['program_studi_id', 'dimensi_id', 'tahun', 'presentase', 'total_used'];

    
}
