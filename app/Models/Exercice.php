<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'image', 'duree'];

    public function sessions()
    {
        return $this->hasMany(Session::class , 'session_exercice');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }


}
