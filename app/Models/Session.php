<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = ['name','objectif', 'duree'];

    public function exercices()
    {
        return $this->belongsToMany(Exercice::class, 'session_exercice')->withPivot('repetition');
    }

    public function programmes()
    {
        return $this->belongsToMany(Programme::class, 'programme_session')->withPivot('day');
    }
}
