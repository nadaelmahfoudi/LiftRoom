<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    protected $fillable = ['user_id', 'programme_id', 'statut'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programmes()
    {
        return $this->belongsTo(Programme::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
}
