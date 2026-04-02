<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'livrable_id',
        'nom',
        'status',
        'consultant_id'
    ];

    // Une tâche appartient à un livrable
    public function livrable()
    {
        return $this->belongsTo(Livrable::class);
    }
}