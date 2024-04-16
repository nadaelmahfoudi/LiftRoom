<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['titre'];

    public function programmes()
    {
        return $this->belongsTo(Programme::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
