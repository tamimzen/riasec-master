<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presentase extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['dimensi_id', 'test_id', 'totalpresent'];

    # soft delete 
    protected $dates = ['deleted_at'];
}
