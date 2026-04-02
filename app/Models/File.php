<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'livrable_id',
        'nom',
        'path',
        'type',
        'taille'
    ];

    public function livrable()
    {
        return $this->belongsTo(Livrable::class);
    }
}