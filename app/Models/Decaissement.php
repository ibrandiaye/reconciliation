<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decaissement extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant','commentaire','projet_id'
    ];
}
