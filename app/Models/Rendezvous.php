<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rendezvous extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'comments',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
