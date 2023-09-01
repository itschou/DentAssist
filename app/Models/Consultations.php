<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'type_consultation',
        'motif_consultation',
        'prix_consultation',
        'prix_payé_consultation',
        'prix_reste_consultation',
        'procedures_effectué',
        'prescription',
        'observation',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
