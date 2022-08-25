<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    use HasFactory;

    #tabel identitas user_verifiy
    public $table = "users_verify";
    
    /**
     * Write code on Method
     *
     * @return response()
     */

    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */

    /**
     * Relasi dengan tabel user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
