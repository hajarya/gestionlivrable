<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivrableFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'livrable_id',
        'file_path'
    ];

    // Un fichier appartient à un livrable
    public function livrable()
    {
        return $this->belongsTo(Livrable::class);
    }
}