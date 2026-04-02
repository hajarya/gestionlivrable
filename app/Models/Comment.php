<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'livrable_id',
        'user_id',
        'content'
    ];

    // Relation vers le livrable
    public function livrable()
    {
        return $this->belongsTo(Livrable::class);
    }

    // Relation vers l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}