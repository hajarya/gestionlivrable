<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Task;
use App\Models\Comment;
use App\Models\LivrableFile;
use App\Models\User;
class Livrable extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'type',
        'responsable_id',
        'consultant_id',
        'start_date',
        'duration',
        'status'
    ];

    // Un livrable a plusieurs tâches
    public function tasks()
{
    return $this->hasMany(Task::class);
}

public function files()
{
    return $this->hasMany(LivrableFile::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function consultant()
{
    return $this->belongsTo(User::class, 'consultant_id');
}

    // Le responsable qui crée le livrable
    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    
    



// Accessor pour la date de fin prévue
   


public function getDateFinPrevueAttribute($value)
{
    if ($value) {
        return Carbon::parse($value); // ⚡ toujours un Carbon
    }

    if ($this->start_date && $this->duration) {
        return Carbon::parse($this->start_date)->addDays($this->duration); // ⚡ Carbon, pas string
    }

    return null;
}


}