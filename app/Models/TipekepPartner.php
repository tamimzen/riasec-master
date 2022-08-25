<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipekepPartner extends Model
{
    use HasFactory;
    protected $fillable = ['tipekep_id','partner_tipe'];

    /**
     * Relasi one to many
     * tipekepribadian > partner
     */
    public function tipekepribadian()
    {
        return $this->belongsTo(TipeKepribadian::class, 'tipekep_id', 'id');
    }

    /**
     * Get the user that owns the TipekepPartner
     * for artikel and result click 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function partner()
    {
        return $this->belongsTo(TipeKepribadian::class, 'partner_tipe');
    }

}
