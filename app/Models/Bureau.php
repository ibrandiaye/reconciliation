<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom','projet_id'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
