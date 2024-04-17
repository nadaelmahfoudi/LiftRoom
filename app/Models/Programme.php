<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description'];

    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'programme_session')->withPivot('day');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
