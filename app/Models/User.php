<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'password',
    'role',
    'is_active'
];
     
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Livrables créés par le responsable
public function livrablesResponsable()
{
    return $this->hasMany(Livrable::class, 'responsable_id');
}

// Livrables assignés au consultant
public function livrablesConsultant()
{
    return $this->hasMany(Livrable::class, 'consultant_id');
}

public function livrables()
{
    return $this->hasMany(Livrable::class, 'consultant_id');
}
}
