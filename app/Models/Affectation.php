<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant','bureau_id','decaissement_id'
    ];
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }
    public function decaissement()
    {
        return $this->belongsTo(Decaissement::class);
    }

}
