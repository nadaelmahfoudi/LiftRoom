<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'image'];

    public function sessions()

    {
        return $this->belongsToMany(Session::class, 'programme_session')->withPivot('day');
    }


    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function abonnements(){
        return $this->hasMany(Abonnement::class);
    }

}
